<div class="row col-md-24">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Clients<small>Clients View</small></h2>
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
                                        <th>lastnames</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Adults</th>
                                        <th>Minors</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clients as $value) : ?>
                                    <tr>
                                        <td><?php echo $value['Description']; ?></td>
                                        <td><?php echo $value['Document']; ?></td>
                                        <td><?php echo $value['Names']; ?></td>
                                        <td><?php echo $value['Lastnames']; ?></td>
                                        <td><?php echo $value['Email']; ?></td>
                                        <td><?php echo $value['Phone']; ?></td>
                                        <td><?php echo $value['Adults']; ?></td>
                                        <td><?php echo $value['Minors']; ?></td>
                                        <td>
                                            <?php if($value['StatusC'] == 1):?>
                                            <span class="badge badge-success">Registrado</span>
                                            <?php else:?>
                                            <span class="badge badge-danger">Bloqueado</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-round btn-sm btn-primary"
                                                data-toggle="modal" data-target="#modal-edit"
                                                onclick="dataClient('<?php echo $value['idClient']; ?>')"><i
                                                    class="fa fa-pencil"></i></button>

                                            <button type="button" class="btn btn-round btn-sm btn-warning"
                                                onclick="changeStatusC('<?php echo $value['idClient']; ?>')"><i
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




    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Client</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="" method="post">
                    <div class="modal-body">
                         <!-- <input type="text" name="txtIdClient" id="txtIdClient"> -->

                        <!-- Nombres y Apellidos -->
                        <div class="form-group row">
                            <div class="col-md-6 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" placeholder="Names"
                                    name="txtNames" id="txtNames">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Lastnames" name="txtLastNames" id="txtLastNames">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <!-- Email y Teléfono -->
                        <div class="form-group row">
                            <div class="col-md-6 form-group has-feedback">
                                <input type="email" class="form-control has-feedback-left" placeholder="Email"
                                    name="txtEmail" id="txtEmail">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 form-group has-feedback">
                                <input type="tel" class="form-control" placeholder="Phone" name="txtPhone" id="txtPhone">
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <!-- Adultos -->
                        <div class="form-group row">
                            <label class="control-label col-md-3">Adults</label>
                            <div class="col-md-9">
                                <select class="form-control" name="selAdults" id="selAdults">
                                    <option>Choose option</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>

                        <!-- Menores -->
                        <div class="form-group row">
                            <label class="control-label col-md-3">Minors</label>
                            <div class="col-md-9">
                                <select class="form-control" name="selMinors" id="selMinors">
                                    <option>Choose option</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnUpdate">Edit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function timeFunctionLong(input) {
        setTimeout(function() {
            input.type = 'text';
        }, 60000);
    }
    </script>