@extends("layouts.app")
@section("content")  
<div class="flex h-screen">
  <div class="hidden lg:flex items-center justify-center flex-1 bg-cover bg-center bg-white text-black" style="background-image: url('https://cdn.elferspot.com/wp-content/uploads/2020/06/f09555ba-bb27-43c7-954d-2ac41daf608f.jpg?class=xl');">
  </div>
  
  <div class="w-full bg-gray-100 lg:w-1/2 flex items-center justify-center">
   
    <div class="max-w-md w-full p-10">
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
      <h1 class="text-7xl font-mono font-semibold mb-12 text-black text-center">AutoCar</h1>
      <h1 class="text-3xl font-semibold mb-6 text-black text-center">Log In</h1>
      <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center">Enter Your credentials to view our blog</h1>
      <form action="{{url('login')}}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
          @error('email') <span class="text-danger text-red-700">{{$message}}</span> @enderror
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
          @error('password') <span class="text-danger text-red-700">{{$message}}</span> @enderror
          <h1 class="text-sm font-semibold mb-6 text-gray-500 text-left"><a href="{{url('/forgot-password')}}">Forgot Password ?</a></h1>
        </div>
        <div>
          <button type="submit" class="w-full bg-black text-white p-2 rounded-md hover:bg-gray-800  focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">Log In</button>
        </div>
        <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center">Don't have an account ?  <a href="{{url('register')}}"><span class="text-black"> Register Here</span></a></h1>
      </form>
    </div>
  </div>
</div>
@endsection
