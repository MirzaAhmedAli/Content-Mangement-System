<!-- component -->
@extends('layouts.app')
@section('content')
<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
  <header>
      <a href="#">
          <img class="w-auto mx-auto h-7 sm:h-8" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpdwzl5xFixobB8a2WDwBgKzjNUeFfyiWkVw&s" alt="">
      </a>
  </header>

  <main class="mt-8">
      <h2 class="mt-6 text-gray-700 dark:text-gray-200">Hi {{$name}},</h2>

      <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
          Welcome to AutoCar! You’re already on your way to creating awesome revs on our website.
      </p>

      
      <p class="mt-2 text-gray-600 dark:text-gray-300">
          Thanks, <br>
          AutoCar team
      </p>
  </main>
  

  <footer class="mt-8 text-center">

      <p class="mt-3 text-gray-500 dark:text-gray-400">© 2023 AutoCar. All Rights Reserved.</p>
  </footer>
</section>
@endsection