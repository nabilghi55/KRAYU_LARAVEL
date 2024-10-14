<!-- Navbar -->
<div class="bg-[#9FB39A] flex justify-between items-center px-4 py-4">
    <!-- Logo -->
    <div>
        <a href="{{ route('front.beranda') }}" class="text-2xl font-bold text-[#FFF6E0]">Krayu</a>
    </div>

    <!-- Mobile Menu Icon -->
    <div class="lg:hidden">
        <button id="menu-toggle" class="text-white">
            <i class="fas fa-bars" id="menu-icon"></i> <!-- FaBars initially -->
        </button>
    </div>

    <!-- Desktop Navbar Links -->
    <div class="hidden lg:flex items-center">
        <nav class="space-x-4">
            <a href="{{ route('front.beranda') }}" class="text-white">Beranda</a>
            <a href="{{ route('front.shop') }}" class="text-white">Katalog</a>
            <a href="{{ route('front.cart') }}" class="text-white">Keranjang</a>
        </nav>
        <div class="ml-6">
            @if (Auth::check())
                <a href="{{ route('account.profile') }}" class="text-white flex items-center">
                    <i class="fa fa-user-circle mr-2"></i>
                    {{ Auth::user()->name }}
                </a>
            @else
                <a href="{{ route('account.login') }}" class="text-white">Login/Register</a>
            @endif
        </div>
    </div>
</div>

<!-- Sidebar for Mobile -->
<div id="mobile-sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-[#9FB39A] transform -translate-x-full transition-transform lg:hidden z-50 flex flex-col">
    <div class="p-4">
        <a href="{{ route('front.beranda') }}" class="text-[#FFF6E0] text-2xl font-bold">Krayu</a>
        <nav class="mt-6 space-y-4">
            <a href="{{ route('front.beranda') }}" class="text-white flex items-center">
                <i class="fas fa-home mr-2"></i> Beranda
            </a>
            <a href="{{ route('front.shop') }}" class="text-white flex items-center">
                <i class="fas fa-shopping-bag mr-2"></i> Katalog
            </a>
            <a href="{{ route('front.cart') }}" class="text-white flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i> Keranjang
            </a>
        </nav>
    </div>

    <!-- Profile Section at the Bottom -->
    <div class="mt-auto p-4">
        @if (Auth::check())
            <a href="{{ route('account.profile') }}" class="text-white flex items-center">
                <i class="fa fa-user-circle mr-2"></i>
                {{ Auth::user()->name }}
            </a>
        @else
            <a href="{{ route('account.login') }}" class="text-white">Login/Register</a>
        @endif
    </div>
</div>

<!-- JavaScript for Sidebar Toggle -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const menuIcon = document.getElementById('menu-icon');

    menuToggle.addEventListener('click', function() {
        mobileSidebar.classList.toggle('-translate-x-full');
        // Toggle between FaBars and FaTimes
        if (menuIcon.classList.contains('fa-bars')) {
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
        } else {
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }
    });
</script>
