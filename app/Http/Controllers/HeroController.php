<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Resources\HeroCollection;
use App\Http\Resources\HeroResource;

class HeroController extends Controller
{
    public function showHeroes() { 


        return new HeroCollection(Hero::all());
        //  return response()->json($hero, 200);
        //return response()->json(['hero' => Hero::all(), 'description' => 'OK'], 200);

    }


    public function showHero($id){
        // $hero = Hero::findOrFail($id);
        // return response()->json($hero);
        return new HeroResource(Hero::find($id));
        //return response()->json(['hero' => Hero::find($id), 'description' => 'OK'], 200);

    }

    public function createHero(Request $request)
{
    
    $input = $request->input();
    $hero = new Hero();
    $hero->image=$input['image'];
    $hero->logo=$input['logo'];
    $hero->setTranslations('sloga', $input['slogan'])
            ->save();

    // $this->validate($request, [
    //     'image' => 'max:100',
    //     'logo' => 'max:100',
    //     'slogan' => 'max:5'
    // ]);
    
    

    // // On crée un nouveau hero
    // $hero = Hero::create(
    //     $input
    // );

    // On retourne les informations du nouvel utilisateur en JSON
    return response()->json(['message' => 'hero created successfully!'], 200);
}

public function updateHero(Request $request, $hero)
{
    // La validation de données
    $this->validate($request, [
        'image' => 'max:100',
        'logo' => 'max:100',
        'slogan' => 'max:100'
    ]);

    $input = $request->input();
    //var_dump($request->all());



   Hero::where('id', '!=' ,$hero)->update([
        "status" => false,

    ]);

      Hero::where('id', $hero)->update(
            $input
            
        );

        
    
    // On modifie les informations de l'hero
    

    // On retourne la réponse JSON
    return response()->json(['message' => 'hero updated successfully!'], 200);
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
