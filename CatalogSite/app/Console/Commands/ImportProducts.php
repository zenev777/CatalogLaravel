<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Storage;

class ImportProducts extends Command
{
    protected $signature = 'import:products';
    protected $description = 'Imports products from external API';

    public function handle()
    {
        $url = "https://dummyjson.com/products";
        $limit = 12; // Броя продукти на заявка
        $skip = 0; // Начален параметър за пропускане

        do {
            $response = Http::get("{$url}?skip={$skip}&limit={$limit}");

            if ($response->failed()) {
                $this->error("Failed to fetch products from API.");
                return;
            }

            $data = $response->json();

            // Проверка за празни данни, за да спрем цикъла
            if (empty($data['products'])) {
                break;
            }

            // Импортираме или актуализираме продуктите
            foreach ($data['products'] as $apiProduct) {
                // Намери или създай продукта по SKU
                $product = Product::updateOrCreate(
                    ['sku' => $apiProduct['sku']], // Уникален идентификатор
                    [
                        'title' => $apiProduct['title'],
                        'description' => $apiProduct['description'],
                        'price' => $apiProduct['price'],
                        'sku' => $apiProduct['sku']
                    ]
                );

                // Запазваме снимките локално
                if (!empty($apiProduct['images'])) {
                    $savedImages = [];
                    foreach ($apiProduct['images'] as $imageUrl) {
                        $imagePath = $this->downloadImage($imageUrl);
                        if ($imagePath) {
                            $savedImages[] = $imagePath;
                        }
                    }
                    $product->images = json_encode($savedImages);
                }

                $product->save();
            }

            // Увеличаваме skip за следващата страница
            $skip += $limit;

        } while ($skip < 20);// Sega e do 20 , zaradi testa //$data['total']); // Спираме, когато достигнем общия брой

        $this->info("Products imported successfully.");
    }

    private function downloadImage($url)
    {
        // Опитваме се да отворим потока за четене
        $stream = fopen($url, 'r');

        if ($stream === false) {
            return null;
        }

        // Получаваме информация за файла
        $fileStats = fstat($stream);

        // Проверка дали fstat е успешен
        if ($fileStats === false) {
            fclose($stream);
            return null;
        }

        $fileSize = $fileStats['size'];

        // Проверка за размера на файла (5MB)
        if ($fileSize > 5 * 1024 * 1024) {
            fclose($stream);
            return null;
        }

        // Генериране на уникално име за файла
        $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
        $fileName = basename($url, '.' . $fileExtension);
        $uniqueId = uniqid();

        // Комбинираме името на файла с уникалното ID
        $localPath = 'images/products/' . $fileName . '_' . $uniqueId . '.' . $fileExtension;

        // Записване на файла в локалната файлова система
        $file = Storage::disk('public')->put($localPath, stream_get_contents($stream));

        fclose($stream);

        if ($file) {
            return $localPath;
        }

        return null;
    }
}
