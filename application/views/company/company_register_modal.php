<!-- //not used -->
<div class="modal fade" id="registration_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>company/company_registration" method="post" id="idfor-update">
       
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Company Registration Modal</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Company Name</label>
            <input type="hidden" name="company_id" placeholder="this is for update mode">
            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
          </div>
          <div class="form-group">
            <label for="">Company Address</label>
            <input type="text" class="form-control" name="company_address" placeholder="Company Address">
          </div>
          <div class="form-group">
            <label for="">Company Contact</label>
            <input type="text" class="form-control" name="company_contact" placeholder="Contact">
          </div>
          <div class="form-group">
                <label>Registerd Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" data-date-format="yyyy/mm/dd" name="company_date">
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

