<div class="flex space-x-9 my-5">
    {{-- <p class="px-5 text-l"> Unit: {{ $name }} </p> --}}
    {{-- <input wire:model='readingText'   type="text"> --}}
    {{-- {{ $index }} --}}
    <div>
        {{-- <label for="readingText" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit ID: {{ $unit_id }}</label> --}}
        <label for="readingText" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit {{ $name }}</label>
        <div class="flex">
            {{-- <input type="text" wire:model="date" > --}}
            {{-- <input wire:model="date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="date"> --}}
            <input wire:model="readingText" type="number" class="mx-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            {{-- <button wire:click="addReading2('{{ $unit_id }}', '{{ $readingText }}')"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            >Save</button> --}}

        </div>

    </div>

    @if (  $index  >=  $tenant_count )

    <button wire:click="addReading3('{{ $unit_id }}', '{{ $readingText }}')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send</button>

    @endif
    {{-- Tenant: {{ $tenant }} --}}
    {{-- <script>
        document.addEventListener('livewire:load', function () {
            // Your JS here.
        })
    </script> --}}

</div>

