<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'list of promotions';
        $listOfPromotion = promotion::all();
        return view('home', compact('title','listOfPromotion'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($action, $id = null)
    {
        // If the action is "add", there's no need for an ID
        if ($action == 'add') {
            // If it's 'add', we don't fetch any promotion and just pass the action
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
    public function update(Request $request, promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(promotion $promotion)
    {
        //
    }

}
