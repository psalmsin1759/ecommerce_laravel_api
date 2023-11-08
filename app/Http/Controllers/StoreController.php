<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function updateStore(Request $request){

        $name = $request->name;
        $address = $request->address;
        $state = $request->state;
        $country = $request->country;
        $geocode_latitude = $request->geocode_latitude;
        $geocode_longitude = $request->geocode_longitude;
        $email = $request->email;
        $phone = $request->phone;
        $opening_times = $request->opening_times;
        $meta_title = $request->meta_title;
        $meta_description = $request->meta_description;
        $meta_tag_keywords = $request->meta_tag_keywords;
        $instagram_link = $request->instagram_link;
        $facebook_link = $request->facebook_link;
        $twitter_link = $request->twitter_link;
        $tiktok_link = $request->tiktok_link;
        $payment_pub_key = $request->payment_pub_key;
        $payment_secret_key = $request->payment_secret_key;

        if (Store::count() === 0) {
           
            $store = Store::create([
                'name' => $name,
                'address' => $address,
                'state' => $state,
                'country' => $country,
                'geocode_latitude' => $geocode_latitude,
                'geocode_longitude' => $geocode_longitude,
                'email' => $email,
                'phone' => $phone,
                'opening_times' => $opening_times,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description,
                'meta_tag_keywords' => $meta_tag_keywords,
                'instagram_link' => $instagram_link,
                'facebook_link' => $facebook_link,
                'twitter_link' => $twitter_link,
                'tiktok_link' => $tiktok_link,
                'payment_pub_key' => $payment_pub_key,
                'payment_secret_key' => $payment_secret_key,
            ]);

        } else {
           
            $lastStore = Store::latest()->first();
        
           
            $lastStore->update([
                'name' => $name,
                'address' => $address,
                'state' => $state,
                'country' => $country,
                'geocode_latitude' => $geocode_latitude,
                'geocode_longitude' => $geocode_longitude,
                'email' => $email,
                'phone' => $phone,
                'opening_times' => $opening_times,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description,
                'meta_tag_keywords' => $meta_tag_keywords,
                'instagram_link' => $instagram_link,
                'facebook_link' => $facebook_link,
                'twitter_link' => $twitter_link,
                'tiktok_link' => $tiktok_link,
                'payment_pub_key' => $payment_pub_key,
                'payment_secret_key' => $payment_secret_key,
               
            ]);

        }

        if ($request->hasFile("storelogo")){
            $destinationPath = "images/store/";
            $file = $request->storelogo;
            $extension = $file->getClientOriginalExtension();
            $fileName =  rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            $lastStore = Store::latest()->first();
            $lastStore->update([
                'logo_path' => $fileName,
               
            ]);          
        }

        if ($request->hasFile("footerlogo")){
            $destinationPath = "images/store/";
            $file = $request->footerlogo;
            $extension = $file->getClientOriginalExtension();
            $fileName =  rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            $lastStore = Store::latest()->first();
            $lastStore->update([
                'footer_logo_path' => $fileName,
               
            ]);          
        }

        return redirect ("details")->with('success','Success');

    }


    public function aboutAction(Request $request){
        $aboutus = $request->aboutus;
        $terms = $request->terms;
        $privacy_policy = $request->privacy_policy;
        $return_policy = $request->return_policy;
        $refund_policy = $request->refund_policy;


        if (Store::count() === 0) {

            $store = Store::create([
                'aboutus' => $aboutus,
                'terms' => $terms,
                'privacy_policy' => $privacy_policy,
                'return_policy' => $return_policy,
                'refund_policy' => $refund_policy,
            ]);


        }else{

            $lastStore = Store::latest()->first();
         
            $lastStore->update([
                'aboutus' => $aboutus,
                'terms' => $terms,
                'privacy_policy' => $privacy_policy,
                'return_policy' => $return_policy,
                'refund_policy' => $refund_policy,   
            ]);


        }

        return redirect ("about")->with('success','Success');


    }


    public function index()
    {
        $store = Store::first();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $store
        ]);
    }
}
