<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function showHeroes() { 
        return response()->json([Hero::all(), 'description' => 'OK'], 200);
    }


    public function showHero($id){

        return response()->json([Hero::find($id), 'description' => 'OK'], 200);

    }

    public function createHero(Request $request)
{
    // $this->validate($request, [
    //     'image' => 'max:100',
    //     'logo' => 'max:100',
    //     'slogan' => 'max:5'
    // ]);
    
    $input = $request->input();

    // On crée un nouveau hero
    $hero = Hero::create(
        $input
    );

    // On retourne les informations du nouvel utilisateur en JSON
    return response()->json(['message' => 'hero created successfully!'], 200);
}

public function updateHero(Request $request, $hero)
{
    // La validation de données
    // $this->validate($request, [
    //     'image' => 'max:100',
    //     'logo' => 'max:100',
    //     'slogan' => 'max:100'
    // ]);

    $input = $request->input();

        $hero = Hero::where('id', $hero)->update(
            $input
        );
    
    // On modifie les informations de l'hero
    

    // On retourne la réponse JSON
    return response()->json(['message' => 'hero updated successfully!'], 200);
}


public function deleteHero(Hero $hero)
{
    $hero = Hero::where('id', $id);
    $hero->delete();
    return response()->json(['description' => 'Hero delete'], 200);
}

public function deleteHeroes()
{

    return response()->json([Hero::truncate(), 'description' => 'Hero delete'], 200);
}


}
