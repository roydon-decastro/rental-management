<x-filament::page>
    <div class="grid lg:grid-cols-4 lg:gap-4 grid-cols-1 gap-4">


        <div>
            {{-- <form wire:submit.prevent="submit" class="w-full" target="_blank"> --}}
            <form action="/billpermonth/{{ $month }}" class="w-full" target="_blank">
                @csrf

                <div
                    class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
                    <div class="mb-6">
                        <div class="flex">

                            <div class="mr-6">
                                <label for="grade_level"
                                    class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">
                                    Water Monthly Reports</label>
                                <select id="month" name="month"
                                    class="w-45 bg-white text-black  border border-gray-200 rounded-lg "
                                    wire:model="month">
                                    <option value="-1">Please choose month</option>
                                    <option value="1">January</option>
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
                    <button type="submit" class="border rounded-lg px-4 text-white py-2 bg-blue-500">Generate Water
                        Report</button>
                </div>

            </form>
        </div>

        <div>
            {{-- <form wire:submit.prevent="submit" class="w-full" target="_blank"> --}}
            <form action="/expensereport/{{ $expense_month }}" class="w-full" target="_blank">
                @csrf

                <div
                    class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
                    <div class="mb-6">
                        <div class="flex">

                            <div class="mr-6">
                                <label for="grade_level"
                                    class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">
                                    Expenses Monthly Reports</label>
                                <select id="expense_month" name="expense_month"
                                    class="w-45 bg-white text-black  border border-gray-200 rounded-lg "
                                    wire:model="expense_month">
                                    <option value="-1">Please choose month</option>
                                    <option value="1">January</option>
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
                    <button type="submit" class="border rounded-lg px-4 text-white py-2 bg-pink-500">Generate Expenses
                        Report</button>
                </div>

            </form>
        </div>
    </div>

</x-filament::page>
