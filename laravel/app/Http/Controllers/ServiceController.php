<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // #Storage: فائلوں کو ہینڈل کرنے کے لیے

class ServiceController extends Controller
{
    // 1. #Read: تمام سروسز کی لسٹ دکھانا
    public function index() {
        $services = \App\Models\Service::all(); // یہ سروسز کو ڈیٹا بیس سے لاتا ہے
        return view('services.index', compact('services')); // یہ 'services' کا ویری ایبل بھیجتا ہے
    }

    // 2. #Create: نیا فارم دکھانا
    public function create() {
        return view('services.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'skills' => 'required', // یہ لائن ضروری ہے
        'price' => 'required|numeric',
        'image' => 'required|image',
    ]);

    $imagePath = $request->file('image')->store('services', 'public');

    \App\Models\Service::create([
        'name' => $request->name,
        'description' => $request->description,
        'skills' => $request->skills, // یہ ڈیٹا اب سیو ہوگا
        'price' => $request->price,
        'image' => $imagePath,
    ]);

    return redirect()->route('dashboard');
}

    // 4. #Edit: ترمیم کے لیے پرانا ڈیٹا فارم میں دکھانا
    public function edit(Service $service) {
        return view('services.edit', compact('service'));
    }

    // 5. #Update: تبدیل شدہ ڈیٹا کو محفوظ کرنا
    public function update(Request $request, Service $service) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // تصویر لازمی نہیں ہے
        ]);

        $data = $request->only(['name', 'description', 'price']);

        // اگر نئی تصویر اپلوڈ کی گئی ہے
        if ($request->hasFile('image')) {
            // پرانی تصویر ڈیلیٹ کریں
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            // نئی تصویر کا پاتھ ڈالیں
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data); // ڈیٹا بیس میں اپڈیٹ کرنا

        return redirect()->route('dashboard')->with('success', 'سروس اپڈیٹ ہوگئی!');
    }

    // 6. #Destroy: سروس کو مکمل ڈیلیٹ کرنا
    public function destroy(Service $service) {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return back()->with('success', 'حذف کر دیا گیا!');
    }
}