<x-filament::page>

<div>
    <form wire:submit.prevent="submit" class="w-full" target="_blank" >
        @csrf

        <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
            <div class="mb-6">
                <div class="flex">

                    <div class="mr-6">
                        <label for="grade_level" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Monthly Reports</label>
                        <select class="w-45 bg-white  border border-gray-200 rounded-lg " wire:model="month" >
                            <option value="-1">Please choose month</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit"   class="border rounded-lg px-4 py-2 bg-blue-200">Generate Report</button>
        </div>

    </form>
</div>

</x-filament::page>
