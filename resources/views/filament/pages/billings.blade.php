<x-filament::page>

    {{-- @foreach ($units as $unit )
        <p>{{ $unit->name }}</p>
        <input style="color: black" type="text" wire:model='readingText' wire:key='{{ $unit->id }}'>
        <br>
        <button wire:click='addReading({{ $unit->id }})'>Send</button>
    @endforeach --}}
    <input wire:model='date' style="color: black" type="date">
    @foreach ($units as $unit )
        @livewire('my-input', ['name' => $unit->name, 'unit_id' => $unit->id, key($unit->id)])

    @endforeach
    <button wire:click="addReading2('{{ $unit_id }}')">Save</button>
</x-filament::page>
