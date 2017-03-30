<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function login(Request $request) {
        $this->validate($request, [
           'email' => 'bail|required|email',
           'password' => 'required'
        ]);

       $data = User::userLogin($request->input('email'),$request->input('password'));
       if (!empty($data)) {
           $response = $data;
           $status_code = 200;
       } else {
           $response = ['error' => 'Wrong username or password'];
           $status_code = 401;
       }

       return response()->json($response,$status_code);
    }

    public function profile($id = null) {
        try {
            $data = User::find($id);
            $response = $data;
            $status_code = 200;
        } catch (\Exception $e) {
            $response = ['error' => $e->getMessage()];
            $status_code = $e->getCode();
        }
        return response()->json($response,$status_code);
    }
}
