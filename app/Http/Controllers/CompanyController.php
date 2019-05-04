<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductSupplier;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function company()
    {
        return view('company.index');
    }

    public function supplierProduct()
    {
        $supplierProduct = ProductSupplier::all();
        return view('company.supplierProduct',compact('supplierProduct'));
    }

    public function createOrder($id)
    {
        $productOrder = ProductSupplier::find($id);
        return view('company.productOrder',compact('productOrder'));
    }

    public function orderStore(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'productQuantity' => 'required|integer',
        ]);

        $productOrder = new Order();
        $productOrder->product_id = $request->product_id;
        $productOrder->quantity = $request->productQuantity;
        $productOrder->save();

        return redirect()->route('company');
    }
}
