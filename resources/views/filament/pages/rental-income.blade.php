<x-filament::page>
    <form wire:submit.prevent="submit" class="w-full">
        @csrf
        <div
            class="px-6 block bg-gray-100 border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-6">

            <label for="income_count" class="block mr-4 mt-4 text-lg font-normal  text-gray-900 dark:text-white">Income
                Count</label>
            <input wire:model="income_count"
                class=" w-32 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8"
                type="number" required>

            <div class="mb-4 text-sm text-red-800 rounded-lg dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Danger alert!</span> Please only use for units whose tenants are Current and
                Active.
            </div>

            @if ($income_count > 0)
                @foreach (range(1, $income_count) as $index)
                    <div
                        class="mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 p-4">
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">


                            <div>
                                <label for="incomesArray.{{ $index }}.selectedUnit"
                                    class="block mb-1 text-sm font-normal text-gray-900 dark:text-white">Unit</label>
                                <select wire:model="incomesArray.{{ $index }}.selectedUnit"
                                    class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>

                                    <option value="">Please select unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="incomesArray.{{ $index }}.category"
                                    class="block mb-1 text-sm font-normal text-gray-900 dark:text-white">Category</label>
                                <select required wire:model="incomesArray.{{ $index }}.category"
                                    class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">Please select category</option>
                                    <option value="rent">Rent</option>
                                    <option value="parking">Parking</option>
                                    <option value="meralco">Meralco</option>
                                    <option value="manila water">Manila Water</option>
                                    <option value="advance/deposit">Advance/Deposit</option>
                                    <option value="sales">Sales</option>
                                    <option value="interest">Interest</option>
                                    <option value="labor">Labor</option>
                                    <option value="supplies">Supplies</option>
                                    <option value="repair">Repair</option>
                                    <option value="fine">Fine</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div>
                                <label for="incomesArray.{{ $index }}.payment_mode"
                                    class="block mb-1 text-sm font-normal text-gray-900 dark:text-white">Payment made
                                    to</label>
                                <select required wire:model="incomesArray.{{ $index }}.payment_mode"
                                    class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">Please select payment mode</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="BPI">BPI</option>
                                    <option value="BDO">BDO</option>
                                    <option value="Gcash">Gcash</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <div class="">
                                <label for="incomesArray.{{ $index }}.amount"
                                    class="block  lg:mr-4  mb-1 text-sm font-normal  text-gray-500 dark:text-white">Amount</label>
                                <input class="w-full text-sm font-normal bg-white border border-gray-200 rounded-lg"
                                    wire:model="incomesArray.{{ $index }}.amount" type="number" step=".01"
                                    required>
                            </div>

                            <div class="">
                                <label for="incomesArray.{{ $index }}.pay_date"
                                    class="block  lg:mr-4  mb-1 text-sm font-normal  text-gray-500 dark:text-white">Payment
                                    Date</label>
                                <input required
                                    class="w-full text-sm font-normal bg-white border border-gray-200 rounded-lg"
                                    wire:model="incomesArray.{{ $index }}.pay_date" type="date">
                            </div>

                            <div class="">
                                <label for="block incomesArray.{{ $index }}.notes"
                                    class="block  lg:mr-4 text-sm font-normal  text-gray-500 dark:text-white">Notes</label>
                                <textarea class="block text-sm font-normal w-full bg-white border border-gray-200 rounded-lg"
                                    wire:model="incomesArray.{{ $index }}.notes" type="text" placeholder="" rows="4"></textarea>
                            </div>



                        </div>
                    </div>
                @endforeach
            @endif
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Submit Incomes
            </button>


        </div>
    </form>

</x-filament::page>
