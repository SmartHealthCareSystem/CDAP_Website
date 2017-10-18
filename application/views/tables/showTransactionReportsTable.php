<?php if($tabledata!='No data to retrieve'):?>   
<?php foreach($tabledata  as $r): ?>
 <tr> 
<td><?php echo $r->OrderId ?></td>
<td><?php echo $r->CustomerId ?></td>
<td><?php echo $r->TotalAmount ?></td>
<td><?php echo $r->DeliveryStatus ?></td>
     <td><?php echo $r->Quantity ?></td>
<td><?php echo $r->PackId ?></td>
<td><?php echo $r->AddedDate ?></td>
<td><?php echo $r->UpdatedDate ?></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td>
<?php echo $tabledata ?>
</td></tr>

<?php endif; ?>

     

