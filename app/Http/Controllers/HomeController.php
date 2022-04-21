<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class HomeController extends Controller
{
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request)
    {
        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $name_gen);

        $last_img = 'image/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }

    public function EditSlider($id){
        $slider = Slider::find($id)->first();
        return view('admin.slider.edit', compact('slider'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        $old_image = $request->old_image;
        $slider_image = $request->file('slider_$slider_image');

        if ($slider_image) {
            $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(300, 200)->save('image/slider/' . $name_gen);
            $last_img = 'image/slider/' . $name_gen;

            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }

    public function DeleteSlider($id)
    {
        $slider = Slider::find($id);
        $image = $slider->image;
        unlink($image);

        $slider->delete();
        return redirect()->back()->with('success', 'Slider Deleted Successfully');
    }
}
