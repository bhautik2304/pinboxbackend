<?php

namespace App\Http\Controllers;

use App\Models\{User};
use Illuminate\Http\Request;
use Illuminate\Support\{Str};

class authController extends Controller
{
    //
    public function login(Request $req)
    {
        # code...
        $users=User::where('email',$req->username)->orWhere('mobaile_no',$req->username)->first();
        if (!$users) {
            # Wrong User Id...
            return response(["msg"=>"Pls Provide Right Emailid or Mobaile no.","code"=>100],200);
        }
        if(!($users->password===$req->password)){
            return response(["msg"=>"Pls Provide Right Password","code"=>200],200);
        }
        return response(["msg"=>"Pls Provide Right Emailid or Mobaile no.","code"=>300,"users"=>$users],200);
    }

    public function register(Request $req)
    {
        # code...

        $users=new User;
        $users->name=Str::ucfirst($req->name);
        $users->email=$req->email;
        $users->mobaile_no=$req->mobaile_no;
        $users->password=$req->password;
        $res = $users->save();
        if (!$res) {
            # code...
            return response(["msg" => "$req->name Not Created Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "$users->name Created Successfully", "code" => 1], 200);
    }
    public function index(Request $req)
    {
        # code...
        return response(["users" => User::all()], 200);
    }

    public function update(Request $req,User $users,$id)
    {
        # code...
        $users = $users->find($id);
        $userres = $users->find($id)->update([
            "name" => $req->name,
            "email" => $req->email,
            "mobaile_no" => $req->mobaile_no,
            "password" => $req->password,
        ]);
        if (!$userres) {
            # code...
            return response(["msg" => "Employe Name $req->name Not Updated, Something Went Wrong", "code" => 0], 200);
        }
        return response(["msg" => "Employe Name $users->name Updated Successfully", "code" => 1], 200);
    }
}
