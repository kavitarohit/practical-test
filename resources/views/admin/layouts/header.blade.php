<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{ url('/') }}/assets/css/pace.min.css" rel="stylesheet" />
  <script src="{{ url('/') }}/assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="{{ url('/') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ url('/') }}/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">
  <link href="{{ url('/') }}/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{ url('/') }}/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/css/header-colors.css" rel="stylesheet" />
  <script src="{{ url('/') }}/assets/js/jquery.min.js"></script>

  <link href="{{ url('/') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <script src="{{ url('/') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="{{ url('/') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Online Exam</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
      <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-menu-button">
          <ion-icon name="menu-sharp"></ion-icon>
        </div>
       <!--  <form class="searchbar">
          <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
            <ion-icon name="search-sharp"></ion-icon>
          </div>
          <input class="form-control" type="text" placeholder="Search for anything">
          <div class="position-absolute top-50 translate-middle-y search-close-icon">
            <ion-icon name="close-sharp"></ion-icon>
          </div>
        </form> -->
        <div class="top-navbar-right ms-auto">

          <ul class="navbar-nav align-items-center">
            <li class="nav-item mobile-search-button">
              <a class="nav-link" href="javascript:;">
                <div class="">
                  <ion-icon name="search-sharp"></ion-icon>
                </div>
              </a>
            </li>
          
          
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="user-setting">
                  <img src="{{ url('/') }}/assets/images/avatars/06.png" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex flex-row align-items-center gap-2">
                      <img src="{{ url('/') }}/assets/images/avatars/06.png" alt="" class="rounded-circle" width="54" height="54">
                      <div class="">
                        <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">UI Developer</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="person-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Profile</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="settings-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Setting</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ url('/') }}/admin/logout">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="log-out-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>

        </div>
      </nav>
    </header>
    <!--end top header-->