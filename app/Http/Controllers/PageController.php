<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function welcome() {
		return view('welcome');
	}
}
