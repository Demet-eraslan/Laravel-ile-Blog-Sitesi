<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\post\PostModel;

class UsersController extends Controller
{
    public function editProfile($id){
        $user = User::find($id);
        if(auth()->user()){

            if(Auth::user()->id == $user->id){
                return view('users.update-profile', compact('user'));

            }else{
                return abort('404');
            }

        }   else{
            return abort('404');
        }


    }

    public function updateProfile(Request $request, $id){
        $updateProfile = User::find($id);

        Request()->validate([
            'name'=> 'required|max:30',
            'email'=> 'required|max:50',
            'bio'=> 'required|max:300',

        ]);


        $updateProfile->update($request->all());

        if($updateProfile){
            return redirect('posts/index')->with('update.user','Kullanıcı Başarıyla Güncellendi');
        }
    }

    public function profile($id){
        $profile = User::find($id);
        $latestPosts = PostModel::where('user_id', $id)->take(4)->orderBy('created_at','desc')->get();

        return view('users.profile', compact('profile','latestPosts'));
    }

}
