<x-filament::page>

    <div>
        <form wire:submit.prevent="submit" class="w-full" target="_blank">
            @csrf

            <div
                class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
                <div class="mb-6">
                    <div class="flex">

                        <div class="mr-6">
                            <label for="grade_level"
                                class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Monthly
                                Reports</label>
                            <select class="w-45 bg-white  border border-gray-200 rounded-lg " wire:model="month">
                                <option value="-1">Please choose month</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="border rounded-lg px-4 py-2 bg-blue-200">Generate Report</button>
            </div>

        </form>
    </div>

</x-filament::page>
