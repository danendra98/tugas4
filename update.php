<?php
$id_minuman = $_POST['id_minuman'];
$jsonfile = file_get_contents("https://danendra.000webhostapp.com/tugas4/indexserver.php/data/$id_minuman");
$data = json_decode($jsonfile, true);

$data = $data["data"][0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 <title>Tutorial CRUD  JSON DATA</title>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <style type="text/css">
 .navbar-default {
  background-color: #3b5998;
  font-size:18px;
  color:#ffffff;
 }
 </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <h4>Minuman</h4>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    </div>

</nav>

<div class="container">
    <div class="row">
  <div class="col-sm-5 col-sm-offset-3"><h3>Add drink</h3>
        <form method="POST" action="">

  
   <div class="form-group">
    <label for="inputFName">nama minuman <?=$data['nama']?></label> <br>
    <input type="text" class="form-control" value="<?=$data['nama']?>" required="required" id="inputFName" name="nama" placeholder="Nama minuman">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group ">
    <label for="inputLName">harga</label>
    <input type="text" class="form-control" required="required" value="<?=$data['harga']?>" id="inputLName" name="harga" placeholder="harga">
    
   </div>
   
   <div class="form-group ">
    <label for="inputLName">stok</label>
    <input type="text" class="form-control" required="required" value="<?=$data['stok']?>" id="inputLName" name="stok" placeholder="stok">
    <input type="hidden" name="id_minuman" value="<?=$data['id_minuman']?>">
          <span class="help-block"></span>
   </div>
  
    
   <div class="form-actions">
     <button type="submit" name="submit" class="btn btn-success">Create</button>
  <?php
    if(isset($_POST['submit'])) {  
      $nama = $_POST['nama'];
      $harga =  $_POST['harga'];
      $stok = $_POST['stok'];
      $id_minuman = $_POST['id_minuman'];
      

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://danendra.000webhostapp.com/tugas4/indexserver.php/update",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "nama=$nama&harga=$harga&stok=$stok&id_minuman=$id_minuman",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "content-type: application/x-www-form-urlencoded",
          "postman-token: 10321e1b-e4bd-45b7-a3b4-376cc9383635"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;die();
      }
}
  ?>
     <a class="btn btn btn-default" href="indexclient.php">Back</a>
   </div>



  </form>
        </div>
      </div>        
</div>
</body>
</html>