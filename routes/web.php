<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AuthController,
    DashboardController,
    PostController,
    PageController,
    SettingController,
    ArticleController,
};
use App\Http\Controllers\Frontend\FrontendController;

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


Route::get('/test321', function(){
    // $cats = [
    //     'name' => 'Women',
    //     'slug' => 'women',
        
    // ];
    // var_dump(DB::table('terms')->insertGetId($cats)); die;
    dd(get_post_meta(1, '__featured_image', true));
});


Route::get('/', function(){
    // echo bcrypt('haris123');
    echo request()->route()->parameter('id');

    echo '<img src="'.get_user_image('img-623cde3a98177164815621.jpg').'" />';
});

// Route::fallback(function () {
//     return redirect("/");
// });

Route::group(['prefix' => 'admin', 'middleware' => ['AdminCheck']], function() {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    // Auth Routes
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('admin-login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin-logout');
    Route::match(['get', 'post'], 'profile', [AuthController::class, 'profile'])->name('profile');


    // Page Routes
    Route::get('pages', [PageController::class, 'index'])->name('pages');
    Route::post('page/add', [PageController::class, 'add'])->name('add-page');
    Route::match(['get', 'post'], 'page/edit/{id}', [PageController::class, 'edit'])->name('edit-page');
    Route::match(['get', 'post'], 'page/delete/{id?}', [PageController::class, 'delete'])->name('delete-page');
    Route::get('page/restore/{id?}', [PageController::class, 'restore'])->name('restore-page');

    Route::get('articles', [ArticleController::class, 'index'])->name('articles');
    Route::post('article/add', [ArticleController::class, 'add'])->name('add-article');
    Route::match(['get', 'post'], 'article/edit/{id}', [ArticleController::class, 'edit'])->name('edit-article');
    Route::match(['get', 'post'], 'article/delete/{id?}', [ArticleController::class, 'delete'])->name('delete-article');
    
    // Header & Footer Route
    Route::match(['get', 'post'], 'header-footer', [PageController::class, 'header_footer'])->name('header-footer');

    // Settings Route
    Route::match(['get', 'post'], 'settings', [SettingController::class, 'settings'])->name('settings');
   

});

Route::get('/', [FrontendController::class, 'home'])->name('home');