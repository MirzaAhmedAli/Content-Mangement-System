@extends('layouts.app')
@section('content')
<div class="overflow-x-hidden bg-gray-100">
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <div class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpdwzl5xFixobB8a2WDwBgKzjNUeFfyiWkVw&s" class="h-8" alt="Flowbite Logo" />
        <a href="{{route('main')}}">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">AutoCar</span>
        </a>      
      </div>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="https://cdn-icons-png.flaticon.com/512/4042/4042356.png" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{auth()->user()->name}}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
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
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{url('/')}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="{{route('about')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        {{-- <li>
        @foreach ($categories as $category)
        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page"></a>
        @endforeach
      </li> --}}
        <li>
          <a href="{{route('categories.index')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Categories</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
        </li>
        @if (auth()->user()->isAdmin == 1)
        <li>
          <a href="{{route('users.index')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Users</a>
        </li>
        @endif
      </ul>
    </div>
    </div>
  </nav>
  
  <div class="px-6 py-8 bg-cover bg-center" style="background-image: url('https://i.pinimg.com/originals/2b/de/7d/2bde7d14133968f97d6c4dd898edb989.gif ');">
    @if (session('status'))
    <div class="px-4 sm:px-6 lg:px-8 mt-6 mr-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 overflow-hidden shadow-sm sm:rounded-lg font-mono text-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="alert alert-success">{{session('status')}}</div>  
            </div>
        </div>        
        </div>     
    </div>   
    @endif  
    <div class="container flex justify-between mx-auto">
          <div class="w-full lg:w-8/12">
              <div class="flex items-center justify-between">
                  <h1 class="text-xl font-bold text-orange-600 md:text-4xl">Posts</h1>
                  {{-- <div>
                      <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                          <option>Latest</option>
                          <option>Last Week</option>
                      </select>
                  </div> --}}
              </div>
              <div class="mt-6">
                  <div class="max-w-4xl px-10 py-6 mx-auto text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800   rounded-lg shadow-md">
                      <div class="flex items-center justify-between"><span class="font-light text-black">Jun 1,    
                              2020</span><a href="#"></a>
                              <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                                </button>
                                
                                <!-- Dropdown menu -->
                                <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm  dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                      <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-red-500 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                      </li>
                                    </ul>
                                </div>
                      </div>
                      <div class="mt-2"><a href="#" class="text-2xl font-bold text-white hover:underline">Build
                              Your New Idea with Laravel Freamwork.</a>
                          <p class="mt-2 text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                              Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                              reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                      </div>
                      <div class="flex items-center justify-between mt-4"><a href="#"
                        class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                          <div><a href="#" class="flex items-center"><img
                                      src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                      alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                  <h1 class="font-bold text-indigo-400 hover:underline">Alex John</h1>
                              </a></div>
                      </div>
                  </div>
              </div>
              <div class="mt-6">
                  <div class="max-w-4xl px-10 py-6 mx-auto text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 rounded-lg shadow-md">
                      <div class="flex items-center justify-between"><span class="font-light text-black">Mar 4,2019</span><a href="#"></a>
                              <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                                </button> 
                                
                                <!-- Dropdown menu -->
                                <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm  dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                      <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-red-500 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                      </li>
                                    </ul>
                                </div>
                      </div>
                      <div class="mt-2"><a href="#"
                              class="text-2xl font-bold text-white hover:underline">Accessibility tools for
                              designers and developers</a>
                          <p class="mt-2 text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                              Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                              reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                      </div>
                      <div class="flex items-center justify-between mt-4"><a href="#"
                        class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Design</a>
                          <div><a href="#" class="flex items-center"><img
                                      src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                      alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                  <h1 class="font-bold text-indigo-400 hover:underline">Jane Doe</h1>
                              </a></div>
                      </div>
                  </div>
              </div>
              <div class="mt-6">
                  <div class="max-w-4xl px-10 py-6 mx-auto text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 rounded-lg shadow-md">
                      <div class="flex items-center justify-between"><span class="font-light text-black">Feb 14,2019</span><a href="#"></a>
                              <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                                </button>
                                
                                <!-- Dropdown menu -->
                                <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm  dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                      <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-red-500 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                      </li>
                                    </ul>
                                </div>
                      </div>
                      <div class="mt-2"><a href="#" class="text-2xl font-bold text-white hover:underline">PHP:
                              Array to Map</a>
                          <p class="mt-2 text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                              Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                              reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                      </div>
                      <div class="flex items-center justify-between mt-4"><a href="#"
                        class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">PHP</a>
                          <div><a href="#" class="flex items-center"><img
                                      src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                      alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                  <h1 class="font-bold text-indigo-400 hover:underline">Lisa Way</h1>
                              </a></div>
                      </div>
                  </div>
              </div>
              <div class="mt-8">
                  <div class="flex">
                      <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                          previous
                      </a>
                  
                      <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                          1
                      </a>
                  
                      <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                          2
                      </a>
                  
                      <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                          3
                      </a>
                  
                      <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                          Next
                      </a>
                  </div>
              </div>
          </div>
          <div class="hidden w-4/12 -mx-8 lg:block">
              <div class="px-8">
                  <h1 class="mb-4 text-xl font-bold text-violet-400">Authors</h1>
                  <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                      <ul class="-mx-4">
                          <li class="flex items-center"><img
                                  src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                  alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                              <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex John</a><span
                                      class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
                          </li>
                          <li class="flex items-center mt-6"><img
                                  src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                  alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                              <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Jane Doe</a><span
                                      class="text-sm font-light text-gray-700">Created 52 Posts</span></p>
                          </li>
                          <li class="flex items-center mt-6"><img
                                  src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                  alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                              <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Lisa Way</a><span
                                      class="text-sm font-light text-gray-700">Created 73 Posts</span></p>
                          </li>
                          <li class="flex items-center mt-6"><img
                                  src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                  alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                              <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Steve Matt</a><span
                                      class="text-sm font-light text-gray-700">Created 245 Posts</span></p>
                          </li>
                          <li class="flex items-center mt-6"><img
                                  src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                  alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                              <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Khatab
                                      Wedaa</a><span class="text-sm font-light text-gray-700">Created 332 Posts</span>
                              </p>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="px-8 mt-10">
                  <h1 class="mb-4 text-xl font-bold text-white">Categories</h1>
                  <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                    @foreach ($categories as $category) 
                      <ul>
                          <li>-<a href="{{url('categories/'.$category->id.'/show')}}" class="mx-1 mt-6 font-bold text-gray-700 hover:text-gray-600 hover:underline">
                            {{$category->name}}
                        </a></li>
                      </ul>
                    @endforeach  
                  </div>
              </div>
              <div class="px-8 mt-10">
                  <h1 class="mb-4 text-xl font-bold text-white">Recent Post</h1>
                  <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
                      <div class="flex items-center justify-center"><a href="#"
                              class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                      </div>
                      <div class="mt-4"><a href="#" class="text-lg font-medium text-gray-700 hover:underline">Build
                              Your New Idea with Laravel Freamwork.</a></div>
                      <div class="flex items-center justify-between mt-4">
                          <div class="flex items-center"><img
                                  src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                  alt="avatar" class="object-cover w-8 h-8 rounded-full"><a href="#"
                                  class="mx-3 text-sm text-gray-700 hover:underline">Alex John</a></div><span
                              class="text-sm font-light text-gray-600">Jun 1, 2020</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <footer class="px-6 py-2 text-gray-100 bg-gray-800">
      <div class="container flex flex-col items-center justify-between mx-auto md:flex-row"><a href="#"
              class="text-2xl font-bold">AutoCar</a>
          <p class="mt-2 md:mt-0">All rights reserved 2024.</p>
          <div class="flex mt-4 mb-2 -mx-2 md:mt-0 md:mb-0"><a href="#"
                  class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                      class="w-4 h-4 fill-current">
                  <path
                      d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z">
                  </path>
              </svg></a><a href="#" class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                  class="w-4 h-4 fill-current">
                  <path
                      d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z">
                  </path>
              </svg></a><a href="#" class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                  class="w-4 h-4 fill-current">
                  <path
                      d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z">
                  </path>
              </svg></a>
          </div>
      </div>
  </footer>
</div>

@endsection 