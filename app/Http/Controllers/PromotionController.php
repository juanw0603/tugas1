<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'list of promotions';
        $listOfPromotion = Promotion::orderBy('id', 'ASC')->get();
        return view('home', compact('title','listOfPromotion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        // Handle the image upload  
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            return redirect()->back()->with('error', 'Image upload failed');
        }

        // Create a new promotion
        Promotion::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Promotion successfully created!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($action, $id = null)
    {
        if ($action == 'add') {
            return view('promotion', ['action' => $action]);
        }

        // For 'edit', 'detail', or other actions, we fetch the promotion by ID
        $promotion = Promotion::find($id);

        // If the promotion is not found, redirect with an error
        if (!$promotion) {
            return redirect('/')->with('error', 'Promotion not found');
        }

        // Return the view and pass the action and promotion data
        return view('promotion', [
            'action' => $action,
            'promotion' => $promotion
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $promotion = Promotion::findorFail($request->promotion_id);
        
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $promotion->title = $request->input('title');
        $promotion->description = $request->input('description');

        // Handle image upload if a new image is provided
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $promotion->image = $imageName;
        } else {
            // If no new image is provided, keep the old image
            $promotion->image = $promotion->image;
        }

        $promotion->save();

        return redirect()->back()->with('success', 'Promotion successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(promotion $promotion)
    {
        $promotion->delete(); 

        return response()->json([
            'message' => 'Promotion successfully destroyed!'
        ]);
    }

}
