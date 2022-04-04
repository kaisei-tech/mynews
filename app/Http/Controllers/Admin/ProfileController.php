<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

use App\Update;

use Carbon\Carbon;


class ProfileController extends Controller
{
  public function add()
  {
      return view('admin.profile.create');
  }

  public function create(Request $request)
  {

      // Varidationをおこなう
      $this->validate($request, Profile::$rules);

      $profile = new Profile();
      $form = $request->all();

      

      unset($form['_token']);
      
      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
  }

  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }



  public function edit(Request $request)
  {
       
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile' => $profile]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      
      unset($profile_form['remove']);
      unset($profile_form['_token']);
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
       $update = new Update();
        $update->profile_id = $profile->id;
        $update->edited_at = Carbon::now();
        $update->save();
        
      return redirect('admin/profile');
  }
  
  
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  }
}
