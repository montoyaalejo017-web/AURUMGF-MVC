<div class="row col-md-24">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Booking<small>View Booking</small></h2>
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
                                        <th>N°Booking</th>
                                        <th>Check-in</th>
                                        <th>Check-in-Time</th>
                                        <th>Check-out</th>
                                        <th>Check-out-Time</th>
                                        <th>Lodging</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($booking as $value) : ?>
                                    <tr>
                                        <td><?php echo $value['Num_Booking']; ?></td>
                                        <td><?php echo $value['Check_in']; ?></td>
                                        <td><?php echo $value['CheckInTime']; ?></td>
                                        <td><?php echo $value['Check_out']; ?></td>
                                        <td><?php echo $value['CheckOutTime']; ?></td>
                                        <td><?php echo $value['Num_Lodging']; ?></td>
                                        <td><?php echo $value['Names']; ?></td>
                                        <td>
                                            <?php switch($value['StatusB']) {
                                                case 1:
                                                    echo '<span class="badge badge-success">Reservada</span>';
                                                    break;
                                                default:
                                                    echo '<span class="badge badge-danger">Cancelada</span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-round btn-sm btn-primary"
                                                data-toggle="modal" data-target="#modal-edit"
                                                onclick="dataBooking('<?php echo $value['idBooking']; ?>')"><i
                                                    class="fa fa-pencil"></i></button>

                                            <button type="button" class="btn btn-round btn-sm btn-warning"
                                                onclick="changeStatusB('<?php echo $value['idBooking']; ?>')"><i
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

    <!-- modal para editar reservas -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Booking</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="txtIdBooking" id="txtIdBooking">

                        <!-- Fechas de Check-in y Check-out -->
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Check-in Date</label>
                            <div class="col-md-5">
                                <input class="date-picker form-control" placeholder="dd-mm-yyyy" name="txtCheckin"
                                    id="txtCheckin" type="text" required onfocus="this.type='date'"
                                    onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                    onmouseout="timeFunctionLong(this)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Check-out Date</label>
                            <div class="col-md-5">
                                <input class="date-picker form-control" placeholder="dd-mm-yyyy" name="txtCheckout"
                                    id="txtCheckout" type="text" required onfocus="this.type='date'"
                                    onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                    onmouseout="timeFunctionLong(this)">
                            </div>
                        </div>

                        <!-- Número de alojamiento -->
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">N° Lodging</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control has-feedback-left" id="txtLodging"
                                    name="txtLodging" placeholder="N° Lodging">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnUpdate">Save changes</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

</div>
</div>