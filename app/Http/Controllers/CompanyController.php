<?php

namespace App\Http\Controllers;

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
}
