		<div class="row">
		    <div class="col-md-12 ">
		        <div class="x_panel">
		            <div class="x_title">
		                <h2>Staff <small>Regster Staff</small></h2>
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

		                    <div class="col-md-6 col-sm-6  form-group has-feedback">
		                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
		                            placeholder="Names" name="txtNames">
		                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
		                    </div>

		                    <div class="col-md-6 col-sm-6  form-group has-feedback">
		                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Lastnames"
		                            name="txtLastNames">
		                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		                    </div>

		                    <div class="col-md-6 col-sm-6  form-group has-feedback">
		                        <input type="email" class="form-control has-feedback-left" id="inputSuccess4"
		                            placeholder="Email" name="txtEmail">
		                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
		                    </div>

		                    <div class="col-md-6 col-sm-6  form-group has-feedback">
		                        <input type="tel" class="form-control" id="inputSuccess5" placeholder="Phone" name="txtPhone">
		                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
		                    </div>

		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3 ">Type Document</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <select class="form-control" name="sellTypeDocument">
		                                <option>Choose option</option>
		                                <?php foreach($documents as $doc):?>
		                                <option value="<?php echo $doc['idTypeDocument'] ?>"><?php echo $doc['Description'] ?>
		                                </option>
		                                <?php endforeach;?>
		                            </select>
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3 ">Document</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <input type="text" class="form-control" placeholder="Document" name="txtDocument">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3 ">Username</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <input type="text" class="form-control" placeholder="Username" name="txtUsername">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3 ">Password</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <input type="password" class="form-control" placeholder="Password" name="txtPassword">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3 ">Address</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <input type="text" class="form-control" placeholder="Address" name="txtAddres">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-form-label col-md-3 col-sm-3 ">Birthdate <span class="required"></span>
		                        </label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <input class="date-picker form-control" placeholder="dd-mm-yyyy" name="txtBirthdate"
		                                type="text" required="required" type="text" onfocus="this.type='date'"
		                                onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
		                                onmouseout="timeFunctionLong(this)">
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
		                        <label class="control-label col-md-3 col-sm-3 ">Gender</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <select class="form-control" name="sellGender">
		                                <option>Choose option</option>
		                                <option value="Female">Female</option>
		                                <option value="Male">Male</option>

		                            </select>
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label class="control-label col-md-3 col-sm-3 ">Rol</label>
		                        <div class="col-md-9 col-sm-9 ">
		                            <select class="form-control" name="sellRol">
		                                <option>Choose option</option>
		                                <?php foreach($roles as $rol):?>
		                                <option value="<?php echo $rol['idRol'] ?>"><?php echo $rol['rolDescription'] ?>
		                                </option>
		                                <?php endforeach;?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="ln_solid"></div>
		                    <div class="form-group row">
		                        <div class="col-md-9 col-sm-9  offset-md-3">
		                            <button type="button" class="btn btn-primary">Cancel</button>
		                            <button class="btn btn-primary" type="reset">Reset</button>
		                            <button type="submit" class="btn  btn-success" name="btnSend">Submit</button>
		                        </div>
		                    </div>

		                </form>
		            </div>
		        </div>
		        </div>
		        </div>