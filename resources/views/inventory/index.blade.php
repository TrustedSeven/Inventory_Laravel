@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Inventories
        </h1>
    </div>
</div>
<!-- <div class="w-2/5 h-9  m-auto  ">

    <form class="flex rounded-lg shadow-lg" action="{{ route('search') }}" method="GET">
        <input class="flex-1 rounded-lg" type="text" name="search" required placeholder="Not working yet! Coming Soon" />
        <button class=" bg-blue-500 hover:bg-blue-400 text-gray-100 p-3 flex-2 rounded-lg" type="submit">Search</button>
    </form>
</div> -->


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

<div class="relative overflow-x-auto mt-5 pt-5 mx-auto w-11/12">
    <table id="inventorytable" class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Line No.
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Location
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A Rack Type
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A Rack
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A RU
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A Model
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A Description
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A Host Name
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device A Port
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Detailed Cable Info
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B Port
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B Host Name
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B Description
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B Model
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B RU
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B Rack
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Device B Rack Type
                </th>
                <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                    Note
                </th>
                <th scope="col" class="px-6 py-4">
                    Edit/Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
            <tr class="border-b dark:border-neutral-500">
                <th scope="row" class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->line_no}}
                </th>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->location}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_rack_type}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_rack}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_ru}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_model}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_description}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_host_name}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_a_port}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->detailed_cable_info}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_port}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_host_name}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_description}}
                    <!-- {{ date('jS M Y', strtotime($inventory->updated_at)) }} -->
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_model}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_ru}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_rack}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->device_b_rack_type}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    {{$inventory->note}}
                </td>
                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                    <span class="float-left"><a href="/inventory/{{ $inventory->slug }}/edit" class="text-gray-700 italic hover:text-gray-900 hover:bg-green-500 hover:px-4 hover:text-gray-100 pb-1 border-b-2">Edit</a></span>/<span class="float-right">
                        <form action="/inventory/{{ $inventory->slug }}" method="POST" id="delete-form">
                            @csrf
                            @method('delete')

                            <button class="text-red-500" type="submit" onclick="if (confirm('Are you sure to delete this inventory?')) {
                            event.preventDefault();
                            this.parentElement.submit();
                            }else{
                             event.preventDefault();
                             }
                            ">
                                Delete
                            </button>

                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var filtersConfig = {
                base_path: 'tablefilter/',
                paging: {
                    results_per_page: ['Records: ', [5, 10, 25, 50]]
                },
                state: {
                    types: ['local_storage'],
                    filters: true,
                    page_number: true,
                    page_length: true,
                    sort: true
                },
                alternate_rows: true,
                btn_reset: true,
                rows_counter: true,
                loader: {
                    html: '<div id="lblMsg"></div>',
                    css_class: 'myLoader'
                },
                status_bar: {
                    target_id: 'lblMsg',
                    css_class: 'myStatus'
                },
                col_0: 'none',
                // col_1: 'checklist',
                col_1: 'select',
                // col_2: 'select',
                // col_3: 'multiple',
                // col_3:'select',
                // col_4:'select',
                col_18: 'none',
                col_types: [
                    'number', 'string', 'string',
                    'string', 'string', 'string',
                    'string', 'string', 'string',
                    'string', 'string', 'string',
                    'string', 'string', 'string',
                    'string', 'string', 'string',
                    'string'
                ],
                extensions: [{
                    name: 'sort'
                }]
            };
            var tf = new TableFilter('inventorytable', filtersConfig);
            tf.init();
        });
    </script>
</div>

@endif

@endsection
