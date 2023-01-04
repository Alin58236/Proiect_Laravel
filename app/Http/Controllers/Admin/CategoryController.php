<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Validation\Rules\Exists;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        
        $category = new Category();
        if($request->hasFile('image')){

            $file=$request->file('image');
            
            $ext = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$ext;

            $file->move(public_path('assets/uploads/category'),$filename);

            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/dashboard')-> with('status', "Category Added Successfully");
    }


    //for put method
    public function edit($id){

        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }


    public function update(Request $request, $id){

        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            
            $path = 'assets/upload/category/'.$category->image;

            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('assets/uploads/category'),$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('categories')->with('status', "Category updated succesfully");
    }
}
