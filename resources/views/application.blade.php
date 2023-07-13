@extends('layouts.auth_user')
@section('auth_user')
    <div class=" max-w-[100rem] mx-auto p-6 mt-8 border rounded-xl border-rose-400">
        <h1 class=" text-xl font-extrabold">Application</h1>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="lg:shadow-md overflow-hidden border border-rose-200 dark:border-rose-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-rose-200 dark:divide-rose-700">
                            <thead class="bg-rose-50 dark:bg-rose-800">
                                <tr>
                                    <th scope="col"
                                        class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                        Property
                                    </th>

                                    <th scope="col"
                                        class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                        Unit
                                    </th>

                                    <th scope="col"
                                        class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-rose-500 dark:text-rose-400">
                                        Submit Date
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
                                @foreach ($applications as $index => $application)
                                    <tr>
                                        {{-- @dd($application) --}}
                                        <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-900 dark:text-white">
                                                {{ $application->propertyName }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-900 dark:text-white">
                                                {{ $application->unitName }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-500 dark:text-rose-300">
                                                {{ $application->dateSubmitted }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 whitespace-nowrap">
                                            <div class="text-sm text-rose-500 dark:text-gray-300">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $application->intentStatus }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class=" max-w-[100rem] mx-auto p-6 mt-8 border rounded-xl border-rose-400">
        <h1 class=" text-xl font-extrabold mt-4">New Application</h1>
        <form method="POST" action="{{ route('application.store') }}" class=" text-gray-400 mt-4 ">
            @csrf
            <div class="grid lg:grid-cols-3 grid-cols-1 md:grid-cols-2 gap-4">
                {{-- <div class="grid w-full max-w-sm items-center gap-1.5">
                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                    for="email">
                    Email
                </label>
                <input
                    class="flex h-10 w-full rounded-md border bo4der-red-200 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                    type="email" id="email" placeholder="Email" />
                <p class=" text-sm text-gray-400">Enter your email address.</p>
            </div> --}}
                {{--
                <div class=" m-4">
                    <label for="property_id" class="border-4">Property ID</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="property_id" id="property_id">
                </div> --}}

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="property_id">
                        Property Id
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="property_id" name="property_id" />
                </div>

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="unit_id">
                        Unit Id
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="unit_id" name="unit_id" />
                </div>

                {{-- <div class=" m-4">
                    <label for="unit_id">Unit ID</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="unit_id" id="unit_id">
                </div> --}}

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="contact_numbers">
                        Contact Numbers
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="contact_numbers" name="contact_numbers" />
                </div>

                {{-- <div class=" m-4">
                    <label for="contact_numbers">Contact Numbers</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="contact_numbers" id="contact_numbers">
                </div> --}}
                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="current_address">
                        Current Address
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="current_address" name="current_address" />
                </div>
                {{-- <div class=" m-4">
                    <label for="current_address">Current Address</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="current_address" id="current_address">
                </div> --}}
                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="partner">
                        Spounse/Partner
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="partner" name="partner" />
                </div>
                {{-- <div class=" m-4">
                    <label for="partner">Spouse</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="partner" id="partner">
                </div> --}}
                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="religion">
                        Religion
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="religion" name="religion" />
                </div>

                {{-- <div class=" m-4">
                    <label for="religion">Religion</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="religion" id="religion">
                </div> --}}

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="employer">
                        Employer
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="employer" name="employer" />
                </div>
                {{-- <div class=" m-4">
                    <label for="employer">Employer</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="employer" id="employer">
                </div> --}}

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="employer_address">
                        Employer Address
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="employer_address" name="employer_address" />
                </div>

                {{-- <div class=" m-4">
                    <label for="employer_address">Employer Address</label>
                    <inpu4 class=" rounded-lg border-red-200" type="text" name="employer_address" id="employer_address">
                </div> --}}

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="employer_contact_number">
                        Employer Contact Number
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="employer_contact_number" name="employer_contact_number" />
                </div>

                {{-- <div class=" m-4">
                    <label for="employer_contact_number">Employer Contact Number</label>
                    <input class=" rounded-lg borde4-red-200" type="text" name="employer_contact_number"
                        id="employer_contact_number">
                </div> --}}
                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="emergency_contact">
                        Emergency Contact
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="emergency_contact" name="emergency_contact" />
                </div>
                {{-- <div class=" m-4">
                    <label for="emergency_contact">Emergency Contact</label>
                    <input class=" rounded-lg4border-red-200" type="text" name="emergency_contact"
                        id="emergency_contact">
                </div> --}}

                <div class="grid w-full max-w-sm items-center gap-1.5 mb-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="emergency_contact_number">
                        Emergency Contact Number
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                        type="text" id="emergency_contact_number" name="emergency_contact_number" />
                </div>

                {{-- <div class=" m-4">
                    <label for="emergency_contact_number">Emergency Contact Number</label>
                    <input class=" rounded-lg border4red-200" type="text" name="emergency_contact_number"
                        id="emergency_contact_number">
                </div> --}}

                {{-- <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="submitted">Submitted</option>
                    <option value="under review">Under Review</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
                </div> --}}
            </div>
            <div>
                <div class=" my-4 grid lg:grid-cols-3 grid-cols-1">
                    <div>
                        <label for="other_tenants_name">Other Tenants Name</label>
                        <div id="other_tenants_name_container" class=" p-0">
                            <div>
                                <input
                                    class="flex min-w-[24rem] h-10 rounded-lg border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                                    type="text" name="other_tenants_name[]" id="other_tenants_name_0" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="other_tenants_id">Other Tenants id</label>
                        <div id="other_tenants_id_container" class=" p-0">
                            <div>
                                <input
                                    class="flex min-w-[24rem] h-10 rounded-lg border-red-400 bg-transparent py-2 px-3 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-700 dark:text-gray-50 dark:focus:ring-gray-400 dark:focus:ring-offset-gray-900"
                                    type="text" name="other_tenants_id[]" id="other_tenants_id_0" />
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="addOtherTenant()"
                    class="p-2 mt-2 border rounded-lg border-rose-400 text-rose-400">Add
                    Another
                    Tenant</button>
            </div>
            <button type="submit" class=" bg-rose-400 text-white px-8 py-4 rounded-lg mt-4">Submit</button>
        </form>

    </div>
    <script>
        let otherTenantIndex = 1;

        function addOtherTenant() {
            const container = document.getElementById('other_tenants_name_container');
            const newField = document.createElement('div');
            newField.innerHTML = `
            <input class="mt-4 rounded-lg border-red-400" type="text" name="other_tenants_name[]" id="other_tenants_name_${otherTenantIndex}">
            <button type="button" onclick="removeOtherTenant(${otherTenantIndex})" class=" text-white bg-red-400 px-1 py-2 ml-2 rounded-lg text-sm">Remove Tenant</button>
        `;
            container.appendChild(newField);
            otherTenantIndex++;
            // <button type="button" onclick="removeOtherTenant(${otherTenantIndex})">Remove Tenant</button>
        }

        function removeOtherTenant(index) {
            const container = document.getElementById('other_tenants_name_container');
            const fieldToRemove = document.getElementById(`other_tenants_name_${index}`).parentNode;
            container.removeChild(fieldToRemove);
        }
    </script>
@endsection
