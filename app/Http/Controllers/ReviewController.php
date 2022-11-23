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

        return new ReviewResource(Review::find($id));
    }

    public function createReview(Request $request)
    {
        $input = $request->input();
        $review = Review::create(
            $input
        );
        return new ReviewResource($review);
    }

    public function updateReview(Request $request, $id)
    {
        $input = $request->input();
        $review = Review::where(['id' => $id])
            ->firstOrFail();
        $review->updateOrFail(
            $input
        );
        return new ReviewResource($review);
    }


    public function deleteReview(Review $review)
    {
        $review->delete();
        return response()->json();
    }

    public function deleteReviews()
    {
        Review::truncate();
        return response()->json();
    }
}
