<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SkillShareController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\UserAvatarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ------- LANDING ----------
Route::get('/', function () { return view('pages/landing'); })->name('landing');

// ------- AUTHENTICATION ----------
Auth::routes();

// ------- USER PAGES ----------

// User: See Home
Route::get('/home', [UserController::class, 'home'])->name('home');

// User: See Account/Edit/Update
Route::get('/account',[UserController::class, 'account'])->name('account');
Route::get('/account/edit',[UserController::class, 'edit'])->name('user.edit');
Route::put('/account/update',[UserController::class, 'update'])->name('user.update');
Route::put('/account/avatar/update',[UserController::class, 'avatarUpdate'])->name('avatar.update');

// Communities: Index/AddUser/RemoveUser
Route::get('/communities',[CommunityController::class, 'index'])->name('community.index');
Route::post('/add-community',[CommunityController::class, 'addUser'])->name('community.add');
Route::get('/remove-community/{communityid}',[CommunityController::class, 'removeUser'])->name('community.remove');

//Communities: See Postboard(includes form for creation of new posts)
Route::get('/community/{communityid}/posts',[CommunityController::class, 'postboard'])->name('postboard');

//Posts:: Store/Destroy/Edit/Update
Route::post('/community/{communityid}/posts/store',[PostController::class, 'store'])->name('post.store');
Route::delete('/community/{communityId}/posts/{postId}/delete',[PostController::class, 'destroy'])->name('post.destroy');
Route::get('/community/{communityId}/posts/{postId}/edit',[PostController::class, 'edit'])->name('post.edit');
Route::put('/community/{communityId}/posts/{postId}/update',[PostController::class, 'update'])->name('post.update');
Route::put('/post/{postid}/like',[PostController::class, 'updateLikes'])->name('post.likes.update');

//SkillShare:: view page/Create/Store
Route::get('/skill-share',[SkillShareController::class, 'viewSkillShare'])->name('skillshare');
Route::get('/skill-share/create', [SkillShareController::class, 'create'])->name('skillshare.create');
Route::post('/skill-share/store/{type}', [SkillShareController::class, 'store'])->name('skillshare.store');

//Friends:: Index/Show/Create/Destroy
Route::get('/friends',[FriendController::class, 'index'])->name('friends.index');
Route::get('/friends/{memberid}',[FriendController::class, 'show'])->name('friends.show');
Route::get('/friends/create/{memberid}',[FriendController::class, 'create'])->name('friends.create');
Route::delete('/friends/remove/{memberid}',[FriendController::class, 'destroy'])->name('friends.destroy');

//-------
//NOT IN USE
//Route::get('/challenges',[ChallengeController::class, 'index'])->name('challenges.index');
//Route::get('/challenges/{challengeid}', [ChallengeController::class, 'show'])->name('challenges.show');
