<!-- used -->
<div class="modal fade" id="salesBill">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="print-container">
     
        
      <div class="pbody">
        <form action="<?php echo base_url(); ?>sales/salesBill" method="post">
          <div class="">
            <div class="modal-header no-print">
              <button type="button" class="close distroy-data" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title no-print">Transaction Receipt Bills</h4>
            </div>
            <div class="box-body sales-box-body">
              <div style="margin-bottom: 15px;"><img src="<?= base_url(''); ?>assets/custom/logo.png" alt="" class=""></div>
              <div class="row">
              <div class="col-md-7 heading-left sales-heading-left">  
                <div class="pblock"><p>Name </p><span id="mainName"></span></div>    
                <div class="pblock"><p>Address </p><span id="mainAddress"></span></div>    
                <div class="pblock"><p>Contact </p><span id="mainContact"></span></div>
              </div>
              <div class="col-md-5 heading-right sales-heading-right">
                <p class="text-center"><strong id="companyName"></strong></p>
                <div class="pblock"><p>Date</p><span id="mainDate"></span></div>
                <div class="hidden pblock"><p></p>
                  <input type="hidden" name="time" id="demo"></div>
                <div class="pblock"><p>Vat No.</p><span></span></div>
                
                <div class="pblock"><p>Invoice No.</p><span></span></div>
                <div class="pblock"><p>Invoice Date</p><span></span></div>
                <p></p>
                
              </div>
              </div>
              <div class="row">
           
              <div class="col-md-12">
                <table class="invoice-transact-table" style="width:100%;">
                  <thead>
                    <tr>
                      <th style="width: 8%;">S.N</th>
                      <th style="width: 28%;">Product</th>
                      <th style="width: 11%; text-align:center;">Unit</th>
                      <th style="width: 11%; text-align:center;">Pic</th>
                      <th style="width: 11%; text-align:center;">Qty</th>
                      <th style="width: 11%; text-align:center;">Rate</th>
                      <th style="width: 12%; text-align:center;">Amount</th>
                    </tr>
                  </thead>
                  <tbody class="data-bill-tbody" id="hhh">
                  </tbody>
                </table>
              </div>
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-7 text-right f-right">
                <table class="table invoice-footer-table">
                  <tbody>
                    <tr>
                      <td>Subtotal:</td>
                      <td><input type="number" min="0" class="b-less-input hait invoice-input" name="sub_total"  id='sub_total' required="required"></td>
                    </tr>              
                    <tr>
                      <td>Discount&nbsp;(%):</td>
                      <td><input type="number" min="0" class="b-less-input hait invoice-input"  name="discount"  id='discount' required="required"></td>
                    </tr>
                    <tr>
                      <td>Paid&nbsp;Amount</td>
                      <td><input type="number" min="0" class="b-less-input hait invoice-input"  name="paid_amount"  id='paid_amount' required="required"></td>
                    </tr>
                    <tr>
                      <td>UnPaid&nbsp;Amount</td>
                      <td><input type="number" min="0" class="b-less-input hait invoice-input" name="unpaid_amount" id='unpaid_amount' required="required"></td>
                    </tr>
                    <tr>
                      <td>Grand&nbsp;Total</td>
                      <td><input type="number" min="0" class="b-less-input hait invoice-input" name="grand_total"  id='grand_total' required="required"></td>
                    </tr>
                    <tr>
                      <td>Balance</td>
                      <td><input type="number" min="0" class="b-less-input hait invoice-input" name="balanced"  id='balanced' required="required"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer b-c-l no-print">        
              <!-- <button type="button" class="btn btn-primary" onclick="return print()">Save & Print</button> -->
              <div class="btn btn-primary restric-btn" onclick="return print()" >Save & Print</div>
           
              <!-- <div class="btn btn-primary" id="hey" ng-click="printDiv('printable');">Save & Print</div> -->
              
              <button type="submit" class="btn btn-primary restric-btn" id="submit-form">Save</button>
              <button type="button" class="btn btn-danger  distroy-data" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<script>
  
</script>


