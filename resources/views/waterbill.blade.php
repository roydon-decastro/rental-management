<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('');
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            height: 30px;
            border-top: 1px solid #ddd;
            /* color: #787575; */
            background-color: #1389dd;
            color: white;
        }

        td {

            padding-left: 10px;
            padding-right: 10px;
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 12px;
        }

        /* table, th, td {
                border: 1px solid gray;
            } */

        th,
        td {
            border-bottom: 1px solid #ddd;
        }


        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        span {
            font-weight: bold;
        }

        h2 {
            /* margin-bottom: 2rem; */
            margin: 0;

        }

        h4 {

            margin: 0;
            margin-bottom: 8px;
            color: rgb(69, 64, 64);

        }
    </style>
</head>


<body class="antialiased">
    <h2>ARRC Isabel Water Bill Monthly Report </h2>
    <h2 style="margin-bottom: 2rem">Month: {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ now()->format('Y') }} </h2>

    <div>
        <table class="border-collapse border border-slate-400 p-4">
            <thead>
                <tr>
                    <th></th>
                    <th>Unit</th>
                    <th>Tenant</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Current</th>
                    <th>Previous</th>
                    <th>M<sup>3</sup></th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $index => $bill)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $bill->unit_name }}</td>
                        <td>{{ $bill->tenant_name }}</td>
                        <td>{{ date('F d Y', strtotime($bill->prev_read_date)) }}</td>
                        <td>{{ date('F d Y', strtotime($bill->curr_read_date)) }}</td>
                        <td>{{ $bill->curr_reading }}</td>
                        <td>{{ $bill->prev_reading }}</td>
                        <td>{{ $bill->consumption }}</td>
                        <td>{{ $bill->total_amount_due }}</td>
                    </tr>
                @endforeach
            </tbody>
    </div>

    <h4 style="margin-top: 1rem;">Total Water Consumption: {{ $total_consumption }} m<sup>3</sup></h4>
    <h4>Daily Average Consumption: {{ number_format($average_consumption, 2) }} m<sup>3</sup></h4>
    <h4>Total Amount Collectible: Php {{ $total_amount }}</h4>

</body>

</html>
