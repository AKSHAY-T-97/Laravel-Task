<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;




route::get('/',[UserManagementController::class,'index'])
		->name('user-list');
route::get('/search-user',[UserManagementController::class,'userSearch'])
		->name('search-user');