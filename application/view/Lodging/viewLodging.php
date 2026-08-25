<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lodging <small> Lodging Availability View </small></h2>&nbsp&nbsp<span><button type="button"
                        class="btn btn-round btn-success" data-toggle="modal" data-target="#modal-register"
                        onclick="registersLodging()"><i class="fa fa-plus"></i>
                        Add Lodging</button></span>

                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">
                    <?php foreach($lodging as $value) : ?>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block; height:100%"
                                    src="<?php echo URL; ?>img/cabaña.png" alt="image" />
                                <div class="mask">
                                    <p><?php echo $value['Num_Lodging']; ?></p>
                                    <div class="tools tools-bottom">
                                        <!-- <a href="#"><i class="fa fa-link"> -->
                                        <?php switch($value['StatusL']) {
                                                case 1:
                                                    echo '<span class="badge badge-success">Disponible</span>';
                                                    break;
                                                case 2:
                                                    echo '<span class="badge badge-danger">Ocupada</span>';
                                                    break;
                                                case 3:
                                                    echo '<span class="badge badge-info">Limpieza</span>';
                                                    break;
                                                default:
                                                    echo '<span class="badge badge-warning">Fuera de servicio</span>';
                                            } ?>
                                        </i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="caption d-flex gap-2 justify-content-start">

                                <!-- Botón pequeño para Check-in -->
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#modal-checkin">
                                    Check-in
                                </button>

                                <!-- Botón pequeño y redondo para cambiar estado -->
                                <button type="button" class="btn btn-warning btn-sm btn-round"
                                    onclick="changeStatusL('<?php echo $value['idLodging']; ?>')">
                                    <i class="fa fa-exchange"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para registro del Check-in -->
<div class="modal fade bs-example-modal-lg" id="modal-checkin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h4 class="modal-title">Check-in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Formulario -->
            <form action="" method="post">
                <div class="modal-body">

                    <!-- Número de alojamiento -->
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3">N° Lodging</label>
                        <div class="col-md-9 col-sm-9">
                            <select class="form-control" name="idLodging" required>
                                <option value="">Selecciona una opción</option>
                                <?php foreach($lodging as $lod): ?>
                                <option value="<?php echo $lod['idLodging']; ?>">
                                    <?php echo $lod['Num_Lodging']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Cliente -->
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3">Cliente</label>
                        <div class="col-md-9 col-sm-9">
                            <select class="form-control" name="idClient" required>
                                <option value="">Selecciona una opción</option>
                                <?php foreach($clients as $client): ?>
                                <option value="<?php echo $client['idClient']; ?>">
                                    <?php echo $client['Names']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Fecha y hora de ingreso -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fecha de ingreso</label>
                        <div class="col-md-5">
                            <input type="text" name="checkin_date" class="form-control date-picker"
                                placeholder="dd-mm-aaaa" required onfocus="this.type='date'"
                                onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                onmouseout="timeFunctionLong(this)">
                        </div>

                        <label class="control-label col-md-1 col-sm-1">Hora</label>
                        <div class="col-md-3 col-sm-3">
                            <select class="form-control" name="checkin_time" required>
                                <?php foreach($checkIn as $check): ?>
                                <option value="<?php echo $check['CheckInTime']; ?>">
                                    <?php echo $check['CheckInTime']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Fecha y hora de salida -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fecha de salida</label>
                        <div class="col-md-5">
                            <input type="text" name="checkout_date" class="form-control date-picker"
                                placeholder="dd-mm-aaaa" required onfocus="this.type='date'"
                                onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                onmouseout="timeFunctionLong(this)">
                        </div>

                        <label class="control-label col-md-1 col-sm-1">Hora</label>
                        <div class="col-md-3 col-sm-3">
                            <select class="form-control" name="checkout_time" required>
                                <?php foreach($checkIn as $check): ?>
                                <option value="<?php echo $check['CheckOutTime']; ?>">
                                    <?php echo $check['CheckOutTime']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Tarifa por persona -->
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3">Tarifa por Persona</label>
                        <div class="col-md-9 col-sm-9">
                            <select class="form-control" name="idPaymentDetailRate" required>
                                <?php foreach($paymentDetails as $pd): ?>
                                <option value="<?php echo $pd['idPaymentDetail']; ?>">
                                    <?php echo $pd['RatePerPerson']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Descripción del servicio -->
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3">Descripción del Servicio</label>
                        <div class="col-md-9 col-sm-9">
                            <select class="form-control" name="idPaymentDetailDescription" required>
                                <?php foreach($paymentDetails as $pd): ?>
                                <option value="<?php echo $pd['idPaymentDetail']; ?>">
                                    <?php echo $pd['ServiceDescription']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Botones -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="btnCheckin" class="btn btn-primary">Registrar Check-in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal para registrar cabañas -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-register">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Header del modal -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Register Lodging</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Formulario -->
            <form action="" method="post">
                <div class="modal-body">

                    <!-- ID oculto -->
                    <input type="hidden" name="txtIdLodging" id="txtIdLodging">

                    <!-- Número de alojamiento -->
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="txtNum_Lodging"
                                placeholder="N° Lodging" name="txtNum_Lodging">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>

                <!-- Botones del modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnRegister">Register</button>
                </div>
            </form>

        </div>
    </div>
</div>