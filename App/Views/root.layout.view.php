<!DOCTYPE html>
<html lang="sk">
<head>
    <title>FRI-MVC FW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css.css">
</head>
<body>
<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">-->
<!--    <div class="container">-->
<!--        <a class="navbar-brand" href="#">FRI-MVC FW </a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">-->
<!--            <ul class="navbar-nav">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="?c=home">Domov</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="?c=home&a=contact">Kontakt</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container-fluid">
        <a href="index.html">
            <img alt="" class="navbar-brand" src="public/images/logoL.png">
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a aria-current="page" class="nav-link" href="?c=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=games">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="?c=home&a=about">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a aria-expanded="false" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                       id="navbarDropdown" role="button">
                        Other
                    </a>
                    <ul aria-labelledby="navbarDropdown" class="dropdown-menu">
                        <li><a class="dropdown-item" href="?c=home&a=schedule">Schedule</a></li>
                        <li><a class="dropdown-item" href="?c=home&a=tournaments">Tournaments</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="?c=auth&a=loginForm">Leaderbord</a></li>
                    </ul>
                </li>
            </ul>
            <?php if (!\App\Auth::isLogged()) { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?c=auth&a=loginForm">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=auth&a=registerForm">Register</a>
                </li>
            </ul>
            <?php }else{?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?c=auth&a=profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=auth&a=logout">Logout</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="content">
    <?= $contentHTML ?>
</div>

<footer class="navbar-fixed-bottom">
    <div class="container-fluid bg-dark py-3">
        <div class="container">
            <div class="row">

                <div class="d-flex justify-content-center">
                    <div class="d-inline-block">
                        <div class="bg-circle-outline d-inline-block">
                            <a class="text-white" href="https://www.facebook.com/"><i
                                        class="fa fa-2x fa-fw fa-facebook"></i>
                            </a>
                        </div>

                        <div class="bg-circle-outline d-inline-block">
                            <a class="text-white" href="https://twitter.com/">
                                <i class="fa fa-2x fa-fw fa-twitter"></i></a>
                        </div>

                        <div class="bg-circle-outline d-inline-block">
                            <a class="text-white" href="https://www.linkedin.com/company/">
                                <i class="fa fa-2x fa-fw fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
</body>
</html>

