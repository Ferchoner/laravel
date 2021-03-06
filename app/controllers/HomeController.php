<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    protected $layout = 'layouts.master';

    public function showWelcome()
    {
        return View::make('principal');
    }

    public function showHome()
    {
       $this->layout->content = View::make('home');
	   $this->layout->myAccountHeader = View::make('my-account-buttons');
    }
}