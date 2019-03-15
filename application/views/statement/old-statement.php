<?php $this->load->view('include/simplehead.php'); ?>

<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
      

	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <h1 id="gg"></h1>
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <td>Sn</td>
                    <td>Customer Name</td>
                    <td>Company Name</td>
                    <td>Action</td>
                    
                  </tr>
                </thead>
                
                <tbody class="tbody_uppercase">
                   <?php $sn=1; ?> 
                 <?php foreach ($records as $rec) { ?>
                    <tr>
                      <td><?= $sn++; ?></td>
                      <td><?= $rec->customer_name; ?></td>
                      <td><?= $rec->company_name; ?></td>
                      <td><div data="" data-id="<?= $rec->sales_id; ?>" class="btn btn-sm btn-success get_statement">Detail</div></td>
                    </tr>
                   <!--  <tr>
                      <td colspan="4">
                        <form action="">
                          <div class="form-group">
                            <label for="">From</label>
                            <input type="text" class="control-label">
                          </div>
                        </form>
                      </td>
                    </tr> -->
                 <?php } ?>

              </tbody>
                
               
              </table>
            </div>
            
          </div>
        </div>
   </div>

      
</section>

<!-- used -->
<div class="modal fade" id="statement-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="print-container">
      <form action="" method="post">
        <div class="pcontainer">
          <div class="modal-header no-print">
            <button type="button" class="close distroy-data" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title no-print">Customer Receipt Bills Records</h4>
          </div>
          <div class="box-body">
            <table class="table">
              <tr>
                <td>S.N</td>
                <td>Company</td>
                <td>Date</td>
                <td>Transact Pdf</td>
              </tr>
              
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




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
   $('.get_statement').click(function(){
    var sales_id = $(this).attr("data-id");
    
    

    if(!sales_id=='') {

         $.ajax({
          type: 'ajax',
          method: 'get',
          url: '<?php echo base_url() ?>statement/quota/',
          data: {sales_id: sales_id},
          async: false,
          dataType: 'json',
          success: function(data){   
            console.log(data);
         
            }
          })
      
    }
    else {
      alert(0);
    }
  });

</script>



<?php $this->load->view('include/htmlclose.php'); ?>
