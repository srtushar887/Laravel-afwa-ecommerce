<?php

namespace App\Http\Controllers\Admin;

use App\home_slider;
use App\Http\Controllers\Controller;
use App\news_latter;
use App\social_icon;
use App\static_section;
use App\testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminFrontendController extends Controller
{
    public function home_slider()
    {
        $sliders = home_slider::paginate(10);
        return view('admin.frontend.homeSlider',compact('sliders'));
    }

    public function home_slider_save(Request $request)
    {
        $new_slider = new home_slider();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/slider/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(380,848)->save($imgUrl1);
            $new_slider->image = $imgUrl1;
        }

        $new_slider->title = $request->title;
        $new_slider->sub_title = $request->sub_title;
        $new_slider->save();

        return back()->with('success','Home Slider Successfully Created');

    }


    public function home_slider_update(Request $request)
    {
        $update_slider = home_slider::where('id',$request->slider_edit)->first();
        if($request->hasFile('image')){
            @unlink($update_slider->image);
            $image = $request->file('image');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/slider/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(380,848)->save($imgUrl1);
            $update_slider->image = $imgUrl1;
        }

        $update_slider->title = $request->title;
        $update_slider->sub_title = $request->sub_title;
        $update_slider->save();

        return back()->with('success','Home Slider Successfully Updated');
    }

    public function home_slider_delete(Request $request)
    {
        $delete_slider = home_slider::where('id',$request->slider_delete)->first();
        @unlink($delete_slider->image);
        $delete_slider->delete();
        return back()->with('success','Home Slider Successfully Deleted');
    }

    public function static_data()
    {
        $static = static_section::first();
        return view('admin.frontend.staticData',compact('static'));
    }


    public function static_data_save(Request $request)
    {
        $static = static_section::first();
        $static->about_us = $request->about_us;
        $static->privacy = $request->privacy;
        $static->terms = $request->terms;
        $static->save();

        return back()->with('success','Static Data Successfully Updated');
    }


    public function social_icons()
    {
        $icons = social_icon::all();
        return view('admin.frontend.socialIcons',compact('icons'));
    }

    public function social_icons_save(Request $request)
    {
        $new_icon = new social_icon();
        $new_icon->name = $request->name;
        $new_icon->icon = $request->icon;
        $new_icon->icon_link = $request->icon_link;
        $new_icon->save();

        return back()->with('success','Social Icon Successfully Created');

    }

    public function social_icons_update(Request $request)
    {
        $update_icon = social_icon::where('id',$request->icon_edit)->first();
        $update_icon->name = $request->name;
        $update_icon->icon = $request->icon;
        $update_icon->icon_link = $request->icon_link;
        $update_icon->save();

        return back()->with('success','Social Icon Successfully Updated');
    }

    public function social_icons_delete(Request $request)
    {
        $delete_icon = social_icon::where('id',$request->icon_delete)->first();
        $delete_icon->delete();
        return back()->with('success','Social Icon Successfully Deleted');
    }


    public function news_latter()
    {
        $news_latter = news_latter::orderBy('id','desc')->paginate(15);
        return view('admin.frontend.newsLatter',compact('news_latter'));
    }


    public function testimonial()
    {
        $tests = testimonial::orderBy('id','desc')->paginate(15);
        return view('admin.frontend.testimonial',compact('tests'));
    }


    public function testimonial_save(Request $request)
    {
        $news_test = new testimonial();
        $news_test->desc = $request->desc;
        $news_test->save();

        return back()->with('success','Testimonial Successfully Created');

    }


    public function testimonial_update(Request $request)
    {
        $update_test = testimonial::where('id',$request->edit_test)->first();
        $update_test->desc = $request->desc;
        $update_test->save();

        return back()->with('success','Testimonial Successfully Updated');
    }


    public function testimonial_delete(Request $request)
    {
        $delete_ts = testimonial::where('id',$request->delete_tes)->first();
        $delete_ts->delete();
        return back()->with('success','Testimonial Successfully Deleted');
    }














}