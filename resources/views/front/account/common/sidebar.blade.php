<ul id="account-panel" class="nav nav-pills flex-column gap-2" >
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.profile') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt mr-2"></i> Profile Saya</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.orders') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-shopping-bag mr-3"></i>Pesanan Saya</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.wishlist') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-heart mr-2"></i> Wishlist Saya</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.changePassword') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-lock mr-2"></i> Ganti Password</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.logout') }}" class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-sign-out-alt mr-2"></i> Keluar</a>
    </li>
</ul>