<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailingList;
use Illuminate\Http\Request;
use App\Http\Resources\MailingListCollection;
use App\Http\Resources\MailingListResource;

class MailingListController extends Controller
{
    public function showMailingList() { 
        return new MailingListCollection(MailingList::all());
    }


    public function showEmail($id){
         return new MailingListResource(MailingList::find($id));
    }

    public function createEmail(Request $request)
{
    $input = $request->input();
    $mailingList = MailingList::create(
        $input
    );
    return response()->json(['message' => 'MailingList created successfully!'], 200);
}

public function updateEmail(Request $request, $mailingList)
{
    $input = $request->input();
        $mailingList = MailingList::where('id', $mailingList)->update(
            $input
        );
    return response()->json(['message' => 'MailingList updated successfully!'], 200);
}


public function deleteEmail(MailingList $mailingList)
{
    $mailingList->delete();
    return response()->json();
}

public function deleteMailingList()
{
    MailingList::truncate();
    return response()->json();
}
}
