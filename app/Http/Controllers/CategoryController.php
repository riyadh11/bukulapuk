<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addCategory()
    {
    	$Category = new Category;
    	$Category->name=Input::get('nama');
    	$Category->description=Input::get('deskripsi');
    	$Category->save();
    	return back();
    }

    public function deleteCategory($id)
    {
    	$Category = Category::find($id);
    	$Category->delete();

    	return back(); 
    }

    public function editCategory()
    {
		$Category = Category::find(Input::get('id'));
    	$Category->name=Input::get('nama');
    	$Category->description=Input::get('deskripsi');
    	$Category->save();
    	return back();
    }
}
