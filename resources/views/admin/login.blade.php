<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{url('/')}}/assets/css/pace.min.css" rel="stylesheet" />
  <script src="{{url('/')}}/assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="{{url('/')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{url('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>Online Exam</title>
</head>

<body>
  <div class="login-bg-overlay au-sign-in-basic"></div>
  <!--start wrapper-->
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
          <div class="card radius-10">
            <div class="card-body p-4">
              <div class="text-center">
                <h4>Sign In</h4>
                <p>Sign In to your account</p>
                 @if (session('error'))
                 <div class="alert alert-dismissible fade show py-2 bg-danger">
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="text-white">{{session('error')}}</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                 @endif
              </div>

              <form class="form-body row g-3" method="POST" action="/admin/login"  id="frmlogin">
                @csrf
                <div class="col-12">
                  <label for="inputEmail" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" >
                   @if($errors->has('username'))
                      <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                    @endif
                </div>
                <div class="col-12">
                  <label for="inputPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                  @if($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                  @endif
                </div>
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="my-5">
      <div class="container">
        <div class="d-flex align-items-center gap-4 fs-5 justify-content-center social-login-footer">
          <a href="javascript:;">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-github"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-pinterest"></ion-icon>
          </a>
        </div>
        <div class="text-center">
          <p class="my-4">Design & Developed by: </p>
        </div>
      </div>
    </footer>
  </div>
  <!--end wrapper-->


</body>

</html>