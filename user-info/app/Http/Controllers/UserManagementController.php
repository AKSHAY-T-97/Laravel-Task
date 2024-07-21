<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        try {
            $users = User::with(['department', 'designation'])->get();
            return view('frontend.index', ['users' => $users]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function userSearch(Request $request)
    {
    	try {
	        $search = $request->input('search');
	        $users = User::search($search)->get();
        	return response()->json($users);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    } 

}
