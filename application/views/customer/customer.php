<?php $this->load->view('include/simplehead.php'); ?>
<link rel="stylesheet" href="<?php base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
      

	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
        	          
              		<h3 class="s-h">1 Our Transact Customer Are:</h3>
         
          		
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                	<tr>

                    <td>Sn</td>
                		<td>Customer Name</td>
                		<td>Address</td>
                    <td>Contact</td>
                    <td>Regietered</td>
                    <td>Action</td>
                		
                	</tr>
                </thead>
                <tbody>         
	            	   <?php $sn=1; ?>
                    
                    <?php foreach ($records as $data){ ?>
                    
                    <tr>
                      <td><?= $sn++; ?></td>
                      <td><?php echo $data->customer_name; ?></td>
                      <td><?php echo $data->customer_address; ?></td>
                      <td><?php echo $data->customer_contact; ?></td>
                      <td><?php echo $data->customer_date; ?></td>
                      <td class="text-center">
                        <a data="<?= $data->customer_id; ?>" class="btn bg-navy btn-xs item-edit"><i class="fa fa-edit"></i> &nbsp;&nbsp;Edit</a>
                        <a href="<?php echo base_url('customer/product/');?><?php echo $data->customer_id; ?>" data="<?= $data->customer_id; ?>" class="btn btn-warning btn-xs dis">purchase</a>
                        <a href="" class="btn btn-success btn-xs dis">View</a>
                       <!--  <a class="btn btn-warning btn-xs">Print</a> -->
                       <!--  <a class="btn btn-danger btn-xs">Delete</a> -->
                      </td>
                    </tr>
                    <?php } ?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
   </div>

      
</section>





<?php $this->load->view('customer/customer_register_modal.php'); ?>
<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter.php'); ?>
<script src="<?php base_url(''); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- page script -->
<script>
   $('.datepicker').datepicker({
      autoclose: true
    }).datepicker("setDate",'now');
 
   $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  

   $('body').find('.customer-li').addClass('menu-open'); 
   $('body').find('.customer-ul').show('500'); 
   $('body').find('.cu2').addClass('active');
  
  $('#example1').on('click', '.item-edit', function(){

      var customer_id = $(this).attr('data');
 
      $('#registration_modal').modal('show');
      $('.modal-title').html('Update Customer Info');
      $('#idfor-update').attr('action', '<?php echo base_url() ?>customer/updatecustomer');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>customer/editcustomer',
        data: {customer_id: customer_id},
        async: false,
        dataType: 'json',
        success: function(data){
          console.log(data);
          $('input[name=customer_id]').val(data.customer_id);
          $('input[name=customer_name]').val(data.customer_name);
          $('input[name=customer_address]').val(data.customer_address);
          $('input[name=customer_contact]').val(data.customer_contact);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });  

</script>






<?php $this->load->view('include/htmlclose.php'); ?>
