<div class="row col-md-24">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Payments<small>View Payments Booking</small></h2>
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
                                        <th>Description</th>
                                        <th>Payment Date</th>
                                        <th>Rate per Person</th>
                                        <th>Total Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Remaining Amount</th>
                                        <th>Payment Method</th>
                                        <th>N°Transaction</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($paymentsBooking as $value) : ?>
                                    <tr>
                                        <td><?php echo $value['Num_Booking']; ?></td>
                                        <td><?php echo $value['ServiceDescription']; ?></td>
                                        <td><?php echo $value['PaymentDate']; ?></td>
                                        <td><?php echo $value['RatePerPerson']; ?></td>
                                        <td><?php echo $value['TotalAmount']; ?></td>
                                        <td><?php echo $value['AmountPaid']; ?></td>
                                        <td><?php echo $value['RemainingAmount']; ?></td>
                                        <td><?php echo $value['Method']; ?></td>
                                        <td><?php echo $value['Num_Transaction']; ?></td>
                                        <td><?php echo $value['Names']; ?></td>
                                        <td>
                                            <?php switch($value['StatusPB']) {
                                                case 1:
                                                    echo '<span class="badge badge-success">Pagado</span>';
                                                    break;
                                                case 2:
                                                    echo '<span class="badge badge-secondary">Pendiente</span>';
                                                    break;
                                                case 3:
                                                    echo '<span class="badge badge-danger">Fallido</span>';
                                                    break;
                                                case 4:
                                                    echo '<span class="badge badge-primary">Reembolsado</span>';
                                                    break;
                                                default:
                                                    echo '<span class="badge badge-danger">Cancelado</span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-round btn-sm btn-warning"
                                                onclick="changeStatusPB('<?php echo $value['idPaymentB']; ?>')"><i
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

    