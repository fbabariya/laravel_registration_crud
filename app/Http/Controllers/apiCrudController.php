<?php

namespace App\Http\Controllers;

use App\Models\countrylist;
use App\Models\crud;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class apiCrudController extends Controller
{
    public function index(Request $request) : JsonResponse
    {   
        try
        {
        $data=$request->all();
        echo "<pre>";
        print_r($data);
       
        $users = crud::with('getcountry')->paginate('5');
        return response()->json(['status'=>200, 'message'=>'Data retrived sucessfully', 'data'=>$users]);
  
        }
        catch(\Exception $ex){
            return response()->json(['status'=>500, 'message'=>$ex->getMessage(), 'data'=>null]);
        }

    }
        public function create() : JsonResponse
    {   
        try{
            $countries=countrylist::all();
            return response()->json(['status'=>200, 'message'=>'Data retrived sucessfully', 'data'=>$countries]);
            }
        catch(\Exception $ex)
        {
            return response()->json(['status'=>500, 'message'=>$ex->getMessage(), 'data'=>null]);
        }
    }


    public function store(Request $request): JsonResponse
    { 
    try{
        $requestData = $request->all(); 
           
        if(!empty($requestData['profile'])){
            $imgName = 'lv_' . rand() . '.' . $request->profile->extension();
            $request->profile->move(public_path('profiles/'), $imgName);
            $requestData['profile'] = $imgName;
        }
        $store=crud::create($requestData);
        
        return response()->json(['status'=>200, 'message'=>'Data retrived sucessfully', 'data'=>$store]);
    }
        
        catch(\Exception $ex){
            return response()->json(['status'=>500, 'message'=>$ex->getMessage(), 'data'=>null]);
        }
    }
}   