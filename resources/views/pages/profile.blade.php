@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
    <!-- Profile header -->
    <section class="relative block h-500-px">
        <div class="absolute top-0 w-full h-full bg-center bg-cover shadow-xl" style="
                background-image: url('https://images.unsplash.com/photo-1444090542259-0af8fa96557e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <a href="{{ url('main') }}" class="font-semibold text-white hover:text-teal-500 dark:text-gray-400 dark:hover:text-white focus:rounded-sm">Return</a>
        </div>
    </section>
    
    <!-- User profile -->
    <section class="relative py-16 bg-blueGray-200">
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                            <div class="relative">
                                <img alt="..." src="{{ asset($user->image) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                            <div class="py-6 px-3 mt-32 sm:mt-0">
                                @if (auth()->check() && auth()->user()->id == $user->id)
                                    <a href="{{ url('users/'.$user->id.'/edit') }}">
                                        <button class="bg-pink-500 active:bg-pink-600 hover:bg-pink-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                            Edit
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-lg font-bold block tracking-wide text-blueGray-600">{{ $user->created_at->format('j M Y') }}</span><span class="text-sm text-blueGray-400">Joined</span>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $user->posts_count }}</span><span class="text-sm text-blueGray-400">Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-12">
                        <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
                            {{ $user->name }}
                        </h3>
                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                            <i class="fas fa-envelope mr-2 text-lg text-blueGray-400"></i>
                            {{ $user->email }}
                        </div>
                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                            {{ $user->city }}, {{ $user->country }}
                        </div>
                        <div class="mb-2 mt-10 text-sm leading-normal text-blueGray-400 font-bold uppercase">
                            <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{ $user->work }}
                        </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                    {{ $user->bio }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container mx-auto">
      <div class="w-full lg:w-8/12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
          @foreach ($user->posts as $post)
          @php $unique_id = $loop->index; @endphp
            <!-- Post 1 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-2xl">
                <img class="w-full h-56 object-cover" src="{{asset($post->image)}}" alt="Post Image">
                <div class="p-6 text-sky-950">
                    <div class="flex items-center justify-between">
                        <span class="font-medium text-black">{{$post->created_at->format('j M Y')}}</span>
                        @if ($post->user->is(auth()->user()) || auth()->user()->isAdmin == 1)
                        <button id="dropdownMenuIconButton{{$unique_id}}" data-dropdown-toggle="dropdownDots{{$unique_id}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDots{{$unique_id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm  dark:text-gray-200" aria-labelledby="dropdownMenuIconButton{{$unique_id}}">
                                <li><a href="{{url('posts/'.$post->id.'/edit')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a></li>
                                <li><a href="{{url('posts/'.$post->id.'/delete')}}" class="block px-4 py-2 text-gray-700 hover:bg-red-500 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        <a href="#" class="text-2xl font-bold text-sky-950 hover:underline">{{$post->title}}</a>
                        <p class="mt-2 text-sky-950">{{$post->description}}</p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="{{url('categories/'.$post->category->id.'/show')}}" class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{$post->category->name}}</a>
                        @foreach ($post->tags as $tag)
                        <span class="text-indigo-600 font-semibold">#{{$tag->name}}</span>
                        @endforeach                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
    </section>
</main>
@endsection