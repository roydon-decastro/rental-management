<x-filament::page>
    <div>
        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
        <input type="number" id="year" wire:model="year" min="2023" max="2099" step="1" value="2023"
            class=" w-fit bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
    </div>

    <div class="grid lg:grid-cols-4 lg:gap-4 grid-cols-1 gap-4">

        {{-- fyi waterbill report --}}
        <div>
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
        {{-- fyi expenses report --}}
        <div>
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
                    <button type="submit" class="border rounded-lg px-4 text-white py-2 bg-red-600">Generate Expenses
                        Report</button>
                </div>

            </form>
        </div>
        {{-- fyi incomes report --}}
        <div>
            <form action="/incomereport/{{ $income_month }}" class="w-full" target="_blank">
                @csrf

                <div
                    class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
                    <div class="mb-6">
                        <div class="flex">

                            <div class="mr-6">
                                <label for="grade_level"
                                    class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">
                                    Incomes Monthly Reports</label>
                                <select id="income_month" name="income_month"
                                    class="w-45 bg-white text-black  border border-gray-200 rounded-lg "
                                    wire:model="income_month">
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
                    <button type="submit" class="border rounded-lg px-4 text-white py-2 bg-green-600">Generate Incomes
                        Report</button>
                </div>

            </form>
        </div>
        {{-- fyiexpensesvsincomes --}}
        <div>
            <form action="/summaryreport/{{ $summary_month }}" class="w-full" target="_blank">
                @csrf

                <div
                    class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
                    <div class="mb-6">
                        <div class="flex">

                            <div class="mr-6">
                                <label for="grade_level"
                                    class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">
                                    Monthly Summary Reports</label>
                                <select id="summary_month" name="summary_month"
                                    class="w-45 bg-white text-black  border border-gray-200 rounded-lg "
                                    wire:model="summary_month">
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
                    <button type="submit" class="border rounded-lg px-4 text-white py-2 bg-purple-600">Generate
                        Summary
                        Report</button>
                </div>

            </form>
        </div>
    </div>

</x-filament::page>
