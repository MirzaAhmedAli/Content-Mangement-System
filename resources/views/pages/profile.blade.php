@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page"> 
<section class="relative block h-500-px">
  <div class="absolute top-0 w-full h-full bg-center bg-cover shadow-xl" style="
          background-image: url('https://images.unsplash.com/photo-1444090542259-0af8fa96557e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
  </div>
  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
    <a href="{{ url('main') }}" class="font-semibold text-white hover:text-teal-500 dark:text-gray-400 dark:hover:text-white focus:rounded-sm">Return</a>    
  </div>
  <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
      <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
</section>
<section class="relative py-16 bg-blueGray-200">
  <div class="container mx-auto px-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
      <div class="px-6">
        <div class="flex flex-wrap justify-center">
          <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
            <div class="relative">
              <img alt="..." src="{{asset(auth()->user()->image)}}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
            <div class="py-6 px-3 mt-32 sm:mt-0">
              <a href="{{url('users/'.$user->id.'/edit')}}" >
              <button class="bg-pink-500 active:bg-pink-600 hover:bg-pink-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                Edit
              </button>
              </a>
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4 lg:order-1">
            <div class="flex justify-center py-4 lg:pt-4 pt-8">
              <div class="mr-4 p-3 text-center">
                <span class="text-lg font-bold block tracking-wide text-blueGray-600">{{ auth()->user()->created_at->format('j M Y') }}</span><span class="text-sm text-blueGray-400">Joined</span>
              </div>
              <div class="mr-4 p-3 text-center">
                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$user->posts_count}}</span><span class="text-sm text-blueGray-400">Posts</span>
              </div>
              <div class="lg:mr-4 p-3 text-center">
                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-12">
          <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
            {{auth()->user()->name}}
          </h3>
          <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
            <i class="fas fa-envelope mr-2 text-lg text-blueGray-400"></i>
            {{auth()->user()->email}}
          </div>
          <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
            {{$user->city}}, {{$user->country}}
          </div>
          <div class="mb-2  mt-10 text-sm leading-normal text-blueGray-400 font-bold uppercase">
            <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{$user->work}}
          </div>
        </div>
        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-9/12 px-4">
              <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                {{$user->bio}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
@endsection