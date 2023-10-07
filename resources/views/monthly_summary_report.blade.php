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
            padding-top: 4px;
            padding-bottom: 4px;
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

        hr {
            border-top: 1px dotted #8c8b8b;
            margin-top: 24px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>


<body class="antialiased">
    <h2>ARRC Monthly Summary Report </h2>
    <h2 style="margin-bottom: 2rem">Month: {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ now()->format('Y') }} </h2>

    {{-- <div class="page-break"></div> --}}
    <h2 style="font-size: 24px; font-weight:bold; margin-bottom: 16px;">Income Totals</h2>
    <table style="width: 100%;">
        @foreach ($totalIncomePerCategory as $singleCategory)
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
    {{-- <hr class=""> --}}
    <h2 style="margin-top: 24px; font-size: 24px; font-weight:bold; margin-bottom: 16px;">Expense Totals</h2>
    <table style="width: 100%;">
        @foreach ($totalExpensePerCategory as $category)
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
