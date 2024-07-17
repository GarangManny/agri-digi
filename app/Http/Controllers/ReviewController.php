<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Listing;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    // ReviewController.php
public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'required|string',
    ]);

    Review::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id,
        'rating' => $request->rating,
        'review' => $request->review,
    ]);

    return redirect()->back()->with('success', 'Review submitted successfully.');
}

public function show($id)
{
    $product = Listing::with('reviews.user')->findOrFail($id);
    return view('listings.show', compact('product'));
}


}
