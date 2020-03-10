<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function showList()
    {
        $data = []; //to be sent to the view
        $orderBy = 'title';
        $category = Category::orderBy($orderBy,'asc')->get();
        $data["orderBy"] = $orderBy;
        $data["title"] = "List of categories";
        $data["categories"] = $category;
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
        $request->validate([
            "title" => "required",
            ]);
            
            Category::create($request->only(["title"]));
            
            return view('category.save')->with('message','created');
        }
        
        public function showOne($id)
        {
            $category = Category::findOrFail($id);
            $data['category'] = $category;
            return view('category.show')->with("data",$data);
        }

        public function deleteOne($id)
        {
            $data = []; //to be sent to the view
            $category = Category::findOrFail($id);
            $category->delete(); 
            return view('category.save')->with('message','deleted');
        }

        public function editOne($id)
        {
            $category = Category::findOrFail($id);
            return view('category.edit')->with('category',$category);
        }

        public function update(Request $request, $id)
        {                   
            $category = Category::findOrFail($id);
            $category->title = $request->get('title');
            $category->update();
            return view('category.save')->with('message','edit');
        }
}