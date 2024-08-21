<header class="topbar shadow-sm">
    <div class="with-vertical">
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Header -->
        <!-- ---------------------------------- -->
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                {{-- <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li> --}}
            </ul>

            {{-- <ul class="navbar-nav quick-links d-none d-lg-flex">
                <!-- ------------------------------- -->
                <!-- start apps Dropdown -->
                <!-- ------------------------------- -->
                <li class="nav-item dropdown hover-dd d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                        Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                        <div class="row">
                            <div class="col-8">
                                <div class="ps-7 pt-7">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-chat.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Chat Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">New
                                                                messages arrived</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-invoice.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Invoice App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get
                                                                latest invoice</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-mobile.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">2
                                                                Unsaved Contacts</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-message-box.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Email App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get
                                                                new emails</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-cart.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                User Profile
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">learn
                                                                more information</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-date.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Calendar App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get
                                                                dates</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-lifebuoy.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact List Table
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Add
                                                                new contact</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-application.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Notes Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">To-do
                                                                and Daily tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-8">
                                            <a class="fw-semibold text-dark d-flex align-items-center lh-1"
                                                href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked
                                                Questions</a>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end pe-4">
                                                <button class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ms-n4">
                                <div class="position-relative p-7 border-start h-100">
                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                    <ul class="">
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Pricing
                                                Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Authentication
                                                Design</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Register Now</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">404
                                                Error Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Notes
                                                App</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">User
                                                Application</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Account
                                                Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                <!-- ------------------------------- -->
                <!-- end apps Dropdown -->
                <!-- ------------------------------- -->
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Chat</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Calendar</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Email</a>
                </li>
            </ul> --}}

            <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)"
                        class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                        aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <!-- ------------------------------- -->
                        <!-- start language Dropdown -->
                        <!-- ------------------------------- -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('modernize2/images/icon-flag-en.svg') }}" alt=""
                                    width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('modernize2/images/icon-flag-en.svg') }}"
                                                alt="" width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">English (UK)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('modernize2/images/icon-flag-cn.svg') }}"
                                                alt="" width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('modernize2/images/icon-flag-fr.svg') }}"
                                                alt="" width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">français (French)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('modernize2/images/icon-flag-sa.svg') }}"
                                                alt="" width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">عربي (Arabic)</p>
                                    </a>
                                </div>
                            </div>
                        </li> --}}
                        <!-- ------------------------------- -->
                        <!-- end language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start shopping cart Dropdown -->
                        <!-- ------------------------------- -->
                        {{-- <li class="nav-item">
                            <a class="nav-link position-relative nav-icon-hover" href="javascript:void(0)"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight">
                                <i class="ti ti-basket"></i>
                                <span class="popup-badge rounded-pill bg-danger text-white fs-2">2</span>
                            </a>
                        </li> --}}
                        <!-- ------------------------------- -->
                        <!-- end shopping cart Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start notification Dropdown -->
                        <!-- ------------------------------- -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                    <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                    <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5
                                        new</span>
                                </div>
                                <div class="message-body" data-simplebar>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="{{ asset('modernize2/images/user-1.jpg') }}" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Congratulate
                                                him</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="{{ asset('modernize2/images/user-2.jpg') }}" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">New message</h6>
                                            <span class="fs-2 d-block text-body-secondary">Salma sent you
                                                new message</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="{{ asset('modernize2/images/user-3.jpg') }}" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Bianca sent payment</h6>
                                            <span class="fs-2 d-block text-body-secondary">Check your
                                                earnings</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="{{ asset('modernize2/images/user-4.jpg') }}" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Jolly completed tasks</h6>
                                            <span class="fs-2 d-block text-body-secondary">Assign her new
                                                tasks</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="{{ asset('modernize2/images/user-5.jpg') }}" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">John received payment</h6>
                                            <span class="fs-2 d-block text-body-secondary">$230 deducted
                                                from account</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="{{ asset('modernize2/images/user-1.jpg') }}" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Congratulate
                                                him</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-6 px-7 mb-1">
                                    <button class="btn btn-outline-primary w-100">See All
                                        Notifications</button>
                                </div>

                            </div>
                        </li> --}}
                        <!-- ------------------------------- -->
                        <!-- end notification Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start profile Dropdown -->
                        <!-- ------------------------------- -->
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img src="{{ asset('storage/img/' . Auth::user()->foto) }}" class="rounded-circle"
                                            width="35" height="35" alt="" />
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="{{ asset('storage/img/' . Auth::user()->foto) }}" class="rounded-circle"
                                            width="80" height="80" alt="" />
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                            <span class="mb-1 d-block">Administrator</span>
                                            <p class="mb-0 d-flex align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a href="{{ route('profile_admin.index') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('modernize2/images/icon-account.svg') }}"
                                                    alt="" width="24" height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">Profil</h6>
                                                <span class="fs-2 d-block text-body-secondary">Pengaturan Akun</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-grid py-3 px-7">
                                        <a href="#" class="btn btn-outline-primary"
                                            onclick="document.getElementById('logout-form').submit()">Log Out</a>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Header -->
        <!-- ---------------------------------- -->

        <!-- ------------------------------- -->
        <!-- apps Dropdown in Small screen -->
        <!-- ------------------------------- -->
        <!--  Mobilenavbar -->
        {{-- <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <nav class="sidebar-nav scroll-sidebar">
                <div class="offcanvas-header justify-content-between">
                    <img src="images/favicon.ico" alt="" class="img-fluid" />
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" data-simplebar="" data-simplebar style="height: calc(100vh - 80px)">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span>
                                    <i class="ti ti-apps"></i>
                                </span>
                                <span class="hide-menu">Apps</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level my-3">
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-chat.svg" alt="" class="img-fluid"
                                                width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">New messages
                                                arrived</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-invoice.svg" alt="" class="img-fluid"
                                                width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">Get latest
                                                invoice</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-mobile.svg" alt="" class="img-fluid"
                                                width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">2 Unsaved
                                                Contacts</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-message-box.svg" alt=""
                                                class="img-fluid" width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">Get new
                                                emails</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-cart.svg" alt="" class="img-fluid"
                                                width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">learn more
                                                information</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-date.svg" alt="" class="img-fluid"
                                                width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">Get
                                                dates</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-lifebuoy.svg" alt="" class="img-fluid"
                                                width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">Add new
                                                contact</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a href="#" class="d-flex align-items-center">
                                        <div
                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <img src="images/icon-dd-application.svg" alt=""
                                                class="img-fluid" width="24" height="24" />
                                        </div>
                                        <div class="d-inline-block">
                                            <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                                            <span class="fs-2 d-block fw-normal text-muted">To-do and Daily
                                                tasks</span>
                                        </div>
                                    </a>
                                </li>
                                <ul class="px-8 mt-7 mb-4">
                                    <li class="sidebar-item mb-3">
                                        <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">Authentication
                                            Design</a>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">Register Now</a>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">Notes App</a>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">User
                                            Application</a>
                                    </li>
                                    <li class="sidebar-item py-2">
                                        <a class="fw-semibold text-dark" href="#">Account
                                            Settings</a>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-message-dots"></i>
                                </span>
                                <span class="hide-menu">Chat</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <span class="hide-menu">Calendar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-mail"></i>
                                </span>
                                <span class="hide-menu">Email</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div> --}}

    </div>

    <div class="app-header with-horizontal">
        <nav class="navbar navbar-expand-xl container-fluid p-0">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-xl-block">
                    <a href="#" class="text-nowrap nav-link">
                        <img src="{{ asset('modernize2/images/dark-logo.svg') }}" class="dark-logo" width="180"
                            alt="" />
                        <img src="{{ asset('modernize2/images/light-logo.svg') }}" class="light-logo" width="180"
                            alt="" />
                    </a>
                </li>
                <li class="nav-item d-none d-xl-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav quick-links d-none d-xl-flex">
                <!-- ------------------------------- -->
                <!-- start apps Dropdown -->
                <!-- ------------------------------- -->
                <li class="nav-item dropdown hover-dd d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                        Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                        <div class="row">
                            <div class="col-8">
                                <div class="ps-7 pt-7">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-chat.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Chat Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">New
                                                                messages arrived</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-invoice.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Invoice App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get
                                                                latest invoice</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-mobile.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">2
                                                                Unsaved Contacts</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-message-box.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Email App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get
                                                                new emails</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-cart.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                User Profile
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">learn
                                                                more information</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-date.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Calendar App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get
                                                                dates</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-lifebuoy.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact List Table
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Add
                                                                new contact</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative">
                                                        <div
                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('modernize2/images/icon-dd-application.svg') }}"
                                                                alt="" class="img-fluid" width="24"
                                                                height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Notes Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">To-do
                                                                and Daily tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-8">
                                            <a class="fw-semibold text-dark d-flex align-items-center lh-1"
                                                href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked
                                                Questions</a>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end pe-4">
                                                <button class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ms-n4">
                                <div class="position-relative p-7 border-start h-100">
                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                    <ul class="">
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Pricing
                                                Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Authentication
                                                Design</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Register Now</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">404
                                                Error Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Notes
                                                App</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">User
                                                Application</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="#">Account
                                                Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                <!-- ------------------------------- -->
                <!-- end apps Dropdown -->
                <!-- ------------------------------- -->
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Chat</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Calendar</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Email</a>
                </li>
            </ul>
            <div class="d-block d-xl-none">
                <a href="#" class="text-nowrap nav-link">
                    <img src="{{ asset('modernize2/images/dark-logo.svg') }}" width="180" alt="" />
                </a>
            </div>
            <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                    <a href="javascript:void(0)"
                        class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                        aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <!-- ------------------------------- -->
                        <!-- start language Dropdown -->
                        <!-- ------------------------------- -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('modernize2/images/icon-flag-en.svg') }}" alt="" width="20px" height="20px"
                                    class="rounded-circle object-fit-cover round-20" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('modernize2/images/icon-flag-en.svg') }}" alt="" width="20px"
                                                height="20px" class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">English (UK)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('modernize2/images/icon-flag-cn.svg') }}" alt="" width="20px"
                                                height="20px" class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="images/icon-flag-fr.svg" alt="" width="20px"
                                                height="20px" class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">français (French)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="images/icon-flag-sa.svg" alt="" width="20px"
                                                height="20px" class="rounded-circle object-fit-cover round-20" />
                                        </div>
                                        <p class="mb-0 fs-3">عربي (Arabic)</p>
                                    </a>
                                </div>
                            </div>
                        </li> --}}
                        <!-- ------------------------------- -->
                        <!-- end language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start shopping cart Dropdown -->
                        <!-- ------------------------------- -->
                        {{-- <li class="nav-item">
                            <a class="nav-link position-relative nav-icon-hover" href="javascript:void(0)"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight">
                                <i class="ti ti-basket"></i>
                                <span class="popup-badge rounded-pill bg-danger text-white fs-2">2</span>
                            </a>
                        </li> --}}
                        <!-- ------------------------------- -->
                        <!-- end shopping cart Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start notification Dropdown -->
                        <!-- ------------------------------- -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                    <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                    <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5
                                        new</span>
                                </div>
                                <div class="message-body" data-simplebar>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="images/user-1.jpg" alt="user" class="rounded-circle"
                                                width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Congratulate
                                                him</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="images/user-2.jpg" alt="user" class="rounded-circle"
                                                width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">New message</h6>
                                            <span class="fs-2 d-block text-body-secondary">Salma sent you
                                                new message</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="images/user-3.jpg" alt="user" class="rounded-circle"
                                                width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Bianca sent payment</h6>
                                            <span class="fs-2 d-block text-body-secondary">Check your
                                                earnings</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="images/user-4.jpg" alt="user" class="rounded-circle"
                                                width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Jolly completed tasks</h6>
                                            <span class="fs-2 d-block text-body-secondary">Assign her new
                                                tasks</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="images/user-5.jpg" alt="user" class="rounded-circle"
                                                width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">John received payment</h6>
                                            <span class="fs-2 d-block text-body-secondary">$230 deducted
                                                from account</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="images/user-1.jpg" alt="user" class="rounded-circle"
                                                width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Congratulate
                                                him</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-6 px-7 mb-1">
                                    <button class="btn btn-outline-primary w-100">See All
                                        Notifications</button>
                                </div>

                            </div>
                        </li> --}}
                        <!-- ------------------------------- -->
                        <!-- end notification Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start profile Dropdown -->
                        <!-- ------------------------------- -->
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img src="{{ asset('modernize2/images/user-1.jpg') }}" class="rounded-circle"
                                            width="35" height="35" alt="" />
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="{{ asset('modernize2/images/user-1.jpg') }}" class="rounded-circle"
                                            width="80" height="80" alt="" />
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                            <span class="mb-1 d-block">Administrator</span>
                                            <p class="mb-0 d-flex align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <div class="message-body">
                                        <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="images/icon-account.svg" alt="" width="24"
                                                    height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                <span class="fs-2 d-block text-body-secondary">Account
                                                    Settings</span>
                                            </div>
                                        </a>
                                        <a href="#" class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="images/icon-inbox.svg" alt="" width="24"
                                                    height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                                <span class="fs-2 d-block text-body-secondary">Messages &
                                                    Emails</span>
                                            </div>
                                        </a>
                                        <a href="#" class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="images/icon-tasks.svg" alt="" width="24"
                                                    height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                                                <span class="fs-2 d-block text-body-secondary">To-do and
                                                    Daily Tasks</span>
                                            </div>
                                        </a>
                                    </div> --}}
                                    <div class="d-grid py-3 px-7">
                                        <a href="#" class="btn btn-outline-primary"
                                            onclick="document.getElementById('logout-form').submit()">Log Out</a>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</header>
<form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
    @csrf
</form>
