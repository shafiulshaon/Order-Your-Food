<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VerifyAdminProfileInput;  
use App\Http\Requests\VerifyChangePassword; 
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index(Request $request)
    { 
        $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

    	return view('admin.index')
        ->with('adminDetails', $adminDetails);
    }

    public function profile(Request $request)
    {        
    	 $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

    	return view('admin.profile')
    		->with('adminDetails', $adminDetails);
    }

    public function edit(Request $request)
    {        
         $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('admin.edit')
            ->with('adminDetails', $adminDetails);
    }

    public function profileupdate(VerifyAdminProfileInput $request, $userID)
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

        $adminData = [
             'email' => $request->email,
             'name' => $request->name,
             'gender' => $request->gender,
             'dob' =>   $request->dob,
             'photo' => $photo,
             'address' => $request->address,
             'phone' => $request->phone,
        ];

        DB::table('admin')
            ->where('userID', $request->userID)
            ->update($adminData);

        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['email' => $request->email, 'updatedAt' => date("Y-m-d")]);

        return redirect()->route('adminProfile');
    }

    public function passwordEdit(Request $request, $userID)
    {        
        $currentInfo= DB::table('logininfo')
            ->where('userID', $userID)
            ->first();

        return view('admin.changePassword')
            ->with('currentInfo', $currentInfo);
    } 

    public function passwordUpdate(VerifyChangePassword $request, $userID)
    {        
        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['password' => $request->password_confirmation, 'updatedAt' => date("Y-m-d")]);


        $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

            return redirect()->route('adminHome');
    }

    public function searchDetails(Request $request)
    { 
        $searchObject=$request->oldsearch;
        $searchType=$request->type;
        $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        if($searchType=="items")
        {
             $itemList = DB::table('itemlist')
            ->join('restaurant', 'itemlist.restaurantID', '=', 'restaurant.userID')
            ->where('name','LIKE', '%' . $searchObject. '%')
            ->get(); 
            return view('admin.index')
            ->with('adminDetails', $adminDetails)
            ->with('itemDetails',  $itemList);

        }
        else if($searchType=="restaurants")
        {
            $restaurantList = DB::table('restaurant')
            ->where('restaurantName','LIKE', '%' . $searchObject. '%')
            ->get(); 

            return view('admin.index')
            ->with('adminDetails', $adminDetails)
            ->with('restaurantDetails',  $restaurantList);

        }

    }

    public function deleteItem($itemID)
    {        
        DB::table('itemlist')
            ->where('itemID', $itemID)
            ->delete();

        return redirect()->route('adminHome');
    }

    public function item(Request $request)
    {        
        $itemList = DB::table('itemlist')
            ->join('restaurant', 'itemlist.restaurantID', '=', 'restaurant.userID')
            ->get();    

        $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        $customerDetails = DB::table('customer')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row

        return view('admin.item')
        ->with('customerDetails',$customerDetails)
        ->with('adminDetails',$adminDetails)
        ->with('itemList', $itemList);
    }
    
    public function report(Request $request)
    {        
        $customerCount=DB::table('customer')->count();
        $resturentCount=DB::table('restaurant')->count();
        $totalTransaction=DB::table('orderlist')->sum('totalAmount');

        $mostRated = DB::table('restaurant')
                     ->select(DB::raw('max(ratting) as rate, restaurantName'))
                     ->groupBy('restaurantName')
                     ->first();
                
        return view('admin.report')
               ->with('customerCount',$customerCount)
               ->with('restaurantCount',$resturentCount)
               ->with('totalTransaction',$totalTransaction)
               ->with('mostRated',$mostRated);

    }

    public function viewRestaurentDetails($resID)
    {

         $adminDetails = DB::table('admin')
            ->where('userID', session('user')->userID)
            ->first(); //return a single row


        $getRestaurantDetails = DB::table('restaurant')
            ->where('userID', $resID)
            ->first(); //return first row

        $restaurantReview = DB::table('ratting')
            ->where('restaurantID', $resID)
            ->join('customer', 'customer.userID', '=', 'ratting.userID')
            ->get(); //return first row

            return view('admin.viewRestaurentDetails')
            ->with('adminDetails', $adminDetails)
            ->with('restaurantReview', $restaurantReview)
            ->with('getRestaurantDetails', $getRestaurantDetails);
    }
    





}
