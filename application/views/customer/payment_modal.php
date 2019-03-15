<div class="modal fade" id="payment-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>/customer/repaid_payment" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Amount Paid</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-5">
                <label>Customer Name &nbsp;:</label>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-7">
                <p id="customer_name"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-5">
                <label>Company &nbsp;:</label>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-7">
                <p id="company_name"></p>
              </div>
            </div>
          </div>    
          <div class="form-group">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-5">
                <label>Paidable Amount &nbsp;:</label>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-7">
                <p id="total_cr"></p>
              </div>
            </div>
          </div>     
          <div class="form-group">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-5">
                <label for="">Amount Paid &nbsp;:</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-5">

                <input type="hidden" name="sales_id" id="sales_id" value="">
                <input type="hidden" name="company_id" id="company_id" value="">
                <input type="hidden" name="customer_id" id="customer_id" value="">
                <input type="number" class="form-control" name="repaid" placeholder="Now Paid Amount">
              </div>
              <div class="col-md-3 col-sm-2 col-xs-2"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-5">
                <label>Date of Paid &nbsp;:</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-5">
                <input type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" name="repayment_date">
              </div>
            </div>
          </div> 
         
        </div>
        <div class="modal-footer">        
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Calcel</button>
        </div>
      
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>