<x-filament::page>
    <form wire:submit.prevent="submit" class="w-full">
        @csrf
        <div class=" px-6 py-4 block bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-6">

            <label for="expenses_count" class="block mr-4 mt-4 mb-1 text-lg font-normal  text-gray-900 dark:text-white">Expense Count</label>
            <input wire:model="expenses_count" class=" w-32 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8" type="number" required >

             @if($expenses_count > 0)
                @foreach(range(1, $expenses_count) as $index)
                    <div class="mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 p-4">
                        <div class="flex">
                            <div class="mr-4">
                                <label for="expensesArray.{{ $index }}.name" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">Item Name</label>
                                <input class=" text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.name" type="text" required>
                            </div>

                            <div class="mr-4">
                                <label for="expensesArray.{{ $index }}.amount" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">Amount</label>
                                <input class=" text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.amount" type="number" step=".01" required >
                            </div>

                            <div class="mr-4">
                                <label for="expensesArray.{{ $index }}.payment_date" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">Payment Date</label>
                                <input class=" text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.payment_date" type="date" >
                            </div>
                            <div class="mr-4">
                                <label for="expensesArray.{{ $index }}.expense_category_id" class="block  mr-4 mt-4 mb-1  text-sm font-normal  text-gray-900 dark:text-white"> <a  href="">Expense Category</a></label>
                                <select class=" text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.expense_category_id" required>
                                    <option class=" text-sm font-normal"  value="">Select a category</option>
                                    @foreach ($expense_categories as $category)
                                        <option class=" text-sm font-normal" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mr-4">
                                <label for="expensesArray.{{ $index }}.payment_mode" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">Payment Mode</label>
                                <select class="  text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.payment_mode" required>
                                    <option class=" text-sm font-normal" value="">Select Payment Mode</option>
                                    <option class=" text-sm font-normal"value="cash" selected>cash</option>
                                    <option class=" text-sm font-normal"value="cheque">cheque</option>
                                    <option class=" text-sm font-normal"value="digital">digital</option>
                                </select>
                            </div>


                        </div>
                        <div class="flex mb-4">

                            <div class="mr-4 ">
                                <label for="expensesArray.{{ $index }}.vendor" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">Vendor</label>
                                <input class=" text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.vendor" type="text" >
                            </div>
                            <div class="mr-4">
                                <label for="expensesArray.{{ $index }}.or_num" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">OR Number</label>
                                <input class=" text-sm font-normal bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.or_num" type="text" >
                            </div>
                            <div class="mr-4 w-full">
                                <label for="block expensesArray.{{ $index }}.notes" class="block  mr-4 mt-4 mb-1 text-sm font-normal  text-gray-900 dark:text-white">Notes</label>
                                <textarea class="block text-sm font-normal w-full bg-white border border-gray-200 rounded-lg" wire:model="expensesArray.{{ $index }}.notes" type="text" placeholder="checque num, gcash account, etc..." rows="4" ></textarea>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Submit Expenses
            </button>
        </div>
    </form>
</x-filament::page>
