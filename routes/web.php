<?php

use Illuminate\Support\Facades\Route;

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
    return redirect(route('Web.Main'));
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/')->group(function (){
Route::get('/Main','App\Http\Controllers\Web\Main\MainController@index')->name('Web.Main');

Route::get('users', [HomeController::class, 'users']);

    Route::get('/ContactUs','App\Http\Controllers\Web\Msg\MsgController@send')->name('Web.Msg');
    Route::post('/ContactUs','App\Http\Controllers\Web\Msg\MsgController@send')->name('Web.Msg');

    Route::get('/Profile',[\App\Http\Controllers\Auth\ProfileContoller::class, 'update'])->name('Web.Profile');
    Route::post('/Profile',[\App\Http\Controllers\Auth\ProfileContoller::class, 'update'])->name('Web.Profile');

    Route::prefix('Section')->group(function (){
        Route::get('/{id}','App\Http\Controllers\Web\Section\SectionController@index')->name('Web.Section.Index');
    });

    Route::prefix('Post')->group(function (){
        Route::get('/{id}','App\Http\Controllers\Web\Post\PostController@index')->name('Web.Post.Index');
        Route::post('/{id}','App\Http\Controllers\Web\Post\PostController@index')->name('Web.Post.Index');
        Route::get('/Comment/{id}','App\Http\Controllers\Web\Post\PostController@editComment')->name('Web.Comment.Edit');
        Route::post('/Comment/{id}','App\Http\Controllers\Web\Post\PostController@editComment')->name('Web.Comment.Edit');
        Route::get('/Comment/Delete/{id}','App\Http\Controllers\Web\Post\PostController@deleteComment')->name('Web.Comment.Delete');
    });

});

Route::prefix('Admin')->middleware('AdminPanel')->group(function (){
    Route::get('/Main','App\Http\Controllers\Admin\Main\MainController@index')->name('Admin.Main');

    Route::prefix('Section')->middleware('AdminRole')->group(function (){
        Route::get('/','App\Http\Controllers\Admin\Section\SectionController@index')->name('Section.Index');

        Route::get('Add','App\Http\Controllers\Admin\Section\SectionController@add')->name('Section.Add');
        Route::post('Add','App\Http\Controllers\Admin\Section\SectionController@add')->name('Section.Add');

        Route::get('Update/{id}','App\Http\Controllers\Admin\Section\SectionController@update')->name('Section.Update');
        Route::post('Update/{id}','App\Http\Controllers\Admin\Section\SectionController@update')->name('Section.Update');

        Route::get('Delete/{id}','App\Http\Controllers\Admin\Section\SectionController@delete')->name('Section.Delete');
        Route::post('Delete/{id}','App\Http\Controllers\Admin\Section\SectionController@delete')->name('Section.Delete');
    });

    Route::prefix('Image')->group(function (){
        Route::get('/','App\Http\Controllers\Admin\Image\ImageController@index')->name('Image.Index');

        Route::get('Add','App\Http\Controllers\Admin\Image\ImageController@add')->name('Image.Add');
        Route::post('Add','App\Http\Controllers\Admin\Image\ImageController@add')->name('Image.Add');

        Route::get('Delete/{id}','App\Http\Controllers\Admin\Image\ImageController@delete')->name('Image.Delete');
        Route::post('Delete/{id}','App\Http\Controllers\Admin\Image\ImageController@delete')->name('Image.Delete');
    });

    Route::prefix('Post')->group(function (){
        Route::get('/','App\Http\Controllers\Admin\Post\PostController@index')->name('Post.Index');

        Route::get('Add','App\Http\Controllers\Admin\Post\PostController@add')->name('Post.Add');
        Route::post('Add','App\Http\Controllers\Admin\Post\PostController@add')->name('Post.Add');

        Route::get('Update/{id}','App\Http\Controllers\Admin\Post\PostController@update')->name('Post.Update');
        Route::post('Update/{id}','App\Http\Controllers\Admin\Post\PostController@update')->name('Post.Update');

        Route::get('Delete/{id}','App\Http\Controllers\Admin\Post\PostController@delete')->name('Post.Delete');
        Route::post('Delete/{id}','App\Http\Controllers\Admin\Post\PostController@delete')->name('Post.Delete');
    });

    Route::prefix('User')->middleware('AdminRole')->group(function (){
        Route::get('/','App\Http\Controllers\Admin\User\UserController@index')->name('User.Index');

        Route::get('Add','App\Http\Controllers\Admin\User\UserController@add')->name('User.Add');
        Route::post('Add','App\Http\Controllers\Admin\User\UserController@add')->name('User.Add');

        Route::get('Update/{id}','App\Http\Controllers\Admin\User\UserController@update')->name('User.Update');
        Route::post('Update/{id}','App\Http\Controllers\Admin\User\UserController@update')->name('User.Update');

        Route::get('Delete/{id}','App\Http\Controllers\Admin\User\UserController@delete')->name('User.Delete');
        Route::post('Delete/{id}','App\Http\Controllers\Admin\User\UserController@delete')->name('User.Delete');
    });

    Route::prefix('Msg')->group(function (){
        Route::post('Delete/{id}','App\Http\Controllers\Admin\Msg\MsgController@delete')->name('Msg.Delete');

        Route::get('/Read/{id}','App\Http\Controllers\Admin\Msg\MsgController@read')->name('Msg.Read');

        Route::get('/{type}','App\Http\Controllers\Admin\Msg\MsgController@index')->name('Msg.Index');
    });
});
