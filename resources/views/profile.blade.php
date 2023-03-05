<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Share
  </title>
  <!-- Favicon -->
  <link href="{{asset('/assets/img/brand/favicon.png')}}" rel="icon" type="image/png')}}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('/assets/css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
  <!-- Bootstrap -->

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Profil</b>
                        <ul class="navbar-nav align-items-center d-none d-md-flex">
                            <li class="nav-item dropdown">
                              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                  <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{asset('assets/img/pp.png')}}">
                                  </span>
                                  <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name }}</span>
                                  </div>
                                </div>
                              </a>

                              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                  <i class="ni ni-user-run"></i>
                                  <span>Logout</span>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                  </form>
                                </a>
                              </div>
                            </li>
                          </ul>
                    </div>
                    <div class="card-body">
                        {{-- didieu tempelkeunna --}}
                        <div class="row">
                            {{-- <div class="col-sm-12 col-md-6 col-lg-3">
                                <img class="img-profile rounded-circle"
                                    src="{{ asset(auth()->user()->image()) }}" width="200px">
                            </div> --}}
                            <div class="col-sm-12 col-md-6 col-lg-9">
                                <h1>{{ auth()->user()->name }}</h1>
                                {{-- {{ auth()->user()->name }} --}}
                                <p><i class="bi bi-envelope "></i> <a
                                        href="https://mail.google.com/">{{ auth()->user()->email }}</a>
                                    {{-- {{ auth()->user()->role }} --}}
                                </p>
                            </div>
                        </div>
                        <br>
                        <h2>Account</h2>
                        <br>
                        <div class="row pb-5">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                              </div>
                            {{-- <div class="col-sm-12 col-md-6 col-lg-3">
                                <h5>Username</h5>
                                <br>
                                <h5>Email</h5>
                                <br>
                                <h5>Password</h5>
                                <br>
                                <h5>Full Name</h5>
                                <br>
                                <h5>Role</h5>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-5">
                                <input type="text" value="{{ auth()->user()->username }}" disabled class="form-control">
                                <br>
                                <input type="text" value="{{ auth()->user()->email }}" disabled class="form-control">
                                <br>
                                <input type="password" value="{{ auth()->user()->password }}" disabled class="form-control">
                                <br>
                                <input type="text" value="{{ auth()->user()->name }}" disabled class="form-control">
                                <br>
                                <input type="text" value="{{ auth()->user()->role }}" disabled class="form-control">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core   -->
  <script src="{{asset('/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{asset('/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
  <!--   Argon JS   -->
  <script src="{{asset('/assets/js/argon-dashboard.min.js?v=1.1.2')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  @include('sweetalert::alert')
</body>
</html>
