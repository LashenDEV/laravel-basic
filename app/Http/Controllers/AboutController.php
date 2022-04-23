<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeabouts = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabouts'));
    }

    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        HomeAbout::create($request->all());
        return redirect()->route('home.about')->with('success', 'HomeAbout created successfully');
    }

    public function EditAbout($id)
    {
        $homeabout = HomeAbout::findOrFail($id)->first();;
        return view('admin.home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id){
        HomeAbout::find($id)->update($request->all());
        return redirect()->route('home.about')->with('success', 'HomeAbout updated successfully');
    }

    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->delete();
        return redirect()->route('home.about')->with('success', 'HomeAbout deleted successfully');

    }
}
