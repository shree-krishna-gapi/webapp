<?php $this->load->view('include/simplehead.php'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  <style>

  
    
 
  </style>
<section class="content">
  
    <div class="row">
        <div class="col-xs-6">
          <div class="box box-success">
            <div class="box-body">    
                
              <div class="form-group">
                <label>Select Transact Customer</label>
                <select class="form-control select2" name="customername" id="customername" style="width: 100%;">
                  <option selected="selected">Select Transact Company</option>             
                  <?php foreach ($records as $ans){ ?>
                     <option value="<?= $ans->customer_id; ?>" data-Address="<?= $ans->customer_address; ?>" data-Contact="<?= $ans->customer_contact; ?>" data-Date="<?= $ans->customer_date; ?>"><?= $ans->customer_name; ?></option>
                  <?php } ?>
                  
                </select>
              </div>
              
              <div class="form-group mt-30" id="company_wrap">
                <!-- <h4 style='margin-top: 30px;'>This Customer Transact Company Are:-</h4> -->
              </div>   
        
            </div>
          </div>
        </div>
        <div class="col-xs-6" >
          <div class="box box-success">
            <div class="box-body"> 
              <div id="transaction-list">
                
              </div>
              <div class="form-group text-right">
                <button type="button" class="btn btn-success " onclick="get_statement()">Get Statement</button>
              </div>
            </div>
          </div>  
        </div>

       
    </div>
    

</section>

<!-- used -->
<?php $this->load->view('statement/statement_modal.php'); ?>






<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter.php'); ?>

<script src="<?php echo base_url(''); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<script>


 $('.datepicker').datepicker({
      autoclose: true
    }).datepicker("setDate",'now');
 

  
$("#customername").change(function() {
  // *-*-*-*-*-*-*-*-*-*-*-*-  
  $("#mainName").html('');
  $("#mainName").html('');
  $("#mainAddress").html('');
  $("#mainContact").html('');
  $("#mainCuDate").html('');
  // *-*-*-*-*-*-*-*-*-*-*-*- this code to get customer & company info other nth

  var customer_name  = $("select[name='customername'] option:selected").text();
  var customer_id = $("select[name='customername'] option:selected").val();

  // *-*-*-*-*-*-*-*-*-*-*-*-
  var customer_address = $("select[name='customername'] option:selected").attr("data-Address");
  var customer_contact = $("select[name='customername'] option:selected").attr("data-Contact");
  var customer_date = $("select[name='customername'] option:selected").attr("data-Date");
  // *-*-*-*-*-*-*-*-*-*-*-*-

    if(!customer_id=='') {
       $.ajax({
          type: 'ajax',
          method: 'get',
          url: '<?php echo base_url() ?>statement/company_info/',
          data: {customer_id: customer_id},
          async: false,
          dataType: 'json',
          success: function(data){   
            // console.log(data);
             $("#company_wrap").html("<h5 class='small-h mt-30'><div style='color:#065d35;text-transform:capitalize; display:inline;'> "+customer_name+"</div> Transact Company Are:-</h5>");
              if(!data.company_info.length < 1) {
             
                  // *-*-*-*-*-*-*-*-*-*-*-*-                  
                  $("#mainName").text(customer_name);
                  $("#mainAddress").text(customer_address);
                  $("#mainContact").text(customer_contact);
                  $("#mainCuDate").text(customer_date);
                  // *-*-*-*-*-*-*-*-*-*-*-*-
                  
                $.each(data.company_info,function(i,v){ 
                  
                  $("<div class='radio-div'>"+
                      "<p class='radio-title'>"+v.company_name+"</p>"+
                      "<input type='radio' name='selectvalue' value='"+v.sales_id+"' data-coname='"+v.company_name+"' data-codate='"+v.company_date+"' class='radio-input selectvalue'>"+
                      "<span class='radio-ui'></span>"+
                      "<span class='radio-bg'></span>"+
                    "</div>").appendTo("#company_wrap");
                })
              }
              else {
                $("#company_wrap").html("<h5 class='small-h mt-30'>Sorry, No Any Sales Statemet of <div style='color:#065d35;text-transform:capitalize; display:inline;'> " +customer_name+" </div> Customer :-</h5>");
                
              }
            }
        })
            $('.selectvalue').click(function(){
      
              var sales_id = $(this).val(); 
              // *-*-*-*-*-*-*-*-*-*-*-*-  
              $('#co_name').html('');            
              $('#co_date').html('');            
              var co_name = $(this).attr('data-coname');                   
              var co_date = $(this).attr('data-codate');                   
              // *-*-*-*-*-*-*-*-*-*-*-*-

                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url() ?>statement/sales_transact/',
                    data: {sales_id: sales_id},
                    async: false,
                    dataType: 'json',
                    success: function(data){   
                      // console.log(data);

                      $("#transaction-list").html("<h5 class='small-h mt-30'>Transaction Statement Order By Date & Time:-</h5>");
                      // *-*-*-*-*-*-*-*-*-*-*-*-  
                      $('#co_name').text(co_name); 
                      $('#co_date').text(co_date); 
                      // *-*-*-*-*-*-*-*-*-*-*-*-  

                      $.each(data.sales_transact,function(i,v){ 

                            $("<div class='checkbox small'>"+
                              "<div class='checkbox-overlay'>"+
                                "<input type='checkbox' name='get_doc' value="+v.sales_id+" class='check_transact_sales animated ' dateid='"+v.date+"'>"+
                                "<div class='checkbox-container'>"+
                                  "<div class='checkbox-checkmark'></div>"+
                                "</div>"+
                                "<label class='c_label'>"+v.date+"</label>"+
                              "</div>"+
                            "</div>"+
                        "</div>").appendTo("#transaction-list");
                     

                      })

                    }

                });


            
            
      });
    

       
  
  }
  

    



});
  // getting statement by Sales_id and shown on Modal
