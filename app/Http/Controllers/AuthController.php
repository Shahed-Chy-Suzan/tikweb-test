<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    //-----------
use DB;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);      //------was default------
        //$this->middleware('auth:api', ['except' => ['login','signup']]);     //-------------
        $this->middleware('JWT', ['except' => ['login','signup']]);     //-------------
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:4'],
        ]);

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or Password is Invalid'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    public function signup(Request $request)    //---------------------------
    {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        DB::table('users')->insert($data);

        return $this->login($request);      //------------------------
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([           //---------------------------
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'name'         => auth()->user()->name,             //--OR-- Auth::user()->name
            'user_id'      => auth()->user()->id,
            'email'        => auth()->user()->email,            //-- Auth::user()->email
        ]);
    }


  //------------ Not Working frontend-----------------------------
    // public function updatePassword(Request $request)
    // {
    //   $password=Auth::user()->password;
    //   $oldpass=$request->oldpass;
    //   $newpass=$request->password;
    //   $confirm=$request->password_confirmation;
    //   if (Hash::check($oldpass,$password)) {
    //        if ($newpass === $confirm) {
    //                   $user=User::find(Auth::id());
    //                   $user->password=Hash::make($request->password);
    //                   $user->save();
    //                   Auth::logout();
    //                   $notification=array(
    //                     'message'=>'Password Changed Successfully ! Now Login with Your New Password',
    //                     'alert-type'=>'success'
    //                      );
    //                    return Redirect()->route('login')->with($notification);
    //              }else{
    //                  $notification=array(
    //                     'message'=>'New password and Confirm Password not matched!',
    //                     'alert-type'=>'error'
    //                      );
    //                    return Redirect()->back()->with($notification);
    //           }
    //   }else{
    //     $notification=array(
    //             'message'=>'Old Password not matched!',
    //             'alert-type'=>'error'
    //              );
    //            return Redirect()->back()->with($notification);
    //   }

    // }

}
