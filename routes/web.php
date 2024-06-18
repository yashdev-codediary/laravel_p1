<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
});


Route::get('/tasklist', function (){
  return view('index', ['tasks'=> Task::latest()->get()]);
})->name('task.index'); 

//Add route
Route::post('/tasks', function(Request $request){
    $data = $request->validate([
        'title'=> 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);
    
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.showone', ['id'=>$task->id])->with('success', 'Task is created successfully');

})->name('task.store');

//Edit route
Route::put('/tasks/{id}', function($id, Request $request){
    $data = $request->validate([
        'title'=> 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);
    
    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.showone', ['id'=>$task->id])->with('success', 'Task is updated successfully');

})->name('task.update');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}/edit', function($id){
  
 return view('edit', ['task'=> Task::findorFail($id)]);
})->name('task.edit');


Route::get('/tasks/{id}', function($id){
  
 return view('show', ['task'=> Task::findorFail($id)]);
})->name('task.showone');


Route::get('/dbconn', function(){
  try {
    DB::connection()->getPdo();
    return 'Database connection is OK. Datbase name is: '.DB::connection()->getDatabaseName();
  } catch (\Exception $e) {
    return 'Could not connect to the database. Error: ' . $e->getMessage();
  }
});


