

<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>B</b>S') !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('adminlte.logo', '<b>B</b>S') !!}</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="" >

        </a>

        <!-- Navbar Right Menu -->
        @if(!isset(Auth::user()->email))
            <div>
                <a href="/login">
                    <button type="button" class="btn btn-info">Вхід</button>
                </a>
                <a href="/register">
                    <button type="button" class="btn btn-info">Регістрація</button>
                </a>
            </div>

        @else
            <a href="/out">
                <button type="button" class="btn btn-info">Вихід</button>
            </a>
              @endif

    </nav>
</header>

@if(isset(Auth::user()->email))
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
       <br> <br>
<a href="/">
        <button type="button" class="btn btn-primary btn-lg btn-block">Древовидная форма</button>
</a>
        <br> <br>
        <a href="/user/list">
        <button type="button" class="btn btn-primary btn-lg btn-block">сторінка "List"</button>
        </a>

    </section>
</aside>
@endif













{{--<header class="main-header">--}}

    {{--<!-- Logo -->--}}
    {{--<a href="/" class="logo">--}}


      {{--<!-- logo for regular state and mobile devices -->--}}
      {{--<span class="logo-lg">{!! config('adminlte.logo', '<b>Поиск </b>сотрудников') !!}</span>--}}
        {{--<h1 style="color: #0000F0">dfdfsdsdsdsdsd</h1>--}}
    {{--</a>--}}
    {{--@if(!isset(Auth::user()->email))--}}
        {{--<a href="/login" style="color: white; float:right; margin-top: 12px; margin-right: 12px;">Вход в личный кабинет</a>--}}
    {{--@else--}}
        {{--<a href="/out" style="color: white; float:right; margin-top: 12px; margin-right: 12px;">Виход в личный кабинет</a>--}}

    {{--@endif--}}

  {{--</header>--}}

{{--<!-- Left side column. contains the logo and sidebar -->--}}
{{--<aside class="main-sidebar">--}}
    {{--<!-- sidebar: style can be found in sidebar.less -->--}}
    {{--<section class="sidebar">--}}

        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat">--}}
                  {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- /.search form -->--}}
        {{--<!-- sidebar menu: : style can be found in sidebar.less -->--}}

       {{--sdsdsdsds--}}

    {{--</section>--}}
{{--</aside>--}}


