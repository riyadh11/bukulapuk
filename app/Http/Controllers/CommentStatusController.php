<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment_Status;
use Illuminate\Support\Facades\Input;

class CommentStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addComment_Status()
    {
    	$Comment_Status = new Comment_Status;
    	$Comment_Status->name=Input::get('nama');
    	$Comment_Status->description=Input::get('deskripsi');
    	$Comment_Status->save();
    	return back();
    }

    public function deleteComment_Status($id)
    {
    	$Comment_Status = Comment_Status::find($id);
    	$Comment_Status->delete();

    	return back(); 
    }

    public function editComment_Status()
    {
		$Comment_Status = Comment_Status::find(Input::get('id'));
    	$Comment_Status->name=Input::get('nama');
    	$Comment_Status->description=Input::get('deskripsi');
    	$Comment_Status->save();
    	return back();
    }
}
