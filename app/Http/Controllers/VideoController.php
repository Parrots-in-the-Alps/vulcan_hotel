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
        return new VideoCollection(Video::where('isActive',true)->get());
    }

    public function updateVideo(Request $request, $id)
    {
        $input = $request->input();
        $ye = Vidzo::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'video updated successfully!'], 200);
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