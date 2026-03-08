<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // تمام سروسز کو دکھانا
    public function index() {
        $services = Service::with('user')->get(); // یہاں 'user' کا مطلب ہے کریئٹر
        return view('services.index', compact('services'));
    }

    // نئی سروس ڈیٹا بیس میں محفوظ کرنا
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        Service::create([
            'user_id' => auth()->id(), // یہ خود بخود لاگ ان یوزر کا ID لے لے گا
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back()->with('success', 'سروس کامیابی سے ایڈ ہو گئی!');
    }
}
