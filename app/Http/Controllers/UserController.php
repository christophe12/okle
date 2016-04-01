<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //this trait checks for authentication
    use userChecking;

    public function redirectToDashboard(){
    	return redirect()->action('UserController@dashboard', ['username' => $this->logged_user->username]);

    }

    public function dashboard($username){
       if ($this->checkUsername($username)) {
       	$page_title = "Dashboard";
       	return view('partners.dashboard')->with([
       		  'logged_user' => $this->logged_user,
       		  'page_title' => $page_title
       		]);
       }else{
       	return $this->logoutUser();
       }
    }

    public function profile($username){
    	//placeholder for the profile view
    }

    public function page($username){
    	//placeholder for the pages view and controller'
    	if ($this->checkUsername($username)) {
    		$page_title = "Pages";
    	return view('partners.page')->with([
    		'logged_user' => $this->logged_user,
    		'page_title' => $page_title
    		]);
    	}else{
    		return $this->logoutUser();
    	}
    	
    }
}
