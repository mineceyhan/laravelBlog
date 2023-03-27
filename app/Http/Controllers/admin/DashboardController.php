<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
       $user_count = User::where('type' ,'user')->count();
       $blog_count  = Blog::all()->count();
       $category_count = Category::all()->count();

      return view('admin.dashboard', compact('user_count', 'blog_count' ,'category_count'));
    }


   
}