function get_statement() {

$("body").find("#statement-body").html('');
  var checkbox = $("body").find(".check_transact_sales");
  // var n = $(checkbox).length;
  var chk = checkbox.filter(':checked');
  var checker = checkbox.filter(':checked').length;

    



  if (!($.checker)) {
    var i;
    var tmp = [];   

    
     for (i=0; i<checker; i++) { 
      // $(checker).each(function(){
        // var dateid = $(chk).attr('dateid');
        var sales_id = $(chk).val();

        // console.log(dateid,sales_id);
        
      // });
      // chk = '';
       

    };
        // var dateid = "2019-02-13 10:46:13";
    var dateid = $(chk).attr('dateid');

    // console.log(dateid,sales_id);
    
    $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>statement/sales_item_details_statement/',
            data: {sales_id: sales_id, dateid: dateid},
            async: false,
            dataType: 'json',
            success: function(data){   

              // console.log(data);

              $.each(data.sales_item_details_statement,function(i,v){ 
            
                    $("<tr>"+
                            "<td>1</td>"+
                            "<td>"+v.product_name+"</td>"+
                            "<td style='text-align:center;'>"+v.unit+"</td>"+
                            "<td style='text-align:center;'>"+v.pic+"</td>"+
                            "<td style='text-align:center;'>"+v.qty+"</td>"+
                            "<td style='text-align:center;'>"+v.rate+"</td>"+
                            "<td style='text-align:center;'>"+v.amount+"</td>"+
                          "</tr>").appendTo("#statement-body");
             

              })

            }

        });
          var c_id ='';
         $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>statement/sales_transact_statement/',
            data: {sales_id: sales_id, dateid: dateid},
            async: false,
            dataType: 'json',
            success: function(data){   
            console.log(data)
              $('.a1').text(data.sub_total);
              $('.a2').text(data.discount);
              $('.a3').text(data.paid);
              $('.a4').text(data.unpaid);
              $('.a5').text(data.grand_total);
              $('.a6').text(data.balanced);
              var c_id = data.company_id;
               
            },
            complete:function() {

             //  var cid = c_id;
               
             // // alert(0);
             // // var c_id = data.company_id;
             //   alert(cid);
            }
          });

    

        $("#statement-modal").modal('show');


  } 
  else {
    alert('please, select checkbox');
  }



  
}
  
      
  $(document).on('change', '.check_transact_sales', function() { 
    $('.check_transact_sales').addClass('jello');
         $('.check_transact_sales').not(this).prop('checked', false);  


  });
        
   
         
  
</script>
                

<script>
// function onlyone(){
  
//     $('.check_transact_sales').not(this).attr('checked', false);

// };

// used this in statement for checkbox restic
  function printthis() {
          var divContents = $('#print-container').html();
            var popupWin = window.open('', '_blank', 'width=992,height=600,location=1,status=1,scrollbars=1,left=100px');
               popupWin.document.open();
               popupWin.document.write('<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title><link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" media="print"><link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/print.css"></head><body onload="window.print()">');
               popupWin.document.write(divContents);
               popupWin.document.write('</body></html>');
               popupWin.document.close();
        

      return false;
         
        }
</script>




<?php $this->load->view('include/htmlclose.php'); ?>
