<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Interior\CreateInteriorPreviewsCoverAction;
use App\Actions\Interior\CreateInteriorScaleAction;
use App\Http\Controllers\Controller;
use App\Models\Admin\Interior;
use App\Models\Admin\InteriorRows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Interior::orderBy('order', 'asc')->get();
        return view('dashboard.interior.index', compact('photos'));
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
        foreach ($request['files'] as $file) {
            [$width, $height] = getimagesize($file);

            $photo = Interior::query()->create([
                'width' => $width,
                'height' => $height,
                'order' => Interior::query()->get()->count() + 1,
            ]);

            Storage::disk('public')->makeDirectory('/interior/'.$photo->id);

            $path = $file->store('/interior/'.$photo->id.'/', 'public');

            $photo->update([
                $photo->path = $path
            ]);

            (new CreateInteriorScaleAction($photo))->handle();
            (new CreateInteriorPreviewsCoverAction($photo))->handle();
        }

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Interior::where('id', $id)->first();
        $photo->delete();

        // remove files from server
        Storage::disk('public')->delete($photo->path);

        foreach (InteriorRows::query()->where('interior_id', $photo->id)->get() as $row){
            Storage::disk('public')->delete($row->path);
            $row->delete();
        }

        // remove folder
        if (File::exists('storage/interior/'.$photo->id)) File::deleteDirectory('storage/interior/'.$photo->id);


        // reOrder photos
        $photos = Interior::orderBy('order', 'asc')->get();
        $i = 1;
        foreach ($photos as $item) {
            $photoItem = Interior::where('id', $item->id)->first();
            $photoItem->order = $i;
            $photoItem->save();
            $i++;
        }
        return redirect()->back();
    }

    public function left(string $order)
    {
        $photoToRight = Interior::where('order', $order - 1)->first();
        $photoToLeft = Interior::where('order', $order)->first();
        $photoToRight->order = $order;
        $photoToRight->save();
        $photoToLeft->order = $order - 1;
        $photoToLeft->save();

        return redirect()->back();
    }

    public function right(string $order)
    {
        $photoToLeft = Interior::where('order', $order + 1)->first();
        $photoToRight = Interior::where('order', $order)->first();
        $photoToRight->order = $order + 1;
        $photoToRight->save();
        $photoToLeft->order = $order;
        $photoToLeft->save();

        return redirect()->back();
    }



}
