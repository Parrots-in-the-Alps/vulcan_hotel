<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailingList;
use Illuminate\Http\Request;
use App\Http\Resources\MailingListCollection;
use App\Http\Resources\MailingListResource;

class MailingListController extends Controller
{
    public function showMailingList()
    {
        return new MailingListCollection(MailingList::all());
    }

    public function showEmail($id)
    {
        $email = MailingList::where(['id' => $id])
            ->firstOrFail();

        return new MailingListResource($email);
    }

    public function showActiveMailingList()
    {
        return new MailingListCollection(MailingList::where('isActive',true)->get());
    }

    public function updateEmail(Request $request, $id)
    {
        $mailingList_input = $request->input();
        $email = MailingList::where(['id' => $id])
            ->firstOrFail();
        $email->updateOrFail($mailingList_input);
            
        return new MailingListResource($email);
    }

    public function deleteMailingList()
    {
        MailingList::truncate();

        return response()->json(['description' => 'MailingList delete'], 200);
    }

    public function deleteEmail($id)
    {
        MailingList::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Email delete'], 200);
    }

    public function createEmail(Request $request)
    {
        $mailingList_input = $request->input();

        $email = new MailingList();
        $email->create($mailingList_input);

        return new MailingListResource($email);
    }
}
