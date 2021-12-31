<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grupos</li>
            <li class="breadcrumb-item active" aria-current="page">Calificaciones</li>
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
        <?php if ($asignaturas->num_rows > 0) : ?>
        <h4 class="text-primary text-center">Registro electrónico de calificaciones</h4>
        <br>
        <table class="table table-striped border border-1">
            <thead>
                <tr class="bg-primary">
                    <th class="fw-normal text-white text-center">Secuencia</th>
                    <th class="fw-normal text-white text-center">Asignatura</th>
                    <th class="fw-normal text-white text-center">Evaluación</th>
                    <th class="fw-normal text-white text-center">Fecha de aplicación</th>
                    <th class="fw-normal text-white text-center">Estatus del acta</th>
                    <th class="fw-normal text-white text-center">Capturar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($asig = $asignaturas->fetch_object()) : ?>
                <tr>
                    <td align="center">
                        <?= $asig->secuencia; ?>
                    </td>
                    <td align="center">
                        <?= $asig->descripcion; ?>
                    </td>
                    <td align="center">
                        <?= $asig->ordinario; ?>
                    </td>
                    <td align="center">
                        <?= $asig->fecha_aplicacion; ?>
                    </td>
                    <td align="center">
                        <?= $asig->estatus_acta; ?>
                    </td>
                    <?php if ($asig->estatus_completa == false) : ?>
                    <td align="center"><a href="<?=base_url?>profesor/evaluar&clave_asig=<?=$asig->asignatura_clave?>&evaluacion=<?=$asig->clv_evaluacion?>" class="btn btn-sm btn-warning">Capturar</a></td>
                    <?php elseif ($asig->estatus_completa == true) : ?>
                    <td align="center"><button type="button" class="btn btn-sm btn-success" disabled>Ya capturada</a></td>
                    <?php endif; ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else : ?>
        <h4 class="text-center">Lo sentimos, aún no tienes asignaturas asignadas</h4>
        <?php endif; ?>
    </div>
</div>