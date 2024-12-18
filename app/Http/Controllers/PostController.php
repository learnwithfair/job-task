<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function create( Request $request ) {
        $validated = $request->validate( array(
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ) );

        $post = Post::create( $validated );
        return response()->json( $post, 201 );
    }

    public function index() {
        $posts = Post::all();
        return response()->json( $posts );
    }

    public function dispaly() {

        return view( 'posts.create' );
    }

    public function show( $id ) {
        $post = Post::findOrFail( $id );
        return response()->json( $post );
    }
}