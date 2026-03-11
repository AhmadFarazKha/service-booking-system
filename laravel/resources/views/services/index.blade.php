<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-6">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-4xl font-black text-orange-600">{{ __('Premium Services') }}</h2>
            <a href="{{ route('services.create') }}" class="bg-orange-600 text-white px-6 py-3 rounded-2xl font-black">Add New +</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($services as $service)
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-orange-100">
                    <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-48 object-cover rounded-2xl mb-4">
                    
                    <h3 class="text-xl font-black text-gray-800">{{ $service->name }}</h3>
                    <p class="text-gray-500 text-sm mb-2">{{ $service->description }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(explode(',', $service->skills) as $skill)
                            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">
                                {{ trim($skill) }}
                            </span>
                        @endforeach
                    </div>

                    <p class="text-2xl font-black text-red-600 mb-4">Rs. {{ number_format($service->price) }}</p>
                    
                    <div class="flex gap-4 items-center">
                        <a href="{{ route('services.edit', $service->id) }}" class="text-orange-500 font-bold">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 font-bold">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-400">No services found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>