<?php $this->load->view("components/head"); ?>

     <div class="container">
         <div class="row">
             <div class="col-md-4 col-md-offset-4"
             style="margin-top: 15%">
             <?php
             if($this->session->flashdata()){
              echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close'
                    data-dismiss='alert'><span>&times;</span>
                    </button>
                 ".$this->session->flashdata("error-login")."
                    </div>";
             }
             ?>
                    <form action="login/ceklogin" method="POST">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <div class="panel-title">Form Login</div>
                                </div>
                                <div class="panel-body">
                                <?php $has_error = validation_errors()?"has-error":""; ?>
                                    <div class="form-group <?= $has_error; ?>">
                                    <label for="userid">User ID</label>
                                    <input type="text" class="form-control" id="userid" name="userid"
                                        placeholder="masukkan userid anda">
                                        <?= form_error("userid"); ?>

                                </div>
                                <?php $has_error = validation_errors()?"has-error":""; ?>
                                <div class="form-group <?= $has_error; ?>">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="masukkan password anda">
                                        <?= form_error("password"); ?>
                                </div>
                        
                                <div class="panel-footer">
                                    <input type="submit" class="btn btn-success btn-block" value="login">
                                </div>
                            </div>
                    </form>
             </div>
         </div>
    </div>

<?php $this->load->view("components/foot"); ?>