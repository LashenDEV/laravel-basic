<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function HomeService()
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    public function AddService()
    {
        return view('admin.service.create');
    }

    public function StoreService(Request $request)
    {
        Service::create($request->all());
        return redirect()->route('home.service')->with('success', 'Service created successfully');
    }

    public function EditService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    public function UpdateService(Request $request, $id){
        Service::findOrFail($id)->update($request->all());
        return redirect()->route('home.service')->with('success', 'Service updated successfully');
    }

    public function DeleteService($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('home.service')->with('success', 'Service deleted successfully');

    }
}
