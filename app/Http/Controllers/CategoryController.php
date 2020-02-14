<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $category = new Category;
            $category->name = $data['name'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-category')->with('flash_message_success','등록이 완료 되었습니다.');
        }

        return view('admin.categories.add_category');
    }

    public function viewCategory(){
        $categories = Category::get();
        return view('admin.categories.view_category')->with(compact('categories'));
    }
}
