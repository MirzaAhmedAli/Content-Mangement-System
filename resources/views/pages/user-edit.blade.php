@extends("layouts.app")
@section("content")

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  
<div class="h-screen md:flex">
<div
  class="relative overflow-hidden md:flex w-1/2 bg-cover bg-center i justify-around items-center hidden" style="background-image: url('https://cdna.artstation.com/p/assets/images/images/047/326/558/large/ismail-inceoglu-mini-family.jpg?1647336008');">
</div>

<div class="flex md:w-1/2 justify-center py-10 items-center bg-white mb-20">
  <form class="bg-white" action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1 class="text-gray-800 font-sans text-7xl mb-7 text-center">Update Info</h1>
      
      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
        </svg>
        <input class="pl-2 outline-none border-none text-lg" type="text" name="name" value="{{$user->name}}" placeholder="Username" />
        @error('name') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <i class="fas fa-envelope mr-2 text-lg text-blueGray-400"></i>
          <input class="pl-2 outline-none border-none text-lg" type="text" name="email" readonly value="{{$user->email}}" placeholder="Email Address" />
    </div>
    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
      <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
            <input class="pl-2 outline-none border-none text-lg" type="text" name="city"  value="{{$user->city}}" placeholder="City" />
            @error('city') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
      <i class="fa fa-flag text-blueGray-400" aria-hidden="true"></i>
      <input class="pl-2 outline-none border-none text-lg" type="text" name="country"  value="{{$user->country}}" placeholder="Country" />
      @error('country') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
      <i class="fa fa-briefcase text-blueGray-400" aria-hidden="true"></i>
      <input class="pl-2 outline-none border-none text-lg" type="text" name="work"  value="{{$user->work}}" placeholder="Work" />
      @error('work') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
      <i class="fa fa-camera text-blueGray-400 mr-5" aria-hidden="true"></i>
      <input class="pl-2 outline-none border-none text-lg" type="file" name="image"  value="{{$user->image}}" placeholder="Profile Picture" />
      @error('image') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
      <i class="fa fa-info text-blueGray-400" aria-hidden="true"></i>
      <textarea class="pl-2 outline-none border-none text-lg" type="text" name="bio"  value="{{$user->bio}}" placeholder="Bio"></textarea>
      @error('bio') <span class="text-danger text-red-700">{{$message}}</span> @enderror
    </div>
      @if ($user->isAdmin == 0)
      <button type="submit" class="block w-full bg-orange-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Update</button>
      <a href="{{url('users/'.auth()->user()->id.'/profile')}}">
      <button type="button" class="block w-full bg-orange-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Return</button>
      </a>
      @else
        <button type="submit" class="block w-full bg-orange-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Update</button>
        <a href="{{route('users.index')}}">
        <button type="button" class="block w-full bg-orange-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Return</button>
        </a>
      @endif
      </form>
</div>
</div>
@endsection