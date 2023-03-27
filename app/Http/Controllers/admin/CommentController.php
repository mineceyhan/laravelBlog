<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::with('blog')->where('is_suitable' , '0')->get() ;
        return view('admin.commentModerate', compact( 'comments' ) );
    }
    public function activeComment(){
        $comments = Comment::with('blog')->where('is_suitable' , '1')->get() ;
        return view('admin.commentModerate', compact( 'comments' ) );
    }
    public function update($id){
        $comment =  Comment::find($id);
        if($comment->is_suitable == '1'){
            Comment::where('id' , $id)
            ->update([ 
                'is_suitable' => '0'
            ]);
            return redirect('admin/comment');
        }
        else{
            Comment::where('id' , $id)
            ->update([ 
                'is_suitable' => '1'
            ]);
            return redirect('admin/activeComment');
        }
    }

    public function destroy($id){
        $comment = Comment::find($id);
        if ($comment != NULL) {
                $comment->delete();
        } else {
            return 'Data bulunamamaktadır.';
        }
        if($comment->is_suitable == '1'){
            return redirect('admin/activeComment');
        }
        else{
            return redirect('admin/comment');
        }

    }
}
