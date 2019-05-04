<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductSupplier::orderBy('created_at','desc')->paginate(3);

        return view('supplier.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request);
        $this->validate($request, [
            'productName' => 'required',
            'productCode' => 'required',
            'productPrice' => 'required|integer',
            'availableProduct' => 'required',
            'productImage' => 'required|mimes:jpeg,jpg,png,bmp,tiff.PNG |max:4096'
        ]);
        $image = $request->file('productImage');
        $slug = str_slug($request->productName);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('storage/productImage')) {
                mkdir('storage.productImage', 0777, true);
            }
            $image->move('storage/productImage', $imagename);
        } else {
            $imagename = "default.jpg";
        }

        $user = auth()->user();
        $products = new ProductSupplier();
        $products->product_name = $request->productName;
        $products->product_code = $request->productCode;
        $products->product_price = $request->productPrice;
        $products->available_product = $request->availableProduct;
        $products->product_image = $imagename;
        $products->save();

        return redirect()->route('productSupplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSupplier  $productSupplier
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSupplier $productSupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSupplier  $productSupplier
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSupplier $productSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSupplier  $productSupplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSupplier $productSupplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSupplier  $productSupplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSupplier $productSupplier)
    {
        //
    }

    public function orderList()
    {
        $orderList = Order::orderBy('created_at','desc')->paginate(3);
        foreach ($orderList as $ol)
        {
            $order = ProductSupplier::find($ol->product_id);
            $ol->order_list = $order;
        }
        return view('supplier.orderList',compact('orderList'));
    }

    public function orderDelivery($id)
    {
//        dd($id);
        $deliveryStatus = Order::find($id);
        $deliveryStatus->is_delivered = true;
        $deliveryStatus->save();

        $product = ProductSupplier::find($deliveryStatus->product_id);
        $product->available_product-=$deliveryStatus->quantity;
        $product->update();

        return back();
    }
}
