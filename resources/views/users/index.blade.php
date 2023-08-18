@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Users
        </h1>
    </div>
</div>
<!-- <div class="w-2/5 h-9  m-auto  ">

    <form class="flex rounded-lg shadow-lg" action="{{ route('search') }}" method="GET">
        <input class="flex-1 rounded-lg" type="text" name="search" required />
        <button class=" bg-blue-500 text-gray-100 p-3 flex-2 rounded-lg" type="submit">Search</button>
    </form>
</div> -->


@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 px-6">
        {{ session()->get('message') }}
    </p>
</div>
@endif

@if (Auth::check())
<div class="pt-15 w-4/5 m-auto">
    <a href="/users" class="bg-blue-500 hover:bg-blue-400 uppercase bg-transparent text-gray-100 text-xl font-bold py-3 px-5 rounded-3xl">
        Create User
    </a>
</div>
@endif
<div class="sm:grid grid-cols-1 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">

    <div class="grid grid-cols-6 gap-4">

        <div class="col-span-1 text-gray-700 font-bold text-xl">
            Name
        </div>
        <div class="col-span-2 text-gray-700 font-bold text-xl">
            Email Address
        </div>
        <div class="col-span-1 text-gray-700 font-bold text-xl">
            User Role
        </div>
        <div class="col-span-1 text-gray-700 font-bold text-xl">

        </div>


    </div>
</div>
@foreach ($users as $user)
<div class="sm:grid grid-cols-1 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">

    <div class="grid grid-cols-6 gap-4">
        <!-- <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{ $user->name }}
        </h2> -->
        <div class="col-span-1 text-gray-700 font-bold text-xl">
            {{$user->name}}
        </div>
        <div class="col-span-2 text-gray-700 font-bold text-xl">
            {{$user->email}}
        </div>
        <div class="col-span-1 text-gray-700 font-bold text-xl">
            {{$user->role}}
        </div>
        <div class="col-span-1 text-gray-700 font-bold text-xl">
            <div class="rounded-md shadow">
                <a href="{{url('/users')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                    Edit
                </a>
            </div>
        </div>
        <div class="col-span-1 text-gray-700 font-bold text-xl">
            <div class="rounded-md shadow">
                <a href="{{url('/users')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 md:py-4 md:text-lg md:px-10">
                    Delete
                </a>
            </div>
        </div>


    </div>
</div>
@endforeach

@endsection
