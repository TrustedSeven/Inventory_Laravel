@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Inventory
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
    <form action="/inventory" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="line_no" placeholder="Line No." class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="location" placeholder="Location" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_rack_type" placeholder="device_a_rack_type" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_rack" placeholder="device_a_rack" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_ru" placeholder="device_a_ru" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_model" placeholder="device_a_model" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_description" placeholder="device_a_description" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_host_name" placeholder="device_a_host_name" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_a_port" placeholder="device_a_port" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_rack_type" placeholder="device_b_rack_type" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_rack" placeholder="device_b_rack" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_ru" placeholder="device_b_ru" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_model" placeholder="device_b_model" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_description" placeholder="device_b_description" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_host_name" placeholder="device_b_host_name" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="device_b_port" placeholder="device_b_port" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="detailed_cable_info" placeholder="detailed_cable_info" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
        <input type="text" name="note" placeholder="Note" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Inventory
        </button>
    </form>
</div>

@endsection
