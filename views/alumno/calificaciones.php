<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inscripción actual</li>
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
<div class="p-3">
    <div class="fw-bold">BOLETA: <span class="fw-normal">
            <?= $_SESSION['identity']->general->clave_usuario ?></span></div>
    <div class="fw-bold">NOMBRE: <span class="fw-normal text-uppercase">
            <?= $_SESSION['identity']->general->nombre ?>
            <?= $_SESSION['identity']->general->apellidos ?></span></div>
    <br />
    <div class="col-md-12">
        <h4 class="text-primary text-center">Calificaciones del semestre</h4>
        <br>
        <?php if ($calificaciones->num_rows > 0) : ?>
        <table class="table table-striped border border-1">
            <thead>
                <tr class="bg-primary">
                    <th class="fw-normal text-white text-center">Grupo</th>
                    <th class="fw-normal text-white text-center">Materia</th>
                    <th class="fw-normal text-white text-center">1er Parcial</th>
                    <th class="fw-normal text-white text-center">2do Parcial</th>
                    <th class="fw-normal text-white text-center">3er Parcial</th>
                    <th class="fw-normal text-white text-center">Ext</th>
                    <th class="fw-normal text-white text-center">Final</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($calif = $calificaciones->fetch_object()) : ?>
                <tr>
                    <td align="center">
                        <?= $calif->secuencia; ?>
                    </td>
                    <td align="center">
                        <?= $calif->asignatura_clave; ?> -
                        <?= $calif->descripcion; ?>
                    </td>
                    <td align="center">
                        <?= $calif->calificacion_primer; ?>
                    </td>
                    <td align="center">
                        <?= $calif->calificacion_segundo ?>
                    </td>
                    <td align="center">
                        <?= $calif->calificacion_tercer; ?>
                    </td>
                    <td align="center">-
                    </td>
                    <td align="center">
                        <?= Utils::sacarPromedio($calif->calificacion_primer, $calif->calificacion_segundo, $calif->calificacion_tercer) ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else : ?>
        <h4 class="text-center">Lo sentimos, aún no tienes asignaturas asignadas</h4>
        <?php endif; ?>
    </div>
</div>