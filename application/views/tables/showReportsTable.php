<?php if($tabledata!='No data to retrieve'):?>   
<?php foreach($tabledata  as $r): ?>
 <tr> 
<td><?php echo $r->InvoiceNo ?></td>
<td><?php echo $r->OrderNo ?></td>
<td><?php echo $r->TotalAmount ?></td>
<td><?php echo $r->Date ?></td>
<td><?php echo $r->kioskId ?></td>

</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td>
<?php echo $tabledata ?>
</td></tr>

<?php endif; ?>

     

