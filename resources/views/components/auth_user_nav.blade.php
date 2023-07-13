        <div class=" lg:w-full border-b-rose-400 border">


            <div class=" max-w-[100rem] mx-auto sm:px-6">
                <nav class="relative px-8 py-4 flex justify-between items-center ">
                    <a class="text-3xl font-bold leading-none flex items-center space-x-4" href="#">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4F46E5" class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                        </span>
                        <span class="text-gray-600 dark:text-gray-300 text-xl">DevUI</span>
                    </a>
                    <div class="lg:hidden">
                        <button class="navbar-burger flex items-center text-gray-600 dark:text-gray-300 p-3">
                            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Mobile menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                            </svg>
                        </button>
                    </div>
                    <ul class="hidden lg:flex lg:items-center grow mx-10 space-x-6">
                        <li>
                            <a class="text-sm text-gray-500 hover:text-gray-600 dark:text-gray-300"
                                href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="text-sm text-gray-500 " href="#">Properties</a>
                        </li>
                        <li>
                            <a class="text-sm text-gray-500 hover:text-gray-600 dark:text-gray-300"
                                href="{{ route('application.add') }}">
                                Application
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    </ul>
                    <div class="hidden lg:block">
                        <div class="flex items-center space-x-2">
                            <img class="inline-block w-12 h-12 rounded-full"
                                src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60"
                                alt="{{ Auth::user()->name }}" />
                            <span class="flex flex-col">
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400 cursor-pointer">
                                    View Profile
                                </span>
                            </span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
