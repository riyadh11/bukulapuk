<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Publisher;
use App\Comment;
use App\Member;
use App\Member_Address;
use App\Order_detail;
use App\Shipping;
use App\Order;
use App\Notification;
use App\Shipping_Method;
use App\Payment_Method;
use App\Payment;
use App\Bio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function showAddProduct()
    {
    	$Publishers=Publisher::all();
    	$Categories=Category::all();
        $Member=Member::find(Auth::guard('member')->user()->id);
    	return view('member.addEditProduct')->with(compact('Publishers','Categories','Member'));
    }

    public function showEditProduct($id)
    {
        $Publishers=Publisher::all();
        $Categories=Category::all();
        $Product=Product::find($id);
        $Member=Member::find(Auth::guard('member')->user()->id);
        return view('member.editProduct')->with(compact('Publishers','Categories','Product','Member'));
    }

    public function showProductExplorer()
    {
        $Publishers=Publisher::all();
        $Categories=Category::all();
        $Member=Member::find(Auth::guard('member')->user()->id);
        return view('member.products')->with(compact('Publishers','Categories','Member'));
    }

    public function sendComment()
    {
        if(Input::has('comment')){
            $Member=Member::find(Auth::guard('member')->user()->id);
            $Comment=new Comment;
            $Comment->member=Auth::guard('member')->user()->id;
            $Comment->product=Input::get('id');
            $Comment->commentary=Input::get('comment');
            if($Comment->save()){
                 $Product=Product::find(Input::get('id'));
                 $Notification=new Notification;
                 $Notification->type=8;
                 $Notification->member=$Product->Member->id;
                 $Notification->text=$Member->name." telah berkomentar pada produk ".$Product->judul.".";
                 $Notification->save();
            }
        }
        return back();
    }

    public function showCart()
    {
        $Publishers=Publisher::all();
        $Categories=Category::all();
        $Orders=Order::where('member',Auth::guard('member')->user()->id)->where('status',1)->first();
        if($Orders!=null){
        return view('pages.cart')->with(compact('Publishers','Categories','Orders'));        
        }
        return redirect('/');
    }

    public function showShipping()
    {
        $Publishers=Publisher::all();
        $Categories=Category::all();
        $Payment_Methods=Payment_Method::all();
        $Orders=Order::where('member',Auth::guard('member')->user()->id)->where('status',1)->first();
        $Shipping_Methods=Shipping_Method::all();
        $Last=Member_Address::where('member',Auth::guard('member')->user()->id)->first();
        If($Orders!=null){
            if($Orders->Order_detail->count()>0){
                return view('pages.shipping')->with(compact('Publishers','Categories','Orders','Shipping_Methods','Payment_Methods','Last'));
            }
        }else{
            return redirect('/');
        }
    }

    public function addCart($id)
    {   
             if(Product::find($id)!=null){
                $Member=Member::find(Auth::guard('member')->user()->id);
                $Order=$Member->Order->where('status',1)->first();
                $Address=$Member->Member_Address->first();
                if($Order==null){
                    $Order=new Order;
                    $Order->member=$Member->id;
                    $Order->save();

                    $Shipping=new Shipping;
                    $Shipping->methods=1;
                    $Shipping->address=$Address->id;
                    $Shipping->order=$Order->id;
                    $Shipping->catatan="";
                    $Shipping->resi="";
                    $Shipping->save();
                }
                if($Order->Order_detail->where('product',$id)->first()==null){
                    $Orders=new Order_detail;
                    $Orders->order=$Order->id;
                    $Orders->product=$id;
                    $Orders->quantity=1;
                }else{
                    $Orders=$Order->Order_detail->where('product',$id)->first();
                    if(Product::find($id)->kuantitas>$Orders->quantity+1){
                        $Orders->quantity=$Orders->quantity+1;
                    }
                }
                if($Orders->save()){
                    $Product=Product::find($id);
                    $Notification=new Notification;
                    $Notification->type=2;
                    $Notification->member=$Product->Member->id;
                    $Notification->text=$Member->name." telah memesan ".$Product->judul.".";
                    if($Notification->save()){
                    }
                }
            }
            return back();
    }

    public function removeCart($id)
    {
            if(Product::find($id)!=null){
                $Member=Member::find(Auth::guard('member')->user()->id);
                $Order=$Member->Order->where('status',1)->first();
                if($Order!=null){
                    if($Order->Order_detail->where('product',$id)->first()!=null){
                      $hapus=$Order->Order_detail->where('product',$id)->first();
                      if($hapus->delete()){
                        $Product=Product::find($id);
                        $Notification=new Notification;
                        $Notification->type=4;
                        $Notification->member=$Product->Member->id;
                        $Notification->text=$Member->name." telah membatalkan pesanan ".$Product->judul.".";
                        $Notification->save();
                       }
                    }
                }
            }
         return back();
    }

    public function checkout()
    {
       if(Input::has('alamat_k')){
            $Member=Member::find(Auth::guard('member')->user()->id);
            $Order=$Member->Order->where('status',1)->first();
            if($Order!=null){
             $total=0;
             foreach($Order->Order_detail as $Orders ){
                $Product=$Orders->Product;
                $Product->kuantitas=$Product->kuantitas-$Orders->quantity;
                $Product->save();
                $total=$total + $Orders->Product->harga*$Orders->quantity;
             }
             $Payment=new Payment;
             $Payment->method=Input::get('bayar');
             $Payment->total=Shipping_Method::find(Input::get('kirim'))->first()->price+$total;
             $Payment->save();
             if(Input::get('alamat_k')=='baru'){
                $Member_Address=new Member_Address;
                $Member_Address->member=$Member->id;
                $Member_Address->alamat=Input::get('alamat');
                $Member_Address->telp=Input::get('telp');
                $Member_Address->penerima=Input::get('penerima');
                $Member_Address->email=Input::get('email');
                $Member_Address->save();
             } else{
                $Member_Address=$Member->Member_Address->first();
                $Member_Address->save();
             }
             $Shipping=$Order->Shipping;
             $Shipping->methods=Input::get('kirim');
             $Shipping->catatan=Input::get('catatan');
             $Shipping->resi=Hash::make('catatan'.$Member_Address->email);
             $Shipping->address=$Member_Address->id;
             $Shipping->save();

             $Order->payment=$Payment->id;
             $Order->status=2;
             if($Order->save()){
                    $Notification=new Notification;
                    $Notification->type=9;
                    $Notification->member=$Member->id;
                    $Notification->text="Anda telah berhasil Checkout pada Order #BKL".$Order->id.".";
                    $Notification->save();
             }       
            }
       }
    return back();
    }

    public function showProfile()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        return view('member.profile')->with(compact('Member'));
    }

    public function saveProfile()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $Address=$Member->Member_Address->first();
        $Address->alamat=Input::get('alamat');
        $Address->telp=Input::get('telp');
        $Address->save();
        $Bio=Bio::find($Member->bio);
        var_dump($Bio);
        $Bio->TagLine=Input::get('tagline');
        if(Input::hasFile('avatar'))
        {
            if (ProductController::isFile(Input::file('avatar')))
            {
                $file_path = 'assets/images/users/';
                if (ProductController::isSize((Input::file('avatar'))))
                {
                    $Nfile = (Input::file('avatar')->getClientOriginalname());
                    $file_name = (basename($Nfile));
                    $extension =  (Input::file('avatar')->getClientOriginalExtension());
                    $finalName = ProductController::hashing_name($file_name, $extension, '');
                    if (Input::file('avatar')->move($file_path, $finalName)) 
                    {
                        $Bio->img='/'.$finalName;
                    }
                }
            }
        }
        $Bio->save();
        return back();
    }

    public function readNotification()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $data=[];
        foreach ($Member->Notification as $notification) {
            $notification->check=true;
            if($notification->save()){
                $dataBaru=array('notification'=>$notification->id, 'status'=>$notification->check);
               array_push($data,$dataBaru);
            }
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function showOrder()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        return view('member.order')->with(compact('Member'));
    }

    public function showDetailOrder($id)
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $Orders=Order::find($id);
        if($Orders!=null){
            if($Orders->member===$Member->id){
                return view('member.detailOrder')->with(compact('Member','Orders'));
            }else{
                return redirect('/member/order');
            }
        }else{
            return redirect('/member/order');
        }
    }

    public function showInvoice($id)
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $Orders=Order::find($id);
        if($Orders!=null){
            if($Orders->member===$Member->id){
                return view('member.invoice')->with(compact('Member','Orders'));
            }else{
               return redirect('/member/order');
            }
        }else{
            return redirect('/member/order');
        }
    }

    public function cart()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $Orders=Order::where('member',Auth::guard('member')->user()->id)->where('status',1)->first();
        if($Orders!=null){
        return view('member.cart')->with(compact('Member','Orders'));        
        }
        return redirect('/member/order');
    }

    public function comments()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        return view('member.comment')->with(compact('Member'));        

    }

    public function updateComment()
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $Comment=$Member->Comment->find(Input::get('id'));
        $Comment->commentary=Input::get('komentar');
        $Comment->save();
        return back();
    }

    public function deleteComment($id)
    {
        $Member=Member::find(Auth::guard('member')->user()->id);
        $Comment=$Member->Comment->find($id);
        $Comment->delete();
        return back();
    }
}
