@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Inventory
        </h1>
    </div>
</div>

@if ($errors->any())
<div class="w-4/5 m-auto">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/inventory/{{ $inventory->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $inventory->title }}" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">


        <div class="mt-5 mb-10 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <button type="submit" class="uppercase mt-15 text-white bg-indigo-600 hover:bg-indigo-700 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Inventory
            </button>
        </div>
    </form>
</div>

@endsection
