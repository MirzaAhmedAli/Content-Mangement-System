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

  <div class="container flex items-center justify-center mx-auto mt-32">
    <div class="w-full lg:w-8/12">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
  <div class="editor max-w-4xl px-6 py-2 mx-auto w-11/12 flex flex-col text-gray-800 border border-gray-300 rounded-lg p-4 shadow-lg justify-start text-left">
      <div class="heading text-left font-bold text-3xl m-5 text-yellow-600 font-serif">New Post</div>
      @csrf
      <input class="title bg-gray-100 border border-gray-300 rounded-lg p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" name="title">
      @error('title') <span class="text-danger text-red-700 font-bold">{{ $message }}</span> @enderror
      
      <textarea class="description bg-gray-100 sec p-3 h-60 border rounded-lg border-gray-300 outline-none" spellcheck="false" placeholder="Rev your thoughts here..." name="description"></textarea>
      @error('description') <span class="text-danger text-red-700 font-bold">{{ $message }}</span> @enderror
      
      <div class="icons flex text-gray-500 m-2">
          <input type="file" name="image">
          <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700" type="button">Select Category
              <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
          </button>
          <div id="multi-dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 text-left" aria-labelledby="multiLevelDropdownButton">
                  @foreach ($categories as $category)
                      <li>
                          <label class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                              <input type="radio" name="category_id" value="{{ $category->id }}" class="mr-2" onclick="showSubcategories({{ $category->id }})">
                              {{ $category->name }}
                              <svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                              </svg>
                          </label>
                          
                          <div id="doubleDropdown-{{ $category->id }}" class="subcategory-dropdown z-10 hidden bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                              <ul class="py-2 text-sm text-white dark:text-gray-200 text-left">
                                  @foreach ($category->subcategories as $subcategory)
                                      <li>
                                          <label class="flex items-center px-4 py-2">
                                              <input type="radio" name="subcategory_id" value="{{ $subcategory->id }}" class="mr-2">
                                              {{ $subcategory->name }}
                                          </label>
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                      </li>
                  @endforeach
              </ul>
          </div>
          <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="ml-4 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700" type="button">Select Tags <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownBgHover" class="z-10 hidden w-48 max-h-60 overflow-y-auto bg-white rounded-lg shadow dark:bg-gray-700">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
                  @foreach ($tags as $tag)
                  <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="checkbox-item-4-{{ $tag->id }}" type="checkbox" name="tags[]" value="{{ $tag->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                      <label for="checkbox-item-4-{{ $tag->id }}" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$tag->name}}</label>
                    </div>
                  </li>
                  @endforeach
                </ul>
            </div>
      </div>
      @error('tags') <span class="text-danger text-gray-200">{{ $message }}</span> @enderror  
      @error('category_id') <span class="text-danger text-gray-200">{{ $message }}</span> @enderror
      @error('subcategory_id') <span class="text-danger text-gray-200">{{ $message }}</span> @enderror
      
      <div class="buttons flex">
          <div class="btn border rounded-lg border-gray-300 p-1 px-4 font-semibold cursor-pointer text-white ml-auto"><a href="{{ route('main') }}"><button type="button">Cancel</button></a></div>
          <div class="btn border rounded-lg border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500"><button type="submit">Post</button></div>
      </div>
  </div>
</form>

<script>
  function showSubcategories(categoryId) {
      // Hide all subcategory dropdowns
      document.querySelectorAll('.subcategory-dropdown').forEach(dropdown => {
          dropdown.classList.add('hidden');
      });
      
      // Show the selected category's subcategory dropdown
      document.getElementById('doubleDropdown-' + categoryId).classList.toggle('hidden');
  }
</script>
    </div>
  </div>
</div>
@endsection