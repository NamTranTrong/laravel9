<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('bootstrap-admin-template-free/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            {{--  <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div>  --}}
            <a href="{{asset(route('list.patient'))}}" class="nav-item nav-link {{ in_array(\Route::currentRouteName(), ['list.patient', 'add.patient','edit.patient','list.contraindication','add.contraindication','edit.contraindication','list.status','edit.status','list.plan','add.plan','edit.plan','list.prescription','edit.prescription']) ? 'active' : '' }}"><i class="fa-solid fa-hospital-user"></i>Patient</a>
            <a href="{{asset(route('list.medicine'))}}" class="nav-item nav-link {{ in_array(\Route::currentRouteName(), ['list.medicine']) ? 'active' : '' }}"><i class="fa-solid fa-capsules"></i>Medicine</a>
            <a href="{{asset(route('list.staff'))}}" class="nav-item nav-link {{ in_array(\Route::currentRouteName(), ['list.staff']) ? 'active' : '' }}"><i class="fa-solid fa-clipboard-user"></i>Staff</a>
            <a href="{{asset(route('list.dentist'))}}" class="nav-item nav-link {{ in_array(\Route::currentRouteName(), ['list.dentist','list.schedule']) ? 'active' : '' }}"><i class="fa-solid fa-user-doctor"></i></i>Dentist</a>
            <a href="{{asset(route('list.apointment'))}}" class="nav-item nav-link {{ in_array(\Route::currentRouteName(), ['list.apointment']) ? 'active' : '' }}"><i class="fa-regular fa-calendar-check"></i></i>Apointment</a>
            <a href="{{asset(route('list.paymentInfo'))}}" class="nav-item nav-link {{ in_array(\Route::currentRouteName(), ['list.paymentInfo']) ? 'active' : '' }}"><i class="fa-solid fa-credit-card"></i>Payment_Info</a>
        </div>
    </nav>
</div>