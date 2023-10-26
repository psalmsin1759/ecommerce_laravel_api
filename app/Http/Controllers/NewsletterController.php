<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use App\Models\Newsletter;

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
}
