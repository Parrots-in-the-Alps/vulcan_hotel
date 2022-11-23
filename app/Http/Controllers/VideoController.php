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
        return new VideoResource(Video::find($id));
    }

    public function updateVideo(Request $request, $id)
    {
        $videos_input = $request->input();
        $video = Video::where('id', $id);
        $video->update($videos_input);
        return response()->json(['description' => 'video update'], 200);
    }

    public function deleteVideos()
    {
        Video::truncate();
        return response()->json(['description' => 'Video delete'], 200);
    }

    public function deleteVideo($id)
    {
        $video = Video::where('id', $id);
        $video->delete();
        return response()->json(['description' => 'Video delete'], 200);
    }

    public function createVideo(Request $request)
    {
        
        $videos_input = $request->input();
        $video = new Video;
        $video->video_link=$videos_input['video_link'];
        $video->setTranslations('title', $videos_input['title'])
                ->setTranslations('description', $videos_input['description'])
                ->save();
        return response()->json(['description' => 'video created'], 200);
    }
}