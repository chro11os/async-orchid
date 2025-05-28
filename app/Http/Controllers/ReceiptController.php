<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class ReceiptController extends Controller
{
    public function generate(Request $request)
    {
        $customer = new Party([
            'name' => $request->customer_name,
        ]);

        $item = (new InvoiceItem())
            ->title($request->description)
            ->pricePerUnit($request->amount);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->addItem($item)
            ->filename('receipt')
            ->template('your-custom-template'); // Optional: set your custom template

        return $invoice->stream(); // or ->download()
    }
}
