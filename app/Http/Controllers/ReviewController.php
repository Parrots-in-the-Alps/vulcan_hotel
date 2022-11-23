<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function showReviews() { 
        return new ReviewCollection(Review::all());
    }

    public function showReview($id){
         return new ReviewResource(Review::find($id));
    }

    public function createReview(Request $request){
    $input = $request->input();
    $review = Review::create(
        $input
    );
    return response()->json(['message' => 'Review created successfully!'], 200);
}

public function updateReview(Request $request, $review){
    $input = $request->input();
        $review = Review::where('id', $review)->update(
            $input
        );
    return response()->json(['message' => 'Review updated successfully!'], 200);
}


public function deleteReview(Review $review){
    $review->delete();
    return response()->json();
}

public function deleteReviews(){
    Review::truncate();
    return response()->json();
}
}
