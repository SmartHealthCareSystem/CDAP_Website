<?php if($tabledata!='No data to retrieve'):?>   
<?php foreach($tabledata  as $r): ?>
 <tr> 
<td><?php echo $r->KioskId ?></td>
<td><?php echo $r->Location ?></td>
<td><?php echo $r->Address ?></td>

</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td>
<?php echo $tabledata ?>
</td></tr>

<?php endif; ?>

     

