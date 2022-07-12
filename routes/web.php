<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\ForumsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ConnectionController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\Authenticate;
// use File;
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

Route::get('/', function () {
    return view('front.index');
});

Auth::routes();

Route::get('/home', function(){

	return view('front.index');
})->name('home');

Route::get('/about', function(){
	// $html = File::get(base_path('resources\views\front\about.blade.php'));
	// dd($html);
	return view('front.about');
})->name('about');

Route::get('/contact', function(){

	return view('front.contact');
})->name('contact');

Route::post('/contact', [HomeController::class, 'ContactQuery'])->name('contact.submit');

Route::get('/privacy-policy', function(){

	return view('front.privacypolicy');
})->name('privacy-policy');

Route::get('/reviews', function(){

	return view('front.reviews');
})->name('reviews');

Route::get('/terms-condition', function(){

	return view('front.terms&conditions');
})->name('terms-condition');

Route::post('/register',[UserRegisterController::class, 'store'])->name('register');

Route::post('/login',[LoginController::class, 'login'])->name('login');

Route::group(['middleware' => Authenticate::class], function(){

	    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	   //Chat Routes
		Route::get('/chat', [ChatController::class, 'index'])->name('chat');

		Route::post('/userChat', [ChatController::class, 'SaveMsg'])->name('SaveMsg');

		Route::post('/userChats', [ChatController::class, 'getMessage'])->name('getMessage');

		//Connection Routes
		Route::get('/connections', [ConnectionController::class, 'index'])->name('connections');

		Route::get('/SendConnection/{id}',[ConnectionController::class, 'SendConnection'])->name('send.request');

		Route::get('/ApproveConnection/{id}',[ConnectionController::class, 'ApproveConnection'])->name('approve.request');

		Route::get('/RejectConnection/{id}',[ConnectionController::class, 'RejectConnection'])->name('reject.request');

		//Blogs Route
		Route::post('/blog', [BlogController::class, 'store'])->name('saveBlog');

		Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('showBlog');

		Route::post('/blog/{id}',[BlogController::class, 'like'])->name('blogLike');

		Route::post('/blog/comment/{id}',[BlogController::class, 'comment'])->name('blogComment');

		Route::get('/notifications', function(){

			return view('user.dashboard.notifications');
		})->name('notifications');

		Route::get('/userProfile/{id}', [ConnectionController::class, 'ConnectionProfile'])->name('connectionProfile');

		Route::post('/add-education/{id}', [UserController::class, 'AddEducation'])->name('addEducation');
		Route::post('/update-education/{id}/{eduId}', [UserController::class, 'UpdateEducation'])->name('updateEducation');

		Route::post('/add-workHistory/{id}', [UserController::class, 'AddWorkHistory'])->name('addWorkHistory');
		Route::post('/update-workHistory/{id}/{eduId}', [UserController::class, 'UpdateWorkHistory'])->name('updateWorkHistory');

		Route::post('/add-politicalPreferences/{id}', [UserController::class, 'AddPoliticalPreferences'])->name('addPoliticalPreferences');
		Route::post('/update-politicalPreferences/{id}/{eduId}', [UserController::class, 'UpdatePoliticalPreferences'])->name('updatePoliticalPreferences');

		Route::post('/add-skills/{id}', [UserController::class, 'AddSkills'])->name('addSkills');
		Route::post('/update-skills/{id}/{eduId}', [UserController::class, 'UpdateSkills'])->name('updateSkills');		

		Route::get('/timeline', [DashboardController::class, 'Timeline'])->name('timeline');
	    // Route::get('/users/{id}', [UserController::class, 'Show'])->name('admin.users.edit');
	    // Route::post('/users/{id}', [UserController::class, 'Update'])->name('admin.users.update');
	    // Route::post('/users/delete/{id}', [UserController::class, 'Delete'])->name('admin.users.delete');

	    Route::get('/profile', [UserController::class, 'Show'])->name('profile');
	    Route::post('/profile/{id}', [UserController::class, 'Update'])->name('profile.update');
});

Route::get('admin/', [AdminLoginController::class, 'getLogin'])->name('admin.index');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'getLogin'])->name('admin.index');
    Route::get('/login', [AdminLoginController::class, 'getLogin'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'postLogin'])->name('admin.login');
	Route::group(['middleware' => AdminAuthenticated::class], function(){

	    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
	    Route::get('/users', [AdminUserController::class, 'Users'])->name('admin.users');
	    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

	    Route::get('/users/{id}', [AdminUserController::class, 'Show'])->name('admin.users.edit');
	    Route::post('/users/{id}', [AdminUserController::class, 'Update'])->name('admin.users.update');
	    Route::post('/users/delete/{id}', [AdminUserController::class, 'Delete'])->name('admin.users.delete');

	    Route::get('/profile', [AdminHomeController::class, 'Show'])->name('admin.profile');
	    Route::post('/profile/{id}', [AdminHomeController::class, 'Update'])->name('admin.profile.update');

	    Route::get('/inquiries', [InquiriesController::class, 'index'])->name('admin.inquiries');

	    Route::get('/forums', [ForumsController::class, 'index'])->name('admin.forums');

	});
});