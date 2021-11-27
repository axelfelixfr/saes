<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos personales</li>
            <li class="breadcrumb-item active" aria-current="page">General</li>
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
<div class="row">
    <div class="col-12 col-md-4 d-none d-md-flex justify-content-center">
        <div class="card border-0 py-5">
            <!-- <img class="img-fluid" src="https://s2.qwant.com/thumbr/0x380/e/2/1dcae51df64ecca2a6a8eafd5fd420fcc23d09d4473b89678965fafa2bbfe1/user-icon-vector.jpg?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F551%2F599%2Foriginal%2Fuser-icon-vector.jpg&q=0&b=1&p=0&a=0" class="card-img-top" alt="foto"> -->
            <i class="fas fa-user-graduate fa-10x text-center"></i>
            <div class="card-body">
                <br><br>
                <button type="button" class="btn btn-primary">Imprimir Datos</button>
                <br><br>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-1 px-md-2" id="generales-tab" data-bs-toggle="tab" data-bs-target="#generales" type="button" role="tab" aria-controls="generales" aria-selected="true">Generales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="nacimiento-tab" data-bs-toggle="tab" data-bs-target="#nacimiento" type="button" role="tab" aria-controls="nacimiento" aria-selected="false">Nacimiento</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="direccion-tab" data-bs-toggle="tab" data-bs-target="#direccion" type="button" role="tab" aria-controls="direccion" aria-selected="false">Dirección</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="escolaridad-tab" data-bs-toggle="tab" data-bs-target="#escolaridad" type="button" role="tab" aria-controls="escolaridad" aria-selected="false">Escolaridad</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="tutor-tab" data-bs-toggle="tab" data-bs-target="#tutor" type="button" role="tab" aria-controls="tutor" aria-selected="false">Tutor</button>
            </li>
        </ul>
        <div class="tab-content p-4 border border-1" style="height: auto;" id="tabGeneral">
            <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                <form class="row ms-0 ms-md-4">
                    <div class="col-6 col-md-3 fw-bold">BOLETA:</div>
                    <div class="col fw-normal">
                        <?= $alumno->general->clave_usuario ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">NOMBRE:</div>
                    <div class="col fw-normal text-uppercase text-break">
                        <?= $alumno->general->nombre ?>
                        <?= $alumno->general->apellidos ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">PLANTEL:</div>
                    <div class="col fw-normal text-uppercase">
                        <?= $alumno->general->plantel ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">CURP:</div>
                    <div class="col fw-normal text-break text-uppercase">
                        <?= $alumno->general->curp ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">RFC:</div>
                    <div class="col fw-normal text-uppercase">
                        <?= $alumno->general->rfc ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">CARTILLA:</div>
                    <div class="col">
                        <input id="cartilla" name="cartilla" type="text" value="<?= $alumno->general->cartilla ?>" class="form-control form-control-sm d-none">
                        <div id="cartillaDisplay" class="d-block">
                            <?= $alumno->general->cartilla ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">PASAPORTE:</div>
                    <div class="col fw-normal">
                        <input id="pasaporte" name="pasaporte" type="text" value="<?= $alumno->general->pasaporte ?>" class="form-control form-control-sm mt-2 d-none">
                        <div id="pasaporteDisplay" class="d-block">
                            <?= $alumno->general->pasaporte ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">SEXO:</div>
                    <div class="col fw-normal">
                        <select id="sexo" class="form-select form-select-sm mt-2 d-none" required>
                            <option selected disabled>Selecciona un sexo</option>
                            <?php if ($alumno->general->sexo == 'H') : ?>
                            <option value="<?= $alumno->general->sexo ?>" selected>
                                Hombre
                            </option>
                            <option value="M">
                                Mujer
                            </option>
                            <?php else : ?>
                            <option value="<?= $alumno->general->sexo ?>" selected>
                                Mujer
                            </option>
                            <option value="H">
                                Hombre
                            </option>
                            <?php endif; ?>
                        </select>
                        <div id="sexoDisplay" class="d-block">
                            <?= $alumno->general->sexo == 'H' ? 'Hombre' : 'Mujer' ?>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <button class="btn btn-primary" id="modificarGeneral" type="button">Modificar</button>
                        <button class="btn btn-warning d-none" id="formGeneral" type="button">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nacimiento" role="tabpanel" aria-labelledby="nacimiento-tab">
                <div class="col-12 col-lg-9 mx-auto">
                    <div class="card alert-card-primary">
                        <div class="card-body">
                            Ej. de formato de fecha de nacimiento '1992-03-15'
                        </div>
                    </div>
                </div>
                <br>
                <div class="row ms-0 ms-md-4">
                    <div class="col-6 col-md-3 fw-bold">FECHA:</div>
                    <div class="col fw-normal"><input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control form-control-sm d-none" value="<?= $alumno->general->nacimiento ?>">
                        <div id="nacimientoDisplay" class="d-block">
                            <?= $alumno->general->nacimiento ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">NACIONALIDAD:</div>
                    <div class="col fw-normal text-uppercase">
                        <?= $alumno->general->nacionalidad ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-3 fw-bold">ENTIDAD:</div>
                    <div class="col fw-normal text-uppercase">
                        <?= $alumno->general->entidad ?>
                    </div>
                    <div class="w-100"></div>
                </div>
                <div class="text-center p-4">
                    <button class="btn btn-primary" id="modificarNacimiento" type="button">Modificar</button>
                    <button class="btn btn-warning d-none" id="formNacimiento" type="button">Guardar</button>
                </div>
            </div>
            <div class="tab-pane fade" id="direccion" role="tabpanel" aria-labelledby="direccion-tab">
                <form class="row ms-0 ms-md-4">
                    <div class="col-6 col-md-4 fw-bold">CALLE:</div>
                    <div class="col fw-normal">
                        <input id="calle" name="calle" type="text" class="form-control form-control-sm d-none" value="<?= $alumno->direccion->calle ?>">
                        <div id="calleDisplay" class="d-block">
                            <?= $alumno->direccion->calle ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">NO. EXT.:</div>
                    <div class="col fw-normal">
                        <input id="numExt" name="numExt" type="text" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->num_ext ?>">
                        <div id="numExtDisplay" class="d-block">
                            <?= $alumno->direccion->num_ext ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">NO. INT.:</div>
                    <div class="col fw-normal">
                        <input id="numInt" name="numInt" type="text" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->num_int ?>">
                        <div id="numIntDisplay" class="d-block">
                            <?= $alumno->direccion->num_int ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">COLONIA:</div>
                    <div class="col fw-normal">
                        <input id="colonia" name="colonia" type="text" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->colonia ?>">
                        <div id="coloniaDisplay" class="d-block">
                            <?= $alumno->direccion->colonia ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">C.P.:</div>
                    <div class="col fw-normal">
                        <input id="codigoPostal" name="codigoPostal" type="number" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->codigo_postal ?>">
                        <div id="codigoPostalDisplay" class="d-block">
                            <?= $alumno->direccion->codigo_postal ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">ESTADO:</div>
                    <div class="col fw-normal">
                        <input id="estado" name="estado" type="text" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->estado ?>">
                        <div id="estadoDisplay" class="d-block">
                            <?= $alumno->direccion->estado ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">DEL/MPO.:</div>
                    <div class="col fw-normal">
                        <input id="municipio" name="municipio" type="text" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->municipio ?>">
                        <div id="municipioDisplay" class="d-block">
                            <?= $alumno->direccion->municipio ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">TELÉFONO:</div>
                    <div class="col fw-normal">
                        <input id="movil" name="movil" type="number" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->movil ?>">
                        <div id="movilDisplay" class="d-block">
                            <?= $alumno->direccion->movil ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">CORREO:</div>
                    <div class="col fw-normal">
                        <input id="emailGeneral" name="emailGeneral" type="email" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->email ?>">
                        <div id="emailDisplay" class="d-block">
                            <?= $alumno->direccion->email ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">TELÉFONO OFICINA:</div>
                    <div class="col fw-normal">
                        <input id="telOficina" name="telOficina" type="number" class="form-control form-control-sm d-none mt-2" value="<?= $alumno->direccion->tel_oficina ?>">
                        <div id="telOficinaDisplay" class="d-block">
                            <?= $alumno->direccion->tel_oficina ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-4 fw-bold">LABORA:</div>
                    <div class="col fw-normal">
                        <select id="labora" name="labora" class="form-select form-select-sm mt-2 d-none" required>
                            <option selected disabled>Selecciona una opción</option>
                            <?php if ($alumno->direccion->labora == 'No') : ?>
                            <option value="<?= $alumno->direccion->labora ?>" selected>No</option>
                            <option value="Si">Si</option>
                            <?php else : ?>
                            <option value="<?= $alumno->direccion->labora ?>" selected>Si</option>
                            <option value="No">No</option>
                            <?php endif; ?>
                        </select>
                        <div id="laboraDisplay" class="d-block">
                            <?= $alumno->direccion->labora ?>
                        </div>
                    </div>
                </form>
                <div class="text-center p-4">
                    <button class="btn btn-primary" id="modificarDireccion" type="button">Modificar</button>
                    <button class="btn btn-warning d-none" id="formDireccion" type="button">Guardar</button>
                </div>
            </div>
            <div class="tab-pane fade" id="escolaridad" role="tabpanel" aria-labelledby="escolaridad-tab">
                <div class="row ms-0 ms-md-4">
                    <div class="col-6 col-md-6 fw-bold">ESCUELA DE PROCEDENCIA:</div>
                    <div class="col fw-normal">
                        <?= $alumno->escolaridad->escuela ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-6 fw-bold">ENTIDAD FEDERATIVA:</div>
                    <div class="col fw-normal">
                        <?= $alumno->escolaridad->entidad ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-6 fw-bold">PROMEDIO SECUNDARIA:</div>
                    <div class="col fw-normal">
                        <?= $alumno->escolaridad->promedio_secundaria ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-6 fw-bold">PROMEDIO NIVEL MEDIO SUPERIOR:</div>
                    <div class="col fw-normal">
                        <?= $alumno->escolaridad->promedio_superior ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tutor" role="tabpanel" aria-labelledby="tutor-tab">
                <form class="row ms-0 ms-md-4">
                    <div class="col-6 col-md-5 fw-bold">NOMBRE DEL TUTOR:</div>
                    <div class="col fw-normal">
                        <input id="nombreTutor" name="nombreTutor" type="text" value="<?= $alumno->tutor->nombre ?>" class="form-control form-control-sm d-none">
                        <div id="nombreTutorDisplay" class="d-block text-uppercase">
                            <?= $alumno->tutor->nombre ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-5 fw-bold">RFC DEL TUTOR:</div>
                    <div class="col fw-normal">
                        <input id="rfcTutor" name="rfcTutor" type="text" value="<?= $alumno->tutor->rfc ?>" class="form-control form-control-sm d-none mt-2">
                        <div id="rfcDisplay" class="d-block text-uppercase">
                            <?= $alumno->tutor->rfc ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-5 fw-bold">NOMBRE DEL PADRE:</div>
                    <div class="col fw-normal">
                        <input id="padre" name="padre" type="text" value="<?= $alumno->tutor->padre ?>" class="form-control form-control-sm d-none mt-2">
                        <div id="padreDisplay" class="d-block text-uppercase">
                            <?= $alumno->tutor->padre ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-md-5 fw-bold">NOMBRE DE LA MADRE:</div>
                    <div class="col fw-normal">
                        <input id="madre" name="madre" type="text" value="<?= $alumno->tutor->madre ?>" class="form-control form-control-sm d-none mt-2">
                        <div id="madreDisplay" class="d-block text-uppercase">
                            <?= $alumno->tutor->madre ?>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <button class="btn btn-primary" id="modificarTutor" type="button">Modificar</button>
                        <button class="btn btn-warning d-none" id="formTutor" type="button">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>