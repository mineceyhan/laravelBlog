<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
	<link rel="stylesheet" href="{{asset('front')}}/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="{{asset('front')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('front')}}/css/templatemo-xtra-blog.css" rel="stylesheet">
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>
<body>
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <h3 class="text-center"> Blog</h3>
            </div>
            <nav class="tm-nav" id="tm-nav">     
            <a type="button" href="{{url('loginPage')}}" class="btn btn-outline-dark btn-md">Giriş Yap</button>
            <a type="button" href="{{url('registerPage')}}" class="btn btn-outline-dark btn-md">Hesap Oluştur!</button>

                <ul>
                    <li class="tm-nav-item active"><a href="{{ url('/blog')}} " class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Blog Anasayfa
                    </a></li>
                    <li class="tm-nav-link">
                        Kategoriler
                    </li>
                    @foreach($categories as $category)
                    <li class="tm-nav-item"><a href="{{ url('/blogOfCategory')}}/{{$category->id}}" class="tm-nav-link">
                        {{$category->name}}
                    </a></li>
                    @endforeach
                  
                   
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
          
        </div>
    </header>
    
    <div class="container-fluid">
        <main class="tm-main">
            