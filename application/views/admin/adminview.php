<div class="jumbotron">
<div class="container"><table >
	<tr>
		<th>
			<p>ID</p>
		</th>
		<th>
			<p>Name</p>
		</th>
		<th><p>email</p></th>
		<th>
			<p>userstatus</p>
		</th>
		<th>
			<p>Address</p>
		</th>
		<th>
			<p>Phone</p>
		</th>
		<th>
			<p>Mobile</p>
		</th>
		<th>
			<p>Education</p>
		</th>
		<th>
			<p>Gender</p>
		</th>
	</tr>
	<?php foreach ($users as $user): ?>
		<tr>
			<td>
				<?php echo $user['id']; ?>
			</td>
			<td>
				<?php echo $user['firstname']; ?>
			</td>
			<td>
				<?php echo $user['email']; ?>
			</td>
			<td>
				<?php if($user['userstatus']==1)
				{
					echo "Admin";
				 
				}
				else
				{
					echo "Normal";
				}
				?>
			</td>
			<td>
				<?php echo $user['address']; ?>
			</td>
			<td>
				<?php echo $user['phone']; ?>
			</td>
			<td>
				<?php echo $user['mobile']; ?>
			</td>
			<td>
				<?php echo $user['address']; ?>
			</td>
			<td>
			<?php echo ($user['gender']==1? 'Male':$user['gender']==3? 'Female':'Not Specified') ?>
			</td>
		</tr>
	<?php endforeach; ?>

</table>

<div>
	<p><?= $links ?></p>
</div></div>

</div>




