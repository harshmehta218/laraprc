<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DoseController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('company/list', [CompanyController::class, 'index'])->name('company.list');
Route::get('create', [CompanyController::class, 'create'])->name('create.company');
Route::post('store', [CompanyController::class, 'store'])->name('store.company');
Route::get('edit/company/{id}', [CompanyController::class, 'edit'])->name('edit.company');
Route::put('update/company/{id}', [CompanyController::class, 'update'])->name('update.company');
Route::delete('delete/company/{id}', [CompanyController::class, 'delete'])->name('delete.company');


Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('create/user', [AuthController::class, 'createUser'])->name('auth.create.user');

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('post/login', [AuthController::class, 'postLogin'])->name('auth.loginPost');
