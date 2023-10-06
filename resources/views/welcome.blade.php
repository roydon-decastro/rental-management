<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>ARRC Rentals</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Styles -->

</head>

<body class="antialiased">
    <section class="relative">
        <div class="container mx-auto overflow-hidden">
            <div class="relative z-20 flex items-center justify-between bg-transparent px-4 py-5">
                <div class="w-auto">
                    <div class="flex flex-wrap items-center">
                        <div class="mr-14 w-auto">
                            <a class="text-3xl font-bold leading-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4F46E5"
                                    class="h-8 w-8">
                                    <path fill-rule="evenodd"
                                        d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                        clip-rule="evenodd"></path>
                                    <path
                                        d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="hidden w-auto lg:block">
                            <ul class="mr-16 flex items-center">
                                <li class="mr-9 font-medium"><a href="#">Features</a></li>
                                <li class="mr-9 font-medium"><a href="#">Solutions</a></li>
                                <li class="mr-9 font-medium"><a href="#">Resources</a></li>
                                <li class="font-medium"><a href="#">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-auto">
                    <div class="flex flex-wrap items-center">
                        @if (Route::has('login'))
                            <div class="mr-5 hidden w-auto lg:block">
                                @auth
                                    <div class="inline-block">
                                        <a href="{{ url('/admin') }}">
                                            <button
                                                class="w-full rounded-xl bg-transparent py-3 px-5 font-medium transition duration-200 ease-in-out"
                                                type="button">
                                                Dashboard
                                            </button>
                                        </a>
                                    </div>
                                @else
                                    <div class="flex gap-2">


                                        <div class="hidden w-auto lg:block">
                                            <div class="inline-block">
                                                <a href="{{ url('/login') }}">
                                                    <button
                                                        class="w-full rounded-md bg-indigo-600 py-3 px-5 font-semibold text-white">
                                                        Login
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        @if (Route::has('register'))
                                            <div class="hidden w-auto lg:block">
                                                <div class="inline-block">
                                                    <a href="{{ url('/register') }}">
                                                        <button
                                                            class="w-full rounded-md bg-indigo-600 py-3 px-5 font-semibold text-white">
                                                            Sign Up
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        @endif

                        <div class="w-auto lg:hidden" x-data x-on:click="$dispatch('toggle-modal')">
                            <a href="#">
                                <svg class="navbar-burger text-indigo-600" width="51" height="51"
                                    viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="56" height="56" rx="28" fill="currentColor"></rect>
                                    <path d="M37 32H19M37 24H19" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{ show: false }" x-show="show" x-on:toggle-modal.window="show = ! show"
                class="w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                    @if (Route::has('login'))
                        {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
                        <div class="">
                            <hr>
                            @auth
                                <li>
                                    <a href="{{ url('/dashboard') }}" {{-- class="font-semibold text-pink-600 hover:text-pink-900 dark:text-pink-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
                                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Log
                                        in</a>
                                </li>

                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}"
                                            class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </div>
                    @endif
                </ul>
            </div>
        </div>
        <div class="overflow-hidden pt-16 pb-48">
            <div class="container relative mx-auto px-4">
                <div class="-m-8 flex flex-col lg:flex-row">
                    <div class="w-full p-8 lg:w-6/12">
                        <h1
                            class="lg:text-8xl font-heading mb-9 text-6xl font-bold leading-none md:max-w-2xl md:text-8xl">
                            Making <br />Property Management <br /> A Breeze
                        </h1>
                        <div>
                            <p
                                class="dark:text-gray-300ss mb-9 text-xl font-medium text-gray-900 dark:text-gray-300 md:max-w-sm">
                                Simplify Property Ownership: Experience Stress-Free Real Estate Management.
                                Streamline Your Operations and Maximize Returns with ARRC Rentals.
                            </p>
                            <div class="mb-12 md:inline-block">
                                <a href="{{ url('/register') }}">
                                    <button
                                        class="w-full rounded-xl border border-indigo-700 bg-indigo-600 py-4 px-6 font-semibold text-white transition duration-200 ease-in-out hover:bg-indigo-700 focus:ring focus:ring-indigo-300">
                                        Register Now
                                    </button>
                                </a>
                            </div>
                            <h3 class="mb-3 font-semibold text-gray-900 dark:text-gray-300">
                                Trusted by 1M+ customers
                            </h3>
                            <div class="-m-1 flex flex-wrap items-center">
                                <div class="w-auto p-1">
                                    <div class="-m-0.5 flex flex-wrap">
                                        <div class="w-auto p-0.5">
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.707 1.21267C8.02812 0.224357 9.42632 0.224357 9.74744 1.21267L10.8948 4.74387C11.0384 5.18586 11.4503 5.48511 11.915 5.48511H15.6279C16.6671 5.48511 17.0992 6.81488 16.2585 7.42569L13.2547 9.60809C12.8787 9.88126 12.7214 10.3654 12.865 10.8074L14.0123 14.3386C14.3335 15.327 13.2023 16.1488 12.3616 15.538L9.35775 13.3556C8.98178 13.0824 8.47266 13.0824 8.09669 13.3556L5.09287 15.538C4.25216 16.1488 3.12099 15.327 3.44211 14.3386L4.58947 10.8074C4.73308 10.3654 4.57575 9.88126 4.19978 9.60809L1.19596 7.42569C0.355248 6.81488 0.787317 5.48511 1.82649 5.48511H5.53942C6.00415 5.48511 6.41603 5.18586 6.55964 4.74387L7.707 1.21267Z"
                                                    fill="#6366F1"></path>
                                            </svg>
                                        </div>
                                        <div class="w-auto p-0.5">
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.707 1.21267C8.02812 0.224357 9.42632 0.224357 9.74744 1.21267L10.8948 4.74387C11.0384 5.18586 11.4503 5.48511 11.915 5.48511H15.6279C16.6671 5.48511 17.0992 6.81488 16.2585 7.42569L13.2547 9.60809C12.8787 9.88126 12.7214 10.3654 12.865 10.8074L14.0123 14.3386C14.3335 15.327 13.2023 16.1488 12.3616 15.538L9.35775 13.3556C8.98178 13.0824 8.47266 13.0824 8.09669 13.3556L5.09287 15.538C4.25216 16.1488 3.12099 15.327 3.44211 14.3386L4.58947 10.8074C4.73308 10.3654 4.57575 9.88126 4.19978 9.60809L1.19596 7.42569C0.355248 6.81488 0.787317 5.48511 1.82649 5.48511H5.53942C6.00415 5.48511 6.41603 5.18586 6.55964 4.74387L7.707 1.21267Z"
                                                    fill="#6366F1"></path>
                                            </svg>
                                        </div>
                                        <div class="w-auto p-0.5">
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.707 1.21267C8.02812 0.224357 9.42632 0.224357 9.74744 1.21267L10.8948 4.74387C11.0384 5.18586 11.4503 5.48511 11.915 5.48511H15.6279C16.6671 5.48511 17.0992 6.81488 16.2585 7.42569L13.2547 9.60809C12.8787 9.88126 12.7214 10.3654 12.865 10.8074L14.0123 14.3386C14.3335 15.327 13.2023 16.1488 12.3616 15.538L9.35775 13.3556C8.98178 13.0824 8.47266 13.0824 8.09669 13.3556L5.09287 15.538C4.25216 16.1488 3.12099 15.327 3.44211 14.3386L4.58947 10.8074C4.73308 10.3654 4.57575 9.88126 4.19978 9.60809L1.19596 7.42569C0.355248 6.81488 0.787317 5.48511 1.82649 5.48511H5.53942C6.00415 5.48511 6.41603 5.18586 6.55964 4.74387L7.707 1.21267Z"
                                                    fill="#6366F1"></path>
                                            </svg>
                                        </div>
                                        <div class="w-auto p-0.5">
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.707 1.21267C8.02812 0.224357 9.42632 0.224357 9.74744 1.21267L10.8948 4.74387C11.0384 5.18586 11.4503 5.48511 11.915 5.48511H15.6279C16.6671 5.48511 17.0992 6.81488 16.2585 7.42569L13.2547 9.60809C12.8787 9.88126 12.7214 10.3654 12.865 10.8074L14.0123 14.3386C14.3335 15.327 13.2023 16.1488 12.3616 15.538L9.35775 13.3556C8.98178 13.0824 8.47266 13.0824 8.09669 13.3556L5.09287 15.538C4.25216 16.1488 3.12099 15.327 3.44211 14.3386L4.58947 10.8074C4.73308 10.3654 4.57575 9.88126 4.19978 9.60809L1.19596 7.42569C0.355248 6.81488 0.787317 5.48511 1.82649 5.48511H5.53942C6.00415 5.48511 6.41603 5.18586 6.55964 4.74387L7.707 1.21267Z"
                                                    fill="#6366F1"></path>
                                            </svg>
                                        </div>
                                        <div class="w-auto p-0.5">
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.707 1.21267C8.02812 0.224357 9.42632 0.224357 9.74744 1.21267L10.8948 4.74387C11.0384 5.18586 11.4503 5.48511 11.915 5.48511H15.6279C16.6671 5.48511 17.0992 6.81488 16.2585 7.42569L13.2547 9.60809C12.8787 9.88126 12.7214 10.3654 12.865 10.8074L14.0123 14.3386C14.3335 15.327 13.2023 16.1488 12.3616 15.538L9.35775 13.3556C8.98178 13.0824 8.47266 13.0824 8.09669 13.3556L5.09287 15.538C4.25216 16.1488 3.12099 15.327 3.44211 14.3386L4.58947 10.8074C4.73308 10.3654 4.57575 9.88126 4.19978 9.60809L1.19596 7.42569C0.355248 6.81488 0.787317 5.48511 1.82649 5.48511H5.53942C6.00415 5.48511 6.41603 5.18586 6.55964 4.74387L7.707 1.21267Z"
                                                    fill="#6366F1"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-auto p-1">
                                    <div class="-m-0.5 flex flex-wrap">
                                        <div class="w-auto p-0.5">
                                            <p class="font-bold text-gray-900 dark:text-gray-300">
                                                4.2/5
                                            </p>
                                        </div>
                                        <div class="w-auto p-0.5">
                                            <p class="font-medium text-gray-600 dark:text-gray-400">
                                                (45k Reviews)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                        <div
                            class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;h=528&amp;q=80"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                <div
                                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                </div>
                            </div>
                        </div>
                        <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1485217988980-11786ced9454?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;h=528&amp;q=80"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                <div
                                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                </div>
                            </div>
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;crop=focalpoint&amp;fp-x=.4&amp;w=396&amp;h=528&amp;q=80"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                <div
                                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                </div>
                            </div>
                        </div>
                        <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1670272504528-790c24957dda?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;crop=left&amp;w=400&amp;h=528&amp;q=80"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                <div
                                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                </div>
                            </div>
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1670272505284-8faba1c31f7d?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;h=528&amp;q=80"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                <div
                                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="overflow-hidden bg-gray-100 py-12 pb-24 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-4 justify-items-center gap-8">
                <div class="flex items-center justify-center">
                    <img src="https://assets.website-files.com/61ed56ae9da9fd7e0ef0a967/61f12e022df47d704e9958f3_MintyDefault.svg"
                        alt="Logo" />
                </div>
                <div class="flex items-center justify-center">
                    <img src="https://assets.website-files.com/61ed56ae9da9fd7e0ef0a967/61f12d717a5df974cd42415a_EbooksDefault.svg"
                        alt="Logo" />
                </div>
                <div class="flex items-center justify-center">
                    <img src="https://assets.website-files.com/61ed56ae9da9fd7e0ef0a967/61f12dcfc7ae6798c49b2a55_IcebergDefault.svg"
                        alt="Logo" />
                </div>
                <div class="flex items-center justify-center">
                    <img src="https://assets.website-files.com/61ed56ae9da9fd7e0ef0a967/61f12e78784f087c65fe2757_SnapShotDefault.svg"
                        alt="Logo" />
                </div>
            </div>
            <h2
                class="font-heading tracking-px-n mx-auto mt-12 mb-4 text-center text-4xl font-bold leading-none md:max-w-2xl md:text-4xl xl:text-5xl">
                Loved by the incredible community
            </h2>
            <p
                class="mx-auto text-center text-base font-medium leading-normal text-gray-600 dark:text-gray-400 md:max-w-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                varius enim in eros elementum.
            </p>
        </div>
    </section> --}}
    <section class="overflow-hidden py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 gap-8 xl:grid-cols-2 xl:gap-10">
                <div class="w-full md:w-1/2 xl:w-auto">
                    <a class="block overflow-hidden rounded-3xl" href="#">
                        <img class="w-full" {{-- src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjF8fHBlb3BsZXxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" --}}
                            src="https://images.unsplash.com/photo-1510295892303-a94d83c5a85a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1029&q=80"
                            alt="" />
                    </a>
                </div>
                <div class="w-full">
                    <div class="md:max-w-xl">
                        <div class="mb-11 border-b pb-12 dark:border-gray-700 lg:pb-32">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300 md:max-w-lg">
                                Reduce administrative burdens, automates routine tasks, and ensures transparency,
                                allowing you to focus on growing your real estate portfolio or enjoying personal time,
                                knowing your properties are well-managed.
                            </h3>
                        </div>
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            <div>
                                <div class="md:max-w-xs">
                                    <h3 class="mb-4 text-lg font-semibold text-indigo-600 dark:text-indigo-400">
                                        Unlimited Access
                                    </h3>
                                    <p class="font-medium text-gray-900 dark:text-gray-300">
                                        Whether you own a few properties or manage a diverse portfolio, a rental
                                        property management website scales with your business.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div class="md:max-w-xs">
                                    <h3 class="mb-4 text-lg font-semibold text-indigo-600 dark:text-indigo-400">
                                        No Commitment
                                    </h3>
                                    <p class="font-medium text-gray-900 dark:text-gray-300">
                                        Easily handle financial aspects such as rent collection, expense tracking, and
                                        generating comprehensive financial reports.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- purpose FAQ --}}
    <section class="mx-auto max-w-7xl px-10 py-10 md:px-0">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl lg:text-5xl">
                    Frequently Asked Questions
                </h2>
                <p class="mt-4 max-w-xl text-base leading-relaxed text-gray-600 lg:mx-auto">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere,
                    assumenda
                </p>
            </div>
            <div class="mx-auto mt-8 max-w-3xl space-y-4 md:mt-16">
                <div
                    class="cursor-pointer rounded-md border border-gray-400 shadow-lg transition-all duration-200 dark:border-gray-700">
                    <button type="button" class="flex w-full items-center justify-between px-4 py-5 sm:p-6">
                        <span class="flex text-lg font-semibold text-black dark:text-white">
                            How do I get started?
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            class="h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5">
                            </path>
                        </svg>
                    </button>
                    <div class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p class="text-gray-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat
                            aliquam adipisci iusto aperiam? Sint asperiores sequi nobis
                            inventore ratione deleniti?
                        </p>
                    </div>
                </div>
                <div
                    class="cursor-pointer rounded-md border border-gray-400 transition-all duration-200 dark:border-gray-700">
                    <button type="button" class="flex w-full items-center justify-between px-4 py-5 sm:p-6">
                        <span class="flex text-start text-lg font-semibold text-black dark:text-white">
                            What is the difference between a free and paid account?
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            class="h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                            </path>
                        </svg>
                    </button>
                </div>
                <div
                    class="cursor-pointer rounded-md border border-gray-400 transition-all duration-200 dark:border-gray-700">
                    <button type="button" class="flex w-full items-center justify-between px-4 py-5 sm:p-6">
                        <span class="flex text-start text-lg font-semibold text-black dark:text-white">
                            What is the difference between a free and paid account?
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            class="h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <p class="textbase mt-6 text-center text-gray-600">
                Can't find what you're looking for?
                <a href="#" title="" class="font-medium text-indigo-600 hover:underline">
                    Contact our support
                </a>
            </p>
        </div>
    </section>
    {{-- purpose testimonials --}}
    <section class="mx-auto max-w-7xl px-10 py-10 md:px-0">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl lg:text-5xl mb-5">
                    Testimonials
                </h2>
                <p class="mb-8 w-full font-medium leading-snug text-gray-700 dark:text-gray-300">
                    Hear directly from our satisfied clients about their experience with our exceptional real estate
                    management services. We have dedicated ourselves to providing a comprehensive solution that
                    takes the stress out of property management. Join the ranks of our delighted clients and
                    discover how ARRC Rentals can transform your property ownership experience.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex justify-center">
                    <div class="relative overflow-hidden rounded-3xl">
                        <img class=""
                            src="https://images.unsplash.com/photo-1484863137850-59afcfe05386?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHBlb3BsZXxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60"
                            alt="" />
                        <div
                            class="absolute left-0 top-0 h-full overflow-y-auto bg-white bg-opacity-60 px-4 py-4 backdrop-blur-sm">
                            <svg class="mb-4" width="47" height="36" viewBox="0 0 47 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 36V25.6999C0 22.7377 0.554721 19.6578 1.66416 16.46C2.80722 13.2286 4.35372 10.1823 6.30365 7.32118C8.2872 4.42637 10.5061 1.98598 12.9603 0L21.4324 5.5035C19.4489 8.4993 17.7847 11.6297 16.4399 14.8948C15.1288 18.1262 14.49 21.6943 14.5236 25.5989V36H0ZM25.5676 36V25.6999C25.5676 22.7377 26.1223 19.6578 27.2318 16.46C28.3748 13.2286 29.9213 10.1823 31.8712 7.32118C33.8548 4.42637 36.0737 1.98598 38.5279 0L47 5.5035C45.0165 8.4993 43.3523 11.6297 42.0075 14.8948C40.6964 18.1262 40.0576 21.6943 40.0912 25.5989V36H25.5676Z"
                                    fill="#4F46E5"></path>
                            </svg>
                            <h3 class="text-md mb-4 font-bold leading-snug text-black">
                                "I couldn't be happier with the services provided by ARRC Rentals. As a first-time
                                landlord, I was overwhelmed by the responsibilities that come with managing a rental
                                property. However, ARRC Rentals made the entire process seamless and stress-free.
                                Their user-friendly platform allowed me to easily track rental payments, access
                                financial reports, and communicate with my tenants. The team at ARRC Rentals is highly
                                responsive, addressing any concerns or issues promptly. Their professionalism and
                                attention to detail have exceeded my expectations. Thanks to ARRC Rentals, I am now a
                                confident and successful landlord. I highly recommend their rental management services
                                to anyone looking for a trusted partner in property management."
                            </h3>
                            <div class="mb-1 font-bold text-black">Jenny Uy</div>
                            <div class="font-medium text-gray-600">First Time Landlord</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="relative overflow-hidden rounded-3xl">
                        <img class=""
                            src="https://images.unsplash.com/photo-1484863137850-59afcfe05386?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHBlb3BsZXxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60"
                            alt="" />
                        <div
                            class="absolute left-0 top-0 h-full overflow-y-auto bg-white bg-opacity-60 px-4 py-4 backdrop-blur-sm">
                            <svg class="mb-4" width="47" height="36" viewBox="0 0 47 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 36V25.6999C0 22.7377 0.554721 19.6578 1.66416 16.46C2.80722 13.2286 4.35372 10.1823 6.30365 7.32118C8.2872 4.42637 10.5061 1.98598 12.9603 0L21.4324 5.5035C19.4489 8.4993 17.7847 11.6297 16.4399 14.8948C15.1288 18.1262 14.49 21.6943 14.5236 25.5989V36H0ZM25.5676 36V25.6999C25.5676 22.7377 26.1223 19.6578 27.2318 16.46C28.3748 13.2286 29.9213 10.1823 31.8712 7.32118C33.8548 4.42637 36.0737 1.98598 38.5279 0L47 5.5035C45.0165 8.4993 43.3523 11.6297 42.0075 14.8948C40.6964 18.1262 40.0576 21.6943 40.0912 25.5989V36H25.5676Z"
                                    fill="#4F46E5"></path>
                            </svg>
                            <h3 class="text-md mb-4 font-bold leading-snug text-black">
                                "As a busy real estate investor with multiple rental properties, finding a reliable and
                                efficient rental management service was crucial for my success. I stumbled upon ARRC
                                Rentals
                                and decided to give it a try. And boy, am I glad I did! Their team of experts
                                takes care of every aspect of my rental properties, from marketing and finding qualified
                                tenants to handling repairs and financial reporting. I no longer have to worry about
                                late rent payments, vacancies, or maintenance emergencies. With ARRC Rentals, I have
                                peace of mind knowing that my investments are in capable hands. If you're a property
                                owner looking for exceptional rental management services, look no further."
                            </h3>
                            <div class="mb-1 font-bold text-black">Rex Cascalla</div>
                            <div class="font-medium text-gray-600">Real Estate Investor</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="relative overflow-hidden rounded-3xl">
                        <img class=""
                            src="https://images.unsplash.com/photo-1484863137850-59afcfe05386?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHBlb3BsZXxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60"
                            alt="" />
                        <div
                            class="absolute left-0 top-0 h-full overflow-y-auto bg-white bg-opacity-60 px-4 py-4 backdrop-blur-sm">
                            <svg class="mb-4" width="47" height="36" viewBox="0 0 47 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 36V25.6999C0 22.7377 0.554721 19.6578 1.66416 16.46C2.80722 13.2286 4.35372 10.1823 6.30365 7.32118C8.2872 4.42637 10.5061 1.98598 12.9603 0L21.4324 5.5035C19.4489 8.4993 17.7847 11.6297 16.4399 14.8948C15.1288 18.1262 14.49 21.6943 14.5236 25.5989V36H0ZM25.5676 36V25.6999C25.5676 22.7377 26.1223 19.6578 27.2318 16.46C28.3748 13.2286 29.9213 10.1823 31.8712 7.32118C33.8548 4.42637 36.0737 1.98598 38.5279 0L47 5.5035C45.0165 8.4993 43.3523 11.6297 42.0075 14.8948C40.6964 18.1262 40.0576 21.6943 40.0912 25.5989V36H25.5676Z"
                                    fill="#4F46E5"></path>
                            </svg>
                            <h3 class="text-md mb-4 font-bold leading-snug text-black">
                                "I had been struggling with managing my rental property for years, dealing with tenant
                                issues, maintenance problems, and keeping up with the paperwork. But ever since I
                                discovered ARRC Rentals, my life as a landlord has become so much easier. Their rental
                                management services are top-notch, providing me with a comprehensive solution to all my
                                property management needs. They handle tenant screening, rent collection, maintenance
                                requests, and even legal matters with utmost professionalism. Thanks to ARRC Rentals,
                                I can finally enjoy the benefits of being a landlord without the stress and hassle.
                                Highly recommended!"
                            </h3>
                            <div class="mb-1 font-bold text-black">Shiela Advincula</div>
                            <div class="font-medium text-gray-600">Property Owner</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- purpose pricing --}}
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold leading-tight text-gray-700 dark:text-gray-200 sm:text-4xl lg:text-5xl">
                    Pricing &amp; Plans
                </h2>
                <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-gray-600 dark:text-gray-200">
                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                    sint. Velit officia consequat duis.
                </p>
            </div>
            {{-- <div class="mt-10">
                <div class="flex items-center justify-center space-x-2.5">
                    <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                        Monthly
                    </span>
                    <button type="button"
                        class="relative inline-flex h-6 w-12 flex-shrink-0 cursor-pointer rounded-full border-2 border-indigo-600 bg-transparent py-0.5 transition-colors duration-200 ease-in-out focus:outline-none">
                        <span aria-hidden="true"
                            class="pointer-events-none inline-block h-4 w-4 translate-x-6 rounded-full bg-indigo-600 shadow transition duration-200 ease-in-out"></span>
                    </button>
                    <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                        Yearly
                    </span>
                </div>
            </div> --}}
            <div class="mx-auto mt-14 grid max-w-3xl grid-cols-1 gap-6 sm:grid-cols-2 md:gap-9">
                <div class="overflow-hidden rounded-md border-2 border-indigo-600 bg-transparent">
                    <div class="p-6 md:py-8 md:px-9">
                        <h3 class="text-xl font-semibold text-black dark:text-white">
                            Personal
                        </h3>
                        <p class="mt-2.5 text-sm text-gray-600 dark:text-gray-200">
                            All the basic features to boost your freelance career
                        </p>
                        <div class="mt-5 flex items-end">
                            <div class="flex items-start">
                                <span class="text-xl font-medium text-gray-500 dark:text-gray-200">
                                    $
                                </span>
                                <p class="text-6xl font-medium tracking-tight text-gray-500 dark:text-gray-200">
                                    39
                                </p>
                            </div>
                            <span class="ml-0.5 text-lg text-gray-500 dark:text-gray-200">
                                / month
                            </span>
                        </div>
                        <a href="#" title=""
                            class="mt-6 inline-flex w-full items-center justify-center rounded-full border-2 border-indigo-600 bg-transparent px-4 py-3 font-semibold text-gray-600 transition-all duration-200 hover:bg-indigo-600 hover:text-white dark:text-gray-200"
                            role="">
                            Start 14 Days Free Trial
                        </a>
                        <ul class="mt-8 flex flex-col space-y-4">
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-600 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                                    1 Domain License
                                </span>
                                <svg class="ml-0.5 h-4 w-4 text-gray-600 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-600 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                                    Full Celebration Library
                                </span>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-600 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                                    120+ Coded Blocks
                                </span>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-600 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                                    Design Files Included
                                </span>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-600 dark:text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-600 dark:text-gray-200">
                                    Premium Support
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="overflow-hidden rounded-md border-2 border-transparent bg-indigo-600">
                    <div class="p-6 md:py-8 md:px-9">
                        <h3 class="text-xl font-semibold text-white">Agency</h3>
                        <p class="mt-2.5 text-sm text-gray-200">
                            All the extended features to boost your agency career
                        </p>
                        <div class="mt-5 flex items-end">
                            <div class="flex items-start">
                                <span class="text-xl font-medium text-white">$</span>
                                <p class="text-6xl font-medium tracking-tight text-white">99</p>
                            </div>
                            <span class="ml-0.5 text-lg text-gray-200">/ month</span>
                        </div>
                        <a href="#" title=""
                            class="mt-6 inline-flex w-full items-center justify-center rounded-full border-2 border-transparent bg-white px-4 py-3 font-semibold text-indigo-600 transition-all duration-200"
                            role="">
                            Start 14 Days Free Trial
                        </a>
                        <ul class="mt-8 flex flex-col space-y-4">
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-200">
                                    100 Domain License
                                </span>
                                <svg class="ml-0.5 h-4 w-4 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-200">
                                    Full Celebration Library
                                </span>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-200">
                                    120+ Coded Blocks
                                </span>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-200">
                                    Design Files Included
                                </span>
                            </li>
                            <li class="inline-flex items-center space-x-2">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-medium text-gray-200">
                                    Premium Support
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- purpose get started --}}
    <section class="relative overflow-hidden pt-24 pb-28">
        <div class="container relative z-10 mx-auto px-4">
            <div class="-m-8 flex flex-wrap">
                <div class="w-full p-8 md:w-auto">
                    <a href="#">
                        <img class="mx-auto h-fit w-[300px] transform transition duration-1000 ease-in-out hover:translate-y-4"
                            src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=435&q=80"
                            alt="" />
                    </a>
                </div>
                <div class="w-full p-8 md:flex-1">
                    <div class="mx-auto text-center md:max-w-2xl">
                        <h2
                            class="font-heading tracking-px-n mb-10 text-center text-2xl font-bold leading-tight md:text-3xl">
                            I no longer have to worry about
                            late rent payments, vacancies, or maintenance.
                        </h2>
                        <div class="mb-12 md:inline-block">
                            <button
                                class="shadow-4xl w-full rounded-xl border border-indigo-700 bg-indigo-600 py-4 px-6 font-semibold text-white transition duration-200 ease-in-out hover:bg-indigo-700 focus:ring focus:ring-indigo-300">
                                Get Started
                            </button>
                        </div>
                        <div class="mx-auto md:max-w-sm">
                            <div class="-m-2 flex flex-wrap">
                                <div class="w-auto p-2">
                                    <svg class="mt-1" width="26" height="20" viewBox="0 0 26 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 20V14.2777C0 12.6321 0.306867 10.921 0.920601 9.14446C1.55293 7.34923 2.40844 5.65685 3.48712 4.06732C4.58441 2.45909 5.81187 1.10332 7.16953 0L11.8562 3.0575C10.7589 4.72183 9.83834 6.46096 9.09442 8.2749C8.3691 10.0701 8.01574 12.0524 8.03433 14.2216V20H0ZM14.1438 20V14.2777C14.1438 12.6321 14.4506 10.921 15.0644 9.14446C15.6967 7.34923 16.5522 5.65685 17.6309 4.06732C18.7282 2.45909 19.9557 1.10332 21.3133 0L26 3.0575C24.9027 4.72183 23.9821 6.46096 23.2382 8.2749C22.5129 10.0701 22.1595 12.0524 22.1781 14.2216V20H14.1438Z"
                                            fill="#E0E7FF"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 p-2">
                                    <p class="mb-4 text-left text-lg font-medium leading-normal">
                                        Ease of use and efficiency of design tools. The ability for
                                        the team to see all of a project.
                                    </p>
                                    <h3 class="text-left font-bold">- Jenny Uy</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden w-full self-end p-8 md:w-auto xl:block">
                    <img class="mx-auto h-fit w-[300px] transform transition duration-1000 ease-in-out hover:-translate-y-4"
                        src="https://images.unsplash.com/photo-1516019815075-a3c0c6b3db04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    {{-- purpose footer --}}
    <section class="overflow-hidden pt-24">
        <div class="container mx-auto px-4">
            <div class="border-b pb-20">
                <div class="-m-8 flex flex-wrap">
                    <div class="w-full p-8 sm:w-1/2 lg:w-2/12">
                        <h3 class="mb-6 font-semibold leading-normal text-black dark:text-white">
                            Company
                        </h3>
                        <ul>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    About Us
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Careers
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Press
                                </a>
                            </li>
                            <li>
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full p-8 sm:w-1/2 lg:w-2/12">
                        <h3 class="mb-6 font-semibold leading-normal text-black dark:text-white">
                            Pages
                        </h3>
                        <ul>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Login
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Register
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Add list
                                </a>
                            </li>
                            <li>
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full p-8 sm:w-1/2 lg:w-2/12">
                        <h3 class="mb-6 font-semibold leading-normal text-black dark:text-white">
                            Legal
                        </h3>
                        <ul>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Terms
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    About Us
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Team
                                </a>
                            </li>
                            <li>
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Privacy
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full p-8 sm:w-1/2 lg:w-2/12">
                        <h3 class="mb-6 font-semibold leading-normal text-black dark:text-white">
                            Resources
                        </h3>
                        <ul>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Blog
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Service
                                </a>
                            </li>
                            <li class="mb-3.5">
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Product
                                </a>
                            </li>
                            <li>
                                <a class="font-medium leading-relaxed text-gray-600 dark:text-gray-400"
                                    href="#">
                                    Pricing
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full p-8 sm:w-1/2 lg:w-4/12">
                        <div class="lg:max-w-sm">
                            <h3 class="mb-6 font-semibold leading-normal">Subscribe</h3>
                            <p class="mb-5 font-sans leading-relaxed text-gray-600 dark:text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                            <div
                                class="mb-3 inline-block w-full overflow-hidden rounded-xl border border-gray-300 focus-within:ring focus-within:ring-indigo-300 md:max-w-xl xl:pl-6">
                                <div class="flex flex-wrap items-center">
                                    <div class="w-full xl:flex-1">
                                        <input
                                            class="w-full bg-transparent p-3 font-medium text-gray-500 placeholder-gray-500 outline-none xl:p-0 xl:pr-6"
                                            id="footerInput1-1" type="text" placeholder="Type your e-mail" />
                                    </div>
                                    <div class="w-full xl:w-auto">
                                        <div class="block">
                                            <button
                                                class="w-full border border-indigo-700 bg-indigo-600 py-4 px-8 font-semibold text-white transition duration-200 ease-in-out hover:bg-indigo-700 focus:ring focus:ring-indigo-300">
                                                Subscribe
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-m-4 flex flex-wrap items-center justify-between py-6">
                <div class="w-auto p-4">
                    <a class="text-3xl font-bold leading-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4F46E5" class="h-8 w-8">
                            <path fill-rule="evenodd"
                                d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="w-auto p-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                        Copyright © 2023 ARRC Rentals. All Rights Reserved
                    </p>
                </div>
                <div class="w-auto p-4">
                    <div class="-m-4 flex flex-wrap">
                        <div class="w-auto p-4">
                            <a href="#">
                                <svg width="9" height="16" viewBox="0 0 9 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.68503 5.32446L5.68503 3.82446C5.68503 3.17446 5.84293 2.82446 6.94819 2.82446H8.31661V0.324463L6.21135 0.324463C3.57977 0.324463 2.52714 1.97446 2.52714 3.82446V5.32446H0.421875L0.421875 7.82446H2.52714L2.52714 15.3245H5.68503L5.68503 7.82446H8.00082L8.31661 5.32446H5.68503Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-auto p-4">
                            <a href="#">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.81641 0.324463C5.78109 0.324463 5.52516 0.333838 4.72547 0.369463C3.92578 0.406963 3.38109 0.532588 2.90391 0.718213C2.40337 0.906481 1.94999 1.2018 1.57547 1.58353C1.19398 1.95824 0.898694 2.41156 0.710156 2.91196C0.524531 3.38821 0.397969 3.93384 0.361406 4.73071C0.325781 5.53228 0.316406 5.78728 0.316406 7.8254C0.316406 9.86165 0.325781 10.1167 0.361406 10.9163C0.398906 11.7151 0.524531 12.2598 0.710156 12.737C0.902344 13.2301 1.15828 13.6482 1.57547 14.0654C1.99172 14.4826 2.40984 14.7395 2.90297 14.9307C3.38109 15.1163 3.92484 15.2429 4.72359 15.2795C5.52422 15.3151 5.77922 15.3245 7.81641 15.3245C9.85359 15.3245 10.1077 15.3151 10.9083 15.2795C11.7061 15.242 12.2527 15.1163 12.7298 14.9307C13.2301 14.7424 13.6831 14.447 14.0573 14.0654C14.4745 13.6482 14.7305 13.2301 14.9227 12.737C15.1073 12.2598 15.2339 11.7151 15.2714 10.9163C15.307 10.1167 15.3164 9.86165 15.3164 7.82446C15.3164 5.78728 15.307 5.53228 15.2714 4.73165C15.2339 3.93384 15.1073 3.38821 14.9227 2.91196C14.7341 2.41155 14.4389 1.95822 14.0573 1.58353C13.6829 1.20166 13.2295 0.906318 12.7289 0.718213C12.2508 0.532588 11.7052 0.406025 10.9073 0.369463C10.1067 0.333838 9.85266 0.324463 7.81453 0.324463H7.81734H7.81641ZM7.14422 1.67634H7.81734C9.81984 1.67634 10.057 1.6829 10.8473 1.71946C11.5786 1.75228 11.9761 1.87509 12.2405 1.97728C12.5902 2.11321 12.8405 2.27634 13.103 2.53884C13.3655 2.80134 13.5277 3.05071 13.6636 3.40134C13.7667 3.66478 13.8886 4.06228 13.9214 4.79353C13.958 5.58384 13.9655 5.82103 13.9655 7.82259C13.9655 9.82415 13.958 10.0623 13.9214 10.8526C13.8886 11.5838 13.7658 11.9804 13.6636 12.2448C13.5434 12.5704 13.3514 12.8649 13.102 13.1063C12.8395 13.3688 12.5902 13.531 12.2395 13.667C11.977 13.7701 11.5795 13.892 10.8473 13.9257C10.057 13.9613 9.81984 13.9698 7.81734 13.9698C5.81484 13.9698 5.57672 13.9613 4.78641 13.9257C4.05516 13.892 3.65859 13.7701 3.39422 13.667C3.06844 13.5469 2.77371 13.3553 2.53172 13.1063C2.28211 12.8645 2.0899 12.5698 1.96922 12.2438C1.86703 11.9804 1.74422 11.5829 1.71141 10.8517C1.67578 10.0613 1.66828 9.82415 1.66828 7.82071C1.66828 5.81821 1.67578 5.58196 1.71141 4.79165C1.74516 4.0604 1.86703 3.6629 1.97016 3.39853C2.10609 3.04884 2.26922 2.79853 2.53172 2.53603C2.79422 2.27353 3.04359 2.11134 3.39422 1.9754C3.65859 1.87228 4.05516 1.7504 4.78641 1.71665C5.47828 1.68478 5.74641 1.6754 7.14422 1.67446V1.67634ZM11.8205 2.92134C11.7023 2.92134 11.5852 2.94462 11.4761 2.98985C11.3669 3.03508 11.2676 3.10137 11.1841 3.18494C11.1005 3.26851 11.0342 3.36773 10.989 3.47692C10.9437 3.58612 10.9205 3.70315 10.9205 3.82134C10.9205 3.93953 10.9437 4.05656 10.989 4.16575C11.0342 4.27495 11.1005 4.37416 11.1841 4.45773C11.2676 4.54131 11.3669 4.6076 11.4761 4.65283C11.5852 4.69806 11.7023 4.72134 11.8205 4.72134C12.0592 4.72134 12.2881 4.62652 12.4569 4.45773C12.6256 4.28895 12.7205 4.06003 12.7205 3.82134C12.7205 3.58264 12.6256 3.35372 12.4569 3.18494C12.2881 3.01616 12.0592 2.92134 11.8205 2.92134ZM7.81734 3.97321C7.30647 3.96524 6.79912 4.05898 6.32482 4.24897C5.85053 4.43896 5.41876 4.7214 5.05467 5.07986C4.69058 5.43832 4.40143 5.86562 4.20407 6.33689C4.0067 6.80817 3.90506 7.314 3.90506 7.82493C3.90506 8.33587 4.0067 8.84169 4.20407 9.31297C4.40143 9.78424 4.69058 10.2115 5.05467 10.57C5.41876 10.9285 5.85053 11.2109 6.32482 11.4009C6.79912 11.5909 7.30647 11.6846 7.81734 11.6767C8.82848 11.6609 9.79286 11.2481 10.5023 10.5275C11.2118 9.80689 11.6094 8.83619 11.6094 7.82493C11.6094 6.81368 11.2118 5.84297 10.5023 5.12235C9.79286 4.40173 8.82848 3.98899 7.81734 3.97321ZM7.81734 5.32415C8.48047 5.32415 9.11643 5.58758 9.58533 6.05648C10.0542 6.52537 10.3177 7.16134 10.3177 7.82446C10.3177 8.48759 10.0542 9.12355 9.58533 9.59245C9.11643 10.0613 8.48047 10.3248 7.81734 10.3248C7.15422 10.3248 6.51826 10.0613 6.04936 9.59245C5.58046 9.12355 5.31703 8.48759 5.31703 7.82446C5.31703 7.16134 5.58046 6.52537 6.04936 6.05648C6.51826 5.58758 7.15422 5.32415 7.81734 5.32415Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-auto p-4">
                            <a href="#">
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.67326 14.8544H0.564368L0.564368 5.46737H3.67326L3.67326 14.8544ZM2.11694 4.18691C1.12295 4.18691 0.316406 3.41461 0.316406 2.48264C0.316406 2.0349 0.506105 1.6055 0.84377 1.2889C1.18144 0.972297 1.63941 0.794434 2.11694 0.794434C2.59447 0.794434 3.05244 0.972297 3.39011 1.2889C3.72778 1.6055 3.91747 2.0349 3.91747 2.48264C3.91747 3.41461 3.11093 4.18691 2.11694 4.18691ZM15.3087 14.8544H12.2068V10.2849C12.2068 9.19579 12.1832 7.79933 10.5905 7.79933C8.97418 7.79933 8.72622 8.98237 8.72622 10.2066V14.8544L5.62054 14.8544L5.62054 5.46737H8.60197V6.74784H8.64535C9.0604 6.01019 10.0742 5.23187 11.5866 5.23187C14.733 5.23187 15.3114 7.17466 15.3114 9.69793V14.8544H15.3087Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-auto p-4">
                            <a href="#">
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.0005 2.27494C14.4603 2.50797 13.8724 2.67569 13.2669 2.74101C13.8956 2.36751 14.3664 1.77744 14.591 1.08151C14.001 1.43246 13.3547 1.67855 12.6808 1.80887C12.3991 1.50773 12.0584 1.26784 11.68 1.10413C11.3015 0.940414 10.8934 0.856396 10.4811 0.857307C8.81277 0.857307 7.47106 2.20962 7.47106 3.86911C7.47106 4.10214 7.49931 4.33518 7.54521 4.55938C5.04715 4.42874 2.8192 3.23532 1.33802 1.40812C1.06813 1.86909 0.9267 2.39397 0.928441 2.92814C0.928441 3.97327 1.45983 4.89481 2.27015 5.4368C1.79262 5.41799 1.32626 5.28673 0.909022 5.0537V5.09077C0.909022 6.5543 1.94355 7.76714 3.32234 8.04608C3.06346 8.11332 2.79714 8.14773 2.52967 8.14847C2.33371 8.14847 2.14834 8.12905 1.96121 8.10257C2.34254 9.29599 3.45298 10.1628 4.77528 10.1911C3.74074 11.0014 2.44493 11.478 1.0379 11.478C0.785443 11.478 0.552408 11.4692 0.310547 11.441C1.6452 12.2972 3.22877 12.7915 4.93416 12.7915C10.4705 12.7915 13.4999 8.20497 13.4999 4.22395C13.4999 4.09331 13.4999 3.96267 13.4911 3.83203C14.0772 3.40304 14.591 2.87165 15.0005 2.27494Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
