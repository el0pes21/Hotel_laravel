<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class=""> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                <li class="list-divider"></li>
                <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('form/allbooking') }}"> All Booking </a></li>
                        <li><a href="{{ url('form/booking/edit') }}"> Edit Booking </a></li>
                        <li><a href="{{ route('form/booking/add') }}"> Add Booking </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('form/allcustomers/page') }}"> All customers </a></li>
                        <li><a href="{{ url('form/customer/edit/') }}"> Edit Customer </a></li>
                        <li><a href="{{ route('form/addcustomer/page') }}"> Add Customer </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Rooms </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="active" href="{{ route('form/allrooms/page') }}">All Rooms </a></li>
                        <li><a href="{{ url('form/room/edit') }}"> Edit Rooms </a></li>
                        <li><a href="{{ route('form/addroom/page') }}"> Add Rooms </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('form/allEmployess/page') }}">All Employees </a></li>
                        <li><a href="{{ url('form/employee/edit') }}"> Edit Employees </a></li>
                        <li><a href="{{ route('form/addEmployee/page') }}"> Add Employees </a></li>
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="invoices.html">Invoices </a></li>
                        <li><a href="payments.html">Payments </a></li>
                        <li><a href="expenses.html">Expenses </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
