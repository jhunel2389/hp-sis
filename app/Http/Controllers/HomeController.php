<?php namespace App\Http\Controllers;

use View;
use Validator;
use Input;
use Auth;
use Redirect;
class HomeController extends Controller {

	public function home()
	{
		return View::make('index');
	}

}