<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

   

    
    function register(Request $req)
    {   


        $req->validate([
            'firstname' =>'required',
            'middlename' =>'required',
            'lastname' =>'required',
            'email' =>'required',
            'password' =>'required',
            'gender' =>'required',
            'month' =>'required',
            'day' =>'required',
            'year' =>'required',
            'primarynumber' =>'required',
            'province' =>'required',
            'town' =>'required',
            'barangay' =>'required',
            'zipcode' =>'required',
            'currentaddress' =>'required',
           
        ]);

        $user= new User;
        $user->firstname=$req->input('firstname');
        $user->lastname=$req->input('lastname');
        $user->middlename=$req->input('middlename');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));

        $user->gender=$req->input('gender');
        $user->month=$req->input('month');
        $user->day=$req->input('day');
        $user->year=$req->input('year');
        
        $user->primarynumber=$req->input('primarynumber');
        $user->secondarynumber=$req->input('secondarynumber');

        $user->landline=$req->input('landline');
        $user->province=$req->input('province');
        $user->town=$req->input('town');
        $user->barangay=$req->input('barangay');
        $user->zipcode=$req->input('zipcode');

        $user->currentaddress=$req->input('currentaddress');
        $user->image=$req->file('image')->store('usersimage');

        $user->save();
        return $req;
    }

    function login(Request $req)
    {
        $user= User::where('email', $req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password))
        {
            return ["error"=>"Email or password is not matched!"];
        }
        return $user;
    }


    function list()
    {

        return User::all();
    }

    function delete($id)
    {
        $result = User::where('id', $id)->delete();
        if ($result)
        {
            return ["result " => "product has been deleted"];
        }
        else{
            return ["result " => "Operation Failed"];
        } 
    }



  


        function edit($id)
        {
            return User::find($id);
        }



        // public function update(Request $request, $id)

        // {
          
        //     $user= User::where('id', $id)->first();

        //     if ($user)
        //     {

        //     $user->firstname=$req->input('firstname');
        //     $user->lastname=$req->input('lastname');
        //     $user->middlename=$req->input('middlename');
        //     $user->email=$req->input('email');
        //     $user->password=Hash::make($req->input('password'));
    
        //     $user->gender=$req->input('gender');
        //     $user->month=$req->input('month');
        //     $user->day=$req->input('day');
        //     $user->year=$req->input('year');
            
        //     $user->primarynumber=$req->input('primarynumber');
        //     $user->secondarynumber=$req->input('secondarynumber');
    
        //     $user->landline=$req->input('landline');
        //     $user->province=$req->input('province');
        //     $user->town=$req->input('town');
        //     $user->barangay=$req->input('barangay');
        //     $user->zipcode=$req->input('zipcode');
    
        //     $user->currentaddress=$req->input('currentaddress');
        //     $user->image=$req->file('image')->store('usersimage');
    
        //     $user->update();
           
        //     }
        //     else{
        //         return response()->json([
        //         'status'=> 404,
        //         'message' => 'Product Not Found',
        //         ]);
        //     }

        // }



        function update(Request $req, $id)
        {

        
            $user= User::find($id);
            if($user){
            $user->firstname=$req->input('firstname');
            $user->lastname=$req->input('lastname');
            $user->middlename=$req->input('middlename');
            $user->email=$req->input('email');
            $user->password=Hash::make($req->input('password'));
    
            $user->gender=$req->input('gender');
            $user->month=$req->input('month');
            $user->day=$req->input('day');
            $user->year=$req->input('year');
            
            $user->primarynumber=$req->input('primarynumber');
            $user->secondarynumber=$req->input('secondarynumber');
    
            $user->landline=$req->input('landline');
            $user->province=$req->input('province');
            $user->town=$req->input('town');
            $user->barangay=$req->input('barangay');
            $user->zipcode=$req->input('zipcode');
            $user->currentaddress=$req->input('currentaddress');
    
            $user->update();
        
                
                return response()->json(
                    [
                        'status'=> 200,
                        'message' => "Profile Updated Successfully"
                    ]
                    );
                    
                }
                
         
}


}