@extends('layouts.app')
@section('content')
  <div class="relative flex items-center justify-center min-h-screen bg-cover bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white" style="background-image: url('https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('main') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Blog</a>
                        <a href="{{ route('logout') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
                        @endauth
                </div>
            @endif
    <div class="text-center p-4 max-w-4xl bg-opacity-0 bg-gray-800 rounded-lg">
      <h1 class="text-5xl font-bold font-serif text-sky-700 mb-6">AutoCar</h1>
      <p class="text-xl text-white font-bold font-mono drop-shadow-lg">
        Welcome to AutoCar, your ultimate destination for all things automotive. Whether you're a seasoned car enthusiast or just starting your journey into the world of cars, our blog is here to fuel your passion with in-depth articles, expert reviews, and the latest industry news.
      </p> 
       <p class="text-xl text-sky-400 font-bold font-mono drop-shadow-lg">
        At AutoCar, we believe that every car has a story to tell. From the roar of a classic muscle car to the sleek lines of the latest electric vehicles, we're dedicated to exploring the beauty, performance, and innovation that make cars more than just machines. Our team of writers, mechanics, and car lovers is committed to bringing you content that not only informs but also inspires.
      </p>
    </div>
  </div>
@endsection