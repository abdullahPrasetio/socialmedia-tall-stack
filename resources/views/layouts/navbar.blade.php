<div class="bg-white border-b border-gray-300" x-data={open:false}>
        <div class="md:flex md:items-center">
            <div class="flex justify-between px-4 py-4 bg-white md:bg-transparent md:border-b-0 items-center">
                <div>
                    <a href="/" class="text-gray-800 font-semibold text-lg">
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="block md:hidden">
                    <button @click="open=!open" class="text-gray-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
    
                </div>
            </div>
            <div x-bind:class="{'hidden' : !open}" class="leading-loose py-1 md:py-0 md:flex justify-between w-full">
                <div class="md:flex items-center md:py-0 py-2">
                    @auth
                        <a href="/timeline" class="block text-gray-600 hover:text-gray-800 px-4 md:py-4">Timeline</a>
                    @endauth
                    {{-- <a href="#" class="block text-gray-600 hover:text-gray-800 px-4 md:py-4">Explore</a> --}}
                </div>
                <div class="md:flex md:items-center">
                    @auth
                        <div class="border-t border-gray-200 py-4 md:py-0 md:border-t-0" x-data="{dropdownIsOpen: false}">
                            <div class="">
                                <button @click="dropdownIsOpen=!dropdownIsOpen" class="flex items-center focus:outline-none px-4 md:px-6">
                                    <div class="flex-shrink-0 mr-2">
                                        <img class="w-8 h-8 object-center object-cover rounded-full" src="{{auth()->user()->gravatar()}}" alt="">
                                    </div>
                                    <div class="block text-gray-600 hover:text-gray-800 pr-4 md:py-4">
                                        {{ auth()->user()->name}}
                                    </div>
                                </button>
                            </div>
                            <div x-bind:class="{'md:hidden' : !dropdownIsOpen}" class="block md:absolute top-0 right-0 md:mr-4 mt-2 md:mt-14 md:bg-gray-50 md:w-56 md:rounded md:border border-gray-200 md:py-2 leading-relaxed md:leading-loose">
                                <a href="{{route('settings')}}" class="block text-gray-600 hover:text-gray-800 px-4">Settings</a>
                                <a href="{{route('account.show',auth()->user()->usernameOrHash)}}" class="block text-gray-600 hover:text-gray-800 px-4">Your Profile</a>
                                <a href="#" class="block text-gray-600 hover:text-gray-800 px-4">Your Friend</a>
                                <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block text-gray-600 hover:text-gray-800 px-4"
                                >
                                    Log out
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="block text-gray-600 hover:text-gray-800 px-4 md:py-4">Log in</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block text-gray-600 hover:text-gray-800 px-4 md:py-4">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>