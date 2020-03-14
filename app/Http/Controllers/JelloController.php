<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\DB;

class JelloController extends Controller
{
   

    //Add category
    public function addCategory()
    {
        return view('post.add_category');
    }

    //Store category
    public function storeCategory(Request $request)
    {
        $data= array();
        $data['name']= $request->categoryname;
        $data['slug']= $request->slugname;

        $category= DB::table('categories')->insert($data);

        if ($category) {
            $notification= array(
                'message'=> 'Successfully done', 'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        } else {
            $notification= array(
                'message'=> 'Something wrong', 'alert-type'=>'error'
            );
            return Redirect()->route('all.category')->with($notification);
        }
    }



    //Show all category
    public function allCategory()
    {
        $category= DB::table('categories')->get();
        //return response()->json($category);

        return view('post.all_category', compact('category'));
    }

    //View category( One by one )
    public function viewCategory($id)
    {
        $view=DB::table('categories')->where('id', $id)->first();
        //return response()->json($view);

        return view('post.categoryView')->with('cat', $view);
    }

    //Delete category( A specific category )
    public function deleteCategory($id)
    {
        $delete=DB::table('categories')->where('id', $id)->delete();

        $notification= array(
            'message'=> 'Successfully deleted', 'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Edit category( A specific category )
    public function editCategory($id)
    {
        $edit=DB::table('categories')->where('id', $id)->first();
        return view('post.edit_category', compact('edit'));
    }

    //Update category( A specific category )
    public function updateCategory(Request $request, $id)
    {
        {
            $data= array();
            $data['name']= $request->categoryname;
            $data['slug']= $request->slugname;
    
            $category= DB::table('categories')->where('id', $id)->update($data);
    
            if ($category) {
                $notification= array(
                    'message'=> 'Successfully updated data', 'alert-type'=>'success'
                );
                return Redirect()->route('all.category')->with($notification);
            } else {
                $notification= array(
                    'message'=> 'Nothing to update', 'alert-type'=>'error'
                );
                return Redirect()->route('all.category')->with($notification);
            }
    }
    }




    
}