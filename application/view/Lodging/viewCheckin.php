<div class="row col-md-24">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Check In <small>View Check In</small></h2>
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
                                        <th>Client</th>
                                        <th>N°Lodging</th>
                                        <th>Check-In Date</th>
                                        <th>Check-In Time</th>
                                        <th>Check-Out Date</th>
                                        <th>Check-Out Time</th>
                                        <th>Rate per Person</th>
                                        <th>Service Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($checkIn as $value) : ?>
                                    <tr>
                                        <td><?php echo $value['Names']; ?></td>
                                        <td><?php echo $value['Num_Lodging']; ?></td>
                                        <td><?php echo $value['CheckIn']; ?></td>
                                        <td><?php echo $value['CheckInTime']; ?></td>
                                        <td><?php echo $value['CheckOut']; ?></td>
                                        <td><?php echo $value['CheckOutTime']; ?></td>
                                        <td><?php echo $value['RatePerPerson']; ?></td>
                                        <td><?php echo $value['ServiceDescription']; ?></td>

                                        <td>
                                            <?php if($value['StatusCI'] == 1):?>
                                            <span class="badge badge-success">Active</span>
                                            <?php else:?>
                                            <span class="badge badge-danger">Finished</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-round btn-sm btn-warning"
                                                onclick="changeStatusCI('<?php echo $value['idCheckIn']; ?>')"><i
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

    