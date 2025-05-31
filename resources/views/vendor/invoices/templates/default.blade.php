<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $invoice->name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529; /* Dark gray for text, good for print */
            text-align: left;
            background-color: #fff; /* White background for PDF */
            font-size: 10px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4, .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4, .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
        }

        .table.table-items td {
            border-top: 1px solid #dee2e6; /* Light gray for table lines */
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }
        * {
            font-family: "DejaVu Sans"; /* Good for PDF character support */
        }
        body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
            line-height: 1.1;
        }
        .party-header {
            font-size: 1.2rem;
            font-weight: 600; /* Made slightly bolder */
            color: #8B5CF6; /* Theme Purple for Seller, Buyer, and Table Headers */
        }
        .invoice-title strong {
            color: #8B5CF6; /* Purple for the main invoice title - from your theme */
            font-weight: 700;
        }
        .total-amount {
            font-size: 12px;
            font-weight: 700;
            color: #8B5CF6; /* Purple for total amount */
        }
        .border-0 {
            border: none !important;
        }
        .cool-gray {
            color: #6B7280; /* Existing cool-gray, good for secondary text */
        }
        .logo-container {
            margin-bottom: 2rem; /* Add some space below the logo */
        }
        .logo-container img {
            max-height: 70px; /* Adjust max height as needed */
            width: auto;
        }
    </style>
</head>

<body>
{{-- Header --}}
<div class="logo-container">
    {{-- Use the specified Async logo --}}
    <img src="{{ asset('img/async-logo.png') }}" alt="Async Logo">
</div>


<table class="table mt-5">
    <tbody>
    <tr>
        <td class="border-0 pl-0" width="70%">
            <h4 class="text-uppercase invoice-title">
                <strong>{{ $invoice->name }}</strong>
            </h4>
        </td>
        <td class="border-0 pl-0">
            @if($invoice->status)
                <h4 class="text-uppercase cool-gray" style="font-size: 1.2rem;"> {{-- Adjusted status font size --}}
                    <strong>{{ $invoice->status }}</strong>
                </h4>
            @endif
            <p>{{ __('invoices::invoice.serial') }} <strong>{{ $invoice->getSerialNumber() }}</strong></p>
            <p>{{ __('invoices::invoice.date') }}: <strong>{{ $invoice->getDate() }}</strong></p>
        </td>
    </tr>
    </tbody>
</table>

{{-- Seller - Buyer --}}
<table class="table">
    <thead>
    <tr>
        <th class="border-0 pl-0 party-header" width="48.5%">
            {{ __('invoices::invoice.seller') }}
        </th>
        <th class="border-0" width="3%"></th>
        <th class="border-0 pl-0 party-header">
            {{ __('invoices::invoice.buyer') }}
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="px-0">
            {{-- Updated Seller Name to be static --}}
            <p class="seller-name">
                <strong>The Async Studio</strong>
            </p>

            {{-- Static Seller Address --}}
            <p class="seller-address">
                {{ __('invoices::invoice.address') }}: Makati Manila
            </p>

            @if($invoice->seller->code)
                <p class="seller-code">
                    {{ __('invoices::invoice.code') }}: {{ $invoice->seller->code }}
                </p>
            @endif

            @if($invoice->seller->vat)
                <p class="seller-vat">
                    {{ __('invoices::invoice.vat') }}: {{ $invoice->seller->vat }}
                </p>
            @endif

            {{-- Static Seller Phone --}}
            <p class="seller-phone">
                {{ __('invoices::invoice.phone') }}: +639524755698
            </p>

            @foreach($invoice->seller->custom_fields as $key => $value)
                <p class="seller-custom-field">
                    {{ ucfirst($key) }}: {{ $value }}
                </p>
            @endforeach
        </td>
        <td class="border-0"></td>
        <td class="px-0">
            @if($invoice->buyer->name)
                <p class="buyer-name">
                    <strong>{{ $invoice->buyer->name }}</strong>
                </p>
            @endif

            @if($invoice->buyer->address)
                <p class="buyer-address">
                    {{ __('invoices::invoice.address') }}: {{ $invoice->buyer->address }}
                </p>
            @endif

            @if($invoice->buyer->code)
                <p class="buyer-code">
                    {{ __('invoices::invoice.code') }}: {{ $invoice->buyer->code }}
                </p>
            @endif

            @if($invoice->buyer->vat)
                <p class="buyer-vat">
                    {{ __('invoices::invoice.vat') }}: {{ $invoice->buyer->vat }}
                </p>
            @endif

            @if($invoice->buyer->phone)
                <p class="buyer-phone">
                    {{ __('invoices::invoice.phone') }}: {{ $invoice->buyer->phone }}
                </p>
            @endif

            @foreach($invoice->buyer->custom_fields as $key => $value)
                <p class="buyer-custom-field">
                    {{ ucfirst($key) }}: {{ $value }}
                </p>
            @endforeach
        </td>
    </tr>
    </tbody>
</table>

