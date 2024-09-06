  @extends("layouts.app")
  @section("content")   
<div class="h-screen md:flex">
	<div
		class="relative overflow-hidden md:flex w-1/2 bg-cover i justify-around items-center hidden" style="background-image: url('https://images.unsplash.com/photo-1498887960847-2a5e46312788?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
		<div>
			<h1 class="text-white font-bold text-8xl font-sans">AutoCar</h1>
			<p class="text-white mt-1">The most popular Car related blog</p>
		</div>
	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form class="bg-white" action="{{url('register')}}" method="POST">
      @csrf
			<h1 class="text-gray-800 font-bold text-4xl mb-7">Hello fellow Petrolhead</h1>
        
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
						viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
					</svg>
					<input class="pl-2 outline-none border-none text-lg" type="text" name="name"  placeholder="Username" />
          @error('name') <span class="text-danger text-red-700">{{$message}}</span> @enderror
      </div>
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						<input class="pl-2 outline-none border-none text-lg" type="text" name="email"  placeholder="Email Address" />
            @error('email') <span class="text-danger text-red-700">{{$message}}</span> @enderror
      </div>
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
					viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
				</svg>
				<input class="pl-2 outline-none border-none text-lg" type="text" name="country"  placeholder="Country" />
				@error('country') <span class="text-danger text-red-700">{{$message}}</span> @enderror
	</div>
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input class="pl-2 outline-none border-none text-lg" type="password" name="password"  placeholder="Password" />
              @error('password') <span class="text-danger text-red-700">{{$message}}</span> @enderror
      </div>
							<button type="submit" class="block w-full bg-orange-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Register</button>
              <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center">Already have an account ?  <a href="{{route('login')}}"><span class="text-black"> Login Here</span></a></h1>

          </form>
	</div>
  </div>
  @endsection