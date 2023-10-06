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
            background-color: #ec2121d0;
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

        #amount {
            color: red;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>


<body class="antialiased">
    <h2>ARRC Monthly Expenses Report </h2>
    <h2 style="margin-bottom: 2rem">Month: {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ now()->format('Y') }} </h2>

    <div>
        <table class="border-collapse border border-slate-400 p-4">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Name</th>
                    <th>Pay Date</th>
                    <th>Vendor/Recipient</th>
                    <th>Category</th>
                    <th>Mode</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $index => $expense)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $expense->name }}</td>
                        <td>{{ $expense->payment_date }}</td>
                        <td>{{ $expense->vendor }}</td>
                        <td>{{ $expense->category_name }}</td>
                        @if ($expense->payment_mode === 'cash')
                            <td style="color: green">{{ $expense->payment_mode }}</td>
                        @else
                            <td style="color:navy">{{ $expense->payment_mode }}</td>
                        @endif
                        <td style="text-align: right" id="amount">{{ number_format($expense->amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
    </div>

    <div>
        <h2 style="font-size: 16px; font-weight:bold; margin-top: 10px;">Notes</h2>
        @foreach ($expenses as $index => $expense)
            @if ($expense->notes)
                <p style="font-size: 12px">* {{ $index + 1 }}: {{ $expense->notes }}</p>
            @endif
        @endforeach
    </div>



    <div class="page-break"></div>
    <h2 style="font-size: 24px; font-weight:bold; margin-bottom: 16px;">Expense Totals</h2>
    <table style="width: 100%;">
        @foreach ($totalAmountPerCategory as $category)
            <tr style="background-color: white">
                <td style="border-bottom:none; margin-top: 1rem; font-size: 16px;">{{ $category->category_name }}</td>
                <td style="text-align: right; border-bottom:none; margin-top: 1rem; font-size: 16px; color:red">
                    {{ number_format($category->total_amount, 2) }}
                </td>
            </tr>
        @endforeach
        <tr style="background-color: white">
            <td style="border-bottom:none; margin-top: 1rem; font-size: 20px; font-weight: bold;">Total Expenses</td>
            <td
                style="text-align: right; border-bottom:none; margin-top: 1rem; font-size: 20px; color:red; font-weight: bold;">
                {{ number_format($total_expenses, 2) }}</td>
        </tr>
    </table>

</body>

</html>
