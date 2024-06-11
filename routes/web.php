<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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




Route::get('/', function(){
  return redirect()->route('task.index');
  //echo phpinfo()
  
});


Route::get('/task', function (){
  return view('index', ['tasks'=> \App\Models\Task::latest()->get()]);
})->name('task.index');

Route::get('/task/{id}', function($id){
  
 return view('show', ['task'=> \App\Models\Task::findorFail($id)]);
})->name('task.showone');


Route::get('/dbconn', function(){
  try {
    DB::connection()->getPdo();
    return 'Database connection is OK. Datbase name is: '.DB::connection()->getDatabaseName();
  } catch (\Exception $e) {
    return 'Could not connect to the database. Error: ' . $e->getMessage();
  }
});
