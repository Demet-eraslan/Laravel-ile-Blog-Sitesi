<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post\PostModel;
use App\Models\post\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use App\Models\post\Comment;
use Illuminate\Support\Facades\Auth;



class PostsController extends Controller
{
    public function index(){

        //first section
        $posts = PostModel::all()->take(2);
        $postOne = PostModel::take(1)->orderBy('id','desc')->get();
        $postTwo = PostModel::take(2)->orderBy('title','desc')->get();

        //business section
        $postBus = PostModel::where('category', 'Business')->take(2)->orderBy('id','desc')->get();
        $postBusTwo = PostModel::where('category', 'Business')->take(3)->orderBy('title', 'desc')->get();

        //random posts section
        $randomPosts = PostModel::take(4)->orderBy('category', 'desc')->get();

        //culture section
        $postCulture = PostModel::where('category', 'Culture')->take(2)->orderBy('id','desc')->get();
        $postCultureTwo = PostModel::where('category', 'Culture')->take(3)->orderBy('category','desc')->get();

        //politics section
        $postPolitics = PostModel::where('category', 'Politics')->take(9)->orderBy('created_at','desc')->get();

        //travel section
        $postTravel = PostModel::where('category', 'Travel')->take(1)->orderBy('title','desc')->get();
        $postTravelOne = PostModel::where('category', 'Travel')->take(1)->orderBy('id','desc')->get();
        $postTravelTwo = PostModel::where('category', 'Travel')->take(2)->orderBy('description','desc')->get();




        return view('posts.index', 
        compact('posts', 'postOne', 'postTwo', 'postBus', 'postBusTwo', 'randomPosts','postCulture', 'postCultureTwo','postPolitics','postTravel','postTravelOne','postTravelTwo'));
    }

    public function single($id){

        $single= PostModel::find($id);
        $user = User::find($single->user_id);

        $pupPosts = PostModel::take(3)->orderBy('id','desc')->get();

        $categories = DB::table('categories')
            ->join('posts','posts.user_id', '=', 'categories.id')
            ->select('categories.name AS name','categories.id AS id','posts.user_id AS user_id', DB::raw('COUNT(posts.user_id) AS total'))
            ->groupBy('posts.user_id')
            ->get(); 

        //grabbing comments
        $comments = Comment::where('post_id', $id)->get();
        $commentNum = $comments->count();

        $moreBlogs = PostModel::where('category', $single->category)
        ->where ('id', '!=', $id)
        ->take(4)
        ->get();



        return view('posts.single', compact('single', 'user','pupPosts','categories','comments','moreBlogs', 'commentNum'));

    }

    public function storeComment(Request $request){

        $insertComment = Comment::create([
            "comment"=> $request->comment,
            "user_id"=> Auth::user()->id,
            "user_name"=> Auth::user()->name,
            "post_id"=> $request->post_id,
        ]);

        return redirect('/posts/single/'.$request->post_id.'')->with('success', 'Yorum Başarıyla Eklendi');
    }

    public function CreatePost(){

        $categories = Category::all();
        if(auth()->user()){
            return view('posts.create-post', compact('categories'));

        }else{
            return abort('404');
        }

    }

    public function storePost(Request $request){

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $insertPost = PostModel::create([
            "title" => $request->title,
            "category" => $request->category,
            "user_id" => Auth::user()->id,
            "user_name" => Auth::user()->name,
            "description" => $request->description,
            "image" => $myimage
        ]);
       

        return redirect('/posts/create-post')->with('success','Gönderi Başarıyla Eklendi');

    }

    public function deletePost($id){
        
    $deletePost = PostModel::find($id);
    $deletePost -> delete();

    return redirect('/posts/index')->with('delete','Gönderi Başarıyla Silindi');

    }

    public function editPost($id){
        $single = PostModel::find($id);
        $categories = Category::all();

        if(auth()->user()){

            if(Auth::user()->id == $single->user_id){
                return view("posts.edit-post", compact('single','categories'));
            }else{
                return abort('404');
            }

        }
         
    }

    public function updatePost(Request $request, $id){

        $updatePost = PostModel::find($id);
        $updatePost->update($request->all());

        Request()->validate([
            'title' => 'required|max:200',
            'category' => 'required',
            'description' => 'required|2000',
        ]);

        if($updatePost){
            return redirect('/posts/single/ '.$updatePost->id.'')->with('update','Gönderi Başarıyla Güncellendi');
        }
    }
    public function search(Request $request){

        $search = $request->get('search');

        $results = PostModel::select()->where('title', 'like', "%$search%" )->get();

        return view('posts.search', compact('results'));
    }

    public function contact(){

        return view('pages.contact');
    }

    public function about(){

        return view('pages.about');
    }
}
