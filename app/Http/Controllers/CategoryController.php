<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('blogs')->withCount('blogs')->get();
        $blog_count = Category::withCount('blogs')->get();
        return view('user.categoryAll', compact('categories', 'blog_count'));
    }
    public function updatePage($id){  
        $category = Category::find($id);
        return view('user.updateCategory', compact( 'category' ));
    }
    public function create(Request $request){
        $request->validate([
            'name' =>  'required|string',
        ]);
        Category::create([
            'name' => $request->category
        ]);
        return redirect('user/categories');
    }
    public function update(Request $request ,$id){ 
        $request->validate([
            'name' =>  'required|string',
        ]);
        Category::where('id' , $id)
            ->update([ 'name' => $request->name ]);
            return redirect('user/categories');
    }

    public function delete($id){
        $category = Category::find($id);
        if ($category != NULL) {
                $category->delete();
                redirect('user/categoryAll');
        } else {
            return 'Data bulunamamaktadır.';
        }
        return redirect('user/categories');
    }
   
}
