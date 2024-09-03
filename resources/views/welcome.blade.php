@extends('layouts.app')
@section('content')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-cover bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white" style="background-image: url('https://images.unsplash.com/photo-1490902931801-d6f80ca94fe4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
              @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('main') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Blog</a>
                        <a href="{{url('users/'.auth()->user()->id.'/profile')}}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profile</a>
                        <a href="{{ route('logout') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        <a href="{{ url('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        
                    @endauth
                </div>
            @endif
            
            <div class="absolute flex flex-col justify-start items-center py-8 px-4 mx-auto max-w-screen-xl  lg:py-16 mb-[20%]">
                <h1 class="mb-16 text-7xl font-extrabold tracking-tight leading-none text-red-600 md:text-5xl lg:text-6xl dark:text-white font-serif">AutoCar</h1>
                <p class="mb-8 text-2xl font-mono font-bold text-amber-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Welcome to AutoCar, your go-to destination for everything automotive! From the latest industry news and in-depth reviews to tips on enhancing your driving experience, we bring you the most exciting and informative content. Whether you're a car enthusiast or just looking to stay informed, AutoCar delivers engaging insights and updates straight to your inbox. Buckle up and enjoy the ride with us!</p>
            </div>
        </div>
@endsection
