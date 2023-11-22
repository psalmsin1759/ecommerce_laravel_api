<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use \App\Mail\MailHelper;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Newsletter::orderBy("created_at", "asc")->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $data
        ]);
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
    public function store(StoreNewsletterRequest $request)
    {
        $data = $request->validated();
        $newsletter = Newsletter::create($data);

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $newsletter
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsletterRequest $request, string  $email)
    {
        $data = $request->validated();
        $newsletter = Newsletter::where ("email", $data["email"])->first();
        $newsletter->status = $data["status"];
        $newsletter->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $newsletter
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Newsletter::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }

    public function sendEmail(Request $request){

        $destination = $request->destination;

        $emails = null;

        /* if ($destination == "newsletter"){
            $newsletter = \App\Models\Newsletter::where("status", 1)->get();
            if ($newsletter != null){
                foreach ($newsletter as $item){
                    $emails .= "," . $item->email;
                }
            }
            
        } */

        if ($destination == "allcustomer"){
            $customer = \App\Models\Customer::get();
            if ($customer != null){
                foreach ($customer as $item){
                    $emails .= "," . $item->email;
                }
            }
        }

        if ($destination == "customer"){
            $customers = $request->customers;
            if ($customers != null){
                foreach($customers as $item){
                    $emails .= "," . $item;       
                }
            }

        }

        if ($destination == "specificemail"){
            $specificemail = $request->specificemail;
            $emails .= "," . $specificemail; 
        }

        $emails = substr($emails, 1);

        $subject = $request->subject;
        $body = $request->body;
       

        $searchForValue = ',';

        

        //dd ($storename . " ". $from . " " . $subject . " " . $body . " " . $emails);
        
    
        if( strpos($emails, $searchForValue) !== false ) {

            $emailArray = explode(',', $emails);
            foreach ($emailArray as $recipient) {
                Mail::to($recipient)->send(new MailHelper($subject, $body));
                //Mail::to($recipient)->send(new \App\Mail\AdminSendMail($storename, $myfrom, $subject, $body));
            }
            
        }else{
            Mail::to($emails)->send(new MailHelper($subject, $body));
            //Mail::to($emails)->send(new \App\Mail\AdminSendMail($storename, $myfrom, $subject, $body));
        }

        return redirect("mail")->with('success','Your email has been sent!!!');


    }
}
