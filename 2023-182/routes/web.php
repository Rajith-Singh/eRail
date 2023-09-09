<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Stationmaster\StationmasterController;
use App\Http\Controllers\eTabletController;
use App\Http\Controllers\MLController;
use App\Http\Controllers\TrainFindMaster\TrainFindController;
use App\Http\Controllers\YardManagement;
use App\Http\Controllers\TextToSpeechController;
use App\Http\Controllers\DelayController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view-point', function () {
    return view('outside_view');
})->name('view-point');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
    });

    Route::middleware(['auth'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
    });
});

// Route::prefix('stationmaster')->name('stationmaster.')->group(function(){

//     Route::middleware(['guest:stationmaster','PreventBackHistory'])->group(function(){
//         Route::view('/login','dashboard.stationmaster.login')->name('login');
//         Route::view('/register','dashboard.stationmaster.register')->name('register');
//         Route::post('/create',[StationmasterController::class,'create'])->name('create');
//         Route::post('/check',[StationmasterController::class,'check'])->name('check');
//         Route::get('/verify',[StationmasterController::class,'verify'])->name('verify');
//     });

//     Route::middleware(['auth:stationmaster','PreventBackHistory'])->group(function(){
//         Route::view('/home','dashboard.stationmaster.home')->name('home');
//         Route::post('/logout',[StationmasterController::class,'logout'])->name('logout');
//     });
// });


Route::get('/flask', [FlaskController::class, 'executeFlaskApp']);

Route::post('/request',[eTabletController::class,'storeTablet']);

Route::get('/accept/{station}',[eTabletController::class,'getRequest']);

Route::post('/approve/{id}', [eTabletController::class, 'updateTablet']);


  
Route::controller(TrainFindController::class)->prefix('find-my-train')->group(function () {
    Route::get('/', 'index')->name('find-my-train.index');   
    Route::post('/get-nearby-places', 'GetNearByPlaces')->name('find-my-train.get-nearby-places');  
});


Route::get('/delay-train', [DelayController::class,'index'])->name('delay-my-train-index'); 
Route::get('/delay-train-form', [DelayController::class,'DelayFormIndex'])->name('delay-my-train-form'); 
Route::post('/delay-train/get-delay-data', [DelayController::class,'GetDelayData'])->name('get-delay-my-train'); 
Route::post('/delay-train-form-request', [DelayController::class,'DelayForm'])->name('post-delay-my-train'); 

Route::controller(YardManagement::class)->prefix('yard-management')->group(function () {
    Route::get('/', 'index')->name('yard-management.index');   
    Route::post('/create-train', 'CreateTrain')->name('create-train');  
    Route::post('/train-operation', 'TrainOperation')->name('train-operation');  
    Route::get('/report', 'GenPdf',)->name('yard-management.report');   

});

Route::get('/text-to-speech', [TextToSpeechController::class, 'convertTextToSpeech']);

Route::get('/approve/{req_station}', [eTabletController::class, 'showApprovalPage']);

Route::get('/pusher', function () {
    return view('pusher');

});

