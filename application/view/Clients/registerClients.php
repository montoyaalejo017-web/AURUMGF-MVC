		<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Clients <small>Register Clients</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form class="form-label-left input_mask" method="post">
                    
                    <!-- Documento -->
                    <h4>Identification</h4>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Type Document</label>
                        <div class="col-md-9">
                            <select class="form-control" name="sellTypeDocument">
                                <option>Choose option</option>
                                <?php foreach($documents as $doc): ?>
                                    <option value="<?php echo $doc['idTypeDocument'] ?>">
                                        <?php echo $doc['Description'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Document</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Document" name="txtDocument">
                        </div>
                    </div>

                    <!-- Nombres y Apellidos -->
                    <h4>Personal Information</h4>
                    <div class="form-group row">
                        <div class="col-md-6 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" placeholder="Names" name="txtNames">
                            <span class="fa fa-user form-control-feedback left"></span>
                        </div>
                        <div class="col-md-6 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-right" placeholder="Lastnames" name="txtLastNames">
                            <span class="fa fa-user form-control-feedback right"></span>
                        </div>
                    </div>

                    <!-- Email y Teléfono -->
                    <div class="form-group row">
                        <div class="col-md-6 form-group has-feedback">
                            <input type="email" class="form-control has-feedback-left" placeholder="Email" name="txtEmail">
                            <span class="fa fa-envelope form-control-feedback left"></span>
                        </div>
                        <div class="col-md-6 form-group has-feedback">
                            <input type="tel" class="form-control has-feedback-right" placeholder="Phone" name="txtPhone">
                            <span class="fa fa-phone form-control-feedback right"></span>
                        </div>
                    </div>

                    <!-- Adultos -->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Adults</label>
                        <div class="col-md-9">
                            <select class="form-control" name="selAdults">
                                <option>Choose option</option>
                                <?php for ($i = 1; $i <= 4; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Menores -->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Minors</label>
                        <div class="col-md-9">
                            <select class="form-control" name="selMinors">
                                <option>Choose option</option>
                                <?php for ($i = 0; $i <= 4; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    
                    <!-- Botones -->
                    <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-success" name="btnSend">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

        
        
        
        
        
        
        
        
        