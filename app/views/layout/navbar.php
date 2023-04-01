<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/public/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/assets/images/img-product/logo-topzone-1.png">
    <link rel="stylesheet" href="/public/css/main.css">
</head>

<body>
    <!-- Navigation-->



    <?php
    $GetURL =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($GetURL !== '/register' && $GetURL !== '/login') {
        echo '
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-default ">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="/">Start Bootstrap</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#!">All Products</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                    <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex" action="/shopping">
                            <button class="btn btn-outline-dark" type="submit" style = "margin-right: 10px">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </form>
                       
                    </div>
                </div>
            </nav>';
    }
    ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
        <div id="header">
            <div class="head">
                <div class="logo-topzone">
                    <a href="">
                        <img src="" alt="">
                    </a>
                    <a href="" class="premium-apple">
                        <i class="fa-brands fa-apple"></i>
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a>iPhone</a>
                    </li>
                    <li>
                        <a>Mac</a>
                    </li>
                    <li>
                        <a>iPad</a>
                    </li>
                    <li>
                        <a>Watch</a>
                    </li>
                    <li>
                        <a>Âm Thanh</a>
                    </li>
                    <li>
                        <a>Phụ kiện</a>
                    </li>
                    <li>
                        <a>TekZone</a>
                    </li>
                    <li>
                        <a>TopCare</a>
                    </li>
                </ul>
                <div class="search-cart">
                    <div class="search-ic">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <a href="#" class="cart-ic">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
            </div>
        </div>
        