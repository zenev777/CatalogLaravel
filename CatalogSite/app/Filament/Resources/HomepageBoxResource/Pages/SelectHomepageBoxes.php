<?php

namespace App\Filament\Resources\HomepageBoxResource\Pages;

use App\Filament\Resources\HomepageBoxResource;
use App\Models\HomepageBox;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;

// ref: https://filamentphp.com/docs/3.x/panels/resources/custom-pages
// "Filament\Resources\Pages\Page;" instad of ->> use Filament\Resources\Pages\Page;

class SelectHomepageBoxes extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-check';
    protected static ?string $navigationLabel = 'Select Homepage Boxes';
    protected static ?string $slug = 'select-homepage-boxes';
    protected static ?int $navigationSort = 4;
    protected static string $view = 'filament.resources.homepage-box-resource.pages.select-homepage-boxes';

    public $visibleBoxes = [];
    public $positions = [];

    public static function getResource(): string
    {
        return HomepageBoxResource::class;
    }

    public function mount()
    {
        // Взимаме само видимите кутии (visible = true) и ги сортираме по позиция
        $this->visibleBoxes = HomepageBox::where('visible', true)
            ->orderBy('position', 'asc')
            ->pluck('id') // Връщаме само id-тата
            ->toArray();

        // Взимаме всички позиции на кутиите
        $this->positions = HomepageBox::pluck('position', 'id')->toArray();
    }

    public function save()
    {
        // Филтрираме само видимите кутии
        $selectedVisibleBoxes = array_filter($this->visibleBoxes);

        // Проверка дали има точно 4 избрани кутии
        if (count($selectedVisibleBoxes) !== 4) {
            Notification::make()
                ->title('You must select exactly 4 boxes!')
                ->danger()
                ->send();

            return;
        }

        // Проверка дали за всяка избрана кутия има попълнена позиция
        foreach ($selectedVisibleBoxes as $boxId) {
            if (empty($this->positions[$boxId])) {
                Notification::make()
                    ->title('Each selected box must have a position!')
                    ->danger()
                    ->send();

                return;
            }
        }

        // Всички кутии стават невидими
        HomepageBox::query()->update(['visible' => false]);

        // Обновяваме само избраните кутии
        HomepageBox::whereIn('id', $selectedVisibleBoxes)->update(['visible' => true]);

        // Обновяване на позициите на кутиите
        foreach ($this->positions as $boxId => $position) {
            HomepageBox::where('id', $boxId)->update(['position' => $position]);
        }

        Notification::make()
            ->title('Homepage boxes updated successfully!')
            ->success()
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                Grid::make(3)
                    ->schema(
                        HomepageBox::all()->map(function ($box) {
                            return Grid::make(3) // Grid с 3 колони за заглавие, Toggle и позиция
                                ->schema([
                                    // Показване на заглавието като текст, не поле
                                    \Filament\Forms\Components\Placeholder::make('title_' . $box->id)
                                        ->label('Title')
                                        ->content($box->title),

                                        Toggle::make('visibleBoxes.' . $box->id)
                                        ->label('Visible')
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, $get, $set) use ($box) {
                                            $selectedCount = count(array_filter($get('visibleBoxes')));

                                            if ($selectedCount > 4) {
                                                Notification::make()
                                                    ->title('You need to select 4 boxes!')
                                                    ->danger()
                                                    ->send();

                                                $set('visibleBoxes.' . $box->id, false);
                                            }
                                        })
                                        ->default(in_array($box->id, $this->visibleBoxes)),


                                            $set('visibleBoxes.' . $box->id, false);
                                        }
                                    })
                                    ->default(in_array($box->id, $this->visibleBoxes)),

                                TextInput::make('positions.' . $box->id)
                                    ->label('Position')
                                    ->numeric()
                                    ->default($this->positions[$box->id] ?? 1)
                                    ->minValue(1)
                                    ->maxValue(10)
                                    ->required()
                                    ->reactive(),
                            ];
                        })->flatten()->toArray()
                    )
            ]),
        ];
    }
}
