
<!--`DrugId`, `DrugName`, `Dosage`, `Price`, `Formulation`, `Manufacturer`, `ManufactureDate`, `ExpiryDate`-->


<?php if($tabledata!='No data to retrieve'):?>   
<?php foreach($tabledata  as $r): ?>
 <tr> 
<td><?php echo $r->DrugId ?></td>
<td><?php echo $r->DrugName ?></td>
<td><?php echo $r->Dosage ?></td>
<td><?php echo $r->Price ?></td>
<td><?php echo $r->Formulation ?></td>
<td><?php echo $r->Manufacturer ?></td>

</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td>
<?php echo $tabledata ?>
</td></tr>

<?php endif; ?>
