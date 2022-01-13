
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/panel/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/panel/img/favicon.png">
  <title>
   Hafriyat - Oturum Ekranı
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/panel/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/panel/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/panel/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/panel/css/soft-ui-dashboard.css?v=1.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-white">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " >
              <img src="uploads/black.png" style="width:100px;">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                  <a class="nav-link me-2" >
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Kullanıcı Girişi
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <section>
    <div class="page-header section-height-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Oturum Açınız</h3>
                <p class="mb-0">TCKN veya Vergi Dairesi Numarası ile oturum açınız</p>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" action="{{ route('sign') }}">
                  @csrf
                  <label>TCKN/VN</label>
                  <div class="mb-3">
                    <input type="number" name="tckn" class="form-control" value="" required placeholder="TCKN/VN Giriniz" aria-label="TCKN/VN" >
                  </div>
                  <label>Şifre</label>
                  <div class="mb-3">
                    <input type="password" name="password" value="" class="form-control" required placeholder="Şifre Giriniz" aria-label="Password" >
                  </div>
                  {{-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div> --}}
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Gİrİş Yap</button>
                  </div>
                </form>
              </div>
              {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                </p>
              </div> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/panel/img/curved-images/curved6.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-4 fixed-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="https://gaziantepbilisim.com.tr" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!--   Core JS Files   -->
  <script src="assets/panel/js/core/popper.min.js"></script>
  <script src="assets/panel/js/core/bootstrap.min.js"></script>
  <script src="assets/panel/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/panel/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="assets/panel/js/notify.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      @if (Session::has('message'))
        $.notify("<?=session('message')?>", "error");
      @endif

    });
  </script>
</body>

</html>
