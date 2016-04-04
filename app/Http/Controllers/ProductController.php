<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreProductRequest;
use App\Page;
use App\Product;

class ProductController extends Controller
{
   
    use userChecking;

    public function showAllProducts($username){
      if ($this->checkUsername($username)) {
         $page_title = "Products";
         $products = Product::userProduct($this->logged_user->id)->get();
         return view('partners.product')->with([
            'page_title' => $page_title,
            'logged_user' => $this->logged_user,
            'products' => $products
          ]);
      }else{
        $this->logoutUser();
      }
    }

    public function showCreateProductForm($username){
        if ($this->checkUsername($username)) {
        	 $page_title = "Products";
	        	return view('partners.products.create')->with([
	                  'page_title' => $page_title,
	                  'logged_user' => $this->logged_user
	        		]);
           
        }else{
        	return $this->logoutUser();
        }
    }

    public function createProduct(StoreProductRequest $request, $username){
        if ($this->checkUsername($username)) {
            $product = new Product;
            $product->user_id = $this->logged_user->id;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->has_content = 0;
           if ($product->save()) {
            $request->session()->flash('success_message', "<i class='pageName'>".$product->name."</i> product was successfully added!");
            return redirect()->route('user.products', $this->logged_user->username);
           }else{
            $request->session()->flash('error_message', "We couldn't create "."<i class='pageName'>".$product->name."</i> product. Check your internet connection");
            return redirect()->route('user.products', $this->logged_user->username);
           }    
          }else{
            return $this->logoutUser();
          }
    }

    public function showEditProductForm(Request $request, $username, $product_name){
       if ($this->checkUsername($username)) {
          $page_title = "Products";
          $product = Product::findByName($product_name)->first();
          if (!empty($product)) {
             return view('partners.products.edit')->with([
              'page_title' => $page_title,
              'product' => $product,
              'logged_user' => $this->logged_user
              ]);
          }else{
            $request->session()->flash('error_message', "We can't find the product you are trying to update. It might have been removed before!");
            return redirect()->route('user.products', $this->logged_user->username);
          }
          
       }else{
        return $this->logoutUser();
       }
    }

    public function updateProduct(StoreProductRequest $request, $username, $product_name){
       if ($this->checkUsername($username)) {
         $product = Product::findByName($product_name)->first();
         $product->name = $request->input('name');
         $product->description = $request->input('description');
         if ($product->update()) {
            $request->session()->flash("success_message", "<i class='pageName'>".$product->name."</i> product was successfully updated!");
            return redirect()->route('user.products', $this->logged_user->username);
         }else{
            $request->session()->flash("error_message", "We couldn't update "."<i class='pageName'>".$product->name."</i> product. Check your internet connection");
            return redirect()->route('user.products', $this->logged_user->username);
         }

       }else{
         return $this->logoutUser();
       }


    }
    
}
