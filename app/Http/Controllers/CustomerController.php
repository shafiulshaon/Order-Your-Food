<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VerifyCustomerProfileInput;
use App\Http\Requests\VerifyCustomerRegInput;  
use App\Http\Requests\VerifyChangePassword; 
use App\Http\Requests\VerifyCustomerOrderInput;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    { 
        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

    	return view('customer.index')
        ->with('customerDetails', $customerDetails);
    }

    public function profile(Request $request)
    {        
    	$customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

    	return view('customer.profile')
    		->with('customerDetails', $customerDetails);
    }

    public function edit(Request $request)
    {        
        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('customer.edit')
            ->with('customerDetails', $customerDetails);
    }

    public function profileupdate(VerifyCustomerProfileInput $request, $userID)
    {    

        $file = $request->file('file');
   
        if(!empty($_FILES['file']['name']))
        {
            define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/laravel_foodTown");
            $fileUploadPath= APP_ROOT."/public/uploads/profilePhotos/";
            $existingFile=glob ($fileUploadPath."".$request->userID.".*");
            if($existingFile) {
             foreach($existingFile as $deleteFile){ // iterate files
            if(is_file($deleteFile))
            unlink($deleteFile); // delete file
                }
            }

            $photo=$request->userID.".".$file->getClientOriginalExtension();
            //Move Uploaded File
            $file->move('uploads/profilePhotos',$request->userID.".".$file->getClientOriginalExtension());
        }
        else
        {
            $photo=$request->photo;
        }

        $customerData = [
             'email' => $request->email,
             'name' => $request->name,
             'gender' => $request->gender,
             'dob' =>   $request->dob,
             'photo' => $photo,
             'address' => $request->address,
             'phone' => $request->phone,
        ];

        DB::table('customer')
            ->where('userID', $request->userID)
            ->update($customerData);

        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['email' => $request->email, 'updatedAt' => date("Y-m-d")]);

        return redirect()->route('customerProfile');
    }

    public function registrationForm(Request $request)
    {   
        
        return view('customer.registrationForm');
    }

    public function storeRegistrationForm(VerifyCustomerRegInput $request)
    {        

        $getNewUserID = DB::table('logininfo')
            ->select('userID')
            ->max('userID');

        $logininfoData = [
             'userID' => $getNewUserID+1,
             'email' => $request->email,
             'type' => "Customer",
             'accountStatus' => "valid",
             'password' => $request->password_confirmation,
             'createdAt' => date("Y-m-d"),
             'updatedAt' => date("Y-m-d"),
         ];

         $customerData = [
             'userID' => $getNewUserID+1,
             'name' => $request->name,
             'email' => $request->email,
             'gender' => $request->gender,
             'dob' => $request->dob,
             'address' => $request->address,
             'phone' => $request->phone,
             'joinDate' => date("Y-m-d"),
             'photo' => "none",
         ];


        DB::table('logininfo')
             ->insert($logininfoData);

        DB::table('customer')
             ->insert($customerData);

        return redirect()->route('login');
    }


    public function passwordEdit(Request $request, $userID)
    {        
        $currentInfo= DB::table('logininfo')
            ->where('userID', $userID)
            ->first();

        return view('customer.changePassword')
            ->with('currentInfo', $currentInfo);
    } 

    public function passwordUpdate(VerifyChangePassword $request, $userID)
    {        
        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['password' => $request->password_confirmation, 'updatedAt' => date("Y-m-d")]);


        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

            return redirect()->route('customerHome');
    }

    public function item(Request $request)
    {    
        $itemList = DB::table('itemlist')
            ->join('restaurant', 'itemlist.restaurantID', '=', 'restaurant.userID')
            ->get();    


        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('customer.item')
        ->with('customerDetails',$customerDetails)
        ->with('itemList', $itemList);
    } 

    public function itemAddToCart($itemID)
    {        
        $itemDetails = DB::table('itemlist')
            ->where('itemID', $itemID)
            ->first(); //return first row

        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('customer.itemAddToCart')
        ->with('customerDetails',$customerDetails)
        ->with('itemDetails', $itemDetails);
    } 

    public function storeItemAddToCart(Request $request, $itemID)
    {        
        $cartData = [
             'userID' => $request->userID,
             'itemID' => $request->itemID,
             'quantity' => $request->quantity,
             'grossPrice' => $request->regPrice*$request->quantity,
             'addedAtDate' => date("Y-m-d"),
             'status' => "In Cart",
             'orderID' => 0,
         ];

         DB::table('cartlist')
             ->insert($cartData);

        return redirect()->route('customerCart&Order');
    }

    public function cartNorder(Request $request)
    {        
        $cartList = DB::table('cartlist')
            ->where('userID', session('user')->userID)
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->get();    

        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        $totalAmount = DB::table('cartlist')
            ->where('userID', session('user')->userID)
            ->where('status', "In Cart")
            ->where('availability', "Yes")
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->sum('grossPrice'); 

        return view('customer.cartNorder')
        ->with('customerDetails',$customerDetails)
        ->with('cartList', $cartList)
        ->with('totalAmount', $totalAmount);
    }

    public function cartEdit($cartID)
    {   
        $itemDetails = DB::table('cartlist')
            ->where('cartID', $cartID)
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->first(); //return first row

        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('customer.editCart')
        ->with('customerDetails',$customerDetails)
        ->with('itemDetails', $itemDetails);
    }

    public function cartUpdate(Request $request, $cartID)
    {        
        DB::table('cartlist')
            ->where('cartID', $request->cartID)
            ->update(['quantity' => $request->quantity, 'grossPrice' => $request->regPrice*$request->quantity]);

        return redirect()->route('customerCart&Order');
    }

    public function cartRemove($cartID)
    {        
         $itemDetails = DB::table('cartlist')
            ->where('cartID', $cartID)
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->first(); //return first row

        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('customer.deleteCart')
        ->with('customerDetails',$customerDetails)
        ->with('itemDetails', $itemDetails);
    }

    public function cartDestroy(Request $request, $cartID)
    {        
        DB::table('cartlist')
            ->where('cartID', $request->cartID)
            ->delete();

        return redirect()->route('customerCart&Order');
    }

    public function orderItem(Request $request)
    {        
        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        $totalAmount = DB::table('cartlist')
            ->where('userID', session('user')->userID)
            ->where('status', "In Cart")
            ->where('availability', "Yes")
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->sum('grossPrice'); 

        return view('customer.order')
        ->with('totalAmount',$totalAmount)
        ->with('customerDetails',$customerDetails);
    }

    public function storeOrderItem(VerifyCustomerOrderInput $request)
    {   
        $getNewUserID = DB::table('orderlist')
            ->select('orderID')
            ->max('orderID');

        $getNewUserID=$getNewUserID+1; 

        $orderData = [
             'orderID' => $getNewUserID,
             'userID' => $request->userID,
             'totalAmount' => $request->totalAmount,
             'date' => date("Y-m-d"),
             'paymentType' => $request->paymentType,
             'address' => $request->address,
             'phone' => $request->phone,
             'time' => date("h:i:sa"),
         ];


        DB::table('orderlist')
             ->insert($orderData);

        DB::table('cartlist')
            ->where('userID', $request->userID)
            ->where('status', "In Cart")
            ->where('availability', "Yes")
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->update(['orderID' => $getNewUserID, 'status' => "Ordered"]);

        return redirect()->route('customerCart&Order');
    }  

    public function orderItemList(Request $request)
    {   
        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        $orderDetails = DB::table('orderlist')
            ->where('orderlist.userID', session('user')->userID)
            ->get();

        $itemDetails = DB::table('cartlist')
            ->where('userID', session('user')->userID)
            ->where('status', "Ordered")
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->get();

        return view('customer.orderList')
        ->with('customerDetails',$customerDetails)
        ->with('orderDetails',$orderDetails)
        ->with('itemDetails',$itemDetails);
    }

    public function restaurantDetails($userID)
    {   
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', $userID)
            ->first(); //return first row

        $restaurantReview = DB::table('ratting')
            ->where('restaurantID', $userID)
            ->join('customer', 'customer.userID', '=', 'ratting.userID')
            ->get(); //return first row

        $myReview = DB::table('ratting')
            ->where('restaurantID', $userID)
            ->where('userID', session('user')->userID)
            ->first(); //return first row

        $sumRatting= DB::table('ratting')
            ->where('restaurantID', $userID)
            ->sum('rate'); 

        $countUser= DB::table('ratting')
            ->where('restaurantID', $userID)
            ->count(); 

        $restaurantRatting=$sumRatting/$countUser;

        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row


        return view('customer.restaurantReview')
        ->with('customerDetails',$customerDetails)
        ->with('restaurantRatting', $restaurantRatting)
        ->with('restaurantReview', $restaurantReview)
        ->with('myReview', $myReview)
        ->with('restaurantDetails', $restaurantDetails);
    }

    public function storeRestaurantReview(Request $request, $userID)
    {   

        $countMyReview = DB::table('ratting')
            ->where('restaurantID', $request->restaurantID)
            ->where('userID', $request->userID)
            ->count();

        if ($countMyReview!=0) {

            DB::table('ratting')
            ->where('userID', $request->userID)
            ->where('restaurantID', $request->restaurantID)
            ->update(['rate' => $request->rate, 'comment' => $request->comment, 'date' => date("Y-m-d")]);

        }else{
            
            $reviewData = [
            'userID' => $request->userID,
            'restaurantID' => $request->restaurantID,
            'rate' => $request->rate,
            'comment' => $request->comment,
            'date' => date("Y-m-d"),
         ];

         DB::table('ratting')
             ->insert($reviewData);
        }
        
        $sumRatting= DB::table('ratting')
            ->where('restaurantID', $request->restaurantID)
            ->sum('rate'); 

        $countUser= DB::table('ratting')
            ->where('restaurantID', $request->restaurantID)
            ->count(); 

        $restaurantRatting=$sumRatting/$countUser;

        DB::table('restaurant')
            ->where('userID', $request->restaurantID)
            ->update(['ratting' => $restaurantRatting]);

        return redirect()->route('customerView.restaurantDetails', ['userID' => $request->restaurantID]);
    }

    public function searchDetails(Request $request)
    { 
        $searchObject=$request->oldsearch;
        $searchType=$request->type;
        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        if($searchType=="items")
        {
             $itemList = DB::table('itemlist')
            ->join('restaurant', 'itemlist.restaurantID', '=', 'restaurant.userID')
            ->where('name','LIKE', '%' . $searchObject. '%')
            ->get(); 
            return view('customer.index')
            ->with('customerDetails', $customerDetails)
            ->with('itemDetails',  $itemList);

        }
        else if($searchType=="restaurants")
        {
            $restaurantList = DB::table('restaurant')
            ->where('restaurantName','LIKE', '%' . $searchObject. '%')
            ->get(); 
            return view('customer.index')
            ->with('customerDetails', $customerDetails)
            ->with('restaurantDetails',  $restaurantList);

        }

    }

    
     
}
