<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genadijs Aleksejenko</title>
    <link rel="icon" type="image/png" href="<?php echo PROJECT_PATH; ?>img/favicon.png"/>
    <link href="<?php echo PROJECT_PATH; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PROJECT_PATH; ?>css/nprogress.css" rel="stylesheet">
    <link href="<?php echo PROJECT_PATH; ?>css/prettify.css" rel="stylesheet">
    <link href="<?php echo PROJECT_PATH; ?>css/custom.css" rel="stylesheet">
    <link href="<?php echo PROJECT_PATH; ?>css/jquery.treegrid.css" rel="stylesheet">
    <link href="<?php echo PROJECT_PATH; ?>fonts/font-awesome.min.css" rel="stylesheet">
</head>

<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title">
                    <a href="<?php echo MAIN_PATH; ?>" class="site_title">Test</a>
                </div>
                <div class="clearfix"></div>
                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li<?=$this->App->controller_path == 'settings' ? ' class="current-page"' : ''; ?>><a href="<?php echo PROJECT_PATH; ?>tree/"><i class="fa fa-list-alt"></i>Tree</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle"><a id="menu_toggle"><i class="fa fa-square-o"></i></a></div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Menu
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo PROJECT_PATH; ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->