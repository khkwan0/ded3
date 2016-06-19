<!DOCTYPE html>
<html>
    <head>
        <title>Caldrivers.com - Free driving school</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
        <link href="/lesson/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/lesson/assets/css/main.css" />
    <?php if (isset($css)):?>
        <?php foreach ($css as $style):?>
            <link rel="stylesheet" type="text/css" href="/lesson/assets/css/<?php echo $style?>" />
        <?php endforeach;?>
    <?php endif;?>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand" id="main-logo">Caldrivers.com</a><span class="navbar-brand" id="motto">&nbsp;- California&apos;s first free online driving school</span></span>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>
                        <li><a href="/disclaimer">Get Started</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
