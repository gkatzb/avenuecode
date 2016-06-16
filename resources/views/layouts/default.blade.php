<?php
/**
 * Created by Gabriela Katz
 * Date: 05/05/2016
 */
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('includes.head')
</head>
<body class="Listagem">
<header class="col-sm-12 col-xs-12 Topo_logo">
    <div class="col-sm-12 col-xs-12 barra_azul_topo_1">
        <img class="logo_ubook" src="/img/logo.png" alt="">
		<div class="col-sm-3 col-xs-3 pull-right logout-div">
			<a class="pull-right logout-icon" href="{!! route('logout') !!}"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
		</div>
    </div>
</header>
<div class="col-sm-12 col-xs-12 Barra_menu">
    <div class="col-sm-12 col-xs-12 barra_azul_topo">
        <div class="Menu">
            <div class="Menu_Usuarios">
                <img class="ico_phone" src="/img/ico-book.png" alt="">
                <a href="{!! route('book') !!}" class="books-link">
                    Books
                </a>
            </div>
            <div class="Menu_Editors">
                <img class="ico_users" src="/img/ico-user.png" alt="">
                <a href="{!! route('editor') !!}" class="editors-link">
                    Editors
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid employees-list">
    @yield('content')
</div>
<section>
</section>
@include('includes.footer')