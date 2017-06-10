<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment_Method;
use Illuminate\Support\Facades\Input;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addPayment_Method()
    {
    	$Payment_Method = new Payment_Method;
    	$Payment_Method->name=Input::get('nama');
    	$Payment_Method->description=Input::get('deskripsi');
    	$Payment_Method->save();
    	return back();
    }

    public function deletePayment_Method($id)
    {
    	$Payment_Method = Payment_Method::find($id);
    	$Payment_Method->delete();

    	return back(); 
    }

    public function editPayment_Method()
    {
		$Payment_Method = Payment_Method::find(Input::get('id'));
    	$Payment_Method->name=Input::get('nama');
    	$Payment_Method->description=Input::get('deskripsi');
    	$Payment_Method->save();
    	return back();
    }
}
