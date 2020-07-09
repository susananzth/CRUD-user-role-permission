<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Etiquetas meta -->
    <meta charset="utf-8">
    <meta name="DC.Language" scheme="RFC1766" content="Spanish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema web de administrador de usuarios y roles con Laravel 7, interfaz en bootstrap 4.5. Desarrollado por Susana Piñero @susananzth"/>
    <meta name="keywords" content="Laravel, Laravel 7, bootstrap, bootstrap 4.5, roles, usuarios, admin"/>
    <meta name="author" content="Susana Piñero Rodríguez" />
    <meta name="copyright" content="Susana Piñero Rodríguez" />
    <meta name="reply-to" content="susananzth@gmail.com">
    <link REV="made" href="mailto:susananzth@gmail.com">
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="43200"/>
    <meta name="Resource-type" content="Manual">
    <meta name="DateCreated" content="Sat, 08 July 2020 00:00:00 GMT-5">
    <meta name="Revisit-after" content="1 days">
    <meta name="robots" content="ALL">
    <!-- Título de la página -->
    <title>Laravel 7 | SusanaNzth</title>
    <!-- Ícono -->
    <link rel="icon" type="image/x-icon" href="{{asset('/img/favicon.ico')}}" />
    <!-- Fuentes -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/css/theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">SusanaNzth</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ URL('login') }}">Sing In</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center bg-title">
                <h1 class="mx-auto my-0 text-uppercase">CRUD</h1>
                <h1 class="mx-auto my-0 text-uppercase">role-user</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Web system with laravel 7 and Start Bootstrap interface.</h2>
                <a class="btn btn-primary js-scroll-trigger" href="#about">Get Started</a>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Built with Laravel 7 and Bootstrap 4</h2>
                    <p class="text-white-50">
                        Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                        <a href="https://startbootstrap.com/template-overviews/grayscale/">the preview page</a>
                        . The theme is open source, and you can use it for any purpose, personal or commercial.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="assets/img/ipad.png" alt="" />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container">
            <!-- Featured Project Row-->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/bg-masthead.jpg" alt="" /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Shoreline</h4>
                        <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any project - even commercial projects! Download it, customize it, and publish your website!</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-01.jpg" alt="" /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Misty</h4>
                                <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-02.jpg" alt="" /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Mountains</h4>
                                <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-map text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">Lima, Perú</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="#!">susananzth@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-mobile text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">(+51) 982-701-107</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="https://twitter.com/susananzth"><i class="fa fa-twitter"></i></a>
                <a class="mx-2" href="https://facebook.com/susananzth"><i class="fa fa-facebook-f"></i></a>
                <a class="mx-2" href="https://www.linkedin.com/in/susananzth/"><i class="fa fa-linkedin"></i></a>
                <a class="mx-2" href="https://github.com/susananzth"><i class="fa fa-github"></i></a>
                <a class="mx-2" href="https://gitlab.com/susananzth"><i class="fa fa-gitlab"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © SusanaNzth 2020</div></footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
