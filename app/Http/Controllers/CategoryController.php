<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function AddCat(Request $request){

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'category must be less than 255 chars',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Inserted Successfully');

    }

    public function DeleteCat(Request $request){

        $delete = Category::where('id',  $request->id)->Delete();
       
        return Redirect()->back()->with('success','Category Deleted Successfully');

        

    }

    public function Editcat($id){

        $categories = DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('categories'));

    }

    public function UpdateCat(Request $request, $id){

        $data = [];
        $data['category_name'] = $request->category_name;
    
        DB::table('categories')->where('id',$id)->update( $data);

        return Redirect()->route('all.category')->with('success','Category Updated Successfully');

    }



}
