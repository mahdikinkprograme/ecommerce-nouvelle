<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admincreate;
use App\Http\Livewire\Indexpage;
use App\Http\Livewire\Pagedetaile;
// profile dashboard

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Icons;
use App\Http\Livewire\Map;
use App\Http\Livewire\Maps;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Table;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Typography;
use App\Http\Livewire\Upgrade;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Tableproduct;
use App\Http\Livewire\Editeproduct;
use App\Http\Livewire\MultiImage;
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



Route::get('/pageauth', function () {
    return view('welcome');
});

Route::get('/',Indexpage::class, function () {

    return view('/');

})->middleware(['auth']);

require __DIR__.'/auth.php';


//Route::get('/admin/dashboard', function () {
//    return view('admin.dashboard');
//})->middleware(['auth:admin'])->name('admin.dashboard');

Route::group(['middleware' => 'auth:admin'],function(){
    Route::get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');

Route::put('/profile/update',[ProfileController::class,'update'])->name('profile.update');

Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');

Route::put('/profile/password',[ProfileController::class,'password'])->name('profile.password');

Route::get('/admin/dashboard',home::class)->name('home');

//Route::get('/user/index',User::class)->name('user.index');

Route::get('/user/icons',Icons::class)->name('livewire.icons');

Route::get('/user/maps',Maps::class)->name('livewire.maps');

Route::get('/user/notifications',Notifications::class)->name('livewire.notifications');

Route::get('/user/tables',Tables::class)->name('livewire.tables');

Route::get('/user/typography',Typography::class)->name('livewire.typography');

Route::get('/user/rtl',Rtl::class)->name('livewire.rtl');

Route::get('/user/upgrade',Upgrade::class)->name('livewire.upgrade');

Route::get('/admincreate',Admincreate::class)->name('livewire.admincreate');

Route::get('/showproduct',Tableproduct::class)->name('livewire.showproduct');

Route::get('/edit-product/{id}',Editeproduct::class)->name('livewire.edit-product');

Route::get('/multiimage',MultiImage::class)->name('livewire.multiimg');

//Route::get('/edit-producte',Editeproduct::class)->name('livewire.edit-producte');


});



require __DIR__.'/adminauth.php';


Route::get('/detail/{id}',Pagedetaile::class)->name('livewire.pagedetaile');



// profile dashboard




