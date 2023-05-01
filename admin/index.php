 <?php
    session_start();
    ?>

 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
     <link rel="stylesheet" href="estilos/style.css">
     <link rel="stylesheet" href="estilos/media-queries.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 </head>

 <body>
     <main>
         <section id="login">
             <div id="imagem">
                 <!--Aqui vai a imagem nas CSS-->
             </div>

             <?php
                if (isset($_SESSION['nao_autenticado'])) :
                ?>
                 <div id="invalido">
                     <p>ERRO: usuário ou senha inválidos.</p>
                 </div>
             <?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>

             <div id="formulario">
                 <h1>LOGIN</h1>
                 <p>Seja bem-vindo(a)! <br> Faça login para acessar sua conta.</p>
                 <form action="login.php" method="post" autocomplete="on">
                     <div class="campo">
                         <i class="material-icons">person</i>
                         <input type="text" name="login" id="ilogin" placeholder="Usuario" autocomplete="login" required minlength="4" maxlength="20">
                         <label for="ilogin"></label>
                     </div>
                     <div class="campo">
                         <i class="material-icons">vpn_key</i>
                         <input type="password" name="senha" id="isenha" placeholder="Senha" <label for="isenha"></label>
                     </div>
                     <input type="submit" value="Entrar">
                 </form>
             </div>
         </section>
     </main>
 </body>

 </html>