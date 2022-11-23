<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Resources\HeroCollection;
use App\Http\Resources\HeroResource;

class HeroController extends Controller
{
    public function showHeroes()
    {
        return new HeroCollection(Hero::all());
    }


    public function showHero($id)
    {

        $hero = Hero::where(['id' => $id])
            ->firstOrFail();

        return new HeroResource($hero);
    }

    public function createHero(Request $request)
    {

        $input = $request->input();
        $hero = new Hero();
        $hero->image = $input['image'];
        $hero->logo = $input['logo'];
        $hero->setTranslations('slogan', $input['slogan'])
            ->save();

        return new HeroResource($hero);
    }

    public function updateHero(Request $request, $id)
    {
        // La validation de données
        // $this->validate($request, [
        //     'image' => 'max:100',
        //     'logo' => 'max:100',
        //     'slogan' => 'max:100'
        // ]);

        $input = $request->input();

        Hero::where('id', '!=', $id)->updateOrFail(["status" => false,]);

        $hero = Hero::where('id', $id)
            ->firstOrFail();
        $hero->updateOrFail($input);

        return new HeroResource($hero);
    }


    public function deleteHero(Hero $hero)
    {
        // On supprime le hero
        $hero->delete();

        // On retourne la réponse JSON
        return response()->json();
    }

    public function deleteHeroes()
    {

        Hero::truncate();

        // On retourne la réponse JSON
        return response()->json();
    }
}
