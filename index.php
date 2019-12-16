<?php  include('DbOperations.php'); ?>
<!DOCTYPE html>
<html>
<head>
      	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
                <?php 
                      	echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                ?>
        </div>
<?php endif ?>
<?php $results = $conn->query( "SELECT * FROM info"); ?>

<table>
       	<thead>
               	<tr>
                    	<th>Name</th>
                        <th>Address</th>
                        <th colspan="2">Action</th>
                </tr>
        </thead>
        
       	<?php while ($row = $results->fetch_assoc()) { ?>
                <tr>
                    	<td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            	<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                        </td>
                        <td>
                            	<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                        </td>
                </tr>
        <?php } ?>
	
	</table>


        <form method="post" action="DbOperations.php" >
                <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" value="">
                </div>
                <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="address" value="">
                </div>
                <div class="input-group">
                        <button class="btn" type="submit" name="save" >Save</button>
                </div>
        </form>
</body>
</html>
