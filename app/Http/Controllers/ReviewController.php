<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function showReviews()
    {
        return new ReviewCollection(Review::all());
    }

    public function showReview($id)
    {
        $review = Review::where(['id' => $id])
            ->firstOrFail();

        return new ReviewResource($review);
    }

    public function showActiveReviews()
    {
        return new ReviewCollection(Review::where('isActive',true)->get());
    }

    public function updateReview(Request $request, $id)
    {
        $reviews_input = $request->input();
        $review = Review::where(['id' => $id])
            ->firstOrFail();
        $review->updateOrFail($reviews_input);
            
        return new ReviewResource($review);
    }

    public function deleteReviews()
    {
        Review::truncate();

        return response()->json(['description' => 'Reviews delete'], 200);
    }

    public function deleteReview($id)
    {
        Review::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Review delete'], 200);
    }

    public function createReview(Request $request)
    {
        $reviews_input = $request->input();

        $review = new Review();
        $review->create($reviews_input);

        return new ReviewResource($review);
    }
}
