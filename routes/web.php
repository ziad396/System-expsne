<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::controller(UserController::class)->group(function () {

    Route::get('/user/login', 'viewLogin')->name('user.login');
    Route::post('login', 'login')->name('send');
    Route::get('/', 'create')->name('user.create');
    Route::post('user/register', 'register')->name('user.store');
    Route::get('logout', 'logout')->name('logout');
});

// Route::get('welocme',function (){
// return view('user.expense');
// })->middleware('auth')->name('expense');


Route::resource('expense', ExpenseController::class)->middleware('auth')->except('show');
Route::middleware(['auth', 'admin'])->controller(AdminController::class)->group(function () {
   // manage users
    Route::get('adminpanal/user', 'adminPanal')->name('adminpanal');
    Route::get('adminpanal/user/{id}/edit', 'edit')->name('update.user');
    Route::put('adminpanal/update/{id}', 'updateUser')->name('update.done');
    Route::get('adminpanal/use/insert', 'create')->name('insert.user');
    Route::post('adminpanal/user/addedd', 'insertUser')->name('insert.done');

     Route::delete('adminpanal/user/delete/{user}', 'deleteUser')->name('delete.user');
    //manage expense
    Route::get('manage/expense', 'createExpense')->name('expense.manage');
    Route::get('adminpanal/expense/{id}/edit', 'editExpense')->name('update.expense');
    Route::put('adminpanal/expense/update/{id}', 'updateExpense')->name('edit.done');

     Route::delete('adminpanal/expense/delete/{expense}', 'deleteExpense')->name('delete.expense');
});



?>