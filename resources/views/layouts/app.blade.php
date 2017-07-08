<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {!! Charts::assets() !!}
{{--    <link href="{{ url('path/to/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">--}}
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
   <link href="{{ asset('/dist/css/select2.min.css') }}" rel="stylesheet">
   <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css"> --}}

    <style>
        .result-set { margin-top: 1em }
    </style>
    <!-- Scripts -->
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{URL::asset('/dist/js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
      $('select').select2();
    </script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
        {{-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;"> --}}
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            {{--@can('view_users')
                                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}">
                                        <span class="text-info glyphicon glyphicon-user"></span> Users
                                    </a>
                                </li>
                            @endcan

                            @can('view_posts')
                                <li class="{{ Request::is('posts*') ? 'active' : '' }}">
                                    <a href="{{ route('posts.index') }}">
                                        <span class="text-success glyphicon glyphicon-text-background"></span> Posts
                                    </a>
                                </li>
                            @endcan

                         --}}
                        {{--  --}}
                        <li class="{{ Request::is('home*') ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="fa fa-tachometer" aria-hidden="true"></i></a></li>

                        {{-- Inventory --}}
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-th-large" aria-hidden="true"></i>  Inventory
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="{{ Request::is('items*') ? 'active' : '' }}"><a href="{{ route('items.index') }}"><i class="fa fa-cubes" aria-hidden="true"></i> Items</a></li>
                            @can('view_suppliers')
                              <li class="{{ Request::is('item_categories*') ? 'active' : '' }}"><a href="{{ route('item_categories.index') }}"><i class="fa fa-square" aria-hidden="true"></i> Item categories</a></li>
                            @endcan
                            @can('view_item_attributes')
                              <li class="{{ Request::is('item_attributes*') ? 'active' : '' }}"><a href="{{ route('item_attributes.index') }}"><i class="fa fa-tags" aria-hidden="true"></i> Item attributes</a></li>
                            @endcan
                          </ul>
                        </li>
                        {{--  --}}
                        {{-- suppliers --}}
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-truck" aria-hidden="true"></i>  Suppliers
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            @can('view_suppliers')
                              <li class="{{ Request::is('suppliers*') ? 'active' : '' }}"><a href="{{ route('suppliers.index') }}"><i class="fa fa-list" aria-hidden="true"></i> All suppliers</a></li>
                            @endcan
                            @can('view_bills')
                              <li class="{{ Request::is('purchase*') ? 'active' : '' }}"><a href="{{ route('bills.create') }}"><i class="fa fa-arrow-down" aria-hidden="true"></i> Purchase</a></li>
                              <li class="{{ Request::is('bills*') ? 'active' : '' }}"><a href="{{ route('bills.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Bills</a></li>
                            @endcan
                          </ul>
                        </li>
                        {{--  --}}
                        {{-- Customers --}}
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>  Customers
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            @can('view_customers')
                              <li class="{{ Request::is('customers*') ? 'active' : '' }}"><a href="{{ route('customers.index') }}"><i class="fa fa-list" aria-hidden="true"></i> All customers</a></li>
                            @endcan
                            @can('view_invoices')
                              <li class="{{ Request::is('sells*') ? 'active' : '' }}"><a href="{{ route('invoices.create') }}"><i class="fa fa-arrow-up" aria-hidden="true"></i> Sell</a></li>
                              <li class="{{ Request::is('invoices*') ? 'active' : '' }}"><a href="{{ route('invoices.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Invoices</a></li>
                            @endcan
                          </ul>
                        </li>
                        {{--  --}}
                        {{-- Accounts --}}
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-money" aria-hidden="true"></i>  Accounts
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            @can('view_expense_categories')
                              <li class="{{ Request::is('expense_categories*') ? 'active' : '' }}"><a href="{{ route('expense_categories.index') }}"><i class="fa fa-square" aria-hidden="true"></i> Expenses Categories</a></li>
                            @endcan
                            @can('view_expenses')
                              <li class="{{ Request::is('expenses*') ? 'active' : '' }}"><a href="{{ route('expenses.index') }}"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Expenses</a></li>
                            @endcan
                            <li class="{{ Request::is('cash_movements*') ? 'active' : '' }}"><a href="{{ url('#') }}"><i class="glyphicon glyphicon-transfer" aria-hidden="true"></i> Cash movement</a></li>
                          </ul>
                        </li>
                        {{--  --}}
                        {{-- Reports --}}
                        <li class="{{ Request::is('reports*') ? 'active' : '' }}"><a href="{{ url('reports') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i>  Reports</a></li>
                        {{--  --}}

                        {{--  --}}
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="nav navbar-nav navbar-right">
                      {{--  --}}

                      {{--  --}}
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                          {{--  --}}
                          <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                              <a href="#">
                                  POS
                              </a>
                          </li>
                          {{--  --}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <span class="label label-success">{{ Auth::user()->roles->pluck('name')->first() }}</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    {{--  --}}
                                    @if (Auth::check())
                                        @can('view_users')
                                            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                                <a href="{{ route('users.index') }}">
                                                    <span class="text-info glyphicon glyphicon-user"></span> Users
                                                </a>
                                            </li>
                                        @endcan
                                        @can('view_roles')
                                        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                                            <a href="{{ route('roles.index') }}">
                                                <span class="text-danger glyphicon glyphicon-lock"></span> Roles
                                            </a>
                                        </li>
                                        @endcan
                                        {{--  --}}
                                        {{-- @can('view_posts')
                                            <li class="{{ Request::is('posts*') ? 'active' : '' }}">
                                                <a href="{{ route('posts.index') }}">
                                                    <span class="text-success glyphicon glyphicon-text-background"></span> Posts
                                                </a>
                                            </li>
                                        @endcan --}}

                                    @endif
                                    {{--  --}}
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-log-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div id="flash-msg">
                @include('flash::message')
            </div>
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{URL::asset('js/filter.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-checkbox.js')}}"></script>

    @stack('scripts')
    <script>
        $(function () {
            // flash auto hide
            $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
        })
    </script>
</body>
</html>
