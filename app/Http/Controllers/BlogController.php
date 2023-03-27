<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Auth;
use Mail;
use App\Mail\CommentMail;



class BlogController extends Controller
{
    public function index(){
        $categories = Category::all()->toArray();
        $blogs = Blog::with('category', 'user' ,'comment')->where('user_id' , Auth::id())
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);

      return view('user.myBlogAll', compact('categories', 'blogs'));
    }
    public function blogAll(){
        $categories = Category::all()->toArray();
        $blogs = Blog::with('category', 'user')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

      return view('user.BlogAll', compact('categories', 'blogs'));
    }

    public function searchBlogs(Request $request){
        $blogs =  Blog::with('category')->where('title' , 'LIKE' ,'%'.$request->search.'%')
        ->orderBy('updated_at', 'DESC')
        ->paginate(10);
        $categories = Category::all();
   
        return view('user.blogAll', compact('blogs' ,'categories'));
      }

      public function searchBlogOfCategory(Request $request){
        $category =  Category::where('name' , 'LIKE' ,'%'.$request->search.'%')->get()->first();
        $categories = Category::all();
        if($category == NULL){
            return redirect("user/blogAll");
        }
        $blogs = Blog::where('category_id' , $category->id)->orderBy('updated_at', 'DESC')
        ->paginate(10);
        return view('user.blogAll', compact('blogs' ,'categories'));
      }
    
    public function show($id){ //Blof Detail
        $categories = Category::all();
        $blogs = Blog::with(['category' , 'user','comment' => function ($query) {
            $query->with('user')->where('is_suitable', '1');
        }])->where('id' , $id)
        ->orderBy('updated_at', 'DESC')
        ->paginate(10);

        return view('user.blogDetail', compact('blogs','categories'));
    }

    public function createPage(){  
        $categories = Category::all();
        return view('user.createBlog', compact( 'categories'));
    }
    
    public function updatePage($id){  
        $categories = Category::all();
        $blog = Blog::find($id);
        return view('user.updateBlog', compact( 'categories' ,'blog'));
    }

    public function create(Request $request){
        
        $request->validate([
            'title' =>  'required|string',
             'image' =>'required|image|mimes:jpeg,png,jpg|max:3000',
            'content' => 'required|string',
            'category_id' => 'required'
        ]);
        if($request->hasFile('image')){
            $imgName = str_slug($request->title). '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads') ,$imgName);
        }
        Blog::create([
            'user_id' => Auth::id(),
            'title' => $request->title ,
            'content' => $request->content ,
            'image' =>'uploads/'.$imgName,
            'category_id' => $request->category_id
        ]);
        return redirect('user/blogs');
    }

    public function update(UpdateBlogRequest $request ,$id){

        $request->validate([
            'title' =>  'required|string',
             'image' =>'required|image|mimes:jpeg,png,jpg|max:3000',
            'content' => 'required|string',
            'category_id' => 'required'
        ]);

        if($request->hasFile('image')){
            $imgName = str_slug($request->title). '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads') ,$imgName);
        }
        Blog::where('id' , $id)
        ->update([ 
            'title' => $request->title ,
            'content' => $request->content ,
             'image' =>'uploads/'.$imgName,
            'category_id' => $request->category_id 
        ]);
        return redirect('user/blogs');
    }
 

    public function createComment(Request $request, $blog_id){
        $request->validate([
            'content' => 'required|string',
        ]);
        Comment::create([
            'blog_id' => $blog_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        $mail_data = [
            'title' => 'Yeni Yorum Eklendi! En kısa zamanda denetlemelisin.',
            'body' => $request->content,
        ];
        Mail::to('ceyhanmine695@gmail.com')->send(new CommentMail($mail_data));

        return redirect('user/blogs/'. $blog_id);
    }

    public function destroy($id){
        $blog = Blog::find($id);
        if ($blog != NULL) {
                $blog->delete();
        } else {
            return 'Data bulunamamaktadır.';
        }
        return redirect('user/blogs');

    }
}
