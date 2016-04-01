<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Product;

class ProductController extends Controller
{
   
    use userChecking;

    public function showCreatePageProductForm(Request $request, $username, $pagename){
        if ($this->checkUsername($username)) {
        	$page_title = "Products";
            $oldpagename = $this->removeUnderscore($pagename);
            $page = Page::findByName($oldpagename)->first();
            if (!empty($page)) {
	        	return view('partners.pages.create')->with([
	        		  'page' => $page,
	                  'page_title' => $page_title,
	                  'logged_user' => $this->logged_user
	        		]);
            }else{
               $request->session()->flash('error_message', "We can't find ".$oldpagename." page, it might have been removed already. Please check!"); 
               return redirect()->route('user.pages', $this->logged_user->username);
            }
        }else{
        	return $this->logoutUser();
        }
    }

    public function createPageProduct(Request $request, $username, $pagename){
          $validator = $this->validate($request, [
          	   'name' => 'required|unique:products|max:255',
               'description' => 'required|max:255'
          	]);
          $oldpagename = $this->removeUnderscore($pagename);
          $page = Page::findByName($oldpagename)->first();
          $product = new Product;
          $product->user_id = $this->logged_user->username;
          $product->page_id = $page->id;
          $product->name = $request->input('name');
          $product->description = $request->input('description');

          //updating the page model for a new product creation
          $page->product_name = $request->input('name');
          $page->hasproduct = 1;
          if ($page->update()) {
          	 if ($product->save()) {
          	 	$request->session()->flash('success_message', $product->name." product was successfully added!");
          	 	return redirect()->route('user.pages', $this->logged_user->username);
          	 }else{
              $request->session()->flash('error_message', "We couldn't create ".$product->name." product. Check your internet connection");
              return redirect()->route('user.pages', $this->logged_user->username);
          	 }
          }else{
             $request->session()->flash('error_message', "We couldn't create ".$product->name." product. Check your internet connection");
             return redirect()->route('user.pages', $this->logged_user->username);
          }
          
    }
    
}
