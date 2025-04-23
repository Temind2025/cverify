<x-filament::page>
    <x-filament::form wire:submit.prevent="submit">
        {{ $this->form }}

        <x-filament::button type="submit">
            Save Settings
        </x-filament::button>
    </x-filament::form>
</x-filament::page>