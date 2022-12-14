<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\client;
use App\Models\ClientPost;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::select('id','name','image')->get();
        return responseJson('sucess' , 'posts retrieved successfully' , $posts);
    }

    public function show($id){
     $post = Post::find($id);
     if($post){
     return responseJson('success','post viewed successfully',$post);
     }else{
     return responseJson('failed','post doesnt exist');
     }
    }
    public function categoryPosts($id){
        $category = Category::find($id);
        return responseJson('sucess' , 'posts viewed successfully' , $category->posts);
    }

    public function searchPosts(Request $request){
        $posts = Post::where(
            'name', 'LIKE', '%' . $request->name . '%'
        )->get();
        return responseJson('success','searched posts are viewed successfuly',$posts);
    }

    public function addToFavorite($id){
      $post =  Post::find($id);
      if(!$post){
        return responseJson('validateError','post not found');
      }

       $post =  auth('api')->user()->posts()->find($id);
       if($post){
          auth('api')->user()->posts()->toggle($id);
        return responseJson('success','Post removed successfully');
       }else{
        auth('api')->user()->posts()->toggle($id);
        return responseJson('success','Post Added successfully');
       }
    }
    public function listFavourite(){
        $posts = auth('api')->user()->posts()->paginate();
        return responseJson('success','Your favourite posts viewed successfuly',$posts);

    }
}
