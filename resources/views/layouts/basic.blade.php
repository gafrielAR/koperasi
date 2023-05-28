<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Koperasi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-1.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-2.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-3.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-3">
                        <mask id="path-1-inside-1_488_792" fill="white">
                            <path
                                d="M12 5.5C12.9283 5.5 13.8185 5.86875 14.4749 6.52513C15.1313 7.1815 15.5 8.07174 15.5 9C15.5 9.92826 15.1313 10.8185 14.4749 11.4749C13.8185 12.1313 12.9283 12.5 12 12.5C11.0717 12.5 10.1815 12.1313 9.52513 11.4749C8.86875 10.8185 8.5 9.92826 8.5 9C8.5 8.07174 8.86875 7.1815 9.52513 6.52513C10.1815 5.86875 11.0717 5.5 12 5.5M5 8C5.56 8 6.08 8.15 6.53 8.42C6.38 9.85 6.8 11.27 7.66 12.38C7.16 13.34 6.16 14 5 14C4.20435 14 3.44129 13.6839 2.87868 13.1213C2.31607 12.5587 2 11.7956 2 11C2 10.2044 2.31607 9.44129 2.87868 8.87868C3.44129 8.31607 4.20435 8 5 8M19 8C19.7956 8 20.5587 8.31607 21.1213 8.87868C21.6839 9.44129 22 10.2044 22 11C22 11.7956 21.6839 12.5587 21.1213 13.1213C20.5587 13.6839 19.7956 14 19 14C17.84 14 16.84 13.34 16.34 12.38C17.2119 11.2544 17.6166 9.8362 17.47 8.42C17.92 8.15 18.44 8 19 8M5.5 18.25C5.5 16.18 8.41 14.5 12 14.5C15.59 14.5 18.5 16.18 18.5 18.25V20H5.5V18.25ZM0 20V18.5C0 17.11 1.89 15.94 4.45 15.6C3.86 16.28 3.5 17.22 3.5 18.25V20H0ZM24 20H20.5V18.25C20.5 17.22 20.14 16.28 19.55 15.6C22.11 15.94 24 17.11 24 18.5V20Z" />
                        </mask>
                        <path
                            d="M15.5 9H17.5H15.5ZM12 12.5V14.5V12.5ZM6.53 8.42L8.51909 8.62865L8.65207 7.36086L7.55899 6.70501L6.53 8.42ZM7.66 12.38L9.43383 13.3039L10.0256 12.1677L9.241 11.1551L7.66 12.38ZM5 14V16V14ZM2 11H0H2ZM22 11H24H22ZM19 14V12V14ZM16.34 12.38L14.7589 11.1553L13.9745 12.1679L14.5662 13.3039L16.34 12.38ZM17.47 8.42L16.441 6.70501L15.3496 7.35986L15.4806 8.62589L17.47 8.42ZM18.5 20V22H20.5V20H18.5ZM5.5 20H3.5V22H5.5V20ZM0 20H-2V22H0V20ZM4.45 15.6L5.96064 16.9107L9.42127 12.9222L4.18669 13.6174L4.45 15.6ZM3.5 20V22H5.5V20H3.5ZM24 20V22H26V20H24ZM20.5 20H18.5V22H20.5V20ZM19.55 15.6L19.8133 13.6174L14.5787 12.9222L18.0394 16.9107L19.55 15.6ZM12 7.5C12.3978 7.5 12.7794 7.65804 13.0607 7.93934L15.8891 5.11091C14.8576 4.07946 13.4587 3.5 12 3.5V7.5ZM13.0607 7.93934C13.342 8.22064 13.5 8.60218 13.5 9H17.5C17.5 7.54131 16.9205 6.14236 15.8891 5.11091L13.0607 7.93934ZM13.5 9C13.5 9.39782 13.342 9.77936 13.0607 10.0607L15.8891 12.8891C16.9205 11.8576 17.5 10.4587 17.5 9H13.5ZM13.0607 10.0607C12.7794 10.342 12.3978 10.5 12 10.5V14.5C13.4587 14.5 14.8576 13.9205 15.8891 12.8891L13.0607 10.0607ZM12 10.5C11.6022 10.5 11.2206 10.342 10.9393 10.0607L8.11091 12.8891C9.14236 13.9205 10.5413 14.5 12 14.5V10.5ZM10.9393 10.0607C10.658 9.77936 10.5 9.39782 10.5 9H6.5C6.5 10.4587 7.07946 11.8576 8.11091 12.8891L10.9393 10.0607ZM10.5 9C10.5 8.60218 10.658 8.22064 10.9393 7.93934L8.11091 5.11091C7.07946 6.14236 6.5 7.54131 6.5 9H10.5ZM10.9393 7.93934C11.2206 7.65804 11.6022 7.5 12 7.5V3.5C10.5413 3.5 9.14236 4.07946 8.11091 5.11091L10.9393 7.93934ZM5 10C5.19478 10 5.35949 10.0501 5.50101 10.135L7.55899 6.70501C6.80051 6.24993 5.92522 6 5 6V10ZM4.54091 8.21135C4.3362 10.163 4.90895 12.0947 6.079 13.6049L9.241 11.1551C8.69105 10.4453 8.4238 9.53701 8.51909 8.62865L4.54091 8.21135ZM5.88617 11.4561C5.71343 11.7878 5.37786 12 5 12V16C6.94214 16 8.60657 14.8922 9.43383 13.3039L5.88617 11.4561ZM5 12C4.73478 12 4.48043 11.8946 4.29289 11.7071L1.46447 14.5355C2.40215 15.4732 3.67392 16 5 16V12ZM4.29289 11.7071C4.10536 11.5196 4 11.2652 4 11H0C0 12.3261 0.526784 13.5979 1.46447 14.5355L4.29289 11.7071ZM4 11C4 10.7348 4.10536 10.4804 4.29289 10.2929L1.46447 7.46447C0.526784 8.40215 0 9.67392 0 11H4ZM4.29289 10.2929C4.48043 10.1054 4.73478 10 5 10V6C3.67392 6 2.40215 6.52678 1.46447 7.46447L4.29289 10.2929ZM19 10C19.2652 10 19.5196 10.1054 19.7071 10.2929L22.5355 7.46447C21.5979 6.52678 20.3261 6 19 6V10ZM19.7071 10.2929C19.8946 10.4804 20 10.7348 20 11H24C24 9.67392 23.4732 8.40215 22.5355 7.46447L19.7071 10.2929ZM20 11C20 11.2652 19.8946 11.5196 19.7071 11.7071L22.5355 14.5355C23.4732 13.5979 24 12.3261 24 11H20ZM19.7071 11.7071C19.5196 11.8946 19.2652 12 19 12V16C20.3261 16 21.5979 15.4732 22.5355 14.5355L19.7071 11.7071ZM19 12C18.6221 12 18.2866 11.7878 18.1138 11.4561L14.5662 13.3039C15.3934 14.8922 17.0579 16 19 16V12ZM17.9211 13.6047C19.108 12.0725 19.6589 10.1419 19.4594 8.21411L15.4806 8.62589C15.5742 9.53046 15.3158 10.4363 14.7589 11.1553L17.9211 13.6047ZM18.499 10.135C18.6405 10.0501 18.8052 10 19 10V6C18.0748 6 17.1995 6.24993 16.441 6.70501L18.499 10.135ZM7.5 18.25C7.5 18.2329 7.52874 17.8357 8.40335 17.331C9.22468 16.8571 10.492 16.5 12 16.5V12.5C9.91804 12.5 7.93532 12.9829 6.40415 13.8665C4.92626 14.7193 3.5 16.1971 3.5 18.25H7.5ZM12 16.5C13.508 16.5 14.7753 16.8571 15.5966 17.331C16.4713 17.8357 16.5 18.2329 16.5 18.25H20.5C20.5 16.1971 19.0737 14.7193 17.5959 13.8665C16.0647 12.9829 14.082 12.5 12 12.5V16.5ZM16.5 18.25V20H20.5V18.25H16.5ZM18.5 18H5.5V22H18.5V18ZM7.5 20V18.25H3.5V20H7.5ZM2 20V18.5H-2V20H2ZM2 18.5C2 18.7869 1.81585 18.6793 2.34544 18.3393C2.82781 18.0296 3.63964 17.7252 4.71331 17.5826L4.18669 13.6174C2.70036 13.8148 1.28719 14.2654 0.184558 14.9732C-0.870853 15.6507 -2 16.8231 -2 18.5H2ZM2.93935 14.2893C2.02002 15.3489 1.5 16.7598 1.5 18.25H5.5C5.5 17.6802 5.69998 17.2111 5.96064 16.9107L2.93935 14.2893ZM1.5 18.25V20H5.5V18.25H1.5ZM3.5 18H0V22H3.5V18ZM24 18H20.5V22H24V18ZM22.5 20V18.25H18.5V20H22.5ZM22.5 18.25C22.5 16.7598 21.98 15.3489 21.0606 14.2893L18.0394 16.9107C18.3 17.2111 18.5 17.6802 18.5 18.25H22.5ZM19.2867 17.5826C20.3604 17.7252 21.1722 18.0296 21.6546 18.3393C22.1841 18.6793 22 18.7869 22 18.5H26C26 16.8231 24.8709 15.6507 23.8154 14.9732C22.7128 14.2654 21.2996 13.8148 19.8133 13.6174L19.2867 17.5826ZM22 18.5V20H26V18.5H22Z"
                            fill="#838F9F" mask="url(#path-1-inside-1_488_792)" />
                    </svg>
                    <span>Anggota</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Components</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>Alerts</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-accordion.html">
                            <i class="bi bi-circle"></i><span>Accordion</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-badges.html">
                            <i class="bi bi-circle"></i><span>Badges</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-breadcrumbs.html">
                            <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-buttons.html">
                            <i class="bi bi-circle"></i><span>Buttons</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-cards.html">
                            <i class="bi bi-circle"></i><span>Cards</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-carousel.html">
                            <i class="bi bi-circle"></i><span>Carousel</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-list-group.html">
                            <i class="bi bi-circle"></i><span>List group</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-modal.html">
                            <i class="bi bi-circle"></i><span>Modal</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-tabs.html">
                            <i class="bi bi-circle"></i><span>Tabs</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-pagination.html">
                            <i class="bi bi-circle"></i><span>Pagination</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-progress.html">
                            <i class="bi bi-circle"></i><span>Progress</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-spinners.html">
                            <i class="bi bi-circle"></i><span>Spinners</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-tooltips.html">
                            <i class="bi bi-circle"></i><span>Tooltips</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Form Elements</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>Form Layouts</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html">
                            <i class="bi bi-circle"></i><span>Form Editors</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-validation.html">
                            <i class="bi bi-circle"></i><span>Form Validation</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>General Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Chart.js</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>ApexCharts</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-echarts.html">
                            <i class="bi bi-circle"></i><span>ECharts</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="icons-bootstrap.html">
                            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-remix.html">
                            <i class="bi bi-circle"></i><span>Remix Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-boxicons.html">
                            <i class="bi bi-circle"></i><span>Boxicons</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.html">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-file-earmark"></i>
                    <span>Blank</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                legend: {
                    data: ['Allocated Budget', 'Actual Spending']
                },
                radar: {
                // shape: 'circle',
                indicator: [{
                        name: 'Sales',
                        max: 6500
                    },
                    {
                        name: 'Administration',
                        max: 16000
                    },
                    {
                        name: 'Information Technology',
                        max: 30000
                    },
                    {
                        name: 'Customer Support',
                        max: 38000
                    },
                    {
                        name: 'Development',
                        max: 52000
                    },
                    {
                        name: 'Marketing',
                        max: 25000
                    }
                ]
                },
                series: [{
                    name: 'Budget vs spending',
                    type: 'radar',
                    data: [{
                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                            name: 'Allocated Budget'
                        },
                        {
                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                            name: 'Actual Spending'
                        }
                    ]
                }]
            });
        });
    </script>

</body>

</html>