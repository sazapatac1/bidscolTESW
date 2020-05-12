<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function showList()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Categories";
        $orderBy = 'name';
        $data["categories"] = Category::orderBy($orderBy,'asc')->get();
        return view('category.list')->with("data",$data);
        
    }
    
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create category";
        
        return view('category.create')->with("data",$data);
    }
    
    public function save(Request $request)
    {
        Category::validate($request);            
        Category::create($request->only(["name"]));
            
        return redirect()->route('category.list')->with('success','Category created successfully!');
    }
        
    public function showOne($id)
    {
        $category = Category::findOrFail($id);
        $data['category'] = $category;
        return view('category.show')->with("data",$data);
    }

    public function editOne($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit')->with('category',$category);
    }

    public function update(Request $request)
    {                   
        $category = Category::findOrFail($request->category_id);
        $category->setName($request->name);
        $category->save();
        return redirect()->route('category.list')->with('success','Category edited');
    }

    public function deleteOne($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); 
        return redirect()->route('category.list')->with('success','Category deleted');
    }
}