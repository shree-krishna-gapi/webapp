<?php $this->load->view('include/simplehead.php'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
      
  <div class="row">
   
    <div class="col-xs-6">
      <div class="box box-success">
            <div class="box-body">   
              
              <h3 class="s-h">Customer Register</h3>
              <form action="<?php echo base_url(); ?>customer/customer_registration" method="post">               
               
                  <div class="form-group">                
                      <label>Customer Name</label>
                   
                      <input type="text" class="form-control" name="customer_name" placeholder="Customer Name">
                  </div>
                  <div class="form-group">                
                      <label>Customer Address</label>
                      <input type="text" class="form-control" name="customer_address" placeholder="Customer Address">
                  </div>
                  <div class="form-group">                
                      <label>Customer Contact</label>
                      <input type="text" class="form-control" name="customer_contact" placeholder="Customer Contact">
                  </div>
                  <div class="form-group">                
                      <label>Register Date</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" name="customer_date">
                      </div>
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
      </div>
    </div>
     
  </div>
	
    
</section>
<!-- load modal  -->





<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- page script -->

<script>
  $('.datepicker').datepicker({
      autoclose: true
    }).datepicker("setDate",'now');
   
  
</script>




<?php $this->load->view('include/htmlclose.php'); ?>
