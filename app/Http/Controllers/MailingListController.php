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

    public function createEmail(Request $request)
    {
        $input = $request->input();
        $email = MailingList::create(
            $input
        );
        return new MailingListResource($email);
    }

    public function updateEmail(Request $request, $id)
    {
        $input = $request->input();
        $email = MailingList::where(['id' => $id])
            ->updateOrFail(
                $input
            );
        return new MailingListResource($email);
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
