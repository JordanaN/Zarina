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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('produtos.index')}}">Zarina Stock</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav"> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">                       
                        <li>
                            <a href="#"> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"> Produtos</a>
                    </li>
                    <li>
                        <a href="tables.html"> Embalagens</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"> Fretes </a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#"> Opções </a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="forms.html"> Vendas </a>
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
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
