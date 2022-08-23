<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $data = Post::all();
        return $data;
    }

    public function create(Request $request)
    {
        $post = Post::create([
            "title" => $request->title,
            "image" => $request->image,
            "description" => $request->description
        ]);
        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::find($id);
        // $comments = $post->comment;


        if (is_null($post)) {
            return response()->json([
                "message" => 'Такого поста не существует'
            ], 404);
        }

        return response($post, 200);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return response()->json([
                "message" => 'Такого поста не существует'
            ], 404);
        }

        $post->title = $request->title;
        $post->image = $request->image;
        $post->description = $request->description;
        $post->save();
        return response()->json($post, 201);
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('Пост удален');
    }
}
