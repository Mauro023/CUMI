<!DOCTYPE html>
<html>

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name') }} | LOGIN</title>
    <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">

    <style media="screen">
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            height: 100%;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(/photos/fondo.jpg);
            z-index: -1;
            background-size: cover;
        }

        .icon-richard {
            text-align: center;
            background: #fff;
        }
    </style>
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form method="post" action="{{ url('/login') }}">
                                <div class="login-logo">
                                    <a href="{{ url('/home') }}">
                                        <img height="100%" width="270"
                                            src="https://cumi.com.co/wp-content/uploads/2021/07/LOGO_cumi_Mesa-de-trabajo-1.png"
                                            alt="CUMI" title>
                                    </a>
                                </div>
                                {!! csrf_field() !!}
                                <h1>Iniciar sesión</h1>
                                <p class="text-muted">Ingresa tus datos para iniciar sesión</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                        name="email" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password"
                                        class="form-control {{ $errors->has('password')?'is-invalid':'' }}"
                                        placeholder="Password" name="password">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit"><strong>Iniciar
                                                sesión</strong></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white py-5 d-md-down-none" style="width:44%">
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleInterval" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleInterval" data-slide-to="1"></li>
                                <li data-target="#carouselExampleInterval" data-slide-to="2"></li>
                              </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="1000">
                                    <img src="{{ asset('images/1.jpg') }}" class="d-block w-100" alt="Primera imagen">
                                </div>
                                <div class="carousel-item" data-interval="1000">
                                    <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" alt="Segunda imagen">
                                </div>
                                <div class="carousel-item" data-interval="1000">
                                    <img src="{{ asset('images/3.jpg') }}" class="d-block w-100" alt="Tercera imagen">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
</body>

</html>