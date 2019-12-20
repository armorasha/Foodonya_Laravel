<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- initial scale 1 for mobile website -->
    <title>Foodonya - A Pizza Chain MVC Web App</title>
    <meta name="apple-mobile-web-app-title" content="Foodonya">


    <!-- Bootstrap reference starts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- md is the breakpoint for 768px device. refer bottom comments on styles.css file. -->
    <!-- Bootstrap reference ends -->

    <!--  Custom Styles file should be added after the Bootstrap library links, as in here.-->
    <link href="/css/laravel_styles.css" rel="stylesheet" type="text/css"> 
    {{-- Use "/css/laravel_styles.css" explicit from public root, not "css/laravel_styles.css" --}}

    @stack('jsScriptFileLoad') {{-- for loading page specific javascript scripts file (see select.blade.php for usage) --}}


</head>

<body>

    <!-- Bootstrap Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><i class="fas fa-pizza-slice"></i> FOODONYA</a>

        <!--Outside cart bar. Hidden by default, shows when navbar collapse using media query-->
        <div class="d-flex ml-auto mr-3">
            <ul class="navbar-nav">
                <li class="nav-item cart-out">
                    <a class="nav-link align-right" href="/php/view_cart.php"><i class="fas fa-shopping-cart">
                        </i> Cart <span class="badge badge-danger pc-count">'??'</span></a>
                </li>
            </ul>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <!--search bar-->
                <form class="form-inline my-2 my-lg-0 d-flex flex-nowrap" action="/php/search_page.php" method="post">
                    <!--        d-flex flex-nowrap: for no wrapping of form items while responsive move-->
                    <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search.."
                        aria-label="Search">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"
                        onclick="return validateSearch()">Search</button>
                </form>



                <!--home link-->
            <li class="nav-item">
                {{-- Laravel Request path- Give me the current browser address path, if it is equal
                    to home page, then set this <a> tag as active color, if not do nothing --}}
                    <a class="nav-link {{Request::path() === '/' ? 'active' : ''}}" 
                    href="/"><i class="fas fa-home"></i> Home</a>
                </li>



                <!--menu link-->
                <li class="nav-item">
                    {{-- Laravel Request path- Give me the current browser address path, if it is equal
                    to menu page, then set this <a> tag as active color, if not do nothing --}}
                    <a class="nav-link {{Request::path() === '/menu' ? 'active' : ''}}" href="/menu"><i
                            class="fas fa-book-open"></i> Menu</a>
                </li>



                <!--cart link-->
                <!--Inside cart bar. Shows by default, hidden when navbar collapse using media query-->
                <li class="nav-item cart-in">
                    <a class="nav-link {{Request::path() === '/cart' ? 'active' : ''}}" href="/cart"><i
                            class="fas fa-shopping-cart">
                        </i> Cart <span class="badge badge-danger pc-count">?</span></a>
                </li>


                <!--member link-->
                <li class="nav-item">
                    <a class="nav-link {{Request::path() === '/member' ? 'active' : ''}}" href="/member"><i
                            class="fas fa-user"></i> Member</a>
                </li>


            </ul>
        </div>
    </nav>



    @yield('content')



    <!-- Bootstrap footer-->
    {{-- <footer class="bs-footer fixed"> --}}
    <footer class="bs-footer">

        <!-- Bootstrap final </footer> -->
        <div class="container-fluid">
            <div class="row text-center">

                <!----------------------------->
                <div class="C1 col-12 col-sm-5 bg-primary">
                    <div class="row">
                        <div class="SubC1 col-6 col-sm-12">
                            <h4>FOODONYA</h4>
                        </div>
                        <!----------->
                        <div class="subC2 col-6 col-sm-12">
                            <p class="copyright">&copy; Raja Palanivel (YEAR)

                            </p>
                        </div>
                    </div>
                </div>
                <!------------>
                <div class="C2 col-12 col-sm-7 bg-primary">
                    <p class="desc">Data driven Web App developed from ground-up using leading IT technologies, APIs
                        and Cloud infrastructures. Designed for Scalability and Security.</p>
                </div>
                <!------------------------------>
                <div class="C3 col-3 col-sm-3 bg-primary-dark">
                    <a href="/about">About Us</a>
                </div>
                <div class="C3 col-4 col-sm-4 bg-primary-dark">
                    <a href="/privacy">Privacy Policy</a>
                </div>
                <div class="C3 col-5 col-sm-5 bg-primary-dark">
                    <a href="/terms">Terms & Conditions</a>
                </div>
            </div>

        </div>
    </footer>

@yield('extra-js') 

</body>

</html>