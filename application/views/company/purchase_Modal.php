<div class="modal fade" id="CompanyBill">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="<?= base_url(''); ?>purchase/CompanyBill" method="post">
        
        
        <div class="modal-header">
          <button type="button" class="close distroy-data" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Transaction Company XXX</h4>
        </div>
        <div class="box-body">
          <div><img src="<?= base_url(''); ?>assets/custom/logo.png" alt="" class=""></div>
        <!--   <h3 class="invoice-title text-center">Mahesh Retailer & Supplire</h3> -->
          
       <!-- bill-h-left -->
          <div class="col-md-7 heading-left  sales-heading-left">
              <div id="general-info"></div>
              <div><p>Company </p><span id="mainName"></span></div>    
              <div><p>Address </p><span id="mainAddress"></span></div>    
              <div><p>Contact </p><span id="mainContact"></p></div>
          </div>
          <div class="col-md-5 heading-right sales-heading-right">
            <div><p>Date</p><span id="mainDate"></span></div>
            <div><p>Vat No.</p><span>1213223</span></div>
            
            <div><p>Invoice No.</p><span>021545</span></div>
            <div><p>Invoice Date</p><span>14,june-2018</span></div>
            <p></p>
            
          </div>
     
       
          <div class="col-md-12">
            <table class="invoice-transact-table" style="width:100%;">
              <thead>
                <tr>
                  <th style="width: 10%;">S.N</th>
                  <th style="width: 30%;">Product</th>
                  <th style="width: 12%; text-align:center;">Unit</th>
                  <th style="width: 12%; text-align:center;">Pic</th>
                  <th style="width: 12%; text-align:center;">Qty</th>
                  <th style="width: 12%; text-align:center;">Rate</th>
                  <th style="width: 12%; text-align:center;">Amount</th>
                </tr>
              </thead>
              <tbody class="data-bill-tbody" id="data-bill-tbody">
               
              </tbody>
            </table>
          </div>
       
          <div class="col-md-7"></div>
          <div class="col-md-5">
          <table class="table invoice-footer-table">
            <tbody>
              <tr>
                <td style="width:45%">Subtotal:</td>
                <td><input type="number" class="blessinput" id="subtotal"></td>
              </tr>
              <tr>
                <td>Tax (13%)</td>
                <td><input type="number" class="blessinput" id="tax_per"></td>
              </tr>
              <tr>
                <td>Tax Amount:</td>
                <td><input type="number" class="blessinput" id="tax_amount"></td>
              </tr>
              <tr>
                <td>Discount (%):</td>
                <td><input type="number" class="blessinput" id="discount_per"></td>
              </tr>
              <tr>
                <td>Paid Amount</td>
                <td><input type="number" class="blessinput" id="paid_amount"></td>
              </tr>
              <tr>
                <td>Grand Total</td>
                <td><input type="number" class="blessinput" id="grand_total"></td>
              </tr>
              <tr>
                <td>Balanced</td>
                <td><input type="number" class="blessinput" id="balanced"></td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
        <div class="modal-footer">        
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger distroy-data" data-dismiss="modal">Calcel</button>
        </div>
      
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<script>
  // $(document).ready(function(){

  //   $(".invoice-transact-table").on('keyup','.unit ,.pic, .qty, .rate',function(){
  //            //var sub_amount=0;
  //            alert('outside');
  //           $("input[name='unit[]']").each(function (index) {
  //             alert('inside');
  //                 // var unit = $("input[name='unit[]']").eq(index).val();
  //                 // var pic = $("input[name='pic[]']").eq(index).val();
  //                 // var total_qty = parseInt(unit) * parseInt(pic);
  //                 // console.log(total_qty);
                 
  //           });

  // });
  // });

</script>



