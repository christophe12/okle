<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\UserController;
use App\Page;
use App\Product;

class PageController extends Controller
{
  
     use userChecking;

     public function viewUserPages($username){
    	if ($this->checkUsername($username)) {
    		$pages = Page::userPages($this->logged_user->id)->get();
    		$page_title = "Pages";
    		// $product = Product::userProduct($this->logged_user->id)->get();
    	return view('partners.page')->with([
    		'logged_user' => $this->logged_user,
    		'page_title' => $page_title,
    		'pages' => $pages,
    		// 'pageProducts' => $products
    		]);
    	}else{
    		return $this->logoutUser();
    	}	
    }
    public function showEditUserPageForm(Request $request, $username, $pagename){
        if ($this->checkUsername($username)) {
           $oldpagename = $this->removeUnderscore($pagename);
           $page = Page::findByName($oldpagename)->first();
           $page_title = "Pages";
           if (!empty($page)) {
               return view('partners.pages.edit')->with([
                  'page' => $page,
                  'page_title' => $page_title,
                  'logged_user' => $this->logged_user
                ]);
           }else{
              $request->session()->flash('error_message', "We can't find the page you are trying to update. It may have been already removed. Check well!");
              return redirect()->route('user.pages', $this->logged_user->username);
           }
        }else{
          return $this->logoutUser();
        }
    }
    public function editUserPage(Request $request, $username, $pagename){
       if ($this->checkUsername($username)) {
         $oldpagename = $this->removeUnderscore($pagename);
         $page = Page::findByName($oldpagename)->first();
         if (!empty($page)) {
           $page->name = $request->input('name');
           if ($page->update()) {
              $request->session()->flash('success_message', "<i class='pageName'>".$page->name."</i> page was successfully updated!");
              return redirect()->route('user.pages', $this->logged_user->username);
           }else{
              $request->session()->flash('error_message', "<i class='pageName'>".$page->name."</i> page was not updated. Please try again!");
              return redirect()->route('user.pages', $this->logged_user->username);
           }
         }else{
           $request->session()->flash('error_message', "We can't find the page you are trying to update. It may have been already removed. Check well!");
           return redirect()->route('user.pages', $this->logged_user->username);
         }
         
       }else{
        return $this->logoutUser();
       }
    }

    public function showCreateUserPageForm($username){
    	if ($this->checkUsername($username)) {
    		$page_title = "Pages";
    		return view('partners.pages.create')->with([
    			'logged_user' => $this->logged_user,
    			'page_title' => $page_title
    			]);
    	}else{
    		return $this->logoutUser();
    	}
    }

    public function createUserPage(Request $request, $username){
       if ($this->checkUsername($username)) {
       	   $validator = $this->validate($request, [
       	   	  'name' => 'required|unique:pages|max:255'
       	   	]);
       	   	 $page = new Page;
       	   	 $page->user_id = $this->logged_user->id;
             $page->product_id = 0;
             $page->product_name = "none";
       	   	 $page->name = $request->input('name');
       	   	 $page->hasproduct = 0;
       	   	 $page->hasvideo = 0;
       	   	 $page->hasimages = 0;
       	   	 $page->hastextblocks = 0;
       	   	 if ($page->save()) {
       	   	 	$request->session()->flash('success_message', "<i class='pageName'>".$page->name.'</i> page has just been created!');
       	   	 return redirect()->route('user.pages', $this->logged_user->username);
       	   	 }else{
                $request->session()->flash('error_message', "We couldn't create your page. Please check your internet connection and try again. Thanks!");
               return redirect()->route('user.pages', $this->logged_user->username);
             }
       }else{
       	return $this->logoutUser();
       }
    }

    public function deleteUserPage(Request $request, $username, $pagename){
      //deletes the user page with it's product as well
        if ($this->checkUsername($username)) {
            $oldpagename = $this->removeUnderscore($pagename);
            $page = Page::findByName($oldpagename)->first();
            if (!empty($page)) {
                $product = Product::findByPage($page->id)->first();
                if (!empty($product)) {
                     if ($product->delete()) {
                          if ($page->delete()) {
                              $request->session()->flash('success_message', "<i class='pageName'>".$page->name."</i> page was deleted successfully!");
                              return redirect()->route('user.pages', $this->logged_user->username);
                          }else{
                              $request->session()->flash('error_message', "We couldn't delete "."<i class='pageName'>".$page->name."</i> page. Please check your internet connection and try again. Thanks!");
                              return redirect()->route('user.pages', $this->logged_user->username);
                          }
                     }else{
                        $request->session()->flash('error_message', "<i class='pageName'>".$page->name."</i> page's product can't be found!");
                        return redirect()->route('user.pages', $this->logged_user->username);
                     }
                }else{
                   if ($page->delete()) {
                     $request->session()->flash('success_message', $page->name." page was deleted successfully!");
                     return redirect()->route('user.pages', $this->logged_user->username); 

                   }else{
                       $request->session()->flash('error_message', "We couldn't delete "."<i class='pageName'>".$page->name."<i/> page. please check your internet connection");
                       return redirect()->route('user.pages', $this->logged_user->username);
                   }
                }
            }else{
              $request->session()->flash('error_message', "We can't find the page you are trying to delete"); 
              return redirect()->route('user.pages', $this->logged_user->username); 
            }
        }else{
          return $this->logoutUser();
        }
    }


}
