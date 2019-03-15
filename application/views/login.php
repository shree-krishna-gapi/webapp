<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/mdb.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/animation.css">
</head>
<style>
    body {
        background: #f3ffeb;
    }
</style>
<body>
	<div class="container">

		<main>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 animated bounceInDown">
                   
                    <form action="<?= base_url('login'); ?> " method="post">
                        <h3 class="text-center animated bounceInUp " style="margin-top:55px; animation-delay: 0.5s;">Sign in</h3>
                        <?php if($error_login=$this->session->flashdata('Login_failed')): ?>
                            <div class="alert alert-danger"><?= $error_login; ?></div>
                        <?php endif; ?>
                        <!-- Material input email -->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="text" class="form-control" name="username" value="">
                            <label for="materialFormLoginEmailEx">Username</label>
                            <small class="error text-danger"><?= form_error('username'); ?></small>
                        </div>

                        <!-- Material input password -->
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" class="form-control" name="password" value="">
                        
                            <label for="materialFormLoginPasswordEx">Your password</label>
                            <small class="error text-danger"><?= form_error('password'); ?></small>
                        </div>

                        
                        <div class="text-center mt-4">
                           <!--  <button class="btn btn-primary" type="submit" name="submit">Login</button>    -->
                           <input type="submit" name="login" value="Login" class="btn btn-primary">
                           <input type="reset" name="reset" value="Reset" class="btn btn-default">
                              
                        </div>
                    </form>
              
                </div>
            </div>
		</main>

	</div>
</body>
</html>