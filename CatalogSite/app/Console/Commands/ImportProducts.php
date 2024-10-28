<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

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

                // Запазваме първата снимка (при нужда може да се разшири за няколко снимки)
                if (!empty($apiProduct['images'])) {
                    $product->images = json_encode($apiProduct['images']); // Запазваме като JSON
                    $product->save();
                }
            }

            // Увеличаваме skip за следващата страница
            $skip += $limit;

        } while ($skip < $data['total']); // Спираме, когато достигнем общия брой

        $this->info("Products imported successfully.");
    }
}
