@extends('layouts.auth_user')
@section('auth_user')
    {{-- purpose  cards --}}
    <div class=" max-w-[100rem] mx-auto p-6 mt-8 border rounded-xl border-rose-100">
        <h2 class="font-semibold text-2xl text-rose-800 leading-tight mb-8">
            Dashboard
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="px-4 border shadow-md border-rose-200 rounded-2xl p-4">
                <div class="flex gap-2 ">
                    <h3 class=" text-lg mb-2 text-rose-600">
                        Total Rent Due
                    </h3>
                </div>
                <h1 class=" text-4xl text-red-800">
                    &#8369; 12,000
                </h1>
                <h5 class=" text-gray-500">Due in 5 days</h5>
            </div>
            <div class="px-4 border shadow-md border-rose-200 rounded-2xl p-4">
                <div class="flex gap-2 ">


                    <h3 class=" text-lg mb-2 text-rose-600">
                        Total Water Bill
                    </h3>
                </div>
                <h1 class=" text-4xl text-red-800">
                    &#8369; 653.12
                </h1>
                <h5 class=" text-gray-500">Due in 5 days</h5>
            </div>

            <div class="px-4 border shadow-md border-rose-200 rounded-2xl p-4">
                <div class="flex gap-2 ">


                    <h3 class=" text-lg mb-2 text-rose-600">
                        Total Parking
                    </h3>
                </div>
                <h1 class=" text-4xl text-red-800">
                    &#8369; 750
                </h1>
                <h5 class=" text-gray-500">Due in 5 days</h5>
            </div>

            <div class="px-4 border shadow-md border-rose-200 rounded-2xl p-4">
                <div class="flex gap-2 ">


                    <h3 class=" text-lg mb-2 text-rose-600">
                        Total Concerns
                    </h3>
                </div>
                <h1 class=" text-4xl text-red-800">0</h1>
                <h5 class=" text-gray-500">All Good</h5>
            </div>
        </div>
    </div>
    {{-- purpose tables --}}
    <div class="grid lg:grid-cols-2 gap-8 max-w-[100rem] mx-auto ">
        <div class="px-6 mt-8 border rounded-xl border-rose-100">
            <section class="container mx-auto py-4 ">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex gap-2 ">


                            <h2 class="font-semibold text-2xl text-rose-800 leading-tight">
                                Rent
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div
                                class="lg:shadow-md overflow-hidden border border-rose-200 dark:border-rose-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-rose-200 dark:divide-rose-700">
                                    <thead class="bg-rose-50 dark:bg-rose-800">
                                        <tr>
                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Property
                                            </th>

                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Rent Date
                                            </th>

                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Amount
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Status
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">
                                                    Edit
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-rose-200 dark:divide-rose-700 dark:bg-rose-900">

                                        <tr>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-900 dark:text-white">
                                                    ARRC Residences
                                                </div>
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-500 dark:text-rose-300">
                                                    April 3, 2023
                                                </div>
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-900 dark:text-white">
                                                    15,000
                                                </div>
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-500 dark:text-gray-300">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Paid
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="px-6 mt-8 border rounded-xl border-rose-100">
            <section class="container mx-auto py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex gap-2 ">

                            <h2 class="font-semibold text-2xl text-rose-800 leading-tight">
                                Water Bills
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div
                                class="lg:shadow-md overflow-hidden border border-rose-200 dark:border-rose-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-rose-200 dark:divide-rose-700">
                                    <thead class="bg-rose-50 dark:bg-rose-800">
                                        <tr>
                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Property
                                            </th>

                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Bill Date
                                            </th>

                                            {{-- <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                            Current
                                        </th>

                                        <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                            Previous
                                        </th>

                                        <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                            Consumption
                                        </th> --}}

                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Amount
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                                Status
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">
                                                    Edit
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-rose-200 dark:divide-rose-700 dark:bg-rose-900">
                                        <tr key={bill.name}>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-900 dark:text-white">
                                                    ARRC Residences
                                                </div>
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-500 dark:text-rose-300">
                                                    April 3, 2023
                                                </div>
                                            </td>
                                            {{-- <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-900 dark:text-white">
                                                27
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-900 dark:text-white">
                                                20
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-500 dark:text-rose-300">
                                                7
                                            </div>
                                        </td> --}}
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-900 dark:text-white">
                                                    199
                                                </div>
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap">
                                                <div class="text-sm text-rose-500 dark:text-rose-300">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Not Paid
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