{{-- Table --}}
<table class="table table-items">
    <thead>
    <tr>
        <th scope="col" class="border-0 pl-0 party-header">{{ __('invoices::invoice.description') }}</th>
        @if($invoice->hasItemUnits)
            <th scope="col" class="text-center border-0 party-header">{{ __('invoices::invoice.units') }}</th>
        @endif
        <th scope="col" class="text-center border-0 party-header">{{ __('invoices::invoice.quantity') }}</th>
        <th scope="col" class="text-right border-0 party-header">{{ __('invoices::invoice.price') }}</th>
        @if($invoice->hasItemDiscount)
            <th scope="col" class="text-right border-0 party-header">{{ __('invoices::invoice.discount') }}</th>
        @endif
        @if($invoice->hasItemTax)
            <th scope="col" class="text-right border-0 party-header">{{ __('invoices::invoice.tax') }}</th>
        @endif
        <th scope="col" class="text-right border-0 pr-0 party-header">{{ __('invoices::invoice.sub_total') }}</th>
    </tr>
    </thead>
    <tbody>
    {{-- Items --}}
    @foreach($invoice->items as $item)
        <tr>
            <td class="pl-0">
                {{ $item->title }}

                @if($item->description)
                    <p class="cool-gray">{{ $item->description }}</p>
                @endif
            </td>
            @if($invoice->hasItemUnits)
                <td class="text-center">{{ $item->units }}</td>
            @endif
            <td class="text-center">{{ $item->quantity }}</td>
            <td class="text-right">
                {{ $invoice->formatCurrency($item->price_per_unit) }}
            </td>
            @if($invoice->hasItemDiscount)
                <td class="text-right">
                    {{ $invoice->formatCurrency($item->discount) }}
                </td>
            @endif
            @if($invoice->hasItemTax)
                <td class="text-right">
                    {{ $invoice->formatCurrency($item->tax) }}
                </td>
            @endif

            <td class="text-right pr-0">
                {{ $invoice->formatCurrency($item->sub_total_price) }}
            </td>
        </tr>
    @endforeach
    {{-- Summary --}}
    @if($invoice->hasItemOrInvoiceDiscount())
        <tr>
            <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
            <td class="text-right pl-0"><strong>{{ __('invoices::invoice.total_discount') }}</strong></td>
            <td class="text-right pr-0">
                <strong>{{ $invoice->formatCurrency($invoice->total_discount) }}</strong>
            </td>
        </tr>
    @endif
    @if($invoice->taxable_amount)
        <tr>
            <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
            <td class="text-right pl-0"><strong>{{ __('invoices::invoice.taxable_amount') }}</strong></td>
            <td class="text-right pr-0">
                <strong>{{ $invoice->formatCurrency($invoice->taxable_amount) }}</strong>
            </td>
        </tr>
    @endif
    @if($invoice->tax_rate)
        <tr>
            <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
            <td class="text-right pl-0"><strong>{{ __('invoices::invoice.tax_rate') }}</strong></td>
            <td class="text-right pr-0">
                <strong>{{ $invoice->tax_rate }}%</strong>
            </td>
        </tr>
    @endif
    @if($invoice->hasItemOrInvoiceTax())
        <tr>
            <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
            <td class="text-right pl-0"><strong>{{ __('invoices::invoice.total_taxes') }}</strong></td>
            <td class="text-right pr-0">
                <strong>{{ $invoice->formatCurrency($invoice->total_taxes) }}</strong>
            </td>
        </tr>
    @endif
    @if($invoice->shipping_amount)
        <tr>
            <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
            <td class="text-right pl-0"><strong>{{ __('invoices::invoice.shipping') }}</strong></td>
            <td class="text-right pr-0">
                <strong>{{ $invoice->formatCurrency($invoice->shipping_amount) }}</strong>
            </td>
        </tr>
    @endif
    <tr>
        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
        <td class="text-right pl-0 total-amount">{{ __('invoices::invoice.total_amount') }}</td>
        <td class="text-right pr-0 total-amount">
            {{ $invoice->formatCurrency($invoice->total_amount) }}
        </td>
    </tr>
    </tbody>
</table>

@if($invoice->notes)
    <p class="mt-5">
        <strong>{{ __('invoices::invoice.notes') }}:</strong> {!! $invoice->notes !!}
    </p>
@endif

<p class="mt-5">
    <strong>{{ __('invoices::invoice.amount_in_words') }}:</strong> {{ $invoice->getTotalAmountInWords() }}
</p>
{{-- Updated check for pay_until_date --}}
@php
    $payUntilDateFormatted = $invoice->getPayUntilDate();
@endphp
@if(!empty($payUntilDateFormatted))
    <p>
        <strong>{{ __('invoices::invoice.pay_until') }}:</strong> {{ $payUntilDateFormatted }}
    </p>
@endif

<script type="text/php">
    if (isset($pdf) && $PAGE_COUNT > 1) {
        $text = "{{ __('invoices::invoice.page') }} {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("DejaVu Sans", "normal"); // Ensure DejaVu Sans is used
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
</script>
</body>
</html>
