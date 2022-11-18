<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailingList;
use Illuminate\Http\Request;

class MailingListController extends Controller
{
    public function showMailingList() { 
        return response()->json(['mailinglist' => MailingList::all(), 'description' => 'OK'], 200);
    }


    public function showEmail($id){
         return response()->json(['mailinglist' => MailingList::find($id), 'description' => 'OK'], 200);
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
