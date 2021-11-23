<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\CommentStoredEvent;
// use App\Mail\PostAuthorMail;
use Illuminate\Http\Request;

// use App\Mail\CommentAuthorMail;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }


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



        //memanggil event CommentStoredEvent
        event(new CommentStoredEvent($comment));


        //ini yang lama

        // //dikirim kepada yang memiliki post
        // Mail::to($comment->post->user->email)->send(new PostAuthorMail($comment));


        // //dikirim kepada yang memiliki comment atau yang comment di post orang lain
        // Mail::to($comment->user->email)->send(new CommentAuthorMail($comment));


        //success save to database
        if ($comment) {

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

        if ($comment) {

            $user = auth()->user();

            if ($comment->user_id != $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Update Karna data comment bukan milik anda',
                ], 403);
            }

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

        if ($comment) {

            $user = auth()->user();

            if ($comment->user_id != $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Delete Karna data comment bukan milik anda',
                ], 403);
            }

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
