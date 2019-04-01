<?php

$jsonfile = file_get_contents("https://danendra.000webhostapp.com/tugas4/indexserver.php/data/");
$data = json_decode($jsonfile, true);

$data = $data["data"];
	
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>minuman</title>
 <link rel="stylesheet" href="https://gieffaripkl.000webhostapp.com/tugas4/css/bootstrap.min.css">
 
</head>
<body>
  <br>
<div class="container">
 <div class="btn-toolbar">
  <a class="btn btn-primary" href="insertdata.php"><i class="icon-plus"></i> Insert Data</a>
  <div class="btn-group"> </div>
 </div>
</div>
<br>
<br>
<div class="container">
 <div class ="row">
  <div class="col-md-9">
   <table class="table table-striped table-bordered table-hover">
    <tr>
     <th>id</th>
     <th>Nama minuman</th>
     <th>harga</th>
     <th>stok</th>
     
     
     
    </tr>  

    <?php 
    foreach ($data as $row) :   ?>
    <tr>
     
     <td><?=$row["id_minuman"]; ?></td>
     <td><?=$row["nama"]; ?></td>
     <td><?=$row["harga"]; ?></td>
     <td><?=$row["stok"]; ?></td>
    
    

     
     <td>
      <form method="post" action="update.php">
        <input type="hidden" name="id_minuman" value="<?=$row['id_minuman']?>">      
        <button class="btn btn-xs btn-primary" type="submit">Edit</button>
      </form>
      <form method="post" action="delete.php">
        <input type="hidden" name="id_minuman" value="<?=$row['id_minuman']?>">        
        <button class="btn btn-xs btn-danger" type="submit">Delete</button>
      </form>
     </td>
    </tr>
    <?php endforeach; ?>
   </table>
  </div> 
 </div>
</div>
</body>
</html>


