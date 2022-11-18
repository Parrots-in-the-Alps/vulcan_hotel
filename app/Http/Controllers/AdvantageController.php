<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advantage;

class AdvantageController extends Controller
{
    public function showAdvantages() { 
        return response()->json(['advantage' => Advantage::all(), 'description' => 'OK'], 200);
    }


    public function showAdvantage($id){
         return response()->json(['advantage' => Advantage::find($id), 'description' => 'OK'], 200);
    }

    public function createAdvantage(Request $request)
{
    $input = $request->input();
    $advantage = Advantage::create(
        $input
    );
    return response()->json(['message' => 'Advantage created successfully!'], 200);
}

public function updateAdvantage(Request $request, $advantage)
{
    $input = $request->input();
        $advantage = Advantage::where('id', $advantage)->update(
            $input
        );
    return response()->json(['message' => 'Advantage updated successfully!'], 200);
}


public function deleteAdvantage(Advantage $advantage)
{
    $advantage->delete();
    return response()->json();
}

public function deleteAdvantages()
{
    Advantage::truncate();
    return response()->json();
}
}
