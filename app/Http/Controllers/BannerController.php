<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function addBanner(Request $request){

        $title = $request->title;
        $subtitle = $request->subtitle;
        $sortorder = $request->sortorder;

        $slider = new Banner();
        $slider->title = $title;
        $slider->subtitle = $subtitle;
        $slider->sort_order = $sortorder;

        if ($request->hasFile("sliderimage")){
            $destinationPath = "images/banner/";
            $file = $request->sliderimage;
            $extension = $file->getClientOriginalExtension();
            $fileName = $title . rand(1111,9999) . "." . $extension;

           
            $path = preg_replace('/\s+/', '', $fileName);

            $file->move($destinationPath, $path);

            $slider->image_path = $path;

        }

        $slider->save();

        return redirect("banner");
    }

    public function editBanner(Request $request){

        $editsliderid = $request->editsliderid;
        $edittitle = $request->edittitle;
        $editsubtitle = $request->editsubtitle;
        $editsortorder = $request->editsortorder;

        $slider = Banner::where("id", $editsliderid)->first();
        $slider->title = $edittitle;
        $slider->subtitle = $editsubtitle;
        $slider->sort_order = $editsortorder;

        if ($request->hasFile("editsliderimage")){
            $destinationPath = "images/banner/";
            $file = $request->editsliderimage;
            $extension = $file->getClientOriginalExtension();
            $fileName = $edittitle . rand(1111,9999) . "." . $extension;

           
            $path = preg_replace('/\s+/', '', $fileName);

            $file->move($destinationPath, $path);

        }


        $slider->save();

        return redirect("banner");

    }

    public function deleteBanner(Request $request){
        $id = $request->id;
        Banner::destroy($id);
    }
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
