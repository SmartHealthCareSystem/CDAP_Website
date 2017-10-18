
<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-table"></i> Sales Report</h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Reports</a></li>
      <li class="active">Sales</li> 
    </ul>
<div class="well well-style">
    


<div class="table-responsive">          
  <table class="table table-hover" id="salestb">
    <thead class="thead-default">
      <tr>
        <th>Invoice Number</th>
        <th>Order Number</th>
        <th>Total Amount</th>
        <th>Date</th>
        <th>KioskID</th>
      </tr>
    </thead>
    <tbody>
       <?php          
          
           
            $data['tabledata']=$result;
          
            $this->load->view('tables/showReportsTable',$data);
          
        ?>
    </tbody>
  </table>
  </div>
 </div>
</div>


