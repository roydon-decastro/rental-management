<x-filament::page>
    {{-- <form wire:submit.prevent="submit" class="w-[800px]"> --}}
    <form wire:submit.prevent="submit" class="w-full">
        @csrf
        {{-- <h1>{{ $tenant_count }}</h1> --}}
        {{-- <form wire:submit.prevent="$emit('refreshChildren', '{{ $date }}')" class="w-[800px]"> --}}
        {{-- @foreach ($units as $unit )
            <p>{{ $unit->name }}</p>
            <input style="color: black" type="text" wire:model='readingText' wire:key='{{ $unit->id }}'>
            <br>
            <button wire:click='addReading({{ $unit->id }})'>Send</button>
        @endforeach --}}

        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-6">
            <label for="read_date" class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">Read Date</label>
            <input wire:model="read_date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8" type="date" required value="{{now()->format('m/d/Y')}}">
            {{-- <input wire:model="read_date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8" type="date"> --}}
            {{-- <div>
                <label for="title">Event Title</label>
                <input wire:model="title" id="title" type="text">

                <label for="date">Event Date</label>
                <x-date-picker wire:model="date" id="date"/>

                <button>Schedule Event</button>
            </div> --}}
        {{-- </div> --}}


        <h2 class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">Units</h2>
        <div class="columns-1 sm:columns-2 lg:columns-4">
            {{-- <div class=""> --}}
                @foreach ($units as $index => $unit )
                {{-- @dd($unit) --}}
                {{-- @livewire('my-input', ['name' => $unit->name, 'unit_id' => $unit->id] , key($unit->id)) --}}
                    {{-- @livewire('my-input', ['unit' => $unit, 'date' => $date, tenant_count' => $tenant_count - 1, 'index' => $index] ) --}}
                    <div class="mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 p-4">
                        {{-- @dd($prev_readings) --}}
                        @php

                            $prev_reading_value = null;
                            // $prev_reading_month = null;
                            foreach ($prev_readings as $prev_reading ) {
                                $prev_reading_month = date('F', strtotime($prev_reading->read_date));
                                if ($prev_reading->unit_id == $unit->id) {
                                    $prev_reading_value = $prev_reading->reading;
                                }
                            }
                        @endphp
                        <label for="readingText.{{$index}}.{{$unit->id}}" class="block mr-4 text-base font-medium text-gray-900 dark:text-white">{{$unit->name}}</label>
                        {{-- <label for="readingText.{{ $index }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit {{ dd($unit) }}</label> --}}
                        <input wire:model="readingText.{{$index}}.{{$unit->id}}" class="w-28 rounded-lg border-blue-200" type="number" step=".01" >
                        <p class="text-gray-400 text-xs">{{ $prev_reading_month }}: {{ is_null($prev_reading_value) ? 'None' : $prev_reading_value }}</p>
                        {{-- @livewire('my-input', ['name' => $unit->name, 'unit_id' => $unit->id, key($unit->id)]) --}}
                    </div>
                @endforeach
        </div>

            <button type="submit"
            {{-- <button wire:click="$emit('refreshChildren', 'date')" --}}
            {{-- <button wire:click="$emitTo('Livewire.MyInput', 'saveReadings')" type="submit" --}}
            {{-- class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" wire:click="addReading2('{{ $unit_id }}')"> --}}
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Save</button>
        </div>
    </div>
    </form>
</x-filament::page>
