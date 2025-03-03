<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
   public function getlist()
   {
   		$data = User::paginate(10);
    	return view('back-end.users.list',['data'=>$data]);
   }
   public function getedit($id)
   {
   		$data = User::where('id',$id)->first();
   		return view('back-end.users.edit',['data'=>$data]);
   }
   public function getdel($id)
    {
       $new = User::find($id);
       $new->delete();
       return redirect()->back()
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
    }
}
