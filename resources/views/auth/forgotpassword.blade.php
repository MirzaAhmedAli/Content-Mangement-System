@extends("layouts.app")
@section("content")

@if (session('status'))
<div class="px-4 sm:px-6 lg:px-8 mt-6 mr-20">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="alert alert-success">{{session('status')}}</div>  
        </div>
    </div>        
    </div>          
</div>   
@endif

<div class="relative flex justify-center sm:items-center min-h-screen bg-cover bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
  <form class="max-w mx-auto text-3lg" action="{{route('password.reset')}}" method="POST">
    @csrf
    <div class="mb-5 ">
      <h1 class="font-semibold mb-6 text-gray-500 text-center">Forgot your password ? Don't Worry, We'll help you make a new one</h1>
      <label for="email" class="block mb-2  font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@email.com" required />
      @error('email') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <button type="submit" class="text-white bg-emerald-600 hover:bg-emerald-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
</div>
@endsection