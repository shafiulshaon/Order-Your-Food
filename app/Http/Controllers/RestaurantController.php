<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VerifyRestaurantRegInput;  
use App\Http\Requests\VerifyRestaurantProfileInput;   
use App\Http\Requests\VerifyChangePassword;  
use App\Http\Requests\VerifyRestaurantItemInput;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {        
    	$restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('restaurant.index')
        ->with('restaurantDetails', $restaurantDetails);
    }

    public function registrationForm(Request $request)
    {        
        return view('restaurant.registrationForm');
    }

    public function storeRegistrationForm(VerifyRestaurantRegInput $request)
    {       

        $getNewResID = DB::table('logininfo')
            ->select('userID')
            ->max('userID');

        $logininfoData = [
             'userID' => $getNewResID+1,
             'email' => $request->email,
             'type' => "Restaurant",
             'accountStatus' => "valid",
             'password' => $request->password_confirmation,
             'createdAt' => date("Y-m-d"),
             'updatedAt' => date("Y-m-d"),
            ];

        $restaurantData = [
             'userID' => $getNewResID+1,
             'restaurantName' => $request->restaurantName,
             'branch' => $request->branch,
             'address' => $request->address,
             'email' => $request->email,
             'phone' => $request->phone,
             'logo' => "none",
             'ownerName' => $request->owner,
             'openTime' => "00:00 AM",
             'closeTime' => "00:00 AM",
             'ratting' => 0,
             'createdAt' => date("Y-m-d"),
             'updatedAt' => date("Y-m-d"),
             'status' => "open"
         ];


        DB::table('logininfo')
             ->insert($logininfoData);

        DB::table('restaurant')
             ->insert($restaurantData);

        return redirect()->route('login');
    }

    public function profile(Request $request)
    {        
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('restaurant.profile')
            ->with('restaurantDetails', $restaurantDetails);
    }

    public function edit(Request $request)
    {        
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        if($restaurantDetails->openTime!="N/A" && $restaurantDetails->closeTime!="N/A") 
        {
            $openTime=preg_split("/[\s:]+/", $restaurantDetails->openTime);
            $closeTime=preg_split("/[\s:]+/", $restaurantDetails->closeTime);

            return view('restaurant.edit')
            ->with('restaurantDetails', $restaurantDetails)
            ->with('openTime', $openTime)
            ->with('closeTime', $closeTime);
        }else{
             return view('restaurant.edit')
            ->with('restaurantDetails', $restaurantDetails);
        }
         
    }

    public function profileupdate(VerifyRestaurantProfileInput $request, $userID)   
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

            $logo=$request->userID.".".$file->getClientOriginalExtension();
            //Move Uploaded File
            $file->move('uploads/profilePhotos',$request->userID.".".$file->getClientOriginalExtension());
        }
        else
        {
            $logo=$request->logo;
        }

        $restaurantData = [
             'email' => $request->email,
             'restaurantName' => $request->restaurantName,
             'branch' => $request->branch,
             'ownerName' => $request->owner,
             'logo' => $logo,
             'address' => $request->address,
             'status' => $request->status,
             'phone' => $request->phone,
             'openTime' => $request->openhh.":".$request->openmm." ".$request->openPeriod,
             'closeTime' =>$request->closehh.":".$request->closemm." ".$request->closePeriod,
             'updatedAt' => date("Y-m-d"),
        ];


        DB::table('restaurant')
            ->where('userID', $request->userID)
            ->update($restaurantData);

        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['email' => $request->email, 'updatedAt' => date("Y-m-d")]);

        return redirect()->route('restaurantProfile');
    }

    public function passwordEdit(Request $request, $userID)
    {        
        $currentInfo= DB::table('logininfo')
            ->where('userID', $userID)
            ->first();

        return view('restaurant.changePassword')
            ->with('currentInfo', $currentInfo);
    } 

    public function passwordUpdate(VerifyChangePassword $request, $userID)
    {        
        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['password' => $request->password_confirmation, 'updatedAt' => date("Y-m-d")]);

        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return redirect()->route('restaurantHome');
    }

    public function item(Request $request)
    {        
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row

        $itemList = DB::table('itemlist')
            ->where('restaurantID', session('user')->userID)
            ->get(); //return first row

        return view('restaurant.item')
        ->with('restaurantDetails', $restaurantDetails)
        ->with('itemList', $itemList);

    } 


    public function createItem(Request $request)
    {        
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row

        return view('restaurant.createItem')
        ->with('restaurantDetails', $restaurantDetails);
    }

    public function storeItem(VerifyRestaurantItemInput $request)
    {   
        $getNewItemID = DB::table('itemlist')
            ->select('itemID')
            ->max('itemID');   
        $getNewItemID = $getNewItemID+1;

        $file = $request->file('file');
        $photo=$getNewItemID.".".$file->getClientOriginalExtension();
        $file->move('uploads/itemPhotos',$getNewItemID.".".$file->getClientOriginalExtension());

        $itemData = [
             'itemID' => $getNewItemID,
             'name' => $request->name,
             'description' => $request->description,
             'foodType' => $request->type,
             'photo' => $photo,
             'regPrice' => $request->price,
             'availability' => $request->availability,
             'restaurantID' => $request->userID,
             'createdAt' => date("Y-m-d"),
             'updatedAt' => date("Y-m-d"),
            ];

            DB::table('itemlist')
             ->insert($itemData);

        return redirect()->route('restaurantItem');
    }

    public function itemEdit($itemID)
    {
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row

        $itemDetails = DB::table('itemlist')
            ->where('itemID', $itemID)
            ->first(); //return first row

        return view('restaurant.editItem')
        ->with('itemDetails', $itemDetails)
        ->with('restaurantDetails', $restaurantDetails);
    }

    public function itemUpdate(VerifyRestaurantItemInput $request, $itemID)
    {
        $file = $request->file('file');
   
        if(!empty($_FILES['file']['name']))
        {
            define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/laravel_foodTown");
            $fileUploadPath= APP_ROOT."/public/uploads/itemPhotos/";
            $existingFile=glob ($fileUploadPath."".$request->itemID.".*");
            if($existingFile) {
             foreach($existingFile as $deleteFile){ // iterate files
            if(is_file($deleteFile))
            unlink($deleteFile); // delete file
                }
            }

            $photo=$request->itemID.".".$file->getClientOriginalExtension();
            //Move Uploaded File
            $file->move('uploads/itemPhotos',$request->itemID.".".$file->getClientOriginalExtension());
        }
        else
        {
            $photo=$request->photo;
        }

         $itemData = [
             'name' => $request->name,
             'description' => $request->description,
             'foodType' => $request->type,
             'photo' => $photo,
             'regPrice' => $request->price,
             'availability' => $request->availability,
             'updatedAt' => date("Y-m-d"),
            ];

        DB::table('itemlist')
            ->where('itemID', $request->itemID)
            ->update($itemData);

        return redirect()->route('restaurantItem');
    }

    public function itemDelete($itemID)
    {
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row

        $itemDetails = DB::table('itemlist')
            ->where('itemID', $itemID)
            ->first(); //return first row

        return view('restaurant.deleteItem')
        ->with('itemDetails', $itemDetails)
        ->with('restaurantDetails', $restaurantDetails);
    }

    public function itemDestroy(Request $request, $itemID)
    {
        DB::table('itemlist')
            ->where('itemID', $request->itemID)
            ->delete();

        return redirect()->route('restaurantItem');
    }

    public function order(Request $request)
    {
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row
        

            $itemList = DB::table('cartlist')
            ->where('itemlist.restaurantID', session('user')->userID)
            ->where('cartlist.status', "Ordered")
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->join('orderlist', 'orderlist.orderid', '=', 'cartlist.orderid')
            ->join('customer', 'customer.userID', '=', 'cartlist.userID')
            ->select(
            'itemlist.name',
            'itemlist.photo',
            'customer.name as cusName',
            'orderlist.address',
            'orderlist.phone',
            'itemlist.regPrice',
            'itemlist.availability',
            'cartlist.grossPrice',
            'cartlist.quantity',
            'orderlist.date',
            'orderlist.time',
            'cartlist.cartID'
        )
            ->get();
 
        return view('restaurant.order')
        ->with('restaurantDetails',$restaurantDetails)
        ->with('itemList',$itemList);
    }

    public function orderHistory(Request $request)
    {
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row
        

            $itemList = DB::table('cartlist')
            ->where('itemlist.restaurantID', session('user')->userID)
            ->where(function($query) {
            $query->where('cartlist.status', "Delivered")
            ->orWhere('cartlist.status', 'Postponed');
            })
            ->join('itemlist', 'itemlist.itemID', '=', 'cartlist.itemID')
            ->join('orderlist', 'orderlist.orderid', '=', 'cartlist.orderid')
            ->join('customer', 'customer.userID', '=', 'cartlist.userID')
            ->select(
            'itemlist.name',
            'itemlist.photo',
            'customer.name as cusName',
            'orderlist.address',
            'orderlist.phone',
            'itemlist.regPrice',
            'itemlist.availability',
            'cartlist.grossPrice',
            'cartlist.quantity',
            'orderlist.date',
            'cartlist.status as orderStatus',
            'orderlist.time',
            'cartlist.cartID'
            )->get();

 
        return view('restaurant.orderHistory')
        ->with('restaurantDetails',$restaurantDetails)
        ->with('itemList',$itemList);
    }


    

    public function orderDelivered($cartID)
    {
        DB::table('cartlist')
            ->where('cartID', $cartID)
            ->update(['status' => "Delivered"]);

        return redirect()->route('restaurantOrder');
    }

    public function orderPostponed($cartID)
    {
       DB::table('cartlist')
            ->where('cartID', $cartID)
            ->update(['status' => "Postponed"]);

        return redirect()->route('restaurantOrder');
    }

    public function searchDetails(Request $request)
    { 
        $searchObject=$request->oldsearch;
        $searchType=$request->type;
        $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        if($searchType=="items")
        {
             $itemList = DB::table('itemlist')
            ->join('restaurant', 'itemlist.restaurantID', '=', 'restaurant.userID')
            ->where('name','LIKE', '%' . $searchObject. '%')
            ->get(); 

            return view('restaurant.index')
            ->with('restaurantDetails', $restaurantDetails)
            ->with('itemDetails',  $itemList);

        }
        else if($searchType=="restaurants")
        {
            $restaurantList = DB::table('restaurant')
            ->where('restaurantName','LIKE', '%' . $searchObject. '%')
            ->get(); 

            return view('restaurant.index')
            ->with('restaurantDetails', $restaurantDetails)
            ->with('restaurantDetailsDiff',  $restaurantList);

        }

    }

    public function viewRestaurentDetails($resID)
    {

         $restaurantDetails = DB::table('restaurant')
            ->where('userID', session('user')->userID)
            ->first(); //return first row

        $getRestaurantDetails = DB::table('restaurant')
            ->where('userID', $resID)
            ->first(); //return first row

        $restaurantReview = DB::table('ratting')
            ->where('restaurantID', $resID)
            ->join('customer', 'customer.userID', '=', 'ratting.userID')
            ->get(); //return first row

            return view('restaurant.viewRestaurentDetails')
            ->with('restaurantDetails', $restaurantDetails)
            ->with('restaurantReview', $restaurantReview)
            ->with('getRestaurantDetails', $getRestaurantDetails);
    }
    

}


        