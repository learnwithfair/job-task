<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    // User Registration API
    public function register( Request $request ) {
        // Validate input
        $validator = Validator::make( $request->all(), array(
            'name'     => 'required|string|min:3',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ) );

        if ( $validator->fails() ) {
            return response()->json( array( 'errors' => $validator->errors() ), 422 );
        }

        // Create user
        $user = User::create( array(
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make( $request->password ),
        ) );

        // Return response excluding password
        return response()->json( array(
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'created_at' => $user->created_at,
        ), 201 );
    }
    public function dispaly() {

        return view( 'auth.register' );
    }
}
