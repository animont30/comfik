<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\AlertController;
use App\Models\Web\Cart;
use App\Models\Web\Currency;
use App\Models\Web\Customer;
use App\Models\Web\Index;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Lang;
use Session;
use Socialite;
use Validator;
use Hash;

class CustomersController extends Controller
{

    public function __construct(
        Index $index,
        Languages $languages,
        Products $products,
        Currency $currency,
        Customer $customer,
        Cart $cart
    ) {
        $this->index = $index;
        $this->languages = $languages;
        $this->products = $products;
        $this->currencies = $currency;
        $this->customer = $customer;
        $this->cart = $cart;
        $this->theme = new ThemeController();
    }

    public function signup(Request $request)
    {
        $final_theme = $this->theme->theme();
        if (auth()->guard('customer')->check()) {
            return redirect('/');
        } else {
            $title = array('pageTitle' => Lang::get("website.Sign Up"));
            $result = array();
            $result['commonContent'] = $this->index->commonContent();
            return view("login", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
        }
    }
	
	

    public function login(Request $request)
    {
        $result = array();
        if (auth()->guard('customer')->check()) {
            return redirect('/');
        } else {
            $result['cart'] = $this->cart->myCart($result);

            if (count($result['cart']) != 0) {
                $result['checkout_button'] = 1;
            } else {
                $result['checkout_button'] = 0;

            }
            $previous_url = Session::get('_previous.url');

            $ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $ref = rtrim($ref, '/');

            session(['previous' => $previous_url]);

            $title = array('pageTitle' => Lang::get("website.Login"));
            $final_theme = $this->theme->theme();

            $result['commonContent'] = $this->index->commonContent();
            return view("auth.login", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
        }

    }

    public function processLogin(Request $request)
    {
        $old_session = Session::getId();

        $result = array();

        //check authentication of email and password
        $customerInfo = array("email" => $request->email, "password" => $request->password);

        if (auth()->guard('customer')->attempt($customerInfo)) {
            $customer = auth()->guard('customer')->user();
            if ($customer->role_id != 2 && $customer->role_id != 3) {
                $record = DB::table('settings')->where('id', 94)->first();
                if ($record->value == 'Maintenance' && $customer->role_id == 1) {
                    auth()->attempt($customerInfo);
                } else {
                    Auth::guard('customer')->logout();
                    return redirect('login')->with('loginError', Lang::get("website.You Are Not Allowed With These Credentials!"));
                }
            }
            $result = $this->customer->processLogin($request, $old_session);
            if (!empty(session('previous'))) {
                return Redirect::to(session('previous'));
            } else {
                
                Session::forget('guest_checkout');
                return redirect('/')->with('result', $result);
            }
        } else {
            return redirect('login')->with('loginError', Lang::get("website.Email or password is incorrect"));
        }
        //}
    }

    public function addToCompare(Request $request)
    {
        $cartResponse = $this->customer->addToCompare($request);
        return $cartResponse;
    }

    public function DeleteCompare($id)
    {
        $Response = $this->customer->DeleteCompare($id);
        return redirect()->back()->with($Response);
    }
	public function updateMyRecipe(Request $request)
	{
		
		 $product_id = $this->products->updateMyRecipe($request);
		return redirect('/myrecipes');
  
	}
	public function uploadrecipes()
	{
		 $result = array();
		  $result['categories'] = $this->products->categories();
		  $result['manufacturers'] = $this->products->manufacturers();
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();
		
		 return view('web.uploadrecipes',['result' => $result,'final_theme' => $final_theme]);
	}
	public function author(Request $request, $id)
	{
		 $result = array();
		 
		 $result['author'] = DB::table('users')->where('id', $id)->first();
		
		
		 //min_price 
       
            $min_price = '';
        

        //max_price
       
            $max_price = '';
        

        
            $limit = 15000;
        

       
            $type = '';
      
            $categories_id = '';
      
        //search value
        
            $search = '';
       

        //min_price
        
            $min_price = '';
       

        //max_price
       
            $max_price = '';
        

        
            $filters = array();
        
		
		
		  $data = array('page_number' => $request->page_number, 'type' => $type, 'limit' => $limit, 'categories_id' => $categories_id, 'search' => $search, 'filters' => $filters, 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price,"author_id"=> $id);
		  
		  
		  $products = $this->products->products($data);
		  $result['totallikes']=$result['totalreviews']=$result['totalviewed']=$result['totalordered']=0;
		  foreach($products['product_data'] as $prod)
		  {
			  $result['totallikes']+=$prod->products_liked;
			  $result['totalreviews']+=$prod->total_user_rated;
			  $result['totalviewed']+=$prod->products_viewed;
			  $result['totalordered']+=$prod->products_ordered;
		  }
		 
		 $title = $result['author']->first_name.' '. $result['author']->last_name.' Recipes';
        $result['products'] = $products;
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();
		 return view('web.author',['result' => $result,'pagetitle'=>$title ,'final_theme' => $final_theme]);
	}
	public function myrecipes(Request $request)
	{
		 $result = array();
		 $id = auth()->guard('customer')->user()->id;
		 
		 $result['author'] = DB::table('users')->where('id', $id)->first();
		
		
		 //min_price
       
            $min_price = '';
        

        //max_price
       
            $max_price = '';
        

        
            $limit = 15000;
        

       
            $type = '';
      
            $categories_id = '';
      
        //search value
        
            $search = '';
       

        //min_price
        
            $min_price = '';
       

        //max_price
       
            $max_price = '';
        

        
            $filters = array();
        
		
		
		  $data = array('page_number' => $request->page_number, 'type' => $type, 'limit' => $limit, 'categories_id' => $categories_id, 'search' => $search, 'filters' => $filters, 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price,"author_id"=> $id);
		  
		  $products = $this->products->paginator($data);
		   
        $result['products'] = $products;
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();
		 return view('web.myrecipes',['result' => $result,'final_theme' => $final_theme]);
	}
	
	  //deleteMyRecipe
    public function deleteMyRecipe(Request $request)
    {
     $this->products->deleteMyRecipe($request);
        return redirect()->back()->withErrors([Lang::get("labels.ProducthasbeendeletedMessage")]);
      }
	
	 //delete recipe img
    public function deleterecipeimg(Request $request)
    {
     $this->products->deleterecipeimg($request);
        return redirect()->back()->withErrors([Lang::get("labels.ProducthasbeendeletedMessage")]);
      }
	
	
	 public function editMyRecipe($id)
    {
       
	   $Products = DB::table('products')->leftJoin('products_description', 'products_description.products_id', '=','products.products_id')->leftJoin('products_to_categories', 'products_to_categories.products_id', '=','products.products_id')->select('products.*', 'products_description.*', 'products_to_categories.*')->where('products.products_id', $id)->first();
	   //dd($Products);
		$result = array();
		
		  $result['categories'] = $this->products->categories();
		  $result['manufacturers'] = $this->products->manufacturers();
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();
        
		
		 return view('web.editMyRecipes',['Products'=> $Products,'result' => $result,'final_theme' => $final_theme]);
		}
		
		
		 public function myrecipeimg($id)
    {
		$result = array();
		 $login_id = auth()->guard('customer')->user()->id;
		 
		 $result['author'] = DB::table('users')->where('id', $login_id)->first();
		
 
		$result['products'] = DB::table('products_images')->where('products_id', $id)->get();
		  $result['commonContent'] = $this->index->commonContent();
		  $final_theme = $this->theme->theme();
        //dd($result['products']);
	  return view('web.myrecipes-img',['result' => $result,'final_theme' => $final_theme]);
		}
		
		public function editrecipeimg($id)
    {
			$result = array();
		 $login_id = auth()->guard('customer')->user()->id;
		 
		 $result['author'] = DB::table('users')->where('id', $login_id)->first();
		
		$result['products_images_id'] = $id;
        $result['commonContent'] = $this->index->commonContent();
		  $final_theme = $this->theme->theme();
		 return view('web.uploadrecipesimg',['result' => $result,'final_theme' => $final_theme]);
		}
		
		public function updatemyrecipeimg(Request $request)
        {      
       
        $result = $this->products->updatemyrecipeimg($request);
        $products_images_id = $request->products_images_id;
        if ($request->products_type == 1) {
            return redirect('myrecipes/');
        } else {
            return redirect('myrecipes/');
        }
    }	
		
	 public function editMyRecipeSave(Request $request)
    {      
       
        $result = $this->products->editMyRecipeSave($request);
        $products_id = $request->products_id;
        if ($request->products_type == 1) {
            return redirect('myrecipes/');
        } else {
            return redirect('myrecipes');
        }
    }	
		
	
	
	public function dashboard()
	{
		 $result = array();
		  
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();
		 return view('web.dashboard',['result' => $result,'final_theme' => $final_theme]);
	}
    public function Compare()
    {
        $result = array();
        $final_theme = $this->theme->theme();
        $result['commonContent'] = $this->index->commonContent();
        $compare = $this->customer->Compare();
        $results = array();
        foreach ($compare as $com) {
            $data = array('products_id' => $com->product_ids, 'page_number' => '0', 'type' => 'compare', 'limit' => '15', 'min_price' => '', 'max_price' => '');
            $newest_products = $this->products->products($data);
            array_push($results, $newest_products);
        }
        $result['products'] = $results;
        return view('web.compare', ['result' => $result, 'final_theme' => $final_theme]);
    }

    public function profile()
    {
        $title = array('pageTitle' => Lang::get("website.Profile"));
        $result['commonContent'] = $this->index->commonContent();
        $final_theme = $this->theme->theme();
        return view('web.profile', ['result' => $result, 'title' => $title, 'final_theme' => $final_theme]);
    }

    public function updateMyProfile(Request $request)
    {
        $message = $this->customer->updateMyProfile($request);
        return redirect()->back()->with('success', $message);

    }

    public function changePassword()
    {
        $title = array('pageTitle' => Lang::get("website.Change Password"));
        $result['commonContent'] = $this->index->commonContent();
        $final_theme = $this->theme->theme();
        return view('web.changepassword', ['result' => $result, 'title' => $title, 'final_theme' => $final_theme]);
    }

    public function updateMyPassword(Request $request)
    {
        $password = Auth::guard('customer')->user()->password;
        if (Hash::check($request->current_password, $password)) {
            $message = $this->customer->updateMyPassword($request);
            return redirect()->back()->with('success', $message);
        }else{
            return redirect()->back()->with('error', lang::get("website.Current password is invalid"));
        }
    }

    public function logout(REQUEST $request)
    {
        Auth::guard('customer')->logout();
        session()->flush();
        $request->session()->forget('customers_id');
        $request->session()->regenerate();
        return redirect('/');
    }

    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleSocialLoginCallback($social)
    {
        $result = $this->customer->handleSocialLoginCallback($social);
        if (!empty($result)) {
            return redirect('/')->with('result', $result);
        }
    }

    public function createRandomPassword()
    {
        $pass = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        return $pass;
    }

    public function likeMyProduct(Request $request)
    {
        $cartResponse = $this->customer->likeMyProduct($request);
        return $cartResponse;
    }

    public function unlikeMyProduct(Request $request, $id)
    {

        if (!empty(auth()->guard('customer')->user()->id)) {
            $this->customer->unlikeMyProduct($id);
            $message = Lang::get("website.Product is unliked");
            return redirect()->back()->with('success', $message);
        } else {
            return redirect('login')->with('loginError', 'Please login to like product!');
        }

    }

    public function wishlist(Request $request)
    {
        $title = array('pageTitle' => Lang::get("website.Wishlist"));
        $final_theme = $this->theme->theme();
        $result = $this->customer->wishlist($request);
		
		$min_price = '';
            $max_price = '';
            $limit = 15;
            $type = '';
            $categories_id = '';
            $search = '';
            $min_price = '';
            $max_price = '';
            $filters = array();
		  $result['authors'] = DB::table('users')->whereIn('role_id', ['3','1'])->get();
		  
		  foreach($result['authors'] as $id=>$author)
		  {
		  $data = array('page_number' =>'0', 'type' => $type, 'limit' => $limit, 'categories_id' => $categories_id, 'search' => $search, 'filters' => $filters, 'limit' => $limit, 'min_price' => $min_price, 'max_price' => $max_price,"author_id"=> $author->id);
		  
		  
		  $products = $this->products->products($data);
		 $result['authors'][$id]->totallikes=$result['authors'][$id]->totalreviews=$result['authors'][$id]->totalviewed=$result['authors'][$id]->totalordered=0;
		 
		 $result['authors'][$id]->totalrecipes = count($products['product_data']);
		  foreach($products['product_data'] as $prod)
		  {
			  $result['authors'][$id]->totallikes+=$prod->products_liked;
			  $result['authors'][$id]->totalreviews+=$prod->total_user_rated;
			  $result['authors'][$id]->totalviewed+=$prod->products_viewed;
			  $result['authors'][$id]->totalordered+=$prod->products_ordered;
		  }
		  }
		  
		  
		  $result['categories'] = $this->products->categories();
		
		
		
        return view("web.wishlist", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
    }

    public function loadMoreWishlist(Request $request)
    {

        $limit = $request->limit;

        $data = array('page_number' => $request->page_number, 'type' => 'wishlist', 'limit' => $limit, 'categories_id' => '', 'search' => '', 'min_price' => '', 'max_price' => '');
        $products = $this->products->products($data);
        $result['products'] = $products;

        $cart = '';
        $myVar = new CartController();
        $result['cartArray'] = $this->products->cartIdArray($cart);
        $result['limit'] = $limit;
        return view("web.wishlistproducts")->with('result', $result);

    }

    public function forgotPassword()
    {
        if (auth()->guard('customer')->check()) {
            return redirect('/');
        } else {

            $title = array('pageTitle' => Lang::get("website.Forgot Password"));
            $final_theme = $this->theme->theme();
            $result = array();
            $result['commonContent'] = $this->index->commonContent();
            return view("web.forgotpassword", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
        }
    }

    public function processPassword(Request $request)
    {
        $title = array('pageTitle' => Lang::get("website.Forgot Password"));

        $password = $this->createRandomPassword();

        $email = $request->email;
        $postData = array();

        //check email exist
        $existUser = $this->customer->ExistUser($email);
        if (count($existUser) > 0) {
            $this->customer->UpdateExistUser($email, $password);
            $existUser[0]->password = $password;

            $myVar = new AlertController();
            $alertSetting = $myVar->forgotPasswordAlert($existUser);

            return redirect('login')->with('success', Lang::get("website.Password has been sent to your email address"));
        } else {
            return redirect('forgotPassword')->with('error', Lang::get("website.Email address does not exist"));
        }

    }

    public function recoverPassword()
    {
        $title = array('pageTitle' => Lang::get("website.Forgot Password"));
        $final_theme = $this->theme->theme();
        return view("web.recoverPassword", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
    }

    public function subscribeNotification(Request $request)
    {

        $setting = $this->index->commonContent();

        /* Desktop */
        $type = 3;

        session(['device_id' => $request->device_id]);

        if (auth()->guard('customer')->check()) {

            $device_data = array(
                'device_id' => $request->device_id,
                'device_type' => $type,
                'created_at' => time(),
                'updated_at' => time(),
                'ram' => '',
                'status' => '1',
                'processor' => '',
                'device_os' => '',
                'location' => '',
                'device_model' => '',
                'user_id' => auth()->guard('customers')->user()->id,
                'manufacturer' => '',
            );

        } else {

            $device_data = array(
                'device_id' => $request->device_id,
                'device_type' => $type,
                'created_at' => time(),
                'updated_at' => time(),
                'ram' => '',
                'status' => '1',
                'processor' => '',
                'device_os' => '',
                'location' => '',
                'device_model' => '',
                'manufacturer' => '',
            );

        }
        $this->customer->updateDevice($request, $device_data);
        print 'success';
    }

    public function signupProcess(Request $request)
    {
        $old_session = Session::getId();

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $gender = $request->gender;
        $email = $request->email;
        $password = $request->password;
        $date = date('y-md h:i:s');
        //        //validation start
        $validator = Validator::make(
            array(
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'customers_gender' => $request->gender,
                'email' => $request->email,
                'password' => $request->password,
                're_password' => $request->re_password,

            ), array(
                'firstName' => 'required ',
                'lastName' => '',
                'customers_gender' => '',
                'email' => 'required | email',
                'password' => 'required',
                're_password' => 'required | same:password',
            )
        );
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {

            $res = $this->customer->signupProcess($request);
            //eheck email already exit
            //dd($res);
            if ($res['email'] == "true") {
                return redirect('/login')->withInput($request->input())->with('error', Lang::get("website.Email already exist"));
            } else {
                if ($res['insert'] == "true") {
                    if ($res['auth'] == "true") {
                        $result = $res['result'];
                        Session::forget('guest_checkout');
                        return redirect('/')->with('result', $result);
                    } else {
                        return redirect('login')->with('loginError', Lang::get("website.Email or password is incorrect"));
                    }
                } else {
                    return redirect('/login')->with('error', Lang::get("website.something is wrong"));
                }
            }

        }
    }

}
