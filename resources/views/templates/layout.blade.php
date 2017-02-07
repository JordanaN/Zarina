<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zarina</title>

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-nav="blue">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('produto.index')}}">
                  <img src="{{asset('image/Zarina.png')}}" class="logo">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                @if (Auth::user())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"> Log Out</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                      <a href="index.html">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                          Dashboard
                      </a>
                    </li>
                    <li>
                      <a href="{{route('produto.index')}}">
                          <i class="fa fa-product-hunt" aria-hidden="true"></i>
                          {{trans('layout_admin.navbar.products')}}
                      </a>
                    </li>
                    <li>
                        <a href="{{route('embalagem.index')}}">
                          <i class="fa fa-dropbox" aria-hidden="true"></i>
                          {{trans('layout_admin.navbar.packagings')}}
                        </a>
                    </li>
                    <li> 
                    <li>
                        <a href="{{route('fornecedor.index')}}">
                          <i class="fa fa-dropbox" aria-hidden="true"></i>
                          {{trans('layout_admin.navbar.caterers')}}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                          <i class="fa fa-rocket" aria-hidden="true"></i>
                           Fretes
                        </a>
                    </li>
                    <li>
                        <a href="forms.html">
                          <i class="fa fa-bar-chart" aria-hidden="true"></i>
                          Vendas
                        </a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="container col-md-12">
                    @yield('content')
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js
"></script>
    <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>
