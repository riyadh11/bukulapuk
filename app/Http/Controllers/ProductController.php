<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Product_Meta;
use App\Product_Image;
use Validator;
use Redirect;
use Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function AddProduct()
    {       
            $image=false;
			$product=New Product;    		
    		$product->judul=Input::get('nama_produk');
    		$product->description=Input::get('deskripsi');
    		$product->member=Auth::guard('member')->user()->id;
    		$product->category=Input::get('kategori');
    		$product->penerbit=Input::get('penerbit');
    		$product->tahun_terbit=Input::get('tahun_terbit');
    		$product->harga=Input::get('harga');
    		$product->kuantitas=Input::get('kuantitas');
    		if(Input::get('status')>1){
    		$product->status=Input::get('status');	
    		}else{
    		$product->status=2;	
    		}
             if(Input::hasFile('image')){
                if ($this->isFile(Input::file('image'))) {
                $file_path = 'assets/images/products/';
                if ($this->isSize((Input::file('image')))) {
                    $Nfile = (Input::file('image')->getClientOriginalname());
                    $file_name = (basename($Nfile));
                    $extension =  (Input::file('image')->getClientOriginalExtension());
                    $finalName = $this->hashing_name($file_name, $extension, $file_path);
                    if (Input::file('image')->move($file_path, $finalName)) {
                        $product->img_main='/'.$finalName;
                        $image=true;
                    }
                }
            }
             }

    		$product->save();
    		
    		$meta=New Product_Meta;
    		$meta->product=$product->id;
    		$meta->title=Input::get('metaTitle');
    		$meta->keywords=Input::get('metaKeywords');
    		$meta->description=Input::get('metaDescription');
    		$meta->save();

    		$data=array('status'=>404,'current_id'=>'-1');
    		header('Content-Type: application/json');    		
    		if($meta->save()){
    			$data['status']=200;
    			$data['current_id']=$product->id;
    		}
    		echo json_encode($data);
            if($image){
                return redirect('/member/products/edit/'.$product->id);
            }
    }

    public function editProduct()
    {
            $image=false;
			$data=array('status'=>404,'current_id'=>'-1');
            if(Product::find(Input::get('id'))!= null and Product::find(Input::get('id'))->member=Auth::guard('member')->user()->id){
            $product=Product::find(Input::get('id'));           
            $product->judul=Input::get('nama_produk');
            $product->description=Input::get('deskripsi');
            $product->member=Auth::guard('member')->user()->id;
            $product->category=Input::get('kategori');
            $product->penerbit=Input::get('penerbit');
            $product->tahun_terbit=Input::get('tahun_terbit');
            $product->harga=Input::get('harga');
            $product->kuantitas=Input::get('kuantitas');
            if($product->status==1){
              $product->status=1;
            }else{
              $product->status=2;         
            }
             if(Input::hasFile('image')){
                if ($this->isFile(Input::file('image'))) {
                $file_path = 'assets/images/products/';
                if ($this->isSize((Input::file('image')))) {
                    $Nfile = (Input::file('image')->getClientOriginalname());
                    $file_name = (basename($Nfile));
                    $extension =  (Input::file('image')->getClientOriginalExtension());
                    $finalName = $this->hashing_name($file_name, $extension, $file_path);
                    if (Input::file('image')->move($file_path, $finalName)) {
                        $product->img_main='/'.$finalName;
                        $image=true;
                    }
                }
            }
             }        
            $product->save();

            $meta=$product->Product_Meta;
            $meta->title=Input::get('metaTitle');
            $meta->keywords=Input::get('metaKeywords');
            $meta->description=Input::get('metaDescription');
            $meta->save();
            if($product->save()){
                $data['status']=200;
                $data['current_id']=$product->id;
            }
            }
    		   		
            header('Content-Type: application/json');
    		echo json_encode($data);
            
            if($image){
                return redirect('/member/products/edit/'.$product->id);
            }
    }

    public function deleteProduct()
    {
			$data=array('status'=>404,'current_id'=>'-1');
            header('Content-Type: application/json');
            if(Product::find(Input::get('id'))!= null and Product::find(Input::get('id'))->member=Auth::guard('member')->user()->id){
            $product=Product::find(Input::get('id'));
    		if($product->delete()){
    			$data['status']=200;
    		}}
    		echo json_encode($data);
    }

    public function deleteC($id)
    {
            if(Product::find($id)!= null and Product::find($id)->member=Auth::guard('member')->user()->id){
            $product=Product::find($id);
            if($product->delete()){
              
            }}
            return back();
    }


    public static function isFile($file) 
    {
        $flag = true;
        $type = $file->getClientMimeType();
        if (!in_array($type,['image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png',
        'image/bmp'])) {
            $flag = false;
        }
        return $flag;
    }

    public static function hashing_name($file_name, $extension, $file_path) 
    {
        do {
            $file_name.=(date('Y-m-d H:i:s'));
            $file_name = hash('sha512', $file_name) . "." . $extension;
        } while (file_exists($file_path . $file_name));

        $file_path.= $file_name;
        return $file_path;
    }

    public static function isSize($file) 
    {
        $flag = true;
        $size= $file->getClientSize();
        if (( $size >= 200000000) || ($size == 0)) {
            $flag = false;
        }
        return $flag;
    }

}
