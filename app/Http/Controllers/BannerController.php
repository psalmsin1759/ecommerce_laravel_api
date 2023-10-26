<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderBy("sort_order")->take(2)->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $banner
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
    public function store(StoreBannerRequest $request)
    {
        $data = $request->validated();

        $banner = new Banner();
        $banner->title = $data["title"];
        $banner->subtitle = $data["subtitle"];
        $banner->sort_order=  $data["sort_order"];

        if ($request->hasFile('image_path')) {

            $filename = uniqid() . '.' . $data["image_path"]->getClientOriginalExtension();
            $path = $data["image_path"]->storeAs('public/banners', $filename);
            $path = basename($path);
            $banner->image_path = $path;

        }

        $banner->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $banner
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        $data = $request->validated();

        $banner = Banner::find($id);
        $banner->title = $data["title"];
        $banner->subtitle = $data["subtitle"];
        $banner->sort_order =  $data["sort_order"];
        $banner->save();

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
        $banner = Banner::find ($id);
        $imagePath = 'public/banners/' . $banner->image_path;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $banner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Banner deleted successfully',
        ]);
    }
}
