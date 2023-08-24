@extends('layouts.app')

@section('content')

<div class="w-11/12 m-auto">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-4xl uppercase text-gray-900 font-bold">
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
<div class="pt-5 w-11/12 m-auto mb-5">
    <div class="float-left">
        <a href="/inventory/create" class="uppercase bg-transparent text-gray-900 text-xl font-bold flex">
            <img src="https://img.freepik.com/free-icon/button_318-745417.jpg" class="w-6" /> &nbsp; Add New
        </a>
    </div>
    <div class="float-right">
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="export_csv();">Export CSV</button>
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="export_xlsx();">Export Excel</button>
    </div>

</div>

@if (session()->has('message'))
<div class="w-4/5 m-auto mt-5 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-2 px-2">
        {{ session()->get('message') }}
    </p>
</div>
@endif

@if (Auth::check())

<div id="scrollable-table" style="overflow-x: scroll;" class="relative overflow-x-auto mt-5 pt-5 mx-auto w-11/12 mb-5">
    <table id="inventorytable" class="min-w-full border text-center text-sm font-light dark:border-neutral-500 mb-5">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var scrollableTable = document.getElementById("scrollable-table");
            scrollableTable.scrollLeft = scrollableTable.scrollWidth;
        });
    </script>

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
                auto_filter: {
                    delay: 1100 //milliseconds
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
            tf = new TableFilter('inventorytable', filtersConfig);
            tf.init();
        });

        // const download = function(data) {

        //     // Creating a Blob for having a csv file format
        //     // and passing the data with type
        //     const blob = new Blob([data], {
        //         type: 'text/csv'
        //     });

        //     // Creating an object for downloading url
        //     const url = window.URL.createObjectURL(blob)

        //     // Creating an anchor(a) tag of HTML
        //     const a = document.createElement('a')

        //     // Passing the blob downloading url
        //     a.setAttribute('href', url)

        //     // Setting the anchor tag attribute for downloading
        //     // and passing the download file name
        //     a.setAttribute('download', 'download.csv');

        //     // Performing a download with click
        //     a.click()
        // }

        const export_csv = async function() {
            data = [];
            var header = tf.getHeadersText().map(function(item) {
                return item.trim().replace(/\s+/g, ' ');
            });
            header.pop();
            data.push(header);

            var content = tf.getFilteredData().map(function(item) {
                var element = item[1];
                element.pop();
                data.push(element);
                return (element);
            });
            var options = {
                quotes: true,
                delimiter: ",",
                newline: "\r\n",
                columns: [{
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    },
                    {
                        width: 50
                    }
                ]
            };
            var csv = Papa.unparse(data, options);
            var currentDate = new Date();
            var currentDateTime = currentDate.toLocaleString();
            var blob = new Blob([csv], {
                type: "text/csv;charset=utf-8"
            });
            saveAs(blob, `${currentDateTime}.csv`);

            // const csvdata = csvmaker(data);
            // download(csvdata);
        }
        // const csvmaker = function(data) {

        //     csvRows = [];


        //     const headers = Object.keys(data[0]);
        //     console.log(data[0]);

        //     // csvRows.push(headers.join(','));

        //     console.log(headers);

        //     for (const row of data) {
        //         const values = headers.map(e => {
        //             return row[e]
        //         })
        //         csvRows.push(values.join(','))
        //     }

        //     return csvRows.join('\n')
        // }

        const export_xlsx = async function() {
            data = [];
            var header = tf.getHeadersText().map(function(item) {
                return item.trim().replace(/\s+/g, ' ');
            });
            header.pop();
            data.push(header);

            var content = tf.getFilteredData().map(function(item) {
                var element = item[1];
                element.pop();
                data.push(element);
                return (element);
            });
            var csv = Papa.unparse(data);
            var workbook = XLSX.read(csv, {
                type: "string"
            });
            var xlsxData = XLSX.write(workbook, {
                bookType: "xlsx",
                type: "binary"
            });
            var currentDate = new Date();
            var currentDateTime = currentDate.toLocaleString();
            saveAs(new Blob([s2ab(xlsxData)], {
                type: "application/octet-stream"
            }), `${currentDateTime}.xlsx`);
        }

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xff;
            }
            return buf;
        }
    </script>


    <!-- <script>
        function export_csv() {

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", 'export_filtered.php');

            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "Header");
            hiddenField.setAttribute("value", tf.getHeadersText());

            form.appendChild(hiddenField);

            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "String");
            hiddenField.setAttribute("value", tf.getFilteredData());

            form.appendChild(hiddenField);


            document.body.appendChild(form);
            form.submit();
        }
    </script> -->
</div>


@endif

@endsection
