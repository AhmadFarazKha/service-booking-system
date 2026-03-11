<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h2 class="text-4xl font-black text-center text-orange-600 mb-10">Add New Service</h2>
        
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" 
              class="bg-white p-10 rounded-[3rem] shadow-2xl border border-orange-100">
            @csrf
            
            <div class="space-y-6">
                <div>
                    <label class="block font-black text-gray-700 mb-2">Service Title</label>
                    <input type="text" name="name" required placeholder="e.g. Master Electrician" 
                           class="w-full p-4 rounded-2xl border-2 border-gray-100 focus:border-orange-500 outline-none">
                </div>

                <div>
                    <label class="block font-black text-gray-700 mb-2">Detailed Description</label>
                    <textarea name="description" required rows="4" placeholder="Explain what this service includes..." 
                              class="w-full p-4 rounded-2xl border-2 border-gray-100 focus:border-orange-500 outline-none"></textarea>
                </div>

                <div>
                    <label class="block font-black text-gray-700 mb-2">Skills (Separate with commas)</label>
                    <input type="text" name="skills" required placeholder="e.g. Wiring, Installation, Troubleshooting" 
                           class="w-full p-4 rounded-2xl border-2 border-gray-100 focus:border-orange-500 outline-none">
                </div>

                <div>
                    <label class="block font-black text-gray-700 mb-2">Price (Rs.)</label>
                    <input type="number" name="price" required placeholder="e.g. 4000" 
                           class="w-full p-4 rounded-2xl border-2 border-gray-100 focus:border-orange-500 outline-none">
                </div>

                <div>
                    <label class="block font-black text-gray-700 mb-2">Service Image</label>
                    <input type="file" name="image" required 
                           class="w-full p-4 rounded-2xl border-2 border-dashed border-orange-300 bg-orange-50">
                </div>

                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white py-5 rounded-2xl font-black text-xl shadow-lg transition-all">
                    Save Service
                </button>
            </div>
        </form>
    </div>
</x-app-layout>