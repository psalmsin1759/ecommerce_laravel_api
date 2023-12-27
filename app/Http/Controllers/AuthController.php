<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\LoginRequest;
use \App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use \App\Mail\MailHelper;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register(RegisterRequest $request){
       
        //$data = $request->validate();

        $data = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'sometimes', //optional
            'city' => 'sometimes', // Optional field
            'postal_code' => 'sometimes', // Optional field
            'state' => 'required',
            'country' => 'required',
        ]);
       
        
        $customer = new Customer();
        $customer->first_name = $data["first_name"];
        $customer->last_name = $data["last_name"];
        $customer->email = $data["email"];
        $customer->phone = $data["phone"];
        $customer->password = bcrypt($data["password"]);
        $customer->code = md5($data["email"]);
        $customer->status = 1;
        $customer->address = $data["address"];
        $customer->city = $data["city"];
        $customer->postal_code = $data["postal_code"];
        $customer->state = $data["state"];
        $customer->country = $data["country"];
        $customer->save();

       

        $token = $customer->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'data' => $customer,
            "token" => $token
        ]);
    }
    
    public function webLogin (LoginRequest $request){

        $data = $request->validated();

        $customer = Customer::where('email', $data['email'])->first();
       

        if ($customer != null){

           

             // Check password
             if(!$customer || !Hash::check($data['password'], $customer->password)) {
                return response([
                    'success' => false,
                    'message' => 'Email and password combination does not match'
                ], 200);
            }

            $token = $customer->createToken('myapptoken')->plainTextToken;

            return response()->json([
                'success'   => true,
                'message'   => "success",
                'data' => $customer,
                "token" => $token
            ]);

        }else{

            return response()->json([
                'success'   => false,
                'message'   => "User not in platform",
            ]);

        }

    }

    public function changepassword(Request $request){

        $customerID = $request->customerid;
        $password = $request->password;

        $customer = Customer::find($customerID);
        $customer->password = bcrypt($password);
        $customer->save();

        $response = [
            'success' => true,
            'message' => "success",
        ];  
        return response($response, 201);
    }

    public function forgotpassword(Request $request){
        $email = $request->email;

        $customer = Customer::where("email", $email)->first();

        if ($customer != null){
            $name = $customer->first_name;
            $code = $customer->code;
            $body = $this->forgotPasswordText ($name, $code);
            // $this->sendMail("Forgot Password", $body, $email);
            Mail::to($email)->send(new MailHelper("Forgot Password", $body));

            $response = [
                'success' => true,
                'message' => "success",
            ];  
            return response($response, 201);
        }else{
            $response = [
                'success' => false,
                'message' => "There is no account associated with this email address",
            ];  
            return response($response, 201);
        }
    }

    private function forgotPasswordText ($name, $code){
        $body = "Dear " . $name . ",<br/><br/>

        We noticed that you recently requested to reset your password. No worries - we've got you covered!<br/><br/>
        
        To reset your password, simply click on the link below:<br/><br/>
        
        <a href='https://houseofeppagelia.com/reset/" . $code ."'>Reset Password Link</a><br/><br/>
        
        If you didn't request to reset your password, please ignore this email. Your account remains secure, and no action is needed.<br/><br/>
        
        The link will be active for the next 24 hours. If you encounter any issues or need further assistance, feel free to contact our support team at support@eppagelia.com.<br/><br/>
        
        Thank you for using Eppagelia. We're here to ensure your experience is smooth and hassle-free!<br/><br/>
        
        Best regards,<br/>
        The Eppagelia Team";
        return $body;
    }


    public function resetpassword(Request $request){
        $code = $request->code;
        $password = $request->password;

        $customer = Customer::where("code", $code)->first();
        if ($customer){
            $customer->password = bcrypt($password);
            $customer->save();
    
            $response = [
                'success' => true,
                'message' => "success",
            ];  
            return response($response, 201);
        }else{

            $response = [
                'success' => false,
                'message' => "Invalid URL",
            ];  
            return response($response, 201);

        }
    }
}
