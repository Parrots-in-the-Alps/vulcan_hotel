<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use File;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/review.json");
        $reviews = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($reviews as $key => $value) {
            $review = new Review();
            $review->user_name = $value["user_name"];
            $review->image_user_avatar = $value["image_user_avatar"];
            $review->rating = $value["rating"];
            $review->comment = $value["comment"];
            $review->save();
    }
    }
}
