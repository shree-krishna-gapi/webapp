<?php $this->load->view('include/simplehead.php'); ?>

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
      

	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
        		
             
              		<h3 class="box-title s-h">1 Customer Transaction Records &nbsp;</h3>
          	
          		
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h1 id="gg"></h1>
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <td>Sn</td>
                    <td>Company Name</td>
                    <td>Customer Name</td>
                    <td>Total Credit</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn=1; ?> 
                    <?php foreach ($hey as $rec) { ?>
                      <tr data="34">
                        <td><?= $sn++; ?></td>
                        <td class="cu_name" data="<?= $rec->total_transact_id; ?>" data-sid="<?= $rec->sales_id; ?>"><?= $rec->company_name; ?></td>
                        <td class="cu_paid" data-coid="<?= $rec->company_id; ?>" data-cuid="<?= $rec->customer_id; ?>"><?= $rec->customer_name; ?></td>
                        <td><?= $rec->total_cr; ?></td>
                        <td><a class="fa fa-edit btn btn-danger" data=""> &nbsp; Payment</a></td>
                      </tr>
                    <?php } ?>
               
             
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
   </div>

      
</section>



<?php $this->load->view('modal/Payment'); ?>

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
// $('#example1').on('click','.fa-edit',function(){
//     var payment_id  = $(this).closest('tr').find('.cu_name').attr('data');
//     var sales_id    = $(this).closest('tr').find('.cu_name').attr('data-sid');
//     var company_id  = $(this).closest('tr').find('.cu_name').attr('data-coid');
//     var customer_id = $(this).closest('tr').find('.cu_name').attr('data-cuid');
//     var name        = $(this).closest('tr').find('.cu_name').text();
//     var paid        = $(this).closest('tr').find('.cu_paid').text();
    
  
//     document.getElementById("cu_name").innerHTML=name;
//     document.getElementById("cu_paid").innerHTML=paid;
//     document.getElementById("payment_id").value=payment_id;
//     document.getElementById("sales_id").value=payment_id;
//     document.getElementById("company_id").value=payment_id;
//     document.getElementById("customer_id").value=payment_id;
   

//    // $("#payment").attr("action", "payment/repaid_payment/"+sales_id);
//   console.log(name);
//       //var customer_id = $(this).attr('data');

 
//       $('#payment').modal('show');
//     });

   
</script>






<?php $this->load->view('include/htmlclose.php'); ?>
