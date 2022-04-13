<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $req)
    {   
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
}