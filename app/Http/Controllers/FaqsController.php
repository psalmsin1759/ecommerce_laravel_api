<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqsRequest;
use App\Http\Requests\UpdateFaqsRequest;
use App\Models\Faqs;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Faqs::orderBy("sort_order", "asc")->get();

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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqsRequest $request)
    {
       
        $data = $request->validated();
        $faqs = Faqs::create($data);

       return redirect ("/faqs");
    }

    /**
     * Display the specified resource.
     */
    public function show(Faqs $faqs)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faqs $faqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqsRequest $request, int  $id)
    {
        $data = $request->validated();
        $faqs = Faqs::find($id);
        $faqs->question = $data["question"];
        $faqs->answer = $data["answer"];
        $faqs->sort_order = $data["sort_order"];
        $newsletter->save();

        return redirect ("/faqs");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Faqs::destroy($id);
    }
}
