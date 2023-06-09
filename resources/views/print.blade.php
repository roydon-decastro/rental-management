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
    <h2 style="margin: -2px;">ARRC Isabel Water Bill</h2>
    <hr style="border: 1px solid">
    <table width="100%" border="0" style="margin:20px 0">
        <tr style="vertical-align: top;">
            <td width="120">Unit</td>
            <td width="1">:</td>
            {{-- <td>{{ $invoice->bill_to }} <br> {{ $invoice->bill_address }}</td> --}}
            <td>{{ $bill->unit_name }}</td>
        </tr>
        <tr style="vertical-align: top;">
            <td width="120">Address</td>
            <td width="1">:</td>
            {{-- <td>{{ $invoice->bill_to }} <br> {{ $invoice->bill_address }}</td> --}}
            <td>2559 Isabel St Sta Ana Manila</td>
        </tr>
        <tr>
            <td>Account Name</td>
            <td>:</td>
            <td>{{ $bill->tenant_name }}</td>
        </tr>
        <tr>
            <td>SoA For Month Of</td>
            <td>:</td>
            <td>{{ date('F', strtotime($bill->curr_read_date)) }}</td>
        </tr>
        <tr>
            <td>Rate Class</td>
            <td>:</td>
            <td>Residential</td>
        </tr>
    </table>

    <hr style="border: 1px dotted">
    <h4 style="margin: -2px;">Metering Information</h4>
    <table width="100%" border="0" style="margin:20px 0">
        <tr style="vertical-align: top;">
            <td width="120">Reading Date</td>
            <td width="1">:</td>
            <td>{{ $bill->curr_read_date }}</td>
        </tr>
        <tr>
            <td>Present Reading</td>
            <td>:</td>
            <td>{{ $bill->curr_reading }}</td>
        </tr>
        <tr>
            <td>Previous Reading</td>
            <td>:</td>
            <td>{{ $bill->prev_reading }}</td>
        </tr>
        <tr>
            <td>Consumption (m<sup>3</sup>)</td>
            <td>:</td>
            <td>{{ $bill->consumption }}</td>
        </tr>
    </table>

    <hr style="border: 1px dotted">
    <h4 style="margin: -2px;">Billing Summary</h4>
    <table width="100%" border="0" style="margin:20px 0">
        <tr style="vertical-align: top;">
            <td width="420">Billing Period From</td>
            {{-- <td width="1">:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->prev_read_date }}</td>
        </tr>
        <tr style="vertical-align: top;">
            <td width="420">Billing Period To</td>
            {{-- <td width="1">:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->curr_read_date }}</td>
        </tr>
        <tr>
            <td>Current Charges</td>
            {{-- <td>:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->curr_balance }}</td>
        </tr>
        <tr>
            <td>Previous Balance</td>
            {{-- <td>:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->prev_balance }}</td>
        </tr>
        <tr>
            <td>Maintenance Service Charge</td>
            {{-- <td>:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->service_charge }}</td>
        </tr>
        <tr>
            <td>Environmental Charge</td>
            {{-- <td>:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->environmental_fee_charge }}</td>
        </tr>

        <tr>
            <td>VAT</td>
            {{-- <td>:</td> --}}
            <td style=" color:lightslategrey">{{ $bill->vat }}</td>
        </tr>
    </table>
    <hr style="border: 1px dotted">
    <table width="100%" style="border:0 margin:20px 0">
        <tr style="vertical-align: top;">
            <td style="font-weight: bold; font-size:20px; color:red " width="420">TOTAL AMOUNT DUE</td>
            {{-- <td width="1">:</td> --}}
            <td style="font-weight: bold; font-size:20px; color:red"> PHP {{ $bill->total_amount_due }}</td>
        </tr>
        <tr>
            <td style="">Payment due date</td>
            {{-- <td>:</td> --}}
            {{-- <td style="font-weight: bold;">{{  date('j F, Y', strtotime($bill->prev_read_date)) }}</td> --}}
            {{-- <td style="font-weight: bold; font-size:11; color:royalblue">{{ now()->endOfMonth()->format('j F, Y');  }}</td> --}}
            <td style="font-size:11; color:gray">16 {{ now('m')->format('F, Y') }}
            </td>

        </tr>
    </table>
    <hr style="border: 1px dotted">
    <h4 style="margin: -2px;">You may pay at the following accounts:</h4>
    <table width="100%" style="margin:20px 0; border:0">
        <tr style="vertical-align: top;">
            <td width="120">Gcash</td>
            {{-- <td width="1">:</td> --}}
            <td>09985518556</td>
            <td>Josefina Arlene Antonio</td>
        </tr>
        <tr style="vertical-align: top;">
            <td width="120">BDO - SA</td>
            <td>010150153112 </td>
            <td>Josefina Arlene Antonio</td>
        </tr>
        <tr>
            <td>BPI</td>
            <td>00001449173321</td>
            <td>ARRC BPI</td>
        </tr>
    </table>
    <hr style="border: 1px dotted">

    <p style=" font-size:10; color:red">Please pay on or before due date to avoid 1% daily interest penalty charge for
        unpaid bills.</p>
    <p style=" font-size:10; color:gray">Water Tank cleaning schedule: Every 1st Saturday of the month.</p>
    <p style=" font-size:10; color:gray">Reconnection fee of PHP250.00 will be charged in case of disconnection.
    </p>
    <p style=" font-size:10; color:gray">Please examine your bill carefully. If no complaint is made within 15
        days of
        receipt, this bill is considered true and correct.</p>
    <p style=" font-size:10; color:gray">For Inquiries and concerns, please call 09985518556 / 09192907360 or
        email
        arrc.residences@gmail.com</p>
    <br><br>
    <p style="font-weight:bold; font-size:14; color: lightskyblue; text-align:center">Every drop counts. Conserve water.
        Save mother earth.</p>
</body>

</html>
