<?php if($tabledata!='No data to retrieve'):?>   
<?php foreach($tabledata  as $r): ?>
 <tr> 
<td><?php echo $r->FirstName ?></td>
<td><?php echo $r->LastName ?></td>
<td><?php echo $r->Email ?></td>
<td><?php echo $r->Password ?></td>
<td><?php echo $r->Sex ?></td>
<td><?php echo $r->Age ?></td>
<td><?php echo $r->Address ?></td>
<td><?php echo $r->ContactNo ?></td>
<td><?php echo $r->RfidCode ?></td>
<td><?php echo $r->RegisterAt ?></td>
<td><?php echo $r->UpdateAt ?></td>
<td><?php echo $r->FcmToken ?></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td>
<?php echo $tabledata ?>
</td></tr>

<?php endif; ?>

     

