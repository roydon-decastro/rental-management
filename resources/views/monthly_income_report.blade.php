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
            height: 20px;
            border-top: 1px solid #ddd;
            /* color: #787575; */
            background-color: green;
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

        .m_title {
            display: inline-block;
            /* Thanks to Fanky (https://stackoverflow.com/users/2095642/fanky) */

            text-transform: lowercase
        }

        .m_title::first-letter {
            text-transform: uppercase
        }

        #amount {
            color: green;
            font-size: 14px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>


<body class="antialiased">
    <h2>ARRC Monthly Incomes Report </h2>
    <h2 style="margin-bottom: 2rem">Month: {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ now()->format('Y') }} </h2>

    <div>
        <table class="border-collapse border border-slate-400 p-4">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Unit</th>
                    <th>Tenant</th>
                    <th>Pay Date</th>
                    <th>Post Date</th>
                    <th>Paid To</th>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $index => $income)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $income->UnitName }}</td>
                        <td>{{ $income->TenantName }}</td>
                        <td>{{ $income->pay_date }}</td>
                        <td>{{ \Carbon\Carbon::parse($income->created_at)->format('Y-m-d') }}</td>
                        <td>{{ $income->payment_mode }}</td>
                        <td>{{ $income->category }}</td>
                        <td style="text-align: right" id="amount">{{ number_format($income->amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
    </div>
    <div>
        <h2 style="font-size: 16px; font-weight:bold; margin-top: 10px;">Notes</h2>
        @foreach ($incomes as $index => $income)
            @if ($income->notes)
                <p style="font-size: 12px">Item {{ $index + 1 }}: {{ $income->notes }}</p>
            @endif
        @endforeach
    </div>
    <div class="page-break"></div>
    <h2 style="font-size: 24px; font-weight:bold; margin-bottom: 16px;">Income Totals</h2>
    <table style="width: 100%;">
        @foreach ($totalAmountPerCategory as $singleCategory)
            <tr style="background-color: white">
                <td style="border-bottom:none; margin-top: 1rem; font-size: 16px; text-transform: capitalize;">
                    {{ $singleCategory->category }}</td>
                <td style="text-align: right; border-bottom:none; margin-top: 1rem; font-size: 16px; color:green">
                    {{ number_format($singleCategory->total_amount, 2) }}
                </td>
            </tr>
        @endforeach
        <tr style="background-color: white">
            <td style="border-bottom:none; margin-top: 1rem; font-size: 20px; font-weight: bold;">Total Income</td>
            <td
                style="text-align: right; border-bottom:none; margin-top: 1rem; font-size: 20px; color:green; font-weight: bold;">
                {{ number_format($total_incomes, 2) }}</td>
        </tr>
    </table>








</body>

</html>
