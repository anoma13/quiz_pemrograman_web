<?php

require 'dbconfig/config.php';

$query="SELECT * FROM transaksi, pembeli, barang where transaksi.kd_pembeli=pembeli.kd_pembeli or transaksi.kd_brg=barang.kd_brg";

$hasil = mysqli_query($con ,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transactionpage</title>
	<link rel="shortcut icon" href="css/gambar/a.png">
	<link rel="stylesheet" type="text/css" href="css/style5.css">
</head>
<body>

	 <div class="container">

     <div class="navbar">
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="costumer.php">Customer</a></li>
            <li class="active"><a href="#">Transaction</a></li>
        </ul>
    </div>
            <div class="tab">
            	<h3>Daftar Transaksi</h3>
                <table id="table">
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Tanggal Pembelian</th>
                        <th>Detail Pembeli</th>
                        <th>Detail Barang</th>
                        <th>Harga Barang</th>
                    </tr>
                 
              <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <tr>               
                <td> <?php echo $data['kd_trx'];?></td>
                <td> <?php echo $data['tgl_beli'];?></td>
                <td> <?php echo $data['nm_pembeli'];?></td>
                <td> <?php echo $data['nm_brg'];?></td>
                <td> <?php echo $data['harga'];?></td>
                 </tr>    
       
               <?php } ?>

                </table>
            </div>

            <div class="tab-2">
            <form action="Transaction.php" method="post">
                kode barang :<input type="number" name="kdbrg" >
                Kode pembeli :<input type="number" name="kdpmbl" >
                Tanggal :<input type="date" name="tgl">


                <button id="btn_insert" name="insert" type="submit">Add</button>
            </form>
            

            <?php
               if (isset($_POST['insert'])) {
                    @$tanggal=$_POST['tgl'];
                    @$pbl=$_POST['kdpmbl'];
                    @$brg=$_POST['kdbrg'];

                    if($pbl=="" || $brg==""  || $tanggal=="" )
                    {
                        echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                    }else{
                        $query = "insert into transaksi (kd_pembeli,kd_brg,tgl_beli) values($pbl,$brg,'$tanggal')";
 
                        $query_run = mysqli_query ($con,$query);
                        if($query_run)
                        {
                            echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
                        }
                        else{
                            echo '<script type="text/javascript">alert("Values Not inserted")</script>';
                        }
                    }

                    }
               ?>
                </div>
    </div>	     
</body>
</html>