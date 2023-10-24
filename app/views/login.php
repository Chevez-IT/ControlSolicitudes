<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="" />
    <title>MKT & COMM</title>

    <link rel="icon" type="image/x-icon" href="">
    <!-- Fuentes / tipografias -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../../public/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../public/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../public/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../public/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../public/vendor/css/pages/page-auth.css" />
    <script src="../../public/vendor/js/helpers.js"></script>
    <script src="../../public/js/config.js"></script>

    <!-- Enlaces a tus recursos CSS -->
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="../../public/img/icons/fgk-logo-color.png" width="60" alt="">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">MKT & COMM</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenido a nuestro sistema de solicitudes</h4>
                        <p class="mb-4 mt-4">Te saluda el equipo de MKT y COMM, este sistema te ayuda a gestionar tus solicitudes enviados a nuestro equipo</p>

                        <form id="formAuthentication" class="mb-3" action="index.php?action=login" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Nombre de usuario / Correo electronico</label>
                                <input type="text" class="form-control" id="email-username" name="email-username" placeholder="Ingresa tu correo o nombre de usuario" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <a href="index.php?action=forgot_password">
                                        <small>¿Olvidaste tu contraseña?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <script src="../../public/vendor/libs/jquery/jquery.js"></script>
    <script src="../../public/vendor/libs/popper/popper.js"></script>
    <script src="../../public/vendor/js/bootstrap.js"></script>
    <script src="../../public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../public/vendor/js/menu.js"></script>
    <script src="../../public/js/main.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>