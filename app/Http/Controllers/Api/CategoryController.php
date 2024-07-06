<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //  index
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'Category successfully retrieved!',
            'data' => $categories,
        ]);
    }

    //  store
    public function store(Request $request){
        $category = Category::insert($request->all());
        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Category successfully created!',
                 'data' => [],
             ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category created failed!',
                'data' => [],
            ]);
        }        
    }

    //  show 
    public function show($id){
        $category = Category::findOrFail($id);
        if($category){
            return response()->json([
               'success' => true,
               'message' => 'Category successfully retrieved!',
                'data' => $category,
            ]);
        } else {
            return response()->json([
               'success' => false,
               'message' => 'Category not found!',
                'data' => [],
            ]);
        }
    }

    //  update
    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        if($category){
            $category->update($request->all());
            return response()->json([
               'success' => true,
               'message' => 'Category successfully updated!',
                'data' => [],
            ]);
        } else {
            return response()->json([
               'success' => false,
               'message' => 'Category not found!',
                'data' => [],
            ]);
        }
    }

    //  destroy
    public function destroy($id){
        $category = Category::findOrFail($id);
        if($category){
            $category->delete();
            return response()->json([
               'success' => true,
               'message' => 'Category successfully deleted!',
                'data' => [],
            ]);
        } else {
            return response()->json([
               'success' => false,
               'message' => 'Category not found!',
                'data' => [],
            ]);
        }
    }


}
