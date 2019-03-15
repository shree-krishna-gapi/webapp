
function Sales() {



    $('body').find('.data-bill-tbody').html('');

    $(".invoice-input").each(function(){
            $(this).attr("value", $(this).val(''));
    });
    var company_id    = $("input[name='companyId']").val();
    var company_name  = $("input[name='companyName']").val();
    var customerName  = $("select[name='customername'] option:selected").text();
    var customerAddress = $("select[name='customername'] option:selected").val();
    var customerContact = $("select[name='customername'] option:selected").attr('data-contact');
    var mainDate        = $("input[name='customerBillDate']").val();
    var mainName        = document.getElementById("mainName");
    var mainAddress     = document.getElementById("mainAddress");
    var mainContact     = document.getElementById("mainContact");

    var checkbox = document.getElementsByClassName('selectvalue');
    var item = $('body').find('.selectvalue:checkbox:checked');
    var item_checkbox = $('body').find('.selectvalue:checkbox');

    var checkbox      = document.getElementsByClassName('selectvalue');
    
    var product_list    = '';
    var product_id      = '';
    var i;
    
    var co_id = $("#companyname option:selected").attr('data-id');
    var co_name = $("#companyname option:selected").val();
    var cu_id = $("#customername option:selected").attr('data');
    var cu_name = $("#customername option:selected").text();

    
    if ($(checkbox).is(':checked')) {
      mainName.innerHTML = customerName;
      mainAddress.innerHTML = customerAddress;
      mainContact.innerHTML = customerContact;
      $("#mainDate").html(mainDate);
      for (i=0; i<item.length; i++) {      
          var main1 = $("body").find("select[name='productOption[]'] option:selected")[i]; 
          var sn = i+1;
          product_list += item[i].value + " ";    

         // product_id += item.eq(i).attr('data') + " ";
          item_id = item.eq(i).attr('data');
         
          $("<tr class='trtr'>"+
           "<td>"+sn+"</td>"+ 
           "<td>"+product_list+"</td>"+
           "<td class=''>"+
           "<input type='hidden' class='m-text' name='product_name[]' value='"+product_list+"'>"+
           "<input type='hidden' class='m-text pid' name='product_id[]' value='"+item_id+"'>"+ 
          "<input type='number' class='m-text a unit stockDataCheck hait' data-pid='"+item_id+"' id='unit' name='unit[]' min='0' required='required'>"+
          "</td>"+    
          "<td class=''>"+
          "<input type='number' class='m-text b pic stockDataCheck hait' data-pid='"+item_id+"' name='pic[]' min='0' id='pic' required='required'>"+
          "</td>"+   
          "<td class=''>"+
          "<input type='number' class='m-text c qty stockDataCheck hait' data-pid='"+item_id+"' name='qty[]' min='0' id='qty' required='required'>"+
          "</td>"+  
          "<td class=''>"+
          "<input type='number' class='m-text d rate hait' name='rate[]' min='0' id='rate' required='required'>"+
          "</td>"+  
          "<td class=''>"+
          "<input type='number' class='m-text e amount hait' name='amount[]' min='0' id='amount' required='required'>"+
          "</td>"+       
          "</tr>"+        
          "<tr class='hidden'>"+
            "<td>"+
              "<input type='text' name='co_name' value='"+co_name+"'>"+
              "<input type='text' name='co_id' value='"+co_id+"'>"+
              "<input type='text' name='cu_id' value='"+cu_id+"'>"+
              "<input type='text' name='cu_name' value='"+cu_name+"'>"+
              "<input type='text' name='cu_address' value='"+customerAddress+"'>"+
              "<input type='text' name='cu_contact' value='"+customerContact+"'>"+
              "<input type='text' name='bill_date' value='"+mainDate+"'>"+
            "</td>"+
          "</tr>"      
        ).appendTo(".data-bill-tbody");
           //var datetime = new Date();
          
            $("#companyName").text(co_name);
            document.getElementById("demo").value = mainDate;
        var product_list = '';
      
      }
     
     $('#salesBill').modal('show');
      
    }
    else {
    $(".error").show();

      $(".error_mseg").text("Please, Select Company & Products...");
      mseg_hide();
      
    }

    
    
  }




  // function Sales() {
  //   $('body').find('.data-bill-tbody').html('');
  //   var company_id    = $("input[name='companyId']").val();
  //   var company_name  = $("input[name='companyName']").val();
  //   var customerName  = $("select[name='customername'] option:selected").text();
  //   var customerAddress = $("select[name='customername'] option:selected").val();
  //   var customerContact = $("select[name='customername'] option:selected").attr('data-contact');
  //   var mainDate        = $("input[name='customerBillDate']").val();
  //   var mainName        = document.getElementById("mainName");
  //   var mainAddress     = document.getElementById("mainAddress");
  //   var mainContact     = document.getElementById("mainContact");

  //   var checkbox = document.getElementsByClassName('selectvalue');
  //   var item = $('body').find('.selectvalue:checkbox:checked');
  //   var item_checkbox = $('body').find('.selectvalue:checkbox');

  //   var checkbox      = document.getElementsByClassName('selectvalue');
    
  //   var product_list    = '';
  //   var product_id      = '';
  //   var i;
    
  //   var co_id = $("#companyname option:selected").attr('data-id');
  //   var co_name = $("#companyname option:selected").val();
  //   var cu_id = $("#customername option:selected").attr('data');
  //   var cu_name = $("#customername option:selected").text();

    
  //   if ($(checkbox).is(':checked')) {
  //     mainName.innerHTML = customerName;
  //     mainAddress.innerHTML = customerAddress;
  //     mainContact.innerHTML = customerContact;
  //     $("#mainDate").html(mainDate);
  //     for (i=0; i<item.length; i++) {      
  //         var main1 = $("body").find("select[name='productOption[]'] option:selected")[i]; 
  //         var sn = i+1;
  //         product_list += item[i].value + " ";    

  //        // product_id += item.eq(i).attr('data') + " ";
  //         item_id = item.eq(i).attr('data');
         
  //         $("<tr>"+
  //          "<td>"+sn+"</td>"+ 
  //          "<td>"+product_list+"</td>"+
  //          "<td class='text-center'>"+
  //          "<input type='hidden' class='m-text' name='product_name[]' value='"+product_list+"'>"+
  //          "<input type='hidden' class='m-text pid' name='product_id[]' value='"+item_id+"'>"+ 
  //         "<input type='number' class='m-text a unit' name='unit[]' min='0' ng-model='unit'  ng-value='unit'>"+
  //         "</td>"+    
  //         "<td class='text-center'>"+
  //         "<input type='number' class='m-text b pic' name='pic[]' min='0' id='pic' ng-model='pic'  ng-value='pic'>"+
  //         "</td>"+   
  //         "<td class='text-center'>"+
  //         "<input type='number' class='m-text c qty' name='qty[]' min='0' id='qty' ng-model='qty'  ng-value='qty'>"+
  //         "</td>"+  
  //         "<td class='text-center'>"+
  //         "<input type='number' class='m-text d rate' name='rate[]' min='0' id='rate'>"+
  //         "</td>"+  
  //         "<td class='text-center'>"+
  //         "<input type='number' class='m-text e amount' name='amount[]' min='0' id='amount'>"+
  //         "</td>"+       
  //         "</tr>"+
  //         "<tr class='hidden'>"+
  //           "<td>"+
  //             "<input type='text' name='co_name' value='"+co_name+"'>"+
  //             "<input type='text' name='co_id' value='"+co_id+"'>"+
  //             "<input type='text' name='cu_id' value='"+cu_id+"'>"+
  //             "<input type='text' name='cu_name' value='"+cu_name+"'>"+
  //             "<input type='text' name='cu_address' value='"+customerAddress+"'>"+
  //             "<input type='text' name='cu_contact' value='"+customerContact+"'>"+
  //             "<input type='text' name='bill_date' value='"+mainDate+"'>"+
  //           "</td>"+
  //         "</tr>"    
  //       ).appendTo(".data-bill-tbody");
  //          //var datetime = new Date();
  //           document.getElementById("demo").value = mainDate;
  //       var product_list = '';
      
  //     }
     
  //    $('#salesBill').modal('show');
      
  //   }
  //   else {
  //   $(".error").show();

  //     $(".error_mseg").text("Please, Select Company & Products...");
  //     mseg_hide();
      
  //   }
    
  // }








// function print() {
         

//       // $('body').find('#submit-form').trigger('click');
//              var pathname = window.location.href;
//           console.log(pathname);
          
//             var divContents = $('#print-container').html();
//             var popupWin = window.open('', '_blank', 'width=992,height=600,location=1,status=1,scrollbars=1,left=100px');
//                popupWin.document.open();
//                popupWin.document.write('<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title><link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" media="print"><link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/print.css"></head><body onload="window.print()">');
//                popupWin.document.write(divContents);
//                popupWin.document.write('</body></html>');
//                popupWin.document.close();
        

//       return false;
         
//         }