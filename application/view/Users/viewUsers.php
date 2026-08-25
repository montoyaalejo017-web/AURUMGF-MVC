<div class="row col-md-24">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Staff <small>View Staff</small></h2>
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
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Type Document</th>
                                        <th>Document</th>
                                        <th>Names</th>
                                        <th>Lastnames</th>
                                        <th>Birthdate</th>
                                        <th>Gerder</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Username</th>
                                        <th>Rol</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($user as $value) : ?>
                                    <tr>
                                        <td><?php echo $value['Description']; ?></td>
                                        <td><?php echo $value['Document']; ?></td>
                                        <td><?php echo $value['Names']; ?></td>
                                        <td><?php echo $value['Lastnames']; ?></td>
                                        <td><?php echo $value['Birthdate']; ?></td>
                                        <td><?php echo $value['Gender']; ?></td>
                                        <td><?php echo $value['Email']; ?></td>
                                        <td><?php echo $value['Phone']; ?></td>
                                        <td><?php echo $value['Address']; ?></td>
                                        <td><?php echo $value['Username']; ?></td>
                                        <td><?php echo $value['rolDescription']; ?></td>
                                        <td>
                                            <?php if($value['StatusU'] == 1):?>
                                            <span class="badge badge-success">Active</span>
                                            <?php else:?>
                                            <span class="badge badge-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-round btn-sm btn-primary"
                                                data-toggle="modal" data-target="#modal-edit"
                                                onclick="dataUser('<?php echo $value['idUser']; ?>')"><i
                                                    class="fa fa-pencil"></i></button>

                                            <button type="button" class="btn btn-round btn-sm btn-warning"
                                                onclick="changeStatus('<?php echo $value['idUser']; ?>')"><i
                                                    class="fa fa-exchange"></i></button>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar usuarios -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Editar Staff</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <!-- Formulario -->
                <form class="form-label-left input_mask" method="post">
                    <div class="modal-body">

                        <!-- Campo oculto para el ID -->
                        <input type="hidden" name="id" id="id">

                        <!-- Fila: Nombres y Apellidos -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="txtNames">Nombres</label>
                                <input type="text" class="form-control" id="txtNames" name="txtNames"
                                    placeholder="Nombres">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="txtLastNames">Apellidos</label>
                                <input type="text" class="form-control" id="txtLastNames" name="txtLastNames"
                                    placeholder="Apellidos">
                            </div>
                        </div>

                        <!-- Fila: Correo y Teléfono -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="txtEmail">Correo electrónico</label>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                                    placeholder="Correo electrónico">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="txtPhone">Teléfono</label>
                                <input type="tel" class="form-control" id="txtPhone" name="txtPhone"
                                    placeholder="Teléfono">
                            </div>
                        </div>

                        <!-- Fila: Usuario -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="txtUsername">Usuario</label>
                                <input type="text" class="form-control" id="txtUsername" name="txtUsername"
                                    placeholder="Usuario">
                            </div>
                        </div>

                        <!-- Fila: Dirección -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="txtAddres">Dirección</label>
                                <input type="text" class="form-control" id="txtAddres" name="txtAddres"
                                    placeholder="Dirección">
                            </div>
                        </div>

                    </div>

                    <!-- Pie del modal con botones -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="reset" class="btn btn-warning">Limpiar</button>
                        <button type="submit" class="btn btn-success" name="btnSendU">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Script para el comportamiento del campo de fecha -->
    <script>
    function timeFunctionLong(input) {
        setTimeout(function() {
            input.type = 'text';
        }, 60000);
    }
    </script>