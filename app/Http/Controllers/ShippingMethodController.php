<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping_Method;
use Illuminate\Support\Facades\Input;

class ShippingMethodController extends Controller
{
        public function __construct()
    {
        $this->middleware('admin');
    }

    public function addShipping_Method()
    {
    	$Shipping_Method = new Shipping_Method;
    	$Shipping_Method->name=Input::get('nama');
    	$Shipping_Method->description=Input::get('deskripsi');
    	$Shipping_Method->price=Input::get('harga');
    	$Shipping_Method->save();
    	return back();
    }

    public function deleteShipping_Method($id)
    {
    	$Shipping_Method = Shipping_Method::find($id);
    	$Shipping_Method->delete();

    	return back(); 
    }

    public function editShipping_Method()
    {
		$Shipping_Method = Shipping_Method::find(Input::get('id'));
    	$Shipping_Method->name=Input::get('nama');
    	$Shipping_Method->description=Input::get('deskripsi');
    	$Shipping_Method->price=Input::get('harga');
    	$Shipping_Method->save();
    	return back();
    }
}
