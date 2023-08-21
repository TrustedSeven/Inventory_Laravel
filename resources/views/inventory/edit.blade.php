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


        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="line_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Line Number</label>
                <input type="number" name="line_no" value="{{ $inventory->line_no }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Line No" required>
            </div>
            <div>
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                <input type="text" name="location" value="{{ $inventory->location }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Location">
            </div>
            <div>
                <label for="device_a_rack" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Rack</label>
                <input type="text" name="device_a_rack" value="{{ $inventory->device_a_rack }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Rack">
            </div>
            <div>
                <label for="device_b_rack" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Rack</label>
                <input type="text" name="device_b_rack" value="{{ $inventory->device_b_rack }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device B Rack">
            </div>
            <div>
                <label for="device_a_rack_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Rack Type</label>
                <input type="text" name="device_a_rack_type" value="{{ $inventory->device_a_rack_type }}" value="{{ $inventory->line_no }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Rack Type">
            </div>
            <div>
                <label for="device_b_rack_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Rack Type</label>
                <input type="text" name="device_b_rack_type" value="{{ $inventory->device_b_rack_type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device B Rack Type">
            </div>
            <div>
                <label for="device_a_ru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Ru</label>
                <input type="text" name="device_a_ru" value="{{ $inventory->device_a_ru }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Ru">
            </div>
            <div>
                <label for="device_b_ru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Ru</label>
                <input type="text" name="device_b_ru" value="{{ $inventory->device_b_ru }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device B Ru">
            </div>
            <div>
                <label for="device_a_model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Model</label>
                <input type="text" name="device_a_model" value="{{ $inventory->device_a_model }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Model">
            </div>
            <div>
                <label for="device_b_model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Model</label>
                <input type="text" name="device_b_model" value="{{ $inventory->device_b_model }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Model">
            </div>
            <div>
                <label for="device_a_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Description</label>
                <input type="text" name="device_a_description" value="{{ $inventory->device_a_description }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Description">
            </div>
            <div>
                <label for="device_b_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Description</label>
                <input type="text" name="device_b_description" value="{{ $inventory->device_b_description }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device B Description">
            </div>
            <div>
                <label for="device_a_host_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Host Name</label>
                <input type="text" name="device_a_host_name" value="{{ $inventory->device_a_host_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Host Name">
            </div>
            <div>
                <label for="device_b_host_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Host Name</label>
                <input type="text" name="device_b_host_name" value="{{ $inventory->device_b_host_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device B Host Name">
            </div>
            <div>
                <label for="device_a_port" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device A Port</label>
                <input type="text" name="device_a_port" value="{{ $inventory->device_a_port }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device A Port">
            </div>
            <div>
                <label for="device_b_port" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device B Port</label>
                <input type="text" name="device_b_port" value="{{ $inventory->device_b_port }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Device B Port">
            </div>
            <div>
                <label for="detailed_cable_info" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detailed Cable Info</label>
                <input type="text" name="detailed_cable_info" value="{{ $inventory->detailed_cable_info }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Detailed Cable Info">
            </div>
            <div>
                <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                <input type="text" name="note" value="{{ $inventory->note }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Note">
            </div>
        </div>


        <div class="mt-5 mb-10 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit Inventory
            </button>
        </div>
    </form>
</div>

@endsection
