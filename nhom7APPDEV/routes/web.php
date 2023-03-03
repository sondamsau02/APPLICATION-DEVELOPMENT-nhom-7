<?php
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\StaffController;
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
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login',function(){
      return view ('admin.login');
});
//admin dang nhap...
Route::post('/admin/login', [AdminController::class, 'LoginPost'])->name('admin.loginPost');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//middleware admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->Middleware('admin');

Route::get('/dashboard', 'DashboardController@index')->middleware('admin');

//

//..staff


Route::get('/admin/staff', [StaffController::class, 'index'])->name('index')->Middleware('admin');
Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
Route::post('/admin/staff/store', [StaffController::class, 'store'])->name('admin.staff.store');
Route::get('/admin/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit');
Route::put('/admin/staff/update/{id}', [StaffController::class,'update'])->name('admin.staff.update');
Route::get('/staff/destroy/{staff}', [StaffController::class,'destroy'])->name('admin.staff.destroy');

