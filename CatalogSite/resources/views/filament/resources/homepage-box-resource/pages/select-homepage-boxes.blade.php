<x-filament::page>
    {{ $this->form }}

    <div class="homepage-boxes-display mt-4">
        @foreach (\App\Models\HomepageBox::where('visible', true)
            ->orderBy('position', 'asc')
            ->limit(4)
            ->get() as $box)
            <div class="homepage-box">
                <h3>{{ $box->title }}</h3>
                <img src="{{ $box->image }}" alt="{{ $box->title }}" class="img-fluid">
                <p>{{ $box->description }}</p>
            </div>
        @endforeach
    </div>

    <x-filament::button wire:click="save" class="mt-4">
        Save Selections
    </x-filament::button>
</x-filament::page>
