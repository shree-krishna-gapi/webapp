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
              <div class="form-group text-right">
                <button type="button" class="btn bg-olive btn-xs" onclick="reg()"><i class="fa fa-industry"></i> &nbsp <b>Company Register</b>
                </button>
              </div> 
              <h3 class="s-h">Product Register</h3>
              <form action="<?php echo base_url(); ?>company/product_registration" id="meme" method="post">
                <div class="form-group">
                  
                </div>
                <div class="form-group">
                  <label for="">Company Name</label>
                  <select name="company_name" id="company_option" class="form-control">
                    <option selected="selected">Choose Company Name</option>
                    <?php foreach ($records as $c){ ?>
                      <option value="<?php echo $c->company_name; ?>" data-id="<?php echo $c->company_id; ?>"><?php echo $c->company_name; ?></option>
                      
                    <?php } ?>
                  </select>
                  <div id="companyid"></div>
                </div>
                  <div class="form-group">                
                      <label>Product Name</label>
                      <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                  </div>
                  <div class="form-group">                
                      <label>Catagory</label>
                      <input type="text" class="form-control" name="product_catagory" placeholder="Catagory">
                  </div>
                  <div class="form-group">                
                      <label>Product Code</label>
                      <input type="text" class="form-control" name="product_code" placeholder="Product Code">
                  </div>
                  <div class="form-group">                
                      <label>Particular</label>
                      <input type="text" class="form-control" name="product_particular" placeholder="Particular">
                  </div>
                  <div class="form-group">                
                      <label>Description</label>
                      <input type="text" class="form-control" name="product_description" placeholder="Description">
                  </div>
                  <div class="form-group">                
                      <label>Register Date</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" name="product_date">
                      </div>
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
      </div>
    </div>
     <div class="col-xs-6">
      <div class="box box-primary">
           
      </div>
    </div>
  </div>
	
    
</section>
<!-- load modal  -->




<?php $this->load->view('company/company_register_modal.php'); ?>
<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- page script -->

<script>
  $('.datepicker').datepicker({
      autoclose: true
    }).datepicker("setDate",'now');
   function reg() {
    $('#registration_modal').modal('show');
   }
   $('#company_option').change(function(){
    $('body').find('#companyid').html('');
    var company_id = $(this).children(":selected").attr("data-id");
    $('<input type="hidden" value="'+company_id+'" name="company_id">').appendTo('#companyid');
   });
</script>




<?php $this->load->view('include/htmlclose.php'); ?>
