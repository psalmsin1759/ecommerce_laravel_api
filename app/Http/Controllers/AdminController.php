<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function loginAction(Request $request){

        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('email', $email)->first();

        if ($admin != null){

            if(!$admin || !Hash::check($password, $admin->password)) {
                return redirect("login")->with('error','Email and password combination does not match');
            }

            $request->session()->put("access", 'YES');
            $request->session()->put("id", $admin->id);
            $request->session()->put("name", $admin->first_name);
            $request->session()->put("email", $email);
            $request->session()->put("role", $admin->role);

            return redirect("/index");

        }else{

            return redirect("login")->with('error','Invalid email address');

        }


    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //$data = $request->validate();

        $admin = Admin::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => bcrypt( $request->password),
            'code' => md5($request->email),
            'role' => $request->role,
            'status' => 1
        ]);

        return redirect ("/admin");

        /* $token = $admin->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'data' => $admin,
            "token" => $token
        ]); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Admin::destroy($id);
        //return redirect ("/admin");
    }

    public function deleteAdmin(Request $request){

        $id = $request->id;
        $admin = Admin::find($id);
        $role = $admin->role;
        if ($role != "admin"){
            Admin::destroy($id);
        }
       
    }

    public function changeAdminStatus(Request $request){

        $adminid = $request->adminid;
        $admin = Admin::find($adminid);
        $admin->status =  $request->status;
        $admin->save();

        return redirect ("admin");
    }

    public function editAdminProfile(Request $request){

        $id = $request->id;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        

        $admin = Admin::find($id);
        $admin->first_name = $firstname;
        $admin->last_name = $lastname;
        $admin->save();

        $request->session()->put("name", $firstname);

        return redirect ("/profile");

    }

    public function changeAdminPassword(Request $request){

        $id = $request->id;
        $newpassword = $request->newpassword;
        $confirmpassword = $request->confirmpassword;

        

        if ($newpassword == $confirmpassword){

            $admin = Admin::find($id);
            $admin->password = bcrypt($newpassword);
            $admin->save();

            return redirect("/profile")->with('success','Password Change was successful');;

            

        }else{
            return redirect("/profile")->with('error','Password mismatch..Please try again!');;
        }
    }
}
