
<p style="background-color: lightblue">Contacts</p>

<table>
<tr>
	<td>Id</td>
	<td>Name</td>
	<td>Email</td>
</tr>

<?php foreach ($contacts as $contact) :?>
		
	<tr>
		<td><?php echo $contact['Contact']['id']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['name']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>

</table>	

