<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grupos</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url ?>profesor/calificaciones">Calificaciones</a></li>
            <li class="breadcrumb-item active" aria-current="page">Evaluar</li>
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
<div class="p-3">
    <div class="fw-bold">BOLETA: <span class="fw-normal">
            <?= $_SESSION['identity']->general->clave_usuario ?></span></div>
    <div class="fw-bold">NOMBRE: <span class="fw-normal text-uppercase">
            <?= $_SESSION['identity']->general->nombre ?>
            <?= $_SESSION['identity']->general->apellidos ?></span></div>
    <br />
    <h5 class="text-primary text-left">Grupo-asignatura seleccionada:</h5>
    <table class="table table-striped border border-1">
        <thead>
            <tr class="bg-primary">
                <th class="fw-normal text-white text-center">Grupo</th>
                <th class="fw-normal text-white text-center">Clave</th>
                <th class="fw-normal text-white text-center">Asignatura</th>
                <th class="fw-normal text-white text-center">Fecha de aplicación</th>
                <th class="fw-normal text-white text-center">Captura</th>
                <th class="fw-normal text-white text-center">Estatus del acta</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($info = $infoCalif["infoEval"]->fetch_object()) : ?>
            <tr>
                <td align="center">
                    <?= $info->secuencia; ?>
                </td>
                <td align="center">
                    <?= $info->asignatura_clave; ?>
                </td>
                <td align="center">
                    <?= $info->descripcion; ?>
                </td>
                <td align="center">
                    <?= $info->fecha_aplicacion; ?>
                </td>
                <td align="center">
                    <?= $info->ordinario; ?>
                </td>
                <td align="center">
                    <?= $info->estatus_acta; ?>
                </td>
            </tr>
            <input type="hidden" id="actaAsignatura" data-asignatura="<?php echo $info->asignatura_clave; ?>" data-evaluacion="<?php echo $info->clv_evaluacion; ?>">
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <div class="col-md-12">
        <h3 class="text-primary text-center">Calificaciones del semestre</h3>
        <?php if ($infoCalif["evaluaciones"]->num_rows > 0) : ?>
        <form id="formCalificar">
            <table class="table table-striped border border-1">
                <thead>
                    <tr class="bg-primary">
                        <th class="fw-normal text-white text-center">Boleta</th>
                        <th class="fw-normal text-white text-center">Nombre</th>
                        <th class="fw-normal text-white text-center">Calificación almacenada</th>
                        <th class="fw-normal text-white text-center">Captura</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($eval = $infoCalif["evaluaciones"]->fetch_object()) : ?>
                    <tr>
                        <td align="center">
                            <?= $eval->alumno_clave; ?>
                        </td>
                        <td align="center">
                            <?= $eval->nombre; ?>
                            <?= $eval->apellidos; ?>
                        </td>
                        <td class="almacenarCalif" data-alumno="<?php echo $eval->alumno_clave ?>" align="center">
                            <?= $eval->calificacion ?>
                        </td>
                        <td align="center">
                            <select data-alumno="<?php echo $eval->alumno_clave ?>" data-evaluacion="<?php echo $eval->evaluacion_clave ?>" data-materia="<?php echo $eval->materia_clave ?>" class="form-select form-select-sm calificacionAlumno" required>
                                <option selected disabled>Selecciona una calificación</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="NP">NP</option>
                            </select>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="text-center">
                <button id="guardarCalif" type="button" class="btn btn-warning">Guardar calificaciones</button>
                <button id="cerrarActas" type="button" class="btn btn-danger">Terminar captura</button>
            </div>
        </form>
        <?php else : ?>
        <h4 class="text-center">Lo sentimos, aún no tienes alumnos inscritos</h4>
        <?php endif; ?>
    </div>
</div>