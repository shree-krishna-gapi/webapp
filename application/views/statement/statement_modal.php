<!-- used -->
<div class="modal fade" id="statement-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="print-container">
      <div class="pbody">
        
          <div class="">
            <div class="modal-header no-print">
              <button type="button" class="close distroy-data" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title no-print">Statement:-</h4>
            </div>
            <div class="box-body sales-box-body">
              <div style="margin-bottom: 15px;"><img src="<?= base_url(''); ?>assets/custom/logo.png" alt="" class=""></div>
              <div class="row">
              <div class="col-md-7 heading-left sales-heading-left">            

                <div class="pblock"><p>Name </p><span id="mainName"></span></div>    
                <div class="pblock"><p>Address </p><span id="mainAddress"></span></div>    
                <div class="pblock"><p>Contact </p><span id="mainContact"></span></div>
                <div class="pblock"><p>Since Date </p><span id="mainCuDate"></span></div>
              </div>
              <div class="col-md-5 heading-right sales-heading-right">
                <strong><p id="co_name" class="text-center"></p></strong>
                <div class="pblock"><p>Date</p><span id="co_date"></span></div>
                <div class="hidden pblock"><p>Date:</p><input type="text" value="" id="demo" name="time"></div>
                <div class="pblock"><p>Vat No.</p><span>1213223</span></div>
                
                <div class="pblock"><p>Invoice No.</p><span>021545</span></div>
                <div class="pblock"><p>Invoice Date</p><span>14,june-2018</span></div>
                <p></p>
                
              </div>
              </div>
              <div class="row">
           
              <div class="col-md-12">
                <table class=" invoice-transact-table" style="width:100%;">
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
                  <tbody class="data-bill-tbody" id="statement-body">
                   
                  </tbody>
                </table>
              </div>
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-7 text-right f-right">
                <table class="payment-info-statement">
                  <tbody>
                    <tr>
                      <td>Sub Total</td>
                      <td class="a1">232</td>
                    </tr>
                    <tr>
                      <td>Discount</td>
                      <td class="a2">232</td>
                    </tr>
                    <tr>
                      <td>Paid</td>
                      <td class="a3">232</td>
                    </tr>
                    <tr>
                      <td>UnPaid</td>
                      <td class="a4">232</td>
                    </tr>
                    <tr>
                      <td>Grand Total</td>
                      <td class="a5">232</td>
                    </tr>
                    <tr>
                      <td>Balanced</td>
                      <td class="a6">232</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer b-c-l no-print">        
              <!-- <button type="button" class="btn btn-primary" onclick="return print()">Save & Print</button> -->
              <div class="btn btn-primary" onclick="printthis()">Print</div>
              <button type="button" class="btn btn-danger  distroy-data animation flash" data-dismiss="modal">Cancel</button>
            </div>
          </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<script>
  
</script>


