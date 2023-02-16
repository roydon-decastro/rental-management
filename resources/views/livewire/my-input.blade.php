<div>
    Unit: {{ $name }}
    <input wire:model='readingText' style="color: black" type="text">
    <button wire:click="addReading2('{{ $unit_id }}')">Send</button>

</div>
