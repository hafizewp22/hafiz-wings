<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return view('product-list', compact('products'));
    }

    public function productDetail($productCode)
    {
        $products = Product::where('product_code', $productCode)->first();
        $nextProduct = Product::all();

        return view('product-detail', compact('products', 'nextProduct'));
    }

    public function checkout()
    {
        $transactionDetails = TransactionDetail::all();

        return view('checkout', compact('transactionDetails'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        $product = Product::find($productId);

        $lastTransaction = TransactionDetail::orderBy('id', 'desc')->first();

        $nextDocumentNumber = $lastTransaction ? intval(substr($lastTransaction->document_number, -3)) + 1 : 1;
        $formattedDocumentNumber = str_pad($nextDocumentNumber, 3, '0', STR_PAD_LEFT);

        $lastTransaction = TransactionDetail::orderBy('id', 'desc')->first();

        $nextDocumentCode = $lastTransaction ? $this->getNextDocumentCode($lastTransaction->document_code) : 'AAA';

        $existingTransactionDetail = TransactionDetail::where('product_id', $productId)->first();

        $persen = $product->discount / 100;
        $diskon = $persen * $product->price;
        $setelahDiskon = $product->price - $diskon;

        if ($existingTransactionDetail) {
            $existingTransactionDetail->quantity += 1;
            $existingTransactionDetail->sub_total = $existingTransactionDetail->quantity * $product->setelahDiskon;
            $existingTransactionDetail->save();
        } else {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->document_code = $nextDocumentCode;
            $transactionDetail->document_number = $formattedDocumentNumber;
            $transactionDetail->product_id = $product->id;
            $transactionDetail->product_code = $product->product_code;
            $transactionDetail->price = $product->price;
            $transactionDetail->quantity = 1;
            $transactionDetail->unit = $product->unit;
            $transactionDetail->sub_total = $setelahDiskon;
            $transactionDetail->currency = $product->currency;
            $transactionDetail->save();
        }

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    private function getNextDocumentCode($currentDocumentCode)
    {
        $nextDocumentCode = '';
        $numericValue = base_convert($currentDocumentCode, 36, 10);
        $nextNumericValue = $numericValue + 1;
        $nextDocumentCode = base_convert($nextNumericValue, 10, 36);

        return strtoupper($nextDocumentCode);
    }
}
