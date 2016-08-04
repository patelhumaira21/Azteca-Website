 
<div id="table_container">
	<table class="table">
	  <thead>
	    <tr>
	      <th>User Details</th>
	      <th>Current Role</th>
	      <th>New Role</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	     <?php
	        $result = dbSelect("SELECT * FROM logins where role!= 'ADMIN'");
	        foreach ($result as $row): ?>
	        <tr class="info">
	          <td><?php echo "Name: ".$row["first_name"]." ".$row["last_name"]."<br/>"."Date of Birth: ".$row["dob"] ; ?></td>
	          <td><label id = "label_role_<?php echo $row['id']?>"><?php echo $row["role"]; ?><label></td>
	          <td><select class="form-control" id="upgrade_level_<?php echo $row['id']?>" name="upgrade_level">
	          		<option>MEMBER</option>
	          		<option>ARTIST</option>
	          		<option>PUBLISHER</option>
	          		<option>ADMIN</option>
	            </select>
	          </td>
	          <td><button type="button" class="btn btn-info" id='upgrade<?php echo $row["id"] ?>' 
	                      onCLick='goToUpgrade(<?php echo $row["id"] ?>)'
	                      name="upgrade<?php echo $row["id"]?>">Change role</button>
	          </td>
	        </tr>

	      <?php endforeach; ?>
	    
	  </tbody>
	</table>
</div>