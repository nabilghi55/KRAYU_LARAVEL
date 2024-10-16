<ul id="account-panel" class="nav nav-pills flex-column gap-2" >
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.profile') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt mr-2"></i> My Profile</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.orders') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-shopping-bag mr-3"></i>My Orders</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.wishlist') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-heart mr-2"></i> Wishlist</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.changePassword') }}"  class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-lock mr-2"></i> Change Password</a>
    </li>
    <li class="nav-item bg-[#3A3845]">
        <a href="{{ route('account.logout') }}" class="nav-link font-weight-bold text-white" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
    </li>
</ul>