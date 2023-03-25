<x-filament::page>
    <form wire:submit.prevent="submit" class="w-full">
        @csrf
        <div class=" px-6 block bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-6">
            {{-- <label for="read_date" class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">Rental Date</label>
            <input wire:model="read_date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8" type="date" required value="{{now()->format('m/d/Y')}}"> --}}

            <div class="mb-6">
                <h2 class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">Units</h2>

            </div>
            <div class="columns-1 sm:columns-2 lg:columns-3">
                    @foreach ($units as $index => $unit )
                    <div class="mb-4 bg-white border border-gray-200 rounded-lg   dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 px-4">
                            <h2 class="block mr-4 mt-4 mb-1 text-base font-medium text-gray-900 dark:text-white">{{ $unit->name }}</h2>
                            <hr class="mb-4">
                            <div class="flex">
                                <div class="mr-6">
                                    <label for="rental_income.{{$index}}.{{$unit->id}}.income" class="block mr-4 text-sm font-base  text-gray-900 dark:text-white">Rent</label>
                                    <input wire:model="rental_income.{{$index}}.{{$unit->id}}.income" class="w-28 rounded-lg border-blue-200" type="number">
                                    <p class="text-gray-400 text-xs">PHP {{$unit->rent}}</p>
                                </div>
                                <div>
                                    <label for="rental_income.{{$index}}.{{$unit->id}}.date" class="block mr-4 text-sm font-base  text-gray-900 dark:text-white">Pay Date</label>
                                    <input wire:model="rental_income.{{$index}}.{{$unit->id}}.date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8" type="date">
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>

            <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Save</button>
        </div>
    </form>
</x-filament::page>
