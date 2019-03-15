<?php $this->load->view('include/simplehead.php'); ?>
<link rel="stylesheet" href="<?php base_url(); ?>assets/bower_components/select2/dist/css/select2.css">
<link rel="stylesheet" href="<?php base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/mainsidebar'); ?>
<?php $this->load->view('include/minisection'); ?>

 
  
<section class="content">
  
    <div class="row">
        <div class="col-xs-6">
          <div class="box box-success">
            <div class="box-body">    
              <div class="from-group text-right">
                <a href='<?= base_url(); ?>company/register' class='btn bg-olive btn-xs'><i class="fa fa-industry"></i>  &nbsp<b>Add Company</b> </a>
              </div>
              <div class="form-group">
                <label>Company Name</label>
                <select class="form-control select2" name="companyname" id="companyname" style="width: 100%;">
                  <option selected="selected">Select Company</option>             
                  <?php foreach ($getCompany as $ans){ ?>
                     <option value="<?= $ans->company_name; ?>" data-contact="<?= $ans->company_contact; ?>" data="<?= $ans->company_id; ?>" data-address="<?= $ans->company_address; ?>" data-contact="<?= $ans->company_contact; ?>"><?= $ans->company_name; ?></option>
                  <?php } ?>
                  
                </select>
              </div>
                          
              <div class="form-group">
                <label>Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" data-date-format="yyyy/mm/dd" name="companyBillDate" id="b_date">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="box box-primary">
            <div class="box-body"> 
              <h4 class="product-title c_hidden" id="ptitle">Avaliable Products &nbsp;:-</h4>             
              <div class="checkbox small m-b-2" id="checkboxGroup">                
                
              </div>
              <div class="form-group text-right">
                <button type="button" onClick="getValue()" class="btn btn-primary btn-sm">Submit</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php $this->load->view('company/purchase_Modal.php'); ?>
  </form>
</section>








<?php $this->load->view('include/minifooter'); ?>
<?php $this->load->view('include/aside'); ?>
<?php $this->load->view('include/simplefooter.php'); ?>
<script src="<?php base_url(''); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php base_url(''); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
    var company_id = $(this).children(":selected").attr("data");
    var company_name = $(this).children(":selected").val();



    if(!company_id=='') {
  
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>purchase/getProduct/'+company_id,
        //data: {company_id: company_id},
      //  async: false,
        dataType: 'json',
        success: function(data){ 
          console.log(data.company.length);
          if(!data.company.length < 1) {
        
          
            $("#checkboxGroup").html('');
            $("#ptitle").show();
            $.each(data.company,function(i,v) {               
              $("<div class='checkbox-overlay'>"+
                  "<input type='checkbox' name='productOption[]' value='"+v.product_name+"' class='selectvalue' data='"+v.product_id+"'>"+                 
                  "<div class='checkbox-container'>"+
                  "<div class='checkbox-checkmark'></div>"+
                  "</div>"+
                  "<label>"+v.product_name+"</label>"+
                  "</div>"+
                  "<a href='' class='pull-right'>Detils</a>").appendTo("#checkboxGroup");
            })
          }
          else {
            $("#ptitle").hide();

            $("#checkboxGroup").html('');
            $("<p>no, products avaliable of this company 1st add product to this company</p>"+
            "<a href='<?= base_url(); ?>company/register' class='btn bg-olive btn-xs'>Add Product</a>").appendTo("#checkboxGroup");
          }
        },
        error: function() {
          alert('Opps! something wrong contact to Admin');
        }
      });
    }
    else {
      // alert('Something Wrong!');
      $( ".error_mseg" ).text("Please, Select Company...");
    }

    
  });
  

 function getValue() {
  $('.data-bill-tbody').html('');
  var company_id= $("input[name='companyId']").val();
  //var company_name = $("input[name='companyName']").val();
  var checkbox = document.getElementsByClassName('selectvalue');
  var item = $('body').find('.selectvalue:checkbox:checked');

  var item_checkbox = $('body').find('.selectvalue:checkbox');
  var product_list = '';
  var product_id = '';

  var date = $('#b_date').val();

  var selected = $('#companyname').find('option:selected');

  var company_address = selected.attr('data-address');

  var company_contact = selected.attr('data-contact');
  var companyid = selected.attr('data');
  var company_name = selected.val();

  var mainName        = document.getElementById("mainName");
  var mainAddress     = document.getElementById("mainAddress");
  var mainContact     = document.getElementById("mainContact");
  var mainDate       = document.getElementById("mainDate");
  if ($(checkbox).is(':checked')) {
    var i;

  //if ( checkbox[i].checked === true ) {

      mainName.innerHTML = company_name;
      mainAddress.innerHTML = company_address;
      mainContact.innerHTML = company_contact;
      mainDate.innerHTML = date;

    for ( i = 0; i < item.length; i++) {
       
      
        product_list += item[i].value + " ";                
        product_id += item.eq(i).attr('data') + " ";
        var sn = i+1;
      $("<tr class='hihi'>"+
        "<td>"+sn+"</td>"+ 
        "<td>"+product_list+"</td>"+
        "<td class='text-center'>"+
          "<input type='hidden' class='m-text pid' name='companyid' value='"+companyid+"'>"+
          "<input type='hidden' class='m-text' name='product_name[]' value='"+product_list+"'>"+
          "<input type='hidden' class='m-text pid' name='product_id[]' value='"+product_id+"'>"+
          "<input type='hidden' class='m-text pid' name='company_name[]' value='"+company_name+"'>"+
          
       
          
          
          "<input type='number' class='m-text unit' name='unit[]' min='0' onkeyup='summ()'>"+
        "</td>"+    
        "<td class='text-center'>"+
          "<input type='number' class='m-text pic' name='pic[]' min='0' onKeyup='summ()'>"+
        "</td>"+   
        "<td class='text-center'>"+
          "<input type='number' class='m-text qty' name='qty[]' min='0'>"+
        "</td>"+  
        "<td class='text-center'>"+
          "<input type='number' class='m-text rate' name='rate[]' min='0' id='rate'>"+
        "</td>"+  
        "<td class='text-center'>"+
          "<input type='number' class='m-text amount' name='amount[]' min='0' id='amount'>"+
        "</td>"+       
        "</tr>"       
        ).appendTo(".data-bill-tbody");
      var product_list = '';
      var product_id = '';
    }
    
    

      $('#CompanyBill').modal('show');     
      

  }
  else {
    $(".error").show();
    $( ".error_mseg" ).text("Please, Select Products");
    mseg_hide();
  }

}
 




// function bb(){
//   var aa = $("input['name=kk']").val();
//   alert(aa)
// }
  
  
</script>

<script language="Javascript">
// function displayWorkersSum(staffType) {

// var toBeSummed = [];
//     switch (staffType.attr('id')) {

//         case $('#a').attr('id'):
//             $(this).val();
//             g();
//             break;

//         case $('#b').attr('id'):
            
//             t();
//             break;
//       }
// }
// function g() { 
//   alert(0);
// }
   function summ() {
            var tt = document.getElementsByClassName('unit').value;
            console.log(parseInt(tt));

            // var txtSecondNo = $(this).val();
            // var result = parseInt(txtFirstNo) + parseInt(txtSecondNo);
            // console.log(result);
            // if (!isNaN(result)) {
            //     document.getElementsByClassName('qty').value = result;
            // }
        }
</script>




<?php $this->load->view('include/htmlclose.php'); ?>
