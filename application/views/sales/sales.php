<?php $this->load->view('include/simplehead.php'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.css">
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
                <a href="<?php echo base_url(); ?>customer/register" class="btn bg-olive btn-xs">
                    <i class="fa fa-user-plus"></i> New Customer 
                </a>
              </div>     
              <div class="form-group">
                <label>Customer Name</label>
                <select class="form-control select2" name="customername" id="customername" style="width: 100%;">
                  <option selected="selected">Select Customer</option>             
                  <?php foreach ($allCustomer as $ans){ ?>
                     <option value="<?= $ans->customer_address; ?>" data-contact="<?= $ans->customer_contact; ?>" data="<?= $ans->customer_id; ?>"><?= $ans->customer_name; ?></option>
                  <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label>Company Name</label>
                <select class="form-control select2" id="companyname" name="companyName" style="width: 100%;">
                  <option selected="selected">Select Company</option>             
                  <?php foreach ($allCompany as $aco){ ?>
                     <option value="<?= $aco->company_name; ?>" data-id="<?= $aco->company_id; ?>"><?= $aco->company_name; ?></option>
                  <?php } ?>
                  
                </select>
              </div>              
              <div class="form-group">
                <label>Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" data-date-format="yyyy/mm/dd"  name="customerBillDate">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="box box-primary">
            <div class="box-body">              
              <div class="checkbox small m-b-2" id="checkboxGroup">                
                
              </div>
              <div class="form-group text-right">
                <button type="button" onClick="Sales()" class="btn btn-primary btn-sm">Submit</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    
<?php $this->load->view('sales/sales_modal.php'); ?>
</section>








<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter.php'); ?>
<script src="<?php echo base_url(''); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/bower_components/angular/angular.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/js/sales.js"></script>
<!-- page script -->
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

  });

 $('.datepicker').datepicker({
      autoclose: true
    }).datepicker("setDate",'now');
 


  $('#companyname').change(function(){
    $('#showdatatable').html('');
    var company_id = $(this).children(":selected").attr("data-id");
    var company_name = $(this).children(":selected").val();

    if(!company_id=='') {
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>sales/getProduct/'+company_id,
        //data: {company_id: company_id},
        async: false,
        dataType: 'json',
        success: function(data){          
            console.log(data);
          if(!data.customers.length < 1) {
            $("#checkboxGroup").html('');
  
            $.each(data.customers,function(i,v){ 
              
              $("<div class='checkbox-overlay'>"+
                  "<input type='checkbox' name='productOption[]' value='"+v.product_name+"' class='selectvalue' data='"+v.product_id+"' value='"+v.product_name+"'>"+                 
                  "<div class='checkbox-container'>"+
                  "<div class='checkbox-checkmark'></div>"+
                  "</div>"+
                  "<label>"+v.product_name+"</label>"+
                  "</div>"+
                  "<a href='' class='pull-right'>Detils</a>").appendTo("#checkboxGroup");
            })
          }
          else {
            $("#checkboxGroup").html('');
            $("<p>no, products avaliable of this company 1st add product to this company</p>"+
            "<a href='<?= base_url(); ?>company/register' class='btn bg-olive btn-xs'>Add Product</a>").appendTo("#checkboxGroup");
          }
         
          },
       
      });
    }
    else {
      alert('Something Wrong!');
    }

    
  }); 




  function print() {
    if(!$('.hait').val() == 0) {
          $('body').find('#submit-form').trigger('click');
          $('input').each(function(){
            $(this).attr('value', $(this).val());
          });
          var divContents = $('#print-container').html();
            var popupWin = window.open('', '_blank', 'width=992,height=600,location=1,status=1,scrollbars=1,left=100px');
               popupWin.document.open();
               popupWin.document.write('<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title><link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" media="print"><link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/print.css"></head><body onload="window.print()">');
               popupWin.document.write(divContents);
               popupWin.document.write('</body></html>');
               popupWin.document.close();
        

  return false;
   }
   else {
    alert('Please, FillUp All The Labels');
   }  
}


  $(document).on('change', '.stockDataCheck', function() { 
    console.log('hey');
    var thisObj = $(this); 
    function ecolor(thisObj) {
        thisObj.css("color", "#dd4b39");

        // $('.restric-btn').attr('disabled','disabled');
        $('.error_mseg').text('Sorry, Stock is less than Sales... ');
        $('.error_mseg_link').text('goto stock');
        $('.error').fadeIn();
        setTimeout(function(){
        $('.error').fadeOut(500);

        },500);
                     
    };
    function recolor(thisObj) {
        thisObj.css("color", "#333");
    };
    var thisval = $(this).val();
    var company_id    = $("input[name='co_id']").val();
    var pid = $(this).attr('data-pid');
    var tt = $(this).attr('name');
      // console.log(tt);
      if (($(this).attr('name') == 'unit[]')) {        
        getdata(2);
      }
      else if (($(this).attr('name') == 'pic[]')) {
        getdata(3);

      }
      else if (($(this).attr('name') == 'qty[]')) {
        getdata(4);

      }
      else {
        
        console.log('goog');
      }

    
      function getdata(get_index){
        if(get_index == 2) {
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>sales/stockDataCheck/',
            data: {company_id: company_id, pid: pid},
            async: false,
            dataType: 'json',
            success: function(data) {
              console.log("Unit");
              if(parseInt(thisval) > data.unit) {
                $(function(){
                    ecolor(thisObj);
                });
                  
                
            
              }
              else {
                $(function(){
                  recolor(thisObj);
                });
              }
             
                        
              }
            });
        }
        if(get_index == 3) {
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>sales/stockDataCheck/',
            data: {company_id: company_id, pid: pid},
            async: false,
            dataType: 'json',
            success: function(data) {
              console.log("Pic");
              if(parseInt(thisval) > data.pic) {
                $(function(){
                  ecolor(thisObj);
                });
              }
              else {
                $(function(){
                  recolor(thisObj);
                });
              }
            }
          });
        }
        if(get_index == 4) {
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>sales/stockDataCheck/',
            data: {company_id: company_id, pid: pid},
            async: false,
            dataType: 'json',
            success: function(data) {
              console.log("Qty");
              if(parseInt(thisval) > data.qty) {
                $(function(){
                  ecolor(thisObj);
                });
              }
              else {
                $(function(){
                  recolor(thisObj);
                });
              }                         
            }
          });
        }
  } 
    
});
</script>






<?php $this->load->view('include/htmlclose.php'); ?>
