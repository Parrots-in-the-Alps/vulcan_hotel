<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Resources\HeroCollection;
use App\Http\Resources\HeroResource;

class HeroController extends Controller
{
    public function index()
    {
        return new HeroCollection(Hero::all());
    }

    public function show($id)
    {
        $hero = Hero::where(['id' => $id])
            ->firstOrFail();

        return new HeroResource($hero);
    }

    public function showActiveHeroes()
    {
        return new HeroCollection(Hero::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $ye = Hero::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'room updated successfully!'], 200);
    }

    public function deleteHeroes()
    {
        Hero::truncate();

        return response()->json(['description' => 'Heroes delete'], 200);
    }

    public function destroy($id)
    {
        Hero::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Hero delete'], 200);
    }

    public function store(Request $request)
    {
        $heroes_input = $request->input();

        $hero = new Hero();
        $hero->image = $heroes_input['image'];
        $hero->logo = $heroes_input['logo'];
        $hero
            ->setTranslations('slogan', $heroes_input['slogan'])
            ->save();

        return new HeroResource($hero);
    }
}
