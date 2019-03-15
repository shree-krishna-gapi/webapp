<?php $this->load->view('include/simplehead.php'); ?>

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
      

	 <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
        		<h3 class="box-title"><label for=""><?= $customer->customer_name; ?></label><p> Selected Company List</p></h3>
            </div>
            <!-- /.box-header -->
           	<div class="box-body">
           		<button type="button" onClick="BtnT()">New Transact</button>
           	</div>
          </div>
        </div>
   </div>

      
</section>


<?php $this->load->view('modal/transact.php'); ?>


<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter.php'); ?>
<!-- page script -->
<script>
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

   function BtnT() {
   	$('#transact').modal('show');
   } 

 
</script>






<?php $this->load->view('include/htmlclose.php'); ?>
