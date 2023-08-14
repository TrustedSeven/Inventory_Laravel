@extends('layouts.app')
@section('content')


@if($inventories->isNotEmpty())
<div class="w-4/5  grid grid-1 m-auto text-center shadow-md ">
    @foreach ($inventories as $inventory)

    <ul class="my-6">
        <li class="">
            <a href="/inventory/{{ $inventory->slug }}" class="uppercase  text-gray-900 text-lg font-extrabold py-4 px-8 rounded-3xl">
                <div class="w-4/5 flex flex-row border-b-2 border-gray-900 m-auto text-center">
                    <img class="inline w-1/4 pr-4 shadow  align-left border-none" src="{{ asset('images/' . $inventory->image_path) }}" alt="">
                    <p class="ml-3">{{ $inventory->title }}</p>
                </div>
            </a>
        </li>
    </ul>

    <div class="">
        @endforeach
        @else

        <h2 class="text-6xl leading-loose text-center text-red-500">No inventories found</h2>
    </div>
    @endif
</div>

@endsection
