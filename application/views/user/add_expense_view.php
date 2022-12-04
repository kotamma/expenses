<!DOCTYPE html>
<html>
<head>
    <title>Add New</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
 
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <h3>FRAAKRT Expenses:</h3>
            <?php echo $this->session->flashdata('msg');?>
            <form action="<?php echo site_url('Expenses/save_expense');?>" method="post">
            <div class="form-group">
                    <label>Select Expenses Category</label>
                    <select class="form-control" name="category" id="category" required>
                        <option value="">No Selected</option>
                        <?php foreach($category as $row){?>
                        <option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
                        <?php }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select SubCategory :</label>
                    <select class="form-control" id="sub_category" name="sub_category" required>
                        <option>No Selected</option>
 
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Currency:</label>
                    <select class="form-control" id="currency" name="currency">
                        <option>No Selected</option>
 
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Enter Amount :</label>
                    <input type="number" value="Enter Amount"name="amount">
                    
                  </div>
                
                <button class="btn btn-success" type="submit">Save Expense</button>
 
            </form>
        </div>
      </div>
 
    </div>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#category').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('Expenses/get_sub_category');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        html += '<option> Not Selected</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].subcategory_id+'>'+data[i].subcategory_name+'</option>';
                        }
                        $('#sub_category').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>
</body>
</html>