<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        //prendere dati dall'oggetto request
        $request->validate([
            'name' => 'nullable|string|max:80',
            'content' => 'required| string',
        ]);

        $data = $request->all();
        $data['post_id'] = $post_id;

        //validazione

        //creare commento a db con il model
        $newComment = new Comment();
        $newComment->post_id = $post_id;
        $newComment->name = $data['name'];
        $newComment->content = $data['content'];
        $newComment->save();


        //restituisco una risposta json 
        return $newComment;
    }
}
