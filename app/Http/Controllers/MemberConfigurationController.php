<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member_Status;
use Illuminate\Support\Facades\Input;

class MemberConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addMember_Status()
    {
    	$Member_Status = new Member_Status;
    	$Member_Status->name=Input::get('nama');
    	$Member_Status->description=Input::get('deskripsi');
    	$Member_Status->save();
    	return back();
    }

    public function deleteMember_Status($id)
    {
    	$Member_Status = Member_Status::find($id);
    	$Member_Status->delete();

    	return back(); 
    }

    public function editMember_Status()
    {
		$Member_Status = Member_Status::find(Input::get('id'));
    	$Member_Status->name=Input::get('nama');
    	$Member_Status->description=Input::get('deskripsi');
    	$Member_Status->save();
    	return back();
    }
}
