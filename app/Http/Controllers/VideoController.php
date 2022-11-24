<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResource;

class VideoController extends Controller
{
    public function showVideos()
    {
        return new VideoCollection(Video::all());
    }

    public function showVideo($id)
    {
        $video = Video::where(['id' => $id])
            ->firstOrFail();

        return new VideoResource($video);
    }

    public function showActiveVideos()
    {
        return new VideoCollection(Video::where('isActive',1)->get());
    }

    public function updateVideo(Request $request, $id)
    {
        $videos_input = $request->input();
        $video = Video::where(['id' => $id])
            ->firstOrFail();
        $video
            ->setTranslations('title', $videos_input['title'])
            ->setTranslations('description', $videos_input['description'])
            ->save();
        $video->updateOrFail($videos_input);
            
        return new VideoResource($video);
    }

    public function deleteVideos()
    {
        Video::truncate();

        return response()->json(['description' => 'Videos delete'], 200);
    }

    public function deleteVideo($id)
    {
        Video::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Video delete'], 200);
    }

    public function createVideo(Request $request)
    {
        $videos_input = $request->input();

        $video = new Video();
        $video->video_link = $videos_input['video_link'];
        $video
            ->setTranslations('title', $videos_input['title'])
            ->setTranslations('description', $videos_input['description'])
            ->save();

        return new VideoResource($video);
    }
}