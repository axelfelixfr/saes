<div id="inicio">
    <!-- Inicio de carousel -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div id="carouselIPN" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a id="upiicsa" href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/correo-institucional.pdf" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/correo_institucional.png" class="d-block img-fluid w-100" alt="Item IPN 1">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a id="upiicsa" href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/correo-institucional.pdf" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/aparatos_ortopedicos.jpg" class="d-block img-fluid w-100" alt="Item IPN 2">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/directorio-upiicsa-confinamiento2309.pdf" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/directorio_upiicsa_confinamiento.png" class="d-block img-fluid w-100" alt="Item IPN 3">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://elementosdeaprendizaje.ipn.mx/" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/slider_elem_apren.png" class="d-block img-fluid w-100" alt="Item IPN 4">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/correo-alumnos.pdf" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/correo_alumnos_2.png" class="d-block img-fluid w-100" alt="Item IPN 5">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/40_servicio_docentes.pdf" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/maestro_altamirano.jpg" class="d-block img-fluid w-100" alt="Item IPN 6">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://alumnoguinda.mx/" target="_blank">
                                <img src="<?=base_url?>assets/img/carrousel/correo_temporal.png" class="d-block img-fluid w-100" alt="Item IPN 7">
                            </a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIPN" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselIPN" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de carousel -->
    <div class="container pt-4 pb-5" id="saesBienvenida">
        <h1 class="text-center">SAES.- Es la herramienta informática diseñada para apoyar en la consulta y
            realización
            de trámites escolares.</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 d-flex align-items-center justify-content-center">
                <img src="<?=base_url?>assets/img/logos/UPIICSA.svg" class="img-fluid float-start" width="200px" alt="UPIICSA">
                <?php if (!isset($_SESSION['identity'])) :?>
                <h2 class="text-warning text-center">Inicie Sesión <span class="text-success">para poder
                        continuar</span></h2>
                <?php else : ?>
                <h2 class="text-warning text-center">Te damos la bienvenida <span class="text-success">
                        <?= $_SESSION['identity']->general->nombre ?>
                        <?= $_SESSION['identity']->general->apellidos ?></span></h2>
                <?php endif; ?>
                <!-- <a href="<?=base_url?>user/logout">Cerrar sesión</a> -->
            </div>
            <!-- <?= var_dump($_SESSION['nueva']) ?> -->
            <!-- <?= var_dump($_SESSION['alumno']) ?> -->
            <!-- Inicio del Login-->
            <?php if (!isset($_SESSION['identity'])) :?>
                <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login']) : ?>
            <div id="errorLogin" data-function="handleShowToast" data-boolean="true" class="d-none">Datos incorrectos</div>
                <?php endif; ?>
            <div class="col-12 col-md-4">
                <div class="card m-3">
                    <div class="card-body">
                        <!-- Formulario-->
                        <form method="POST" id="formLogin">
                            <div class="mb-3">
                                <!-- <?= var_dump($_SESSION['error_login']) ?> -->
                                <!-- Correo Electronico -->
                                <!-- FALTA AGREGAR ICONOS A INPUTS -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo" required>
                                </div>
                                <!-- FIN Correo Electronico -->
                                <!-- Contraseña -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña" required>
                                </div>
                                <!-- FIN Contraseña -->
                                <div class="col-12 text-center">
                                    <input type="submit" id="submitLogin" class="btn btn-primary" value="Entrar">
                                </div>
                            </div>
                        </form>
                        <!-- Fin Formulario-->
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- Fin del Login -->
        </div>
    </div>
</div>