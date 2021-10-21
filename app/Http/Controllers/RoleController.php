<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
  //------------ profile -----------------------------
      public function profile($id){
        $profile = DB::table('users')
                    ->join('roles','users.user_role_id','roles.id')
                    ->where('users.id',$id)
                    ->first();
        return response()->json($profile);
      }
  //------------ All Users -----------------------------
      public function allusers(){
        $allusers = DB::table('users')
                      ->join('roles','users.user_role_id','roles.id')
                      ->select('users.*','roles.role_name')
                      ->get();
        return response()->json($allusers);
      }
  //------------ role Insert -----------------------------
      public function roleInsert(Request $request){
        $validatedData = $request->validate([
					'role_name' => 'required|unique:roles|max:55',
				]);

				$data=array();
				$data['role_name']=$request->role_name;
				DB::table('roles')->insert($data);
        return response()->json("Role inserted");
      }
  //------------ show all Roles -----------------------------
      public function allRoles(){
				$allRoles = DB::table('roles')->get();
        return response()->json($allRoles);
      }
  //------------ update Role -----------------------------
      public function updateRole(Request $request, $id){
        $data = array();
        $data['user_role_id']= $request->role_id;

				$role = DB::table('users')->where('id',$id)->update($data);
				//$role = DB::table('users')->where('id',$id)->update(['user_role_id'=>$request->role_id]);
        return response()->json('Role Updated');
      }
}
