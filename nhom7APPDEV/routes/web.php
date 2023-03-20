<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Gate;

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

//login route

Route::prefix('/')->group(function () {
      Route::get('/',[AuthController::class,'getLogin']);
      Route::post('/',[AuthController::class,'postLogin'])->name('auth.login');
  });

  Route::prefix('logout')->group(function () {
      Route::post('/',[AuthController::class,'postLogout'])->name('auth.logout');
  });

  Route::group(['middleware' => ['auth', 'role:Admin']], function () {
      // admin routes
      Route::prefix('admin')->group(function () {
          Route::get('/',[AdminController::class,'Adminindex'])->name('admin.index');         
          Route::prefix('account')->group(function () {
              Route::get('/',[AdminController::class,'Accountindex'])->name('admin.account.index');
              Route::get('add/',[AdminController::class,'getAddAccount']);
              Route::post('add/',[AdminController::class,'postAddAccount'])->name('admin.account.add');
              Route::get('update/{id}',[AdminController::class,'getUpdateAccount']);
              Route::post('update/{id}',[AdminController::class,'postUpdateAccount'])->name('admin.account.update');
              Route::get('delete/{id}',[AdminController::class,'deleteAccount']);
          });
      });
  });

  Route::group(['middleware' => ['auth', 'role:Trainer']], function () {
    // trainer routes
    Route::prefix('trainer')->group(function () {
        Route::get('/',[TrainerController::class,'Trainerindex'])->name('trainer.index');
        Route::get('assigntopic',[TrainerController::class,'Topicindex'])->name('trainer.topic.index');
        Route::prefix('profile')->group(function () {
            Route::get('/',[TrainerController::class,'Profileindex'])->name('trainer.profile');
            Route::get('/update',[TrainerController::class,'getUpdateProfile']);
            Route::post('/update',[TrainerController::class,'postUpdateProfile'])->name('trainer.profile.update');
        });
    });
});
//staff
Route::group(['middleware' => ['auth', 'role:Staff']], function () {
    // staff routes
    Route::prefix('Staff')->group(function () {
        Route::get('/',[StaffController::class,'Staffindex'])->name('staff.index');
        Route::prefix('trainee')->group(function () {
            Route::get('/',[StaffController::class,'Traineeindex'])->name('staff.trainee.index');
            Route::get('add/',[StaffController::class,'getAddTrainee']);
            Route::post('add/',[StaffController::class,'postAddTrainee'])->name('staff.trainee.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateTrainee']);
            Route::post('update/{id}',[StaffController::class,'postUpdateTrainee'])->name('staff.trainee.update');
            Route::get('delete/{id}',[StaffController::class,'deleteTrainee']);
            Route::get('search',[StaffController::class,'searchTrainee'])->name('staff.trainee.search');
        });
        Route::prefix('category')->group(function () {
            Route::get('/',[StaffController::class,'Categoryindex'])->name('staff.category.index');
            Route::get('add/',[StaffController::class,'getAddCategory']);
            Route::post('add/',[StaffController::class,'postAddCategory'])->name('staff.category.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateCategory']);
            Route::post('update/{id}',[StaffController::class,'postUpdateCategory'])->name('staff.category.update');
            Route::get('delete/{id}',[StaffController::class,'deleteCategory']);
            Route::get('search',[StaffController::class,'searchCategory'])->name('staff.category.search');
        });

        Route::prefix('course')->group(function () {
            Route::get('/',[StaffController::class,'Courseindex'])->name('staff.course.index');
            Route::get('add/',[StaffController::class,'getAddCourse']);
            Route::post('add/',[StaffController::class,'postAddCourse'])->name('staff.course.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateCourse']);
            Route::post('update/{id}',[StaffController::class,'postUpdateCourse'])->name('staff.course.update');
            Route::get('delete/{id}',[StaffController::class,'deleteCourse']);
            Route::get('search',[StaffController::class,'searchCourse'])->name('staff.course.search');
        });
        Route::prefix('topic')->group(function () {
            Route::get('/',[StaffController::class,'Topicindex'])->name('staff.topic.index');
            Route::get('add/',[StaffController::class,'getAddTopic']);
            Route::post('add/',[StaffController::class,'postAddTopic'])->name('staff.topic.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateTopic']);
            Route::post('update/{id}',[StaffController::class,'postUpdateTopic'])->name('staff.topic.update');
            Route::get('delete/{id}',[StaffController::class,'deleteTopic']);
        });
        Route::prefix('trainer')->group(function () {
            Route::get('/',[StaffController::class,'Trainerindex'])->name('staff.trainer.index');
            Route::get('add/',[StaffController::class,'getAddTrainer']);
            Route::post('add/',[StaffController::class,'postAddTrainer'])->name('staff.trainer.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateTrainer']);
            Route::post('update/{id}',[StaffController::class,'postUpdateTrainer'])->name('staff.trainer.update');
            Route::get('delete/{id}',[StaffController::class,'deleteTrainer']);
        });
        Route::prefix('traineeCourse')->group(function () {
            Route::get('/',[StaffController::class,'TraineeCourseindex'])->name('staff.traineecourse.index');
            Route::get('add/',[StaffController::class,'getAddTraineeCourse']);
            Route::post('add/',[StaffController::class,'postAddTraineeCourse'])->name('staff.traineecourse.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateTraineeCourse']);
            Route::post('update/{id}',[StaffController::class,'postUpdateTraineeCourse'])->name('staff.traineecourse.update');
            Route::get('delete/{id}',[StaffController::class,'deleteTraineeCourse']);
        });
        Route::prefix('trainerTopic')->group(function () {
            Route::get('/',[StaffController::class,'TrainerTopicindex'])->name('staff.trainertopic.index');
            Route::get('add/',[StaffController::class,'getAddTrainerTopic']);
            Route::post('add/',[StaffController::class,'postAddTrainerTopic'])->name('staff.trainertopic.add');
            Route::get('update/{id}',[StaffController::class,'getUpdateTrainerTopic']);
            Route::post('update/{id}',[StaffController::class,'postUpdateTrainerTopic'])->name('staff.trainertopic.update');
            Route::get('delete/{id}',[StaffController::class,'deleteTrainerTopic']);
        });
    });
});
//
//Middleware Authentication
// Route::group(['middleware' => ['auth', 'role:Admin']], function () {});

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// //trainer
// // routes/web.php



