<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_Status;
use Illuminate\Support\Facades\Input;

class ProductStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addProduct_Status()
    {
    	$Product_Status = new Product_Status;
    	$Product_Status->name=Input::get('nama');
    	$Product_Status->details=Input::get('deskripsi');
    	$Product_Status->save();
    	return back();
    }

    public function deleteProduct_Status($id)
    {
    	$Product_Status = Product_Status::find($id);
    	$Product_Status->delete();

    	return back(); 
    }

    public function editProduct_Status()
    {
		$Product_Status = Product_Status::find(Input::get('id'));
    	$Product_Status->name=Input::get('nama');
    	$Product_Status->details=Input::get('deskripsi');
    	$Product_Status->save();
    	return back();
    }
}
