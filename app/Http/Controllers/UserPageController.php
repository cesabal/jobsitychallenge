<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserPageController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index( $uid )
    {
    	
    	return User::where( 'id', $uid )->get();

    }
}
