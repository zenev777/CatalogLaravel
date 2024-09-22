<?php

namespace App\Filament\Resources\HomepageBoxResource\Pages;

use App\Filament\Resources\HomepageBoxResource;
use App\Models\HomepageBox;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;

class SelectHomepageBoxes extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-check';
    protected static ?string $navigationLabel = 'Select Homepage Boxes';
    protected static ?string $slug = 'select-homepage-boxes';
    protected static ?int $navigationSort = 4;
    protected static string $view = 'filament.resources.homepage-box-resource.pages.select-homepage-boxes';

    public $boxes = [];
    public $data = [];



    public static function getResource(): string
    {
        return HomepageBoxResource::class;
    }

    public function mount()
    {
        // Взимаме само видимите кутии (visible = true) и ги сортираме по позиция
        $this->boxes = HomepageBox::orderBy('position', 'asc')->get();

        // autofill the form with the data from the database
        $data = [];
        foreach ($this->boxes as $box) {
            $data['data']['box' . $box->id]['id'] = $box->id;
            $data['data']['box' . $box->id]['title'] = $box->title;
            $data['data']['box' . $box->id]['visible'] = $box->visible;
            $data['data']['box' . $box->id]['position'] = $box->position;
        }
        $this->form->fill($data);
    }

    public function save()
    {
        // get the data from the form and trasform it into collection
        $boxes = collect($this->form->getState()['data'] ?? []);
        // dd($this->form->getState());

        // use collect to transform the array to a collection and use the filter method to filter the array
        $getOnlyVisible =  $boxes->filter(function ($box) {
            return $box['visible'] === true;
        });

        // Проверка дали има точно 4 избрани кутии
        if (count($getOnlyVisible) !== 4) {
            Notification::make()
                ->title('You must select exactly 4 boxes to be visible!')
                ->danger()
                ->send();

            return;
        }

        // Всички кутии стават невидими
        HomepageBox::query()->update(['visible' => false]);

        // Обновяване на позициите на кутиите
        foreach ($boxes as $selectedBox) {
            // dd($selectedBox);
            HomepageBox::where('id', $selectedBox['id'])->update([
                'position' => $selectedBox['position'] ?? 4,
                'visible' => $selectedBox['visible'] ?? false
            ]);
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
                Grid::make(1) // Grid с 1 колона за всеки ред с кутия
                    ->schema(
                        $this->boxes->map(function ($box) {
                            return Grid::make(3) // Grid с 3 колони за заглавие, Toggle и позиция
                                ->model($box)
                                ->schema([
                                    // Показване на заглавието като текст, не поле
                                    \Filament\Forms\Components\TextInput::make('box' . $box->id . '.id')
                                        ->label('id')
                                        ->visible(false),

                                    \Filament\Forms\Components\Placeholder::make('box' . $box->id . '.title')
                                        ->label('Title')
                                        ->content('[#' . $box->id . ']' . $box->title),

                                    // Toggle::make('box' . $box->id.'.visible')
                                    //     ->label('Visible')
                                    //     ->default(!!$box->visible),
                                    // ima nqkakuw dert s Toggle winagi e NULL?!?!

                                    Checkbox::make('box' . $box->id . '.visible')->inline()
                                        ->label('Visible')
                                        ->default(!!$box->visible),

                                    TextInput::make('box' . $box->id . '.position')
                                        ->label('Position')
                                        ->numeric()
                                        ->live()
                                        ->default($box->position)
                                        ->minValue(1)
                                        ->maxValue(4),
                                ]);
                        })->toArray() // Превръщане в масив за schema
                    ),
            ])->statePath('data'),
        ];
    }
}