// Route::group(['middleware' => ['auth']], function () {
//       Route::get('/auth/edit', [App\Http\Controllers\UserController::class, 'edit_profile'])->name('auth.edit');
//       Route::put('/update/profile', [App\Http\Controllers\UserController::class, 'update_profile'])->name('auth.update_profile')->middleware('can:update-user-profile,user');
//   });
  
  
        


// //admin//
// Route::get('admin/login',function(){
//       return view ('admin.login');
// });
// //admin dang nhap...
// Route::post('/admin/login', [AdminController::class, 'LoginPost'])->name('admin.loginPost');
// Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// //middleware admin
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->Middleware('admin');
// //Route::get('/dashboard', 'DashboardController@index')->middleware('admin');
// //
// //..staff CRUD
// Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index')->Middleware('admin');
// Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create')->Middleware('admin');
// Route::post('/admin/staff/store', [StaffController::class, 'store'])->name('admin.staff.store')->Middleware('admin');
// Route::get('/admin/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit')->Middleware('admin');
// Route::put('/admin/staff/update/{id}', [StaffController::class,'update'])->name('admin.staff.update')->Middleware('admin');
// Route::get('/admin/staff/destroy/{staff}', [StaffController::class, 'destroy'])->name('admin.staff.destroy')->Middleware('admin');
// //..Staff CRUD

// // Hiển thị danh sách user: trainer
// Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index')->Middleware('admin');
// Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create')->Middleware('admin');
// Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store')->Middleware('admin');
// Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show')->Middleware('admin');
// Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit')->Middleware('admin');
// Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update')->Middleware('admin');
// Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy')->Middleware('admin');

// //STAFF login//

// Route::get('/staff/login', [App\Http\Controllers\Staff\LoginController::class, 'showLoginForm'])->name('staff.login');
// Route::post('/staff/login', [App\Http\Controllers\Staff\LoginController::class, 'login'])->name('staff.login.submit');

// //staff dashboard
// Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// //trainer login


// Route::get('/trainer/login', [App\Http\Controllers\Trainer\TrainerController::class, 'showLoginForm'])->name('trainer.login');
// Route::post('/trainer/login', [App\Http\Controllers\Trainer\TrainerController::class, 'login'])->name('trainer.login.submit');
// //trainee login



// //trainee login
// Route::get('/trainee/login', [App\Http\Controllers\Trainee\TrainerController::class, 'showLoginForm'])->name('trainee.login');
// Route::post('/trainee/login', [App\Http\Controllers\Trainee\TrainerController::class, 'login'])->name('trainee.login.submit');
// //
