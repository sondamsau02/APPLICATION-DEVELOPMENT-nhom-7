<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Trainer\TrainerController;

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
// trainer

Route::get('/', function () {
    return view('welcome');
 });
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//trainer

//admin//
Route::get('admin/login',function(){
      return view ('admin.login');
});
//admin dang nhap...
Route::post('/admin/login', [AdminController::class, 'LoginPost'])->name('admin.loginPost');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//middleware admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->Middleware('admin');
//Route::get('/dashboard', 'DashboardController@index')->middleware('admin');
//
//..staff CRUD
Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index')->Middleware('admin');
Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create')->Middleware('admin');
Route::post('/admin/staff/store', [StaffController::class, 'store'])->name('admin.staff.store')->Middleware('admin');
Route::get('/admin/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit')->Middleware('admin');
Route::put('/admin/staff/update/{id}', [StaffController::class,'update'])->name('admin.staff.update')->Middleware('admin');
Route::get('/admin/staff/destroy/{staff}', [StaffController::class, 'destroy'])->name('admin.staff.destroy')->Middleware('admin');
//..Staff CRUD

// Hiển thị danh sách user
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index')->Middleware('admin');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create')->Middleware('admin');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store')->Middleware('admin');
Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show')->Middleware('admin');
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit')->Middleware('admin');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update')->Middleware('admin');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy')->Middleware('admin');

//STAFF login//

Route::get('/staff/login', [App\Http\Controllers\Staff\LoginController::class, 'showLoginForm'])->name('staff.login');
Route::post('/staff/login', [App\Http\Controllers\Staff\LoginController::class, 'login'])->name('staff.login.submit');

//staff dashboard
Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//trainer login
Route::get('/trainer/login', [App\Http\Controllers\Trainer\TrainerController::class, 'showLoginForm'])->name('trainer.login');
Route::post('/trainer/login', [App\Http\Controllers\Trainer\TrainerController::class, 'login'])->name('trainer.login.submit');
//trainee login
Route::get('/trainee/login', [App\Http\Controllers\Trainee\TrainerController::class, 'showLoginForm'])->name('trainee.login');
Route::post('/trainee/login', [App\Http\Controllers\Trainee\TrainerController::class, 'login'])->name('trainee.login.submit');

