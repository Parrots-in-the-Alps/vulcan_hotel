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
        $videos = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($videos as $key => $value) {
            $video = new Video();
            $video->video_link = $value["video_link"];
            $video
            ->setTranslations('title', $value["title"])
            ->setTranslations('description', $value["description"])
                ->save();
        }
    }
}
