<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Shipping_Method;
use App\Member_Status;
use App\Product_Status;
use App\Product;
use App\Member;
use App\Comment;
use App\Notification;

class MonitoringController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function bannedMember($id)
    {
        $Member=Member::find($id);
        $Member->status=3;
        $Member->save();
        
        return back();    
    }

    public function activateMember($id)
    {
        $Member=Member::find($id);
        $Member->status=1;
        $Member->save();
        
        return back();    
    }

    public function toggleMember($id)
    {
        $Member=Member::find($id);
        if($Member->status==1){
            $Member->status=3;
        }else{
            $Member->status=1;
        }
        $Member->save();
        
        return back();    
    }

    public function monitorProduct()
    {
         $Products=Product::where('status','<>',1)->get();
         return view('admin.productsMonitor')->with(compact('Products'));  
    }

    public function activateProduct($id='')
    {
        $Product=Product::find($id);
        $Product->status=1;
        $Product->save();

        $Notification=new Notification;
        $Notification->type=6;
        $Notification->member=$Product->Member->id;
        $Notification->text="Selamat Buku anda ".$Product->judul.' Sudah Aktif!';
        $Notification->save();
        
        return back();
    }

    public function terminateProduct($id='')
    {
        $Product=Product::find($id);
        $Product->status=3;
        $Product->save();
        $Notification=new Notification;
        $Notification->type=7;
        $Notification->member=$Product->Member->id;
        $Notification->text="Maaf Buku anda ".$Product->judul.' Dinonaktifkan!';
        $Notification->save();

        return back();
    }

    public function toggleProduct($id)
    {
        if(Product::find($id)->status!=1){
            $this->activateProduct($id);
        }else{
            $this->terminateProduct($id);
        }
        return back();
    }

    public function monitorComment()
    {
         $Comments=Comment::all();
         return view('admin.commentsMonitor')->with(compact('Comments'));  
    }

    public function toggleComment($id)
    {
        $Comment=Comment::find($id);
        if($Comment->status==1){
            $Comment->status=2;
        }else{
            $Comment->status=1;
        }
        $Comment->save();
        
        return back();    
    }
}
