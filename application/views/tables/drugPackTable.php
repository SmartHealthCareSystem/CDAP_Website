<?php if($tabledata!='No data to retrieve'):?>   
<?php foreach($tabledata  as $r): ?>
 <tr> 
<td><?php echo $r->DrugPackId ?></td>
<td><?php echo $r->DrugPackName ?></td>
<td><?php echo $r->UnitPrice ?></td>
<td><?php echo $r->Instruction ?></td>
<td><?php echo $r->Image ?></td>
     
     
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td>
<?php echo $tabledata ?>
</td></tr>

<?php endif; ?>

     

