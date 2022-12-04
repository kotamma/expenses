<!DOCTYPE html>
<html>
<head>
    <title>FRAAKT Expenses List</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
   
</head>
<body>
    <div class="container">
 
      <div class="row justify-content-md-center">
        <div class="col col-lg-8">
            <h3>FRAAKT Expenses List</h3>
            <?php echo $this->session->flashdata('msg');?>
            <a href="<?php echo site_url('Expenses/index');?>" class="btn btn-success btn-sm">Add New Expense</a><hr/>
            <table class="table table-striped" id="mytable" style="font-size: 14px;">
                <thead>
                    <tr>
                        
                        <th>Expense Category</th>
                        <th>Sub Category</th>
                        <th>currency</th>
                        <th>Amount</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($Expenses->result() as $row):
                            $no++;
                    ?>
                    <tr>

                        <td><?php echo $row->category_name;?></td>
                        <td><?php echo $row->subcategory_name;?></td>
                        <td><?php echo $row->currency;?></td>
                        <td><?php echo number_format($row->amount);?></td>
                        
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
      </div>
 
    </div>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script>
</body>
</html>