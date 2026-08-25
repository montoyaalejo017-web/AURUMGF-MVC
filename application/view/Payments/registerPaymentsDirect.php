		<div class="row">
		    <div class="col-md-12 ">
		        <div class="x_panel">
		            <div class="x_title">
		                <h2>Payments<small>Register Payments Direct</small></h2>
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
		                    <!-- Número de Alojamiento -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">N° Lodging</label>
		                        <div class="col-md-9 col-sm-9">
		                            <select class="form-control" name="idLodging">
		                                <option>Choose option</option>
		                                <?php foreach($lodging as $lod): ?>
		                                <option value="<?= $lod['idLodging']; ?>"><?= $lod['Num_Lodging']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

		                    <!-- Cliente -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">Client</label>
		                        <div class="col-md-9 col-sm-9">
		                            <select class="form-control" name="idClient">
		                                <option>Choose option</option>
		                                <?php foreach($clients as $client): ?>
		                                <option value="<?= $client['idClient']; ?>"><?= $client['Names']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

		                    <!-- Fecha de Pago -->
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3">Payment Date</label>
		                        <div class="col-md-9 col-sm-9">
		                            <input class="date-picker form-control" name="paymentDate" placeholder="dd-mm-yyyy"
		                                type="text" required onfocus="this.type='date'" onmouseover="this.type='date'"
		                                onclick="this.type='date'" onblur="this.type='text'"
		                                onmouseout="timeFunctionLong(this)">
		                        </div>
		                    </div>

		                    <script>
		                    function timeFunctionLong(input) {
		                        setTimeout(() => {
		                            input.type = 'text';
		                        }, 60000);
		                    }
		                    </script>

		                    <!-- Tarifa por Persona -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">Rate per Person</label>
		                        <div class="col-md-9 col-sm-9">
		                            <select class="form-control" name="ratePerPerson">
		                                <?php foreach($paymentDetails as $pd): ?>
		                                <?php if (isset($pd['RatePerPerson'])): ?>
		                                <option value="<?= $pd['idPaymentDetail']; ?>"><?= $pd['RatePerPerson']; ?></option>
		                                <?php endif; ?>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

		                    <!-- Monto Total -->
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3">Total Amount</label>
		                        <div class="col-md-9 col-sm-9">
		                            <input type="number" class="form-control" placeholder="$" name="totalAmount">
		                        </div>
		                    </div>

		                    <!-- Monto Pagado -->
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3">Amount Paid</label>
		                        <div class="col-md-9 col-sm-9">
		                            <input type="number" class="form-control" placeholder="$" name="amountPaid">
		                        </div>
		                    </div>

		                    <!-- Monto Restante -->
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3">Remaining Amount</label>
		                        <div class="col-md-9 col-sm-9">
		                            <input type="text" class="form-control" placeholder="$" name="remainingAmount">
		                        </div>
		                    </div>

		                    <!-- Método de Pago -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">Payment Method</label>
		                        <div class="col-md-9 col-sm-9">
		                            <select class="form-control" name="idPaymentMethod">
		                                <option>Choose option</option>
		                                <?php foreach($paymentMethod as $pm): ?>
		                                <option value="<?= $pm['idPaymentMethod']; ?>"><?= $pm['Method']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

		                    <!-- Descripción del Servicio -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">Service Description</label>
		                        <div class="col-md-9 col-sm-9">
		                            <select class="form-control" name="serviceDescription">
		                                <?php foreach($paymentDetails as $pd): ?>
		                                <?php if (isset($pd['ServiceDescription'])): ?>
		                                <option value="<?= $pd['idPaymentDetail']; ?>"><?= $pd['ServiceDescription']; ?>
		                                </option>
		                                <?php endif; ?>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

		                    <!-- Check-In -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">Check-In</label>
		                        <div class="col-md-4 col-sm-4">
		                            <select class="form-control" name="checkInDate">
		                                <option>Choose option</option>
		                                <?php foreach($checkin as $chec): ?>
		                                <option value="<?= $chec['idCheckIn']; ?>"><?= $chec['CheckIn']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>

		                        <div class="col-md-5 col-sm-5">
		                            <select class="form-control" name="checkInTime">
		                                <?php foreach($checkin as $chec): ?>
		                                <option value="<?= $chec['idCheckIn']; ?>"><?= $chec['CheckInTime']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

		                    <!-- Check-Out -->
		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3">Check-Out</label>
		                        <div class="col-md-4 col-sm-4">
		                            <select class="form-control" name="checkOutDate">
		                                <option>Choose option</option>
		                                <?php foreach($checkin as $chec): ?>
		                                <option value="<?= $chec['idCheckIn']; ?>"><?= $chec['CheckOut']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>

		                        <div class="col-md-5 col-sm-5">
		                            <select class="form-control" name="checkOutTime">
		                                <?php foreach($checkin as $chec): ?>
		                                <option value="<?= $chec['idCheckIn']; ?>"><?= $chec['CheckOutTime']; ?></option>
		                                <?php endforeach; ?>
		                            </select>
		                        </div>
		                    </div>

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