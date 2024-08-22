@extends('layouts.app')
@section('content')

<h1>This is an Official Email for resetting your password. </h1>

<a href="{{url('/reset-password', $token)}}">
  <button type="submit" class="w-full bg-black text-white p-2 rounded-md hover:bg-gray-800  focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">
    Reset Password
  </button>
</a>
@endsection