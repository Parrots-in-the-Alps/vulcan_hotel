<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function showVideos()
    {
        return response()->json(['videos' => Video::all(), 'description' => 'OK'], 200);
    }

    public function showVideo($id)
    {
        return response()->json(['video' => Video::find($id), 'description' => 'OK'], 200);
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
        $video = new Video;
        $videos_input = $request->input();
        $video->create($videos_input);
        return response()->json(['description' => 'video created'], 200);
    }
}