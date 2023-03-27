<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Blog;
use App\Http\Requests\CreateCommentRequest;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::with('category', 'user')->withCount(['comment' => function ($query) {
            $query->where('is_suitable', '1');
        }])->orderBy('created_at' , 'DESC')->paginate(10);
        return view('front.homepage', compact('categories', 'blogs'));
    }

    public function show($id)
    {
        $categories = Category::all();
        $blogs = Blog::with(['category' , 'user','comment' => function ($query) {
            $query->where('is_suitable', '1');
        }])->where('id',$id)->get();

        return view('front.blog', compact( 'categories' , 'blogs'));
    }
    public function blogOfCategory($category_id){
        $categories = Category::all();
        $blogs = Blog::with('category' , 'user')->where('category_id' , $category_id)
        ->orderBy('updated_at', 'DESC')
        ->paginate(10) ;

        return view('front.homepage', compact('blogs' ,'categories'));
    }

}
