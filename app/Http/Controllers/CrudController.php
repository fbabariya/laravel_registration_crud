<?php

namespace App\Http\Controllers;

use App\Events\mail;
use App\Models\crud;
use Illuminate\Http\Request;
use App\Models\countrylist;
use Illuminate\Support\Facades\Storage;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $users = crud::with('getcountry')->paginate('5');
        return view('layout.successPage',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    
     public function create()
    {   $countries=countrylist::all();
        return view('layout.form',compact('countries'));
    }

    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { $request-> validate([
    
        'first_name' =>'required|string',
        'last_name'=>'required|string',
        'email'=>'required|email',
        'contact'=>'numeric|nullable',
        'gender'=>'required',
        'hobies'=>'required|array',
        'address'=>'nullable|string|max:100',
        'country_id'=>'required|exists:countrylists,id',
        //'profile'=>'required|array',
        'profile.*' => 'image',// Validate each item in the array as an image

    ]);
        $requestData = $request->except(['_token', 'regist']);
        //$imgName = 'lv_' . rand() . '.' . $request->profile->extension();
        //$request->profile->move(public_path('profile_pictures/'), $imgName);
        
        //change for multi image
        if($request->hasFile('profile')) {
            $images = [];

            // Iterate over each uploaded file
            foreach($request->file('profile') as $file) {
                // Generate a unique name for each file
                $imgName = 'lv_' . uniqid() . '.' . $file->extension();
                // Move the file to the desired location
                $file->move(public_path('profile_pictures/'), $imgName);
                // Add the file name to the images array
                $images[] = $imgName;
            }
        $requestData['profile'] = serialize($images);
      
      crud::create($requestData);
        return redirect('crud');
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(crud $crud)
    {  
         $countries=countrylist::all();
       return view('layout.show',compact('countries','crud'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(crud $crud)
    {
        $countries = countrylist::all();
        return view('layout.edit', compact('countries', 'crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, crud $crud)
    {
        $crud->first_name = $request->first_name ?? $crud->first_name;
        $crud->last_name = $request->last_name ?? $crud->last_name;
        $crud->email = $request->email ?? $crud->email;
        $crud->contact = $request->contact ?? $crud->contact;
        $crud->gender = $request->gender ?? $crud->gender;
        $crud->hobies = $request->hobies ?? $crud->hobies;
        $crud->address= $request->address??$crud->address;
        $crud->country_id= $request->country_id??$crud->country_id;
   
    // Fetch existing profile images
    $profile = unserialize($crud->profile)??[];    

    // Handle updated images
    if ($request->hasFile('profile')) {
        $images = [];
        foreach ($request->file('profile') as $file) {
            $imgName = 'lv_' . uniqid() . '.' . $file->extension();
            $file->move(public_path('profile_pictures/'), $imgName);
            $images[] = $imgName;
        }
        //$existingImages = $request->input('existing_images') ?? [];
        //$crud->profile = serialize(array_merge($existingImages, $images));
        $profile = array_merge($profile, $images);
    }

    // Handle deleted images
    if ($request->has('deleted_images')) {
        $deletedImages = $request->deleted_images;
    
        foreach ($deletedImages as $deletedImage) {
            // Delete the image from storage
            Storage::delete('profile_pictures/' . $deletedImage);
            
            // Remove the image from the profile array
            if (($key = array_search($deletedImage, $profile)) !== false) {
                unset($profile[$key]);
            }
        } 
        }
        // Serialize the updated array and assign it back to the profile property
        $crud->profile = serialize($profile);
   
    $crud->save();
    return redirect('crud');
    }
    

    
   


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(crud $crud)
    {
        $crud->delete();
       
        return redirect('crud');
    }
}
