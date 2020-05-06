<?php

require 'dbconfig/config.php';
    @$nm_pembeli="";
    @$jenis_kelamin="";
    @$alamat="";
    @$kota="";

$query= "SELECT * FROM pembeli";

$hasil = mysqli_query($con ,$query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Costumerpage</title>
	<link rel="shortcut icon" href="css/gambar/cultures.png">
	<link rel="stylesheet" type="text/css" href="css/style4.css">
</head>
<body>

	 <div class="container">

    <div class="navbar">
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="product.php">Product</a></li>
            <li class="active"><a href="#">Customer</a></li>
            <li><a href="transaction.php">Transaction</a></li>
        </ul>
    </div>  

            <div class="tab">
            	<h3>ADD Daftar Costumer</h3>
                <table id="table">
                    <tr>
                        <th>Kode Pembeli</th>
                        <th>Nama Pembeli</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                    </tr>
                 
               <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <tr>
                <td> <?php echo $data['kd_pembeli'];?></td>
                <td> <?php echo $data['nm_pembeli'];?></td>
                <td> <?php echo $data['jenis_kelamin'];?></td>
                <td> <?php echo $data['alamat'];?></td>
                <td> <?php echo $data['kota'];?></td>
                </tr>    
       
            <?php } ?>
                </table>
            </div>

            <div class="tab-2">
             <form action="costumer.php" method="post">
                <script src="java/codec.js"></script>

                Nama Pembeli :<input type="text" name="nm_pembeli" id="pembeli" value="<?php echo $nm_pembeli;?>">
                Jenis Kelamin :<input type="text" name="jenis_kelamin" id="jenis" value="<?php echo $jenis_kelamin;?>">
                Alamat :<input type="text" name="alamat" id="alamat" value="<?php echo $alamat;?>" >
                Kota :<input type="text" name="kota" id="kota" value="<?php echo $kota;?>">
                
                <button id="btn_insert" name="insert" type="submit" >Add</button>
                <a href="costumergo.php">Update</a>
                <a href="costumergo.php">Delete</a>
            </form>

             <?php
               if (isset($_POST['insert'])) {
                    @$nm_pembeli=$_POST['nm_pembeli'];
                    @$jenis_kelamin=$_POST['jenis_kelamin'];
                    @$alamat=$_POST['alamat'];
                    @$kota=$_POST['kota'];

                    if($nm_pembeli=="" || $jenis_kelamin=="" || $alamat=="" || $kota=="" )
                    {
                        echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                    }else{
                        $query = "insert into pembeli (nm_pembeli,jenis_kelamin,alamat,kota) values('$nm_pembeli','$jenis_kelamin','$alamat','$kota')";
    
                        $query_run = mysqli_query ($con,$query);
                        if($query_run)
                        {
                            echo '<script type="text/javascript">alert("Nilai berhasil diInsert refresh terus")</script>';
                        }
                        else{
                            echo '<script type="text/javascript">alert("Values Not inserted")</script>';
                        }
                    }

                    }

                  
               ?>

    <div class="animationarea">

        <ul class="boxarea">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
        </ul>

    </div>
            </div>
        </div>      

</body>
</html>