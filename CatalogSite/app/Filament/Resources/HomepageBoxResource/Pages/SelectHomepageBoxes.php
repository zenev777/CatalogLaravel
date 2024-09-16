<?php

namespace App\Filament\Resources\HomepageBoxResource\Pages;

use App\Models\HomepageBox;
use Filament\Pages\Page;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class SelectHomepageBoxes extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-check';
    protected static ?string $navigationLabel = 'Select Homepage Boxes';
    protected static string $view = 'filament.resources.homepage-box-resource.pages.select-homepage-boxes';

    public $visibleBoxes = [];
    public $positions = [];

    public function mount()
    {
        $this->visibleBoxes = HomepageBox::where('visible', true)
            ->orderBy('position', 'asc')
            ->limit(4)
            ->pluck('id')
            ->toArray();

        $this->positions = HomepageBox::pluck('position', 'id')->toArray();
    }

    public function save()
    {
        if (count(array_filter($this->visibleBoxes)) !== 4) {
            Notification::make()
                ->title('You must select exactly 4 boxes!')
                ->danger()
                ->send();

            return;
        }

        HomepageBox::query()->update(['visible' => false]);

        HomepageBox::whereIn('id', $this->visibleBoxes)->update(['visible' => true]);

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
                            return [
                                Toggle::make('visibleBoxes.' . $box->id)
                                    ->label($box->title)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, $get, $set) use ($box) {
                                        $selectedCount = count(array_filter($get('visibleBoxes')));

                                        if ($selectedCount > 4) {
                                            Notification::make()
                                                ->title('You can only select 4 boxes!')
                                                ->danger()
                                                ->send();

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
