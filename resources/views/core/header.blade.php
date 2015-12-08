<!DOCTYPE HTML>
<html>
<head>
    <title>CS61A Scheme Recursive Art</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--[if lte IE 8]><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css" />
    <link rel="stylesheet" href="/css/remodal.css" />
    <link rel="stylesheet" href="/css/remodal-default-theme.css" />
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body style="background-image: url('/images/random_grey_variations.png'); background-repeat: repeat">
<div class="remodal-bg"></div>
<section id="header">
    <header class="major">
        <h1 class="text-shadow">Scheme Recursive Art Contest <br />
       <small>
           <strong><a href="http://github.com/colinschoen/CS61A-Art-Voting" target="_blank" class="icon alt fa-github"><span class="label">Github</span></a></strong>
       </small>
        </h1>
        <p><a href="http://cs61a.org">CS61A</a></p>
    </header>
    <div class="container">
        <ul class="actions">
            <li><a id="viewBtn" href="#voting" class="button special scrolly">View</a></li>
        </ul>
    </div>
</section>
@section('js')
    $('#viewBtn').on('click', function() {
        $(this).addClass('animated tada');
    });
@endsection
