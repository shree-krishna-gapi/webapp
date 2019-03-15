<!-- //not used -->
<div class="modal fade" id="registration_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post" id="idfor-update">
       
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Customer Registration Modal</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">                
              <label>Customer Name</label>
              <input type="hidden" name="customer_id" placeholder="for the update">
              <input type="text" class="form-control" name="customer_name" placeholder="Customer Name">
          </div>
          <div class="form-group">                
              <label>Customer Address</label>
              <input type="text" class="form-control" name="customer_address" placeholder="Customer Address">
          </div>
          <div class="form-group">                
              <label>Customer Contact</label>
              <input type="text" class="form-control" name="customer_contact" placeholder="Customer Contact">
          </div>
          <div class="form-group">                
              <label>Register Date</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" name="customer_date">
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

