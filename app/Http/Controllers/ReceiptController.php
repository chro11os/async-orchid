<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Receipt;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Support\Str;
class ReceiptController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'projectName' => 'required|string|max:255',
            'customerName' => 'required|string|max:255',
            'customerBalance' => 'required|numeric',
            'description' => 'required|string|max:255',
            'projectStart' => 'required|date',
            'projectEnd' => 'required|date',
        ]);

        do {
            $customerID = 'CUS-' . strtoupper(Str::random(8));
        } while (Receipt::where('customerID', $customerID)->exists());

        $receipt = Receipt::create([
            'date' => Carbon::now()->toDateString(),
            'time' => Carbon::now()->toTimeString(),
            'customerName' => $validated['customerName'],
            'customerBalance' => $validated['customerBalance'],
            'customerID' => $customerID,
            'projectName' => $validated['projectName'],
            'projectStart' => $validated['projectStart'],
            'projectEnd' => $validated['projectEnd'],
        ]);

        // Build Buyer and Item
        $customer = new Buyer([
            'name' => $validated['customerName'],
            'custom_fields' => [
                'customer ID' => $customerID,
            ],
        ]);

        $item = (new InvoiceItem())
            ->title($validated['projectName'])
            ->pricePerUnit($validated['customerBalance'])
            ->description($validated['description']);

        // Create Invoice
        $invoice = Invoice::make()
            ->buyer($customer)
            ->date(Carbon::now())
            ->addItem($item)
            ->filename('receipt-' . $receipt->id);

        return $invoice->stream(); // or ->download() to force download
    }
}
