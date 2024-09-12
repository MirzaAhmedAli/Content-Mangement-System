@extends("layouts.app")
@section("content")

<div class="relative flex justify-center sm:items-center min-h-screen bg-cover bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
  <form class="max-w mx-auto text-3lg" method="POST" action="{{route('reset.password.post')}}">
    @csrf
    @method('PUT')
    <h1 class="font-semibold mb-6 text-gray-500 text-center">Enter your email and your New Password</h1>
    <div class="mb-5 ">
      <label for="email" class="block mb-2  font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@email.com" required />
      @error('email') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="mb-5 ">
      <label for="email" class="block mb-2  font-medium text-gray-900 dark:text-white">New Password</label>
      <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      @error('password') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="mb-5 ">
      <label for="email" class="block mb-2  font-medium text-gray-900 dark:text-white">Confirm Password</label>
      <input type="password" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      @error('password') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="mb-5 invisible">
      <input type="text" hidden name="token" value="{{$token}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <button type="submit" class="text-white bg-emerald-600 hover:bg-emerald-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
</div>
@endsection