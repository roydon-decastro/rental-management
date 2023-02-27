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

        p {
            margin-bottom: -13px
        }

        span {
            font-weight: bold;
        }
    </style>
</head>


<body class="antialiased">
    <h4 style="margin: -2px;">ARRC Isabel Acknowledgment Receipt</h4>
    <hr style="border: 1px solid">
    <table width="100%" border="0" style="margin:20px 0">
        <tr style="vertical-align: top;">
            <td width="120">Unit</td>
            <td width="1">:</td>
            {{-- <td>{{ $invoice->bill_to }} <br> {{ $invoice->bill_address }}</td> --}}
            <td>{{ $payment->bill->unit_name }}</td>
        </tr>
        <tr style="vertical-align: top;">
            <td width="120">Address</td>
            <td width="1">:</td>
            {{-- <td>{{ $invoice->bill_to }} <br> {{ $invoice->bill_address }}</td> --}}
            <td>2559 Isabel St Sta Ana Manila</td>
        </tr>
        <tr>
            <td>Amount</td>
            <td>:</td>
            <td>{{ $payment->pay_amount }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Pay Date</td>
            <td>:</td>
            <td>{{ $payment->pay_date }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Pay Method</td>
            <td>:</td>
            <td>{{ $payment->pay_method }}</td>
        </tr>
    </table>



</body>

</html>
