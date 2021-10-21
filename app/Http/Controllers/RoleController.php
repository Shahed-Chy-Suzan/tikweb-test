<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
  //------------ profile -----------------------------
      public function profile($id){
        $profile = DB::table('users')->where('id',$id)->first();
        return response()->json($profile);
      }
}
