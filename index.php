<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marejada 2024</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico">
                        <input type="password" placeholder="Contraseña">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/registro.php" method = "POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre" name="nombre">
                        <input type="text" placeholder="Apellido" name="apellido">
                        <input type="text" placeholder="Correo Electronico" name="email">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <input type="password" placeholder="Repite tu contraseña" name="contrasena-repetida">
                        <input type="text" placeholder="Escuela" name="escuela">
                        <div>
                            <select class="form-select" id="year" required name="ano">
                              <option value="">Seleccionar año</option>
                              <option value="1">1ro</option>
                              <option value="2">2do</option>
                              <option value="3">3ro</option>
                              <option value="4">4to</option>
                              <option value="5">5to</option>
                              <option value="6">6to</option>
                            </select>
                          </div>
                        <div>
                            <select class="form-select" id="course" required name="curso">
                            <option value="">Seleccionar curso</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            </select>
                        </div>
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>
        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>