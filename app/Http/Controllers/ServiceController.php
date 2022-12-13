<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    public function index()
    {
        return new ServiceCollection(Service::all());
    }

    public function show($id)
    {
        $service = Service::where(['id' => $id])
            ->firstOrFail();

        return new ServiceResource($service);
    }

    public function showActiveServices()
    {
        return new ServiceCollection(Service::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $ye = Service::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'Service updated successfully!'], 200);
    }

    public function deleteServices()
    {
        Service::truncate();

        return response()->json(['description' => 'Services delete'], 200);
    }

    public function destroy($id)
    {
        Service::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Service delete'], 200);
    }

    public function store(Request $request)
    {
        $services_input = $request->input();
        $service = new Service();
        $service->image_icon = $services_input['image_icon'];
        $service->price = $services_input['price'];
        $service->billing_type = $services_input['billing_type'];
        $service->setTranslations('title', $services_input['title'])
                  ->setTranslations('description', $services_input['description'])
                  ->save();

        return new ServiceResource($service);
    }
}
