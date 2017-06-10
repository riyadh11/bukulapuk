<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Shipping_Method;
use App\Payment_Method;
use App\Member_Status;
use App\Product_Status;
use App\Comment_Status;
use App\Product;
use App\Member;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showProductExplorer()
    {
    	$Products =Product::all();
    	return view('admin.productExplorer')->with(compact('Products'));
    }

    public function showConfigurationCategories()
    {
    	$Categories =Category::all();
    	return view('admin.categoriesConfiguration')->with(compact('Categories'));
    }

    public function showConfigurationShippings()
    {
    	$Shippings =Shipping_Method::all();
    	return view('admin.shippingConfiguration')->with(compact('Shippings'));
    }

    public function showConfigurationProducts()
    {
    	$Product_Statuses =Product_Status::all();
    	return view('admin.productsConfiguration')->with(compact('Product_Statuses'));
    }   

    public function showConfigurationUsers()
    {
        $Member_Statuses =Member_Status::all();
        return view('admin.usersConfiguration')->with(compact('Member_Statuses'));
    }

    public function showConfigurationComments()
    {
        $Comment_Statuses=Comment_Status::all();
        return view('admin.commentsConfiguration')->with(compact('Comment_Statuses'));
    }

    public function showConfigurationPayments()
    {
        $Payment_Methods=Payment_Method::all();
        return view('admin.paymentsConfiguration')->with(compact('Payment_Methods'));
    }

    public function showProductFilter($cat,$filter)
    {
        switch ($cat) {
            case 'categories':
                $Products=Category::find($filter);
                if($Products==null){
                    return view('admin.home');
                }
                return view('admin.showProduct')->with(compact('Products'));  
                break;

            case 'status':
                $Products=Product_Status::find($filter);
                if($Products==null){
                    return view('admin.home');
                }
                return view('admin.showProduct')->with(compact('Products'));  
                break;

            case 'member_status':
                $Status=Member_Status::find($filter);
                if($Status==null){
                    return view('admin.home');
                }
                return view('admin.showMember')->with(compact('Status'));  
                break;

            default:
                 return view('admin.home');       
                break;
        }
    
    }

    public function showProducts($id='')
    {
        $Products=Product::find($id);
        if($Products==null){
            return redirect('/admin/products');
        }else{
            return view('admin.productsShow')->with(compact('Products')); 
        }
    }
         
}
