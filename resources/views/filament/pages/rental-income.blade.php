<x-filament::page>
    <form wire:submit.prevent="submit" class="w-full">
        @csrf
        <div class=" px-6 block bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-6 pb-6">
            {{-- <label for="read_date" class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">Rental Date</label>
            <input wire:model="read_date" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4" type="date" required value="{{now()->format('m/d/Y')}}"> --}}

            <div class="mb-6 pt-4">
                <h2 class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">Units: {{ $units->count() }}</h2>
                {{-- <h4 class="block mr-4 mt-4 mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $occupied_count }} Units</h4> --}}

            </div>
            <div class=" columns-1 sm:columns-2 lg:columns-2">
                @foreach ($units as $index => $unit )
                {{-- @dd($unit) --}}
                        {{-- @php
                            $parking_fee = 0
                            if ($unit->hasParking == true) {
                                $parking_fee = 750;
                            }
                        @endphp --}}
                        <div class="mb-4 bg-white border border-blue-200 rounded-lg   dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 p-0">
                            <div class="flex justify-between">
                                <h2 wire:model="rental_income.{{$index}}.tenant_name" class="ml-4 block mr-4 mt-4 mb-1 text-base font-medium text-blue-600 dark:text-white">{{$unit->name}}</h2>
                                <h2 class="ml-4 block mr-4 mt-4 mb-1 text-xs font-normal text-blue-600 dark:text-white">{{ $unit->tenantName }}</h2>
                            </div>
                            <hr class="mb-4  ">
                            <div class="flex ml-4">
                                <div class="mr-4">
                                    <label for="rental_income.{{$index}}.income" class="block  mr-4 text-xs font-base   dark:text-white">Rent</label>
                                        <input wire:model="rental_income.{{$index}}.income" class="w-28 rounded-lg border-slate-200" type="number" step="100">
                                    {{-- <p class="text-gray-400 text-xs">PHP {{$unit->rent}}</p> --}}
                                </div>
                                <div class="mr-4">
                                    <label for="rental_income.{{$index}}.parking_fee" class="block text-xs font-base   dark:text-white">Parking Fee</label>
                                    <input wire:model="rental_income.{{$index}}.parking_fee" class="w-28 border border-slate-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4" type="number" step="50" >
                                </div>
                                <div>
                                    <label for="rental_income.{{$index}}.date" class="block mr-4 text-xs font-base   dark:text-white">Pay Date</label>
                                    <input wire:model="rental_income.{{$index}}.date" class="border border-slate-200 text-slate-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4" type="date">
                                </div>
                                <div class="flex ml-4">
                                    <div class="flex items-center pr-4">
                                        <label for="rental_income.{{$index}}.occupied" class="mr-2 text-xs font-normal text-gray-900 dark:text-gray-300">Occupied</label>
                                        <input wire:model="rental_income.{{$index}}.occupied" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div class="flex items-center pr-4">
                                        <label for="rental_income.{{$index}}.hasParking" class="mr-2 text-xs font-normal text-gray-900 dark:text-gray-300">Has Parking</label>
                                        <input wire:model="rental_income.{{$index}}.hasParking" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
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
