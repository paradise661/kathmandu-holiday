<?php

use App\Http\Controllers\Admin\ActivityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogcategoryController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DepartureController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageInquiryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\UserRegisterController;
use App\Http\Controllers\Admin\WhyusController;

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


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
 */

Route::get('/', [FrontendController::class, 'home'])->name('home');


// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('register', [UserRegisterController::class, 'index'])->name('register');
    Route::post('register', [UserRegisterController::class, 'store'])->name('store.register');

    /*
    |--------------------------------------------------------------------------
    | Change/Update Password Route
    |--------------------------------------------------------------------------
     */

    Route::get('change-password', [AuthController::class, 'index'])->name('profile');
    Route::post('change-password', [AuthController::class, 'store'])->name('change.password');


    /*
    |--------------------------------------------------------------------------
    | Setting Route
    |--------------------------------------------------------------------------
     */

    Route::get('setting', [SettingController::class, 'edit'])->name('admin.setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('admin.setting.update');

    /*
    |--------------------------------------------------------------------------
    | Forms Route
    |--------------------------------------------------------------------------
     */

    Route::resource('contacts', ContactsController::class);
    Route::resource('packageinquiry', PackageInquiryController::class);

    /*
    |--------------------------------------------------------------------------
    | Trips Route
    |--------------------------------------------------------------------------
     */

    Route::resource('packages', PackageController::class);
    Route::get('packages/duplicate/{pkid}', [PackageController::class, 'repli'])->name('packages.repli');
    Route::resource('activities', ActivityController::class);
    Route::resource('destinations', DestinationController::class);


    /*
    |--------------------------------------------------------------------------
    | Posts/Pages Routes
    |--------------------------------------------------------------------------
     */

    Route::resource('blog', NewsController::class);
    Route::resource('blogcategory', BlogcategoryController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('members', MemberController::class);
    Route::resource('page', PageController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('slider', SlidersController::class);
    Route::resource('counters', CounterController::class);
    Route::resource('social', SocialController::class);
    Route::resource('whyus', WhyusController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('departure', DepartureController::class);
    Route::resource('download', DownloadController::class);






    /*
    |--------------------------------------------------------------------------
    | Media Route
    |--------------------------------------------------------------------------
     */
    Route::resource('media', MediaController::class);
    Route::get('media/delete-file/{media_id}', [MediaController::class, 'mediadestroy'])->name('media.delete');
    Route::get('popupmedia', [MediaController::class, 'mediapopup'])->name('media.popup');
    Route::get('listmedia', [MediaController::class, 'medialist'])->name('media.list');
    Route::get('gallerylistmedia/{id}', [MediaController::class, 'gallerymedialist'])->name('gallery.media.list');

    /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
     */
    Route::get('menus/{id?}', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::post('create-menu', [MenuController::class, 'store'])->name('admin.menu.create');

    Route::get('add-post-to-menu', [MenuController::class, 'addPostToMenu'])->name('admin.menu.addpost');
    Route::get('add-page-to-menu', [MenuController::class, 'addPageToMenu'])->name('admin.menu.addpage');
    Route::get('add-service-to-menu', [MenuController::class, 'addServiceToMenu'])->name('admin.menu.addservice');
    Route::get('add-package-to-menu', [MenuController::class, 'addPackageToMenu'])->name('admin.menu.addpackage');
    Route::get('add-destination-to-menu', [MenuController::class, 'addDestinationToMenu'])->name('admin.menu.adddestination');
    Route::get('add-category-to-menu', [MenuController::class, 'addCategoryToMenu'])->name('admin.menu.addcategory');
    Route::get('add-custom-link', [MenuController::class, 'addCustomLink'])->name('admin.menu.addcustom');

    Route::get('update-menu', [MenuController::class, 'updateMenu'])->name('admin.menu.updatemenu');
    Route::post('update-menuitem/{id}', [MenuController::class, 'updateMenuItem'])->name('admin.menu.updateitem');
    Route::get('delete-menuitem/{id}/{key}/{in?}', [MenuController::class, 'deleteMenuItem'])->name('admin.menu.deleteitem');
    Route::get('delete-menu/{id}', [MenuController::class, 'destroy'])->name('admin.menu.deletemenu');
});
