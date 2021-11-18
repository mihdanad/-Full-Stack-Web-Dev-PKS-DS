<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
   /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table comments
        $comments = Comment::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Comment',
            'data'    => $comments  
        ], 200);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find Comment by ID
        $comments = Comment::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Comment',
            'data'    => $comments 
        ], 200);

    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'content'   => 'required',
            'post_id' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $comment = Comment::create([
            'content'     => $request->content,
            'post_id'     => $request->post_id
        ]);

        //success save to database
        if($comment) {

            return response()->json([
                'success' => true,
                'message' => 'Comment Created',
                'data'    => $comment  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Comment Failed to Save',
        ], 409);

    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $comment
     * @return void
     */
    public function update(Request $request, Comment $comment)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'content'   => 'required',
            'post_id' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find comment by ID
        $comments = Comment::findOrFail($comment->id);

        if($comment) {

            //update comment
            $comment->update([
            'content'     => $request->content,
            'post_id'     => $request->post_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comment Updated',
                'data'    => $comment  
            ], 200);

        }

        //data comment not found
        return response()->json([
            'success' => false,
            'message' => 'Comment Not Found',
        ], 404);

    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find comment by ID
        $comment = Comment::findOrfail($id);

        if($comment) {

            //delete comment
            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comment Deleted',
            ], 200);

        }

        //data comment not found
        return response()->json([
            'success' => false,
            'message' => 'Comment Not Found',
        ], 404);
    }
}
