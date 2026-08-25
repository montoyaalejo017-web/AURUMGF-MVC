		<div class="row">
		    <div class="col-md-12 ">
		        <div class="x_panel">
		            <div class="x_title">
		                <h2>Payments<small>Register Payments Booking</small></h2>
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
		                <br />
		                <form class="form-label-left input_mask" method="post">
		                <div class="form-group row">
		                    <!-- Número de Reserva -->
		                    <label class="control-label col-md-3 col-sm-3">N° Booking</label>
		                    <div class="col-md-9 col-sm-9">
		                        <select class="form-control" name="idBooking">
		                            <option>Choose option</option>
		                            <?php foreach($booking as $book): ?>
		                            <option value="<?php echo $book['idBooking']; ?>">
		                                <?php echo $book['Num_Booking']; ?>
		                            </option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Descripción del Servicio -->
		                    <label class="control-label col-md-3 col-sm-3">Service Description</label>
		                    <div class="col-md-9 col-sm-9">
		                        <select class="form-control" name="idPaymentDetailDescription">
		                            <?php foreach($paymentDetails as $pd): ?>
		                            <option value="<?php echo $pd['idPaymentDetail']; ?>">
		                                <?php echo $pd['ServiceDescription']; ?>
		                            </option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Fecha de Pago -->
		                    <label class="col-form-label col-md-3 col-sm-3">Payment Date</label>
		                    <div class="col-md-9 col-sm-9">
		                        <input class="date-picker form-control" name="paymentDate" placeholder="dd-mm-yyyy"
		                            type="text" required onfocus="this.type='date'" onmouseover="this.type='date'"
		                            onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
		                        <script>
		                        function timeFunctionLong(input) {
		                            setTimeout(function() {
		                                input.type = 'text';
		                            }, 60000);
		                        }
		                        </script>
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Tarifa por Persona -->
		                    <label class="control-label col-md-3 col-sm-3">Rate per Person</label>
		                    <div class="col-md-9 col-sm-9">
		                        <select class="form-control" name="idPaymentDetailRate">
		                            <?php foreach($paymentDetails as $pd): ?>
		                            <option value="<?php echo $pd['idPaymentDetail']; ?>">
		                                <?php echo $pd['RatePerPerson']; ?>
		                            </option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Monto Total -->
		                    <label class="col-form-label col-md-3 col-sm-3">Total Amount</label>
		                    <div class="col-md-9 col-sm-9">
		                        <input type="number" class="form-control" placeholder="$" name="totalAmount">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Monto Pagado -->
		                    <label class="col-form-label col-md-3 col-sm-3">Amount Paid</label>
		                    <div class="col-md-9 col-sm-9">
		                        <input type="number" class="form-control" placeholder="$" name="amountPaid">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Monto Restante -->
		                    <label class="col-form-label col-md-3 col-sm-3">Remaining Amount</label>
		                    <div class="col-md-9 col-sm-9">
		                        <input type="text" class="form-control" placeholder="$" name="remainingAmount">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Método de Pago -->
		                    <label class="control-label col-md-3 col-sm-3">Method Payment</label>
		                    <div class="col-md-9 col-sm-9">
		                        <select class="form-control" name="idPaymentMethod">
		                            <option>Choose option</option>
		                            <?php foreach($paymentMethod as $pm): ?>
		                            <option value="<?php echo $pm['idPaymentMethod']; ?>">
		                                <?php echo $pm['Method']; ?>
		                            </option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <!-- Cliente -->
		                    <label class="control-label col-md-3 col-sm-3">Client</label>
		                    <div class="col-md-9 col-sm-9">
		                        <select class="form-control" name="idClient">
		                            <option>Choose option</option>
		                            <?php foreach($clients as $client): ?>
		                            <option value="<?php echo $client['idClient']; ?>">
		                                <?php echo $client['Names']; ?>
		                            </option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>

		                <div class="ln_solid"></div>

		                <!-- Botones -->
		                <div class="form-group row">
		                    <div class="col-md-9 col-sm-9 offset-md-3">
		                        <button type="button" class="btn btn-primary">Cancel</button>
		                        <button type="reset" class="btn btn-primary">Reset</button>
		                        <button type="submit" class="btn btn-success" name="btnSend">Submit</button>
		                    </div>
		                </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>