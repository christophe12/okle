<?php  

namespace App\Http\Controllers;
use Auth;

trait userChecking
{

	protected $logged_user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->logged_user = Auth::user();
    }

    public function checkUsername($username){
          if ($username == $this->logged_user->username) {
          	return true;
          }else{
          	return false;
          }
    }

    public function logoutUser(){
    	return redirect()->route('user.logout');
    }
   
    private function removeUnderscore($string){
      return preg_replace('/[^a-zA-Z0-9\-]/', ' ', $string);
    }

}