<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
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
Route::group(['middleware' => 'guest'], function () 
{
	
	Route::get('', [AuthController::class, 'index']);
	Route::post('/admin/login',    [AuthController::class, 'login'])->name('login');
	
});

Route::group(['middleware' => 'auth.basic'], function () 
{
	Route::group(['prefix'=>'admin'], function () 
	{
		Route::get('/logout',    			  [AuthController::class, 'logout'])->name('logout'); 
		Route::get('/dashboard', 			  [DashboardController::class, 'index']);
		/*Route::get('/products',  			  [ProductsController::class, 'index']);
		Route::post('/products/get_records',  [ProductsController::class, 'getRecords']);
		Route::get('/products/edit/{id}',     [ProductsController::class, 'edit']);*/

		Route::group(['prefix'=>'products'], function () 
        {
			Route::get('',        				[ProductsController::class, 'index']);
			Route::post('/get_records',  		[ProductsController::class, 'getRecords']);
			Route::post('/store', 				[ProductsController::class, 'store']);
			Route::get('/delete/{id}', 			[ProductsController::class, 'delete']);
			Route::get('/edit/{id}',			[ProductsController::class, 'edit']);
			Route::post('/update',			    [ProductsController::class, 'update']);
			Route::get('/{slug}/{id}',  		[ProductsController::class, 'index']);
		});

	});
	
});

