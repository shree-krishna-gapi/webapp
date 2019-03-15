// Get Data From Ajax By Id
$('#example1').on('click', '.item-edit', function(){

      var company_id = $(this).attr('data');
 
      $('#myModal').modal('show');
      
      $('#myForm').attr('action', '<?php echo base_url() ?>company/updatecompany');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>company/editcompany',
        data: {company_id: company_id},
        async: false,
        dataType: 'json',
        success: function(data){
          console.log(data);
          $('input[name=company_id]').val(data.company_id);
          $('input[name=company_name]').val(data.company_name);
          $('input[name=company_address]').val(data.company_address);
          $('input[name=company_contact]').val(data.company_contact);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });  
public function editcompany(){
		$company_id = $this->input->get('company_id');
		$this->db->where('company_id', $company_id);
		$query = $this->db->get('company');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

// end of get data from ajax

public function showAllCustomer(){
    $data['customers'] = $this->cm->showAllCustomer();
    echo json_encode($data);
    
  }
  public function createCustomer() {
    $this->cm->addCustomer();
    echo json_encode($msg);

  }
  public function editcustomer(){    
    $result = $this->cm->edit_customer();
    echo json_encode($result);    
  }

  public function updateCustomer() {
    $result =$this->cm->updateCustomer();    
    $msg['type'] = 'update';
    if($result){
      $msg['success'] = 'update';
    }else{
      $msg['error'] = 'error to update';
    }
    echo json_encode($msg);
  }
  public function deleteCustomer($customer_id) {
    $result=$this->cm->deleteCustomerm($customer_id);
    $msg['success'] = false;
    if($result){
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }
}


//**************************************Model
public function showAllCustomer(){
    //$this->db->order_by('created_at', 'desc');
    $query = $this->db->get('customer');        
      return $query->result();
    
  }
  public function addCustomer() {
    $field = array(
        'customer_name'=>$this->input->post('customer_name'),
        'customer_address'=>$this->input->post('customer_address'),
        'customer_contact'=>$this->input->post('customer_contact')
        );        
      $this->db->insert('customer', $field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
  }


  public function editcustomer($customer_id){
    //$customer_id = $this->input->get('customer_id');
    
    $this->db->where('customer_id', $customer_id);
    $query = $this->db->get('customer');
    //print_r($query); exit();
    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return $query->row_array();
    }
    //return $row=$query->row_array();
      
  }

  public function edit_customer(){ 
    
    $customer_id = $this->input->get('customer_id');
    $this->db->where('customer_id', $customer_id);
    $query = $this->db->get('customer');
    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return false;
    }

  }
  public function updateCustomer(){
    $customer_id = $this->input->post('id');
    $field = array(
    'customer_name'=>$this->input->post('name'),
    'customer_address'=>$this->input->post('address'),
    'customer_contact'=>$this->input->post('contact')
    );
    $this->db->where('customer_id', $customer_id);
    $this->db->update('customer', $field);
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }
  public function deleteCustomerm($customer_id) {
    //$customer_id = $this->input->get('customer_id');
    $this->db->where('customer_id',$customer_id);   
    $this->db->delete('customer');
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }


//***************************************View code
 function showCustomer(){
    
      var base = "<?php echo base_url(); ?>customer/showAllCustomer";
      
      $.ajax({

                url:base,
                type:"POST",               
                success: function(response)
                {
                  $('.odd').hide();
                  var data=JSON.parse(response);
                  var no = 1;
                  
                  $.each(data.customers,function(i,v){
                    var sn = no++;
                    var c_id = v.customer_id;

                     $ ("<tr>"+
                        "<td>"+sn+"</td>"+
                        "<td>"+v.customer_name+"</td>"+
                        "<td>"+v.customer_address+"</td>"+
                        "<td>"+v.customer_contact+"</td>"+
                        "<td class='btn-action'>"+
                            "<a href='' class='fa fa-shopping-cart btn btn-warning'></a>"+
                            
                            "<a class='fa fa-edit btn btn-primary' data="+v.customer_id+"></a>"+
                            "<a class='fa fa-trash btn btn-danger delete' data="+v.customer_id+"></a>"+
                        "</td>"+
                        "</tr>").appendTo("#showdatatable");
                     
                  });
                }
                
            });
   }


//create
    $('#btnInsert').click(function(){
   
      var data = $('#insertForm').serialize();
      var url = $('#registration').attr('action');

      $.ajax({
        type: 'POST', 
        url: url,                  
        data: data,
        asyn: false,
        dataType: 'json',
        sucess: function(){
          alert('sucess not fine!!!');
        },
        error: function(){
          $('body').find('#showdatatable').html('');
          $('#insertForm')[0].reset();
          $('#registration').modal('hide'); 
            
        }
      

   });

// edit or get single row data
$('#example1').on('click','.fa-edit',function(){
      var customer_id = $(this).attr('data');

 
      $('#editinfo').modal('show');
      
      
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>customer/editcustomer',
        data: {customer_id: customer_id},
        async: false,
        dataType: 'json',
        success: function(data){
          console.log(data);
          $("input[name=id]").val(data.customer_id);
          $("input[name=name]").val(data.customer_name);
          $("input[name=address]").val(data.customer_address);
          $("input[name=contact]").val(data.customer_contact);
          },
        error: function(){
          alert('Could not Edit Data');
        }
      });
   });

   //update 
   $('body').on('click','#updateBtn',function(){
      var formData = $('#updateForm').serialize();
      var base = '<?php echo base_url() ?>customer/updateCustomer';
      var customer_name = $('input[name=name]');
      var name = $('input[name=name]');
      var address = $('input[name=address]');
      var contact = $('input[name=contact]');
     
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: base,
        data: formData,
        async: false,
        dataType: 'json',
        success: function(response) {
         
          
          if(response.success) {            
            $('#editinfo').modal('hide');
            $('#updateForm')[0].reset();
            $('body').find('#showdatatable').html('');
            empty();
              console.log(response.success);
          }else{
            console.log(response.error);
          }
        },
        error: function() {
          alert("Opps, Something Wrong");
        }

      });

    //delete
     var base = '<?php echo base_url() ?>customer/deleteCustomer/'+customer_id;
      console.log(base);
      $.ajax({
          type: 'ajax',
          method: 'post',
          url: base,
          data: {customer_id:customer_id},
          async: false,
          dataType: 'json',
          success: function(){
            $('body').find('#showdatatable').html('');
            $('#deleteModal').modal('hide');
            showCustomer();
          },
          error: function(){

          }


      });