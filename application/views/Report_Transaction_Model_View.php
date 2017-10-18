
<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-table"></i> Transaction Report</h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Reports</a></li>
      <li class="active">Transaction</li> 
    </ul>
<div class="well well-style">
    


<div class="table-responsive">          
  <table class="table table-hover" id="salestb">
    <thead class="thead-default">
      <tr>
        <th>OrderId</th>
        <th>CustomerId</th>
        <th>TotalAmount</th>
        <th>DeliveryStatus</th>
        <th>Quantity</th>
        <th>PackId</th>
        <th>AddedDate</th>
        <th>UpdatedDate</th>
      </tr>
    </thead>
    <tbody>
       <?php          
          
           
            $data['tabledata']=$result;
          
            $this->load->view('tables/showTransactionReportsTable',$data);
          
        ?>
    </tbody>
  </table>
  </div>
 </div>
</div>


