<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCom_tablesController;
use App\Http\Controllers\Front\DocumentController;
use App\Http\Controllers\Front\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('');
Route::get('/', [FrontController::class, 'search2'])->name('search2');
Route::get('/pdf/{id}', [DocumentController::class, 'generateDocumentAsPDF'])->name('pdf');


// Admin
Route::group(['middleware' => ['auth.admin']],function () {
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminAuthController::class,'profile'])->name('admin_profile');
    Route::post('/profile',[AdminAuthController::class,'profile_submit'])->name('admin_profile_submit');
    Route::get('/table/index',[AdminCom_tablesController::class,'index'])->name('admin_table_index');
    Route::get('/table/create',[AdminCom_tablesController::class,'create'])->name('admin_table_create');
    Route::post('/table/create',[AdminCom_tablesController::class,'create_submit'])->name('admin_table_create_submit');
    Route::get('/table/edit{id}',[AdminCom_tablesController::class,'edit'])->name('admin_table_edit');
    Route::post('/table/edit{id}',[AdminCom_tablesController::class,'edit_submit'])->name('admin_table_edit_submit');
    Route::get('/table/delete{id}',[AdminCom_tablesController::class,'delete'])->name('admin_table_delete');
    Route::get('/table/csv',[AdminCom_tablesController::class,'showUploadForm'])->name('admin_csv');
    Route::post('/table/csv',[AdminCom_tablesController::class,'uploadCsv'])->name('admin_upload_csv');
});    


Route::prefix('admin')->group(function () {
    Route::get('/login',[AdminAuthController::class,'login'])->name('admin_login');
    Route::post('/login',[AdminAuthController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin_logout');
    Route::get('/forget-password',[AdminAuthController::class,'forget_password'])->name
    ('admin_forget_password');
    Route::post('/forget-password-submit',[AdminAuthController::class,'forget_password_submit'])->name
    ('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password'])->name
    ('admin_reset_password');
    Route::post('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password_submit'])->name
    ('admin_reset_password_submit');

    
});