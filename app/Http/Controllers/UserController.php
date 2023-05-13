<?php

namespace App\Http\Controllers;

require base_path() . '/vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Skill;

use Aws\S3\S3Client;
use Aws\Exception\AwsException; 

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function home()
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'eu-west-2'
        ]);
        
        // $avatarKey = Auth::user()->avatar;
        // $result = $s3->getObject(array(
        //     'Bucket' => 'cdn.localite',
        //     'Key'    => $avatarKey,
        //     'SaveAs' => './' . $avatarKey,
        // ));

        $userCommunities = Auth::user()->community;
        return view('pages/home', compact('userCommunities'));
    }
    public function account()
    {
        $skillshareExists = false;
        $skillShare = Skill::where('user_id', Auth::user()->id)
            ->where('type', 'share')
            ->get();
        $skillLearn = Skill::where('user_id', Auth::user()->id)
            ->where('type', 'learn')
            ->get();
        if ((count($skillShare) + count($skillLearn)) > 0) {
            $skillshareExists = true;
        }
        return view('pages/account', compact('skillshareExists', 'skillShare', 'skillLearn'));
    }

    public function edit()
    {
        return view('pages/user-edit');
    }

    public function update(Request $request)
    {
        $userDetails = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min: 0', 'max:130'],
            'bio' => ['required', 'string', 'max:255']
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $userDetails['name'];
        $user->city = $userDetails['city'];
        $user->age = $userDetails['age'];
        $user->bio = $userDetails['bio'];
        $user->save();
        return redirect(route('account'));
    }

    public function avatarUpdate(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        //adjust size of file
        $file = request()->file('avatar');
        $manager = new ImageManager(array('driver' => 'gd'));
        $manager->make($file)->resize(300, 300)->save($file);
        
        $user = User::where('id', Auth::user()->id)->first();
        $avatarKey = $user->id . '_avatar' . time() . '.' . $file->getClientOriginalExtension();
        
        //LOCAL STORAGE
        // $path = $file->storeAs('avatars', $avatarKey);
        // $user->avatar = 'storage/' . $path;
        // $user->save();

        //S3 STORAGE
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'eu-west-2'
        ]);
  
        $result = $s3->putObject(array(
            'Bucket'     => 'cdn.localite',
            'Key'        => $avatarKey,
            'SourceFile' => $file,
        ));

        $result = $s3->getObject(array(
            'Bucket' => 'cdn.localite',
            'Key'    => $avatarKey,
            'SaveAs' => './' . $avatarKey,
        ));
        
        $user->avatar = './' . $avatarKey;
        $user->save();
       
        // $request->avatar->storeAs('avatars', $avatarName);
        //$manager->make($user->avatar)->resize(300, 300)->save($user->avatar);
        return redirect(route('account'));
        //return $path;
    }
}
