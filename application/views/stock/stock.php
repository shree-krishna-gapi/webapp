<?php $this->load->view('include/simplehead.php'); ?>

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
      

	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
        		
             
              		<h3 class=" s-h">Product Records &nbsp;</h3>
          	
          		
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h1 id="gg"></h1>
              <table id="example1" class="bold-head table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <td>Sn</td>
                    <td>Product Name</td>
                    <td>Catagory</td>
                    <td>Product Code</td>
                    <td>Particular</td>
                    <td>Company</td>
                    <td>unit</td>
                    <td>Pice</td>
                    <td>Quantity</td>
                    <td>Purchase Date</td>
                  </tr>
                </thead>
                
                <tbody class="stock_tbody">
                  <?php $sn=1; ?> 
             
                  
                    <?php foreach ($records as $rec) { ?>
                      <tr>
                        <td>
                          <?= $sn++; ?>                          
                        </td>
                        <td class="data-class" ><?= $rec->product_name; ?></td>
                        <td><?= $rec->product_catagory; ?></td>                        
                        <td><?= $rec->product_code; ?></td>
                        <td><?= $rec->product_particular; ?></td>
                        <td><?= $rec->company_name; ?></td>
                        <td><?= $rec->unit; ?></td>
                        <td><?= $rec->pic; ?></td>
                        <td><?= $rec->qty; ?></td>
                        <td><?= $rec->product_date; ?></td>
                 
                      </tr>
                    <?php } ?>
               
                
              </tbody>
                
               
              </table>
            </div>
            
          </div>
        </div>
   </div>

      
</section>






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
   
// $('#example1').on('click','.payment-btn',function(){
//     $('#payment-modal').modal('show');
//     var customer_id         = $(this).closest('.tr').find('#data-class').attr('data-cuid');
//     var company_id          = $(this).closest('.tr').find('#data-class').attr('data-coid');

//     var total_transact_id   = $(this).closest('.tr').find('#data-class').attr('data-ttid');
//     var sales_id            = $(this).closest('.tr').find('#data-class').attr('data-sid');
//     var customer_name       = $(this).closest('.tr').find('#data-class').attr('data-cuname');
//     var company_name        = $(this).closest('.tr').find('#data-class').attr('data-coname');
//     var cr_amount            = $(this).closest('.tr').find('#data-class').attr('data-tcr');
    
//     document.getElementById("customer_id").value=customer_id;
//     document.getElementById("company_id").value=company_id;

//     document.getElementById("sales_id").value=sales_id;
//     document.getElementById("customer_name").innerHTML=customer_name;    
//     document.getElementById("company_name").innerHTML=company_name;
//     document.getElementById("total_cr").innerHTML=cr_amount;
   


//    // $("#payment").attr("action", "payment/repaid_payment/"+sales_id);
//   console.log(customer_id);
//   console.log(company_id);
      //var customer_id = $(this).attr('data');

 
    //   $('#payment').modal('show');
    // });

   
</script>


<!-- page script -->

<!-- <script>
  $('.datepicker').datepicker({
      autoclose: true
    }).datepicker("setDate",'now');
   
  
</script> -->


<?php $this->load->view('include/htmlclose.php'); ?>
