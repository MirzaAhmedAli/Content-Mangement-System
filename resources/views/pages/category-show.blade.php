@extends('layouts.app')
@section('content')

<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('https://www.teahub.io/photos/full/241-2415695_simple-minimalist-geometric-background.jpg');">
  <nav class=" border-gray-200 shadow-lg">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <div class="flex items-center space-x-3 rtl:space-x-reverse">
        <a href="{{route('main')}}">
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-700">AutoCar</span>
        </a>      
      </div>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="{{asset(auth()->user()->image)}}" alt="user photo">
        </button>
        <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 bg-white rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{auth()->user()->name}}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{url('users/'.auth()->user()->id.'/profile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </li>
          </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{url('/')}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-yellow-500 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="{{route('about')}}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="{{route('categories.index')}}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Categories</a>
        </li>
        <li>
          <a href="{{url('users/'.auth()->user()->id.'/profile')}}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
        </li>
        @if (auth()->user()->isAdmin == 1)
        <li>
          <a href="{{route('users.index')}}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Users</a>
        </li>
        @endif
      </ul>
    </div>
    </div>
  </nav>

  <div class="mb-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-center">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" role="tablist">
        @foreach ($subcategories as $subcategory)
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg text-white hover:text-slate-400 hover:border-purple-600 dark:text-gray-400 dark:hover:text-purple-500 dark:hover:border-purple-500"id="tab-{{$subcategory->id}}" data-tabs-target="#styled-{{$subcategory->id}}" type="button" role="tab" aria-controls="profile" aria-selected="false" onclick="activateTab(event)">
                    {{$subcategory->name}}
                </button>
            </li>
        @endforeach
    </ul>
</div>
<span class="text-5xl text-center font-semibold whitespace-nowrap text-red-500 ml-6">{{$category->name}}</span>      
<div id="default-styled-tab-content">
  @foreach ($subcategories as $subcategory)
      <div class="hidden p-4 rounded-lg" id="styled-{{$subcategory->id}}" role="tabpanel" aria-labelledby="tab-{{$subcategory->id}}">
          <div class="container flex justify-between mx-auto">
              <div class="w-full lg:w-8/12">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                      @foreach ($subcategory->posts as $post)
                          <div class="rounded-lg overflow-hidden shadow-md">
                              <img class="w-full h-56 object-cover" src="{{asset($post->image)}}" alt="Post Image">
                              <div class="p-6 text-white">
                                  <div class="flex items-center justify-between">
                                      <span class="font-medium text-black">{{$post->created_at->format('j M Y')}}</span>
                                      @if ($post->user->is(auth()->user()) || auth()->user()->isAdmin == 1)
                                          <button id="dropdownMenuIconButton{{$loop->index}}" data-dropdown-toggle="dropdownDots{{$loop->index}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                  <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                              </svg>
                                          </button>
                                          <div id="dropdownDots{{$loop->index}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                              <ul class="py-2 text-sm dark:text-gray-200" aria-labelledby="dropdownMenuIconButton{{$loop->index}}">
                                                  <li><a href="{{url('posts/'.$post->id.'/edit')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a></li>
                                                  <li><a href="{{url('posts/'.$post->id.'/delete')}}" class="block px-4 py-2 text-gray-700 hover:bg-red-500 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a></li>
                                              </ul>
                                          </div>
                                      @endif
                                  </div>
                                  <div class="mt-2">
                                      <a href="#" class="text-2xl font-bold text-white hover:underline">{{$post->title}}</a>
                                      <p class="mt-2 text-white">{{$post->description}}</p>
                                  </div>
                                  <div class="flex items-center justify-between mt-4">
                                      <a href="{{url('categories/'.$post->category->id.'/show')}}" class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{$post->category->name}}</a>
                                      @foreach ($post->tags as $tag)
                                          <span class="text-indigo-600 font-semibold">#{{$tag->name}}</span>
                                      @endforeach
                                      <div>
                                        <a href="{{route('users.profile', ['userId' => $post->user->id])}}" class="flex items-center">
                                            <img src="{{asset($post->user->image)}}" class="object-cover w-10 h-10 mx-4 rounded-full">
                                            <h1 class="font-bold text-indigo-500 hover:underline">{{$post->user->name}}</h1>
                                            @if ($post->user->isAdmin == 1)
                                            <svg data-popover-target="popover-default" class="w-6 h-6 text-blue-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                              <path d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z"/>
                                            </svg>
                                            <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-16 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                              <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                                  <h3 class="font-semibold text-gray-900 dark:text-white">Admin</h3>
                                              </div>
                                              <div data-popper-arrow></div>
                                          </div>                                      
                                            @endif
                                        </a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  @endforeach
</div>
</div>

<script>
  function activateTab(event, contentId) {
      const tabs = document.querySelectorAll('[role="tab"]');
      const tabContents = document.querySelectorAll('[role="tabpanel"]');

      tabs.forEach(tab => {
          tab.classList.remove('text-purple-600', 'border-purple-600', 'dark:text-purple-500', 'dark:border-purple-500');
          tab.setAttribute('aria-selected', 'false');
      });
      tabContents.forEach(content => {
          content.classList.add('hidden');
      });

      event.currentTarget.classList.add('text-purple-600', 'border-purple-600', 'dark:text-purple-500', 'dark:border-purple-500');
      event.currentTarget.setAttribute('aria-selected', 'true');

      document.getElementById(contentId).classList.remove('hidden');
  }
</script>
@endsection