<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grupos</li>
            <li class="breadcrumb-item active" aria-current="page">Horarios</li>
        </ol>
    </nav>
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
<br />
<div class="pb-3">
    <div class="fw-bold">RFC: <span class="fw-normal">
            <?= $_SESSION['identity']->general->clave_usuario ?></span></div>
    <div class="fw-bold">NOMBRE: <span class="fw-normal text-uppercase">
            <?= $_SESSION['identity']->general->nombre ?>
            <?= $_SESSION['identity']->general->apellidos ?></span></div>
    <br />
    <div class="col-md-12">
        <h4 class="text-primary text-center">Horarios del semestre</h4>
        <br>
        <?php if ($horario && !empty($horario)) : ?>
        <table class="table table-striped border border-1">
            <thead>
                <tr class="bg-primary">
                    <th class="fw-normal text-white text-center" scope="col">Grupo</th>
                    <th class="fw-normal text-white text-center" scope="col">Clave</th>
                    <th class="fw-normal text-white text-center" scope="col">Materia</th>
                    <th class="fw-normal text-white text-center" scope="col">Lunes</th>
                    <th class="fw-normal text-white text-center" scope="col">Martes</th>
                    <th class="fw-normal text-white text-center" scope="col">Miércoles</th>
                    <th class="fw-normal text-white text-center" scope="col">Jueves</th>
                    <th class="fw-normal text-white text-center" scope="col">Viernes</th>
                    <th class="fw-normal text-white text-center" scope="col">Sábado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horario as $key => $asig) : ?>
                <tr>
                    <td align="center">
                        <?= $asig->secuencia; ?>
                    </td>
                    <td align="center">
                        <?= $asig->materia_clave; ?>
                    </td>
                    <td align="center">
                        <?= $asig->descripcion; ?>
                    </td>
                    <td align="center">
                        <?= $asig->lunes; ?>
                    </td>
                    <td align="center">
                        <?= $asig->martes; ?>
                    </td>
                    <td align="center">
                        <?= $asig->miercoles; ?>
                    </td>
                    <td align="center">
                        <?= $asig->jueves; ?>
                    </td>
                    <td align="center">
                        <?= $asig->viernes; ?>
                    </td>
                    <td align="center">
                        <?= $asig->sabado; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
        <h4 class="text-center">Lo sentimos, aún no tienes asignaturas asignadas</h4>
        <?php endif; ?>
    </div>
</div>