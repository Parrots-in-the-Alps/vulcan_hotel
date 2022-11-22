<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use File;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/video.json");
        $videos = json_decode($json);
  
        foreach ($videos as $key => $value) {
            Video::create([
                "video_link" => $value->video_link,
                "title" => json_encode($value->title),
                "description" => json_encode($value->description),
            ]);
        }
    }
}
