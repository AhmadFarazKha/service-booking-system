<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-xl border-b border-orange-100 sticky top-0 z-50 shadow-sm" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ route('dashboard') }}" class="font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600">
                AI Manager
            </a>
            
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                <div class="flex bg-orange-50 border border-orange-100 rounded-xl p-1">
                    @foreach(['en'=>'EN', 'ur'=>'اردو', 'ar'=>'AR'] as $code => $label)
                        <a href="{{ route('lang.switch', $code) }}" 
                           class="px-4 py-1.5 text-xs font-black rounded-lg transition-all 
                           {{ app()->getLocale() == $code ? 'bg-gradient-to-r from-orange-500 to-red-600 text-white shadow-lg' : 'text-orange-600 hover:text-red-600' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 font-bold hover:text-red-800 transition">
                    {{ __('messages.logout') }}
                </button>
            </form>
            </div>
        </div>
    </div>
</nav>