
<nav x-data="{ open: false }" class=" border-b border-gray-100 z-20 bg_pink_opa p-4 fixed w-full h-28">
    <!-- Primary Navigation Menu -->
    <div class="z-20">
        <div class="flex w-full">
            <div class="flex justify-around w-full z-20 h-nav">
                <!-- Logo -->
                <div class="shrink-0 flex items-center px-4 hover">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current px-4" />
                    </a>
                </div>

                <!-- Navigation Links -->
              
                    
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')" class="kalam text-2xl flex items-center hover">
                        {{ __('Boutique') }}
                    </x-nav-link>
                </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 z-20">
                <x-dropdown class="text-right w-48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150 z-20 hover">
                            @auth
                            <div class="kalam text-2xl z-20">{{ Auth::user()->name }}</div>
                                
                            @endauth
                            @guest
                             <i class="fa fa-user-circle fa-2x "></i>
   
                            @endguest
                            
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        
                        @auth
                        <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav text_black open">
                            {{ __('Profil') }}
                        </x-dropdown-link>   
                        @if (Auth::user()->is_admin)
                        
                        <x-dropdown-link :href="route('articles.create')" :active="request()->routeIs('articles.create')" class="nav text_black open">
                        {{ __('Ajouter un article') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('images.index')" :active="request()->routeIs('images.index')" class="nav text_black open">
                            {{ __('Ajouter une image') }}
                            </x-dropdown-link>
                        @endif      
                                                
                        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                            
                            <x-dropdown-link :href="route('logout')" class="nav text_black open"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                            @endauth
                            @guest
                            <x-dropdown-link :href="route('login')" class="nav text_black open" >
                                {{ __('Se connecter') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('register')" class="nav text_black open">
                                {{ __('S\'inscrire') }}
                            </x-dropdown-link>                        
                            @endguest
                        </form>
                    </x-slot>
                </x-dropdown>
                <x-nav-link :href="route('carts.index')" :active="request()->routeIs('carts.index')" class="hover" >
                    <svg class="h-6 w-6 flex-shrink-0 text_black group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                      </svg>
                </x-nav-link>
                
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden z-10">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden z-10 relative">
    
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t bg-white z-10">
            @auth
                <div class="px-4">
                <div class="font-medium text-base text_black open">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text_black open">{{ Auth::user()->email }}</div>
            </div> 
            @endauth
           
            <div class="mt-3 space-y-1 z-10">
            
                <x-responsive-nav-link :href="route('articles.index')" class="text_black open">
                    {{ __('Boutique') }}
                </x-responsive-nav-link>
                @guest
                <x-responsive-nav-link :href="route('login')" class="text_black open">
                        {{ __('Se connecter') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="text_black open">
                    {{ __('S\'inscrire') }}
                </x-responsive-nav-link>   
                @endguest
                @auth
                <x-responsive-nav-link :href="route('dashboard')" class="text_black open">
                    {{ __('Profil') }}
                </x-responsive-nav-link>
                @if (Auth::user()->is_admin)
                <x-responsive-nav-link :href="route('articles.create')" class="text_black open">
                    {{ __('Ajouter un article') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('images.index')" class="text_black open">
                    {{ __('Ajouter une image') }}
                </x-responsive-nav-link>
                @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text_black open">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth
            
            
                


            
        </div>
    </div>
</nav>
