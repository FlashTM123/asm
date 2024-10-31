<aside class="sidebar">
    <div class="logo">
        <img src="https://marketplace.canva.com/EADzKAvfVrM/2/0/1600w/canva-tr%E1%BA%AFng-v%C3%A0-m%C3%A0u-kem-l%C3%A1-c%E1%BA%A3nh-quan-bi%E1%BB%83u-tr%C6%B0ng-xNVaLNkS2bw.jpg" alt="logo">
        <h2>PlantStore</h2>
    </div>
    <ul class="links list-unstyled">
        <h4>Main Menu</h4>
        <li><span class="material-symbols-outlined">dashboard</span><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><span class="material-symbols-outlined">person</span><a href="{{ route('user.list') }}">Users</a></li>
        <li><span class="material-symbols-outlined">group</span><a href="#">Customers</a></li>
        <li><span class="material-symbols-outlined">local_florist</span><a href="{{ route('product.list') }}">Products</a></li>
        <li><span class="material-symbols-outlined">category</span><a href="{{route('category.list')}}">Category</a></li>
        <li><span class="material-symbols-outlined">shopping_cart</span><a href="#">Orders</a></li>
        <hr>
        <h4>Advanced</h4>
        <li><span class="material-symbols-outlined">analytics</span><a href="#">Reports</a></li>
        <li><span class="material-symbols-outlined">show_chart</span><a href="#">Revenue</a></li>
        <hr>
        <h4>Account</h4>
        <li><span class="material-symbols-outlined">bar_chart</span><a href="#">Overview</a></li>
        <li><span class="material-symbols-outlined">mail</span><a href="#">Message</a></li>
        <li><span class="material-symbols-outlined">settings</span><a href="#">Settings</a></li>
        <li class="logout-link"><span class="material-symbols-outlined">logout</span><a href="#">Logout</a></li>
    </ul>
</aside>
