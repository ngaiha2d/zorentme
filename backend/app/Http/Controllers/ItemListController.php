<?php

namespace App\Http\Controllers;

use App\Models\itemList;
use Illuminate\Http\Request;

class ItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = itemList::all();
        return response()->json($item);
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
    // public function store(Request $request)
    // {
    //     $item = itemList::create([
    //         'name' => $request->name,
    //         'categories' => $request->categories,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'rent_time' => $request->rent_time,
    //         'user_id' => $request->user_id
    //     ]);

    //     return response()->json('item listed successfully');
    // }
    public function store(Request $request)
    {
    //dd($request);
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        // Handle the file upload and storage logic here
        // For example, you can store the file in a designated directory
        $filePath = $file->store('public/uploads');
        // Assign the file path to the appropriate column of the model
    }

    $item = itemList::create([
        'name' => $request->input('name'),
        'categories' => $request->input('categories'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'rent_time' => $request->input('rent_time'),
        'user_id' => $request->input('user_id'),
        'file_path' => $filePath
    ]);
    $item->save();
    return response()->json('Item listed successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(itemList $itemList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(itemList $itemList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, itemList $itemList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(itemList $itemList)
    {
        //
    }
}
