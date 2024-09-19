<x-filament::page>
    {{ $this->form }}

    <div class="homepage-boxes-display">
        @foreach (\App\Models\HomepageBox::where('visible', true)
            ->orderBy('position', 'asc')
            ->limit(4)
            ->get() as $box)
            <br>
        @endforeach
    </div>

    <x-filament::button wire:click="save" class="mt-4">
        Save Selections
    </x-filament::button>
</x-filament::page>
