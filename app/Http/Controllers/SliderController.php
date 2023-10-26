<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy("sort_order")->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $slider
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
    public function store(StoreSliderRequest $request)
    {
        $data = $request->validated();

        $slider = new Slider();
        $slider->title = $data["title"];
        $slider->subtitle = $data["subtitle"];
        $slider->sort_order=  $data["sort_order"];

        if ($request->hasFile('image_path')) {

            $filename = uniqid() . '.' . $data["image_path"]->getClientOriginalExtension();
            $path = $data["image_path"]->storeAs('public/sliders', $filename);
            $path = basename($path);
            $slider->image_path = $path;

        }

        $slider->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $slider
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, string $id)
    {
        $data = $request->validated();

        $slider = Slider::find($id);
        $slider->title = $data["title"];
        $slider->subtitle = $data["subtitle"];
        $slider->sort_order =  $data["sort_order"];
        $slider->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find ($id);
        $imagePath = 'public/sliders/' . $slider->image_path;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $slider->delete();

        return response()->json([
            'success' => true,
            'message' => 'Slider deleted successfully',
        ]);
    }
}
