@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Inventories
        </h1>
    </div>
</div>
<div class="w-2/5 h-9  m-auto  ">

    <form class="flex rounded-lg shadow-lg" action="{{ route('search') }}" method="GET">
        <input class="flex-1 rounded-lg" type="text" name="search" required placeholder="Not working yet! Coming Soon"/>
        <button class=" bg-blue-500 hover:bg-blue-400 text-gray-100 p-3 flex-2 rounded-lg" type="submit">Search</button>
    </form>
</div>


@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-2 px-2">
        {{ session()->get('message') }}
    </p>
</div>
@endif

@if (Auth::check())
<div class="pt-15 w-4/5 m-auto mb-5">
    <a href="/inventory/create" class="bg-blue-500 hover:bg-blue-400 uppercase bg-transparent text-gray-100 text-xl font-bold py-2 px-5 rounded-3xl">
        Add New Inventory
    </a>
</div>
@endif
<div class="relative overflow-x-auto mt-5 pt-5 mx-auto w-11/12">
    <table class="w-full text-sm text-left text-gray-500 border border-gray dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-2">
                    Line No.
                </th>
                <th scope="col" class="px-2 py-2">
                    Location
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A Rack Type
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A Rack
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A RU
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A Model
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A Description
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A Host Name
                </th>
                <th scope="col" class="px-2 py-2">
                    Device A Port
                </th>
                <th scope="col" class="px-2 py-2">
                    Detailed Cable Info
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B Port
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B Host Name
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B Description
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B Model
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B RU
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B Rack
                </th>
                <th scope="col" class="px-2 py-2">
                    Device B Rack Type
                </th>
                <th scope="col" class="px-2 py-2">
                    Note
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$inventory->line_no}}
                </th>
                <td class="px-2 py-2">
                    {{$inventory->location}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_rack_type}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_rack}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_ru}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_model}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_description}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_host_name}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_a_port}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->detailed_cable_info}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_port}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_host_name}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_description}}
                    <!-- {{ date('jS M Y', strtotime($inventory->updated_at)) }} -->
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_model}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_ru}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_rack}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->device_b_rack_type}}
                </td>
                <td class="px-2 py-2">
                    {{$inventory->note}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
