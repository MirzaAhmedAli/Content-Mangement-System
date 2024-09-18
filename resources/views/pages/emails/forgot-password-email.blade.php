@extends('layouts.app')
@section('content')
<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
  <header>
    <a href="#">
        <img class="w-auto mx-auto h-7 sm:h-8" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpdwzl5xFixobB8a2WDwBgKzjNUeFfyiWkVw&s" alt="">
    </a>
  </header>
  <main class="mt-8">
    <h1 class="mt-6 text-gray-700 dark:text-gray-200">This is an Official Email for resetting your password. Please Refresh your login page after making a new password</h1>

    <a href="{{url('/reset-password', $token)}}">
      <button type="submit" class="mt-6 w-full bg-black text-white p-2 rounded-md hover:bg-gray-800  focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">
        Reset Password
      </button>
    </a>
  </main>
  <footer class="mt-8 text-center">

    <p class="mt-3 text-gray-500 dark:text-gray-400">© 2023 AutoCar. All Rights Reserved.</p>
  </footer>
</section>
@endsection