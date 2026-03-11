<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(auth()->user()->is_admin == 1)
                        <div style="background-color: red; color: white; padding: 20px; border-radius: 10px;">
                            آپ ایڈمن ہیں!
                        </div>
                    @else
                        <div style="background-color: blue; color: white; padding: 20px; border-radius: 10px;">
                            آپ عام یوزر ہیں۔
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>