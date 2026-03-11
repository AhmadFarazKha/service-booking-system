<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-6">سروس میں ترمیم کریں</h2>
            
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="space-y-4">
                    <input type="text" name="name" value="{{ $service->name }}" class="w-full border rounded p-2" placeholder="نام" required>
                    
                    <textarea name="description" class="w-full border rounded p-2" rows="4" placeholder="تفصیل" required>{{ $service->description }}</textarea>
                    
                    <input type="number" name="price" value="{{ $service->price }}" class="w-full border rounded p-2" placeholder="قیمت" required>
                    
                    <div class="bg-gray-50 p-4 rounded border">
                        <p class="text-sm mb-2 font-bold">موجودہ تصویر:</p>
                        <img src="{{ asset('storage/' . $service->image) }}" class="h-20 w-20 object-cover rounded mb-3">
                        <input type="file" name="image" class="w-full">
                        <p class="text-xs text-gray-400 mt-1 italic">اگر تصویر نہیں بدلنی تو اسے خالی چھوڑ دیں</p>
                    </div>

                    <div class="flex space-x-4 rtl:space-x-reverse pt-4">
                        <button type="submit" class="bg-indigo-600 text-white px-8 py-2 rounded font-bold">اپڈیٹ کریں</button>
                        <a href="{{ route('dashboard') }}" class="bg-gray-100 px-8 py-2 rounded font-bold">کینسل</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>