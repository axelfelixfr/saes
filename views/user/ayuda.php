<div class="container">
    <nav aria-label="breadcrumb" class="py-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ayuda</li>
        </ol>
    </nav>
    <?php if (!isset($_SESSION['identity'])) :?>
    <div class="row my-3">
        <h2 class="text-center">Ayuda</h2>
        <div class="col-12 col-lg-6 mx-auto">
            <div class="card alert-card-primary">
                <div class="card-body text-center pb-0">
                    <i class="far fa-hand-paper fa-3x text-primary"></i>
                    <p>Necesita iniciar sesión para acceder al manual adecuado</p>
                </div>
            </div>
        </div>
    </div>
    <?php elseif (isset($_SESSION['alumno'])) : ?>
    <div class="row my-3">
        <div class="col d-flex justify-content-around align-items-center">
            <a id="ipn" href="#"><img class="img-fluid" width="130px" src="<?=base_url?>assets/img/logos/IPN.svg" alt="IPN"></a>
        </div>
        <div class="col-9 d-flex justify-content-around align-items-center">
            <h3 class="text-black mx-5 text-center">UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERÍA Y CIENCIAS SOCIALES Y ADMINISTRATIVAS</h3>
        </div>
        <div class="col d-flex justify-content-around align-items-center">
            <a id="upiicsa" href="#"><img class="img-fluid" width="70px" src="<?=base_url?>assets/img/logos/UPIICSA.svg" alt="UPIICSA"></a>
        </div>
    </div>
    <br>
    <div class="pb-3">
        <div class="fw-bold">BOLETA: <span class="fw-normal">
                <?= $_SESSION['identity']->clave_usuario ?></span></div>
        <div class="fw-bold">NOMBRE: <span class="fw-normal text-uppercase">
                <?= $_SESSION['identity']->nombre ?>
                <?= $_SESSION['identity']->apellidos ?></span></div>
        <br />
        <div class="col-md-4 offset-md-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">Manual</th>
                        <th scope="col">Mostrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alumnos</td>
                        <td><a target="_blank" href="https://www.saes.upiicsa.ipn.mx/Ayuda/Manuales/Manual%20Alumno.pdf"><i class="fas fa-book fa-3x"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php elseif (isset($_SESSION['profesor'])) : ?>
    <div class="row my-3">
        <div class="col d-flex justify-content-around align-items-center">
            <a id="ipn" href="#"><img class="img-fluid" width="130px" src="<?=base_url?>assets/img/logos/IPN.svg" alt="IPN"></a>
        </div>
        <div class="col-9 d-flex justify-content-around align-items-center">
            <h3 class="text-black mx-5 text-center">UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERÍA Y CIENCIAS SOCIALES Y ADMINISTRATIVAS</h3>
        </div>
        <div class="col d-flex justify-content-around align-items-center">
            <a id="upiicsa" href="#"><img class="img-fluid" width="70px" src="<?=base_url?>assets/img/logos/UPIICSA.svg" alt="UPIICSA"></a>
        </div>
    </div>
    <br>
    <div class="pb-3">
        <div class="fw-bold">RFC: <span class="fw-normal">
                <?= $_SESSION['identity']->clave_usuario ?></span></div>
        <div class="fw-bold">NOMBRE: <span class="fw-normal text-uppercase">
                <?= $_SESSION['identity']->nombre ?>
                <?= $_SESSION['identity']->apellidos ?></span></div>
        <br />
        <div class="col-md-4 offset-md-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">Manual</th>
                        <th scope="col">Mostrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Profesores</td>
                        <td><a target="_blank" href="https://www.saes.upiicsa.ipn.mx/Ayuda/Manuales/Manual%20Profesor.pdf"><i class="fas fa-book fa-3x"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>