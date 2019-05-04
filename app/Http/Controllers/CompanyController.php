<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function company()
    {
        $orderedProduct = Order::orderBy('created_at','desc')->paginate(3);

        foreach ($orderedProduct as $op)
        {
            $order = ProductSupplier::find($op->product_id);
            $op->product_order = $order;
        }

        return view('company.index',compact('orderedProduct'));
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
        $product = ProductSupplier::find($request->product_id);
        if ($request->productQuantity > $product->available_product){
            Session::flash('message', 'Ordered products must be less than available products!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        $productOrder = new Order();
        $productOrder->product_id = $request->product_id;
        $productOrder->quantity = $request->productQuantity;
        $productOrder->save();

        return redirect()->route('company');
    }
}
