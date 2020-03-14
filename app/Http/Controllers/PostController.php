<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;


class PostController extends Controller
{
    //Write post
    public function writePost()
    {
        $category= DB::table('categories')->get();
        return view('post.write_post',compact('category'));
    }

    //Store post
    public function storePost(Request $request){

        $validatedData= $request->validate([
            'title'=> 'required|max:200',
            'details'=> 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,JPG|max:1000',

        ]);

        $data= array();
        $data['title']= $request->title;
        $data['category_id']= $request->category_id;
        $data['details']= $request->details;
        $image=$request->file('image');

        if($image){
            $image_name= hexdec(uniqid());
            $ext= strtolower($image->getClientOriginalExtension());
            $img_full_name= $image_name.'.'.$ext;
            $upload_path= 'public/frontend/image/';
            $image_url= $upload_path.$img_full_name;
            $success= $image->move($upload_path, $img_full_name);

            $data['image']= $image_url;
            DB::table('posts')->insert($data);

            $notification= array(
                'message'=> 'Successfully done',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{

            DB::table('posts')->insert($data);

            $notification= array(
                'message'=> 'Ha ha whatever you have done it proves you are a moron! Go back to sleep.You shitty ',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    //View all post
    public function allPost(){

        //$post= DB::table('posts')->get();
        $post=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();
        return view('post.allPostView',compact('post'));
    }

    //View/Read post(Details view of a specific post or )

        public function viewPost($id){

            $post=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id',$id)
            ->get();
            
            //return response()->json($post);
            return view('post.viewPostDetails', compact('post'));

    }

    //Edit post(Details view of a specific post or )
    public function editPost($id){

        $category= DB::table('categories')->get();
        $post= DB::table('posts')->where('id',$id)->first();

        return view('post.editPost',compact('category','post'));
    }


    //Delete post
    public function deletePost($id){

        $post=DB::table('posts')->where('id',$id)->first();
        $image= $post->image;
        
        $delete= DB::table('posts')->where('id',$id)->delete();

        if($delete){
            unlink($image);
            
            $notification= array(
                'message'=> 'Successfully deleted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification= array(
                'message'=> 'Something went wrong',
                'alert-type'=>'eror'
            );
            return Redirect()->back()->with($notification);
        }
    }






    //Update post
    public function updatePost(Request $request, $id){

        $validatedData= $request->validate([
            'title'=> 'required|max:200',
            'details'=> 'required',
            'image'=> 'mimes:jpeg,jpg,png,JPG|max:1000',

        ]);

        $data= array();
        $data['title']= $request->title;
        $data['category_id']= $request->category_id;
        $data['details']= $request->details;
        $image=$request->file('image');

        if($image){
            $image_name= hexdec(uniqid());
            $ext= strtolower($image->getClientOriginalExtension());
            $img_full_name= $image_name.'.'.$ext;
            $upload_path= 'public/frontend/image/';
            $image_url= $upload_path.$img_full_name;
            $success= $image->move($upload_path, $img_full_name);
            $data['image']= $image_url;

            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);

            $notification= array(
                'message'=> 'Successfully updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
        else{
            $data['image']= $request->old_photo;

            DB::table('posts')->where('id',$id)->update($data);

            $notification= array(
                'message'=> 'Successfully updated ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
    }

    



    
}
