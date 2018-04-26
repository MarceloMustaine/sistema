<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <title>Manga SRC - Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link media="screen,projection" rel="stylesheet" type="text/css" href="admin/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col l6">

                <div class="login card center-align">

                    <div class="logar">
                        <span class="meio">Login</span>
                    </div>
                    <div class="login-box">
                        <form class="col s12" method="post" action="admin/check.php">

                            <div class="row" >
                                <div class="input-field col s11">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="user" class="validate">
                                    <label for="icon_prefix">Usuário ou Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s11">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" name="userPass" type="password" class="validate">
                                    <label for="password">Senha</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col l12">
                                    <div class="checkb left-align">
                                      <label>
                                        <input type="checkbox" value="1" name="checkb" />
                                        <span>Continuar Logado</span>
                                      </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col l12">
                                    <div class="right direita">
                                        <a class="waves-effect waves-orange btn-flat" href="register">Registre-se</a>
                                        <button class="btn waves-effect waves-light" name="btn-entra" type="submit" name="entrar" disabled>
                                            Entrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col l12">
                                <?php echo @$_SESSION['message']; 

                                    if(isset($_SESSION['message'])){
                                        session_destroy();
                                    }


                                ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin/js/functions.js"></script>
</body>

</html>