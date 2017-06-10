<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Product_Image;
use App\Publisher;
use App\Member;
use DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function showHome()
    {
    	$Latests=Product::where('status',1)->orderBy('id','DESC')->paginate(4);
    	$MostBuys=Product::where('status',1)->orderBy('id','DESC')->paginate(4);
    	$Categories=Category::all();
    	return view('pages.home')->with(compact('Latests','MostBuys','Categories'));
    }
    
    public function showProduct($id)
    {
    	$Categories=Category::all();
    	$Publishers=Publisher::all();
    	$Product=Product::find($id);
        if($Product==null or $Product->status!=1 or $Product->Member->status !=1){
            return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{
        return view('pages.products')->with(compact('Product','Publishers','Categories'));    
        }
    }

    public function showCategory($id)
    {
        $Categories=Category::all();
        $Publishers=Publisher::all();
        $Details=Category::find($id);
        if($Details==null){
             return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{

        return view('pages.category')->with(compact('Publishers','Categories','Details'));    
        }
    }

    public function showPublishers($id)
    {
        $Categories=Category::all();
        $Publishers=Publisher::all();
        $Details=Publisher::find($id);
        if($Details==null){
             return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{

        return view('pages.category')->with(compact('Publishers','Categories','Details'));    
        }
    }
    
    public function showMember($id)
    {
        $Categories=Category::all();
        $Publishers=Publisher::all();
        $Details=Member::find($id);
        if($Details==null){
             return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{

        return view('pages.category')->with(compact('Publishers','Categories','Details'));    
        }
    }

    public function showBrowse()
    {
        $Categories=Category::all();
        $Publishers=Publisher::all();
        $Details=Product::where('status',1)->get();
        if($Details==null){
             return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{

        return view('pages.browse')->with(compact('Publishers','Categories','Details'));    
        }
    }

    public function showSearch($search)
    {
        $Categories=Category::all();
        $Publishers=Publisher::all();
        $Details=Product::where('judul','like','%'.$search.'%')->get();
        if($Details==null){
             return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{

            return view('pages.browse')->with(compact('Publishers','Categories','Details'));    
        }
    }

    public function search()
    {
        $search=Input::get('search');
        $Categories=Category::all();
        $Publishers=Publisher::all();
        $Details=Product::where('judul','like','%'.$search.'%')->get();
        if($Details==null or ($Details->count()==1 and $Details[0]->Member->status!=1)){
             return view('pages.notfounds')->with(compact('Publishers','Categories'));    
        }else{
            return view('pages.browse')->with(compact('Publishers','Categories','Details'));    
        }
    }

    public function notfounds()
    {
        $Categories=Category::all();
        $Publishers=Publisher::all();
        return view('pages.notfounds')->with(compact('Publishers','Categories'));    
    }

}
