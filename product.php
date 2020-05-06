<?php

require 'dbconfig/config.php';
    @$nm_brg="";
    @$merk="";
    @$type="";
    @$harga="";
    @$stock="";

$query= "SELECT * FROM barang";

$hasil = mysqli_query($con ,$query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Productpage</title>
	<link rel="shortcut icon" href="css/gambar/supplier.png">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
</head>
<body>

	<div class="container">

    <div class="navbar">
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li class="active"><a href="#">Product</a></li>
            <li><a href="costumer.php">Customer</a></li>
            <li><a href="transaction.php">Transaction</a></li>
        </ul>
    </div>  
            <div class="tab">
             <h3>Daftar Produk Kami</h3>
                <table id="table">
                    <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Type</th>
                        <th>Harga</th>
                        <th>Stock</th>
                    </tr>
                 
               <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <tr>
                <td> <?php echo $data['kd_brg'];?></td>
                <td> <?php echo $data['nm_brg'];?></td>
                <td> <?php echo $data['merk'];?></td>
                <td> <?php echo $data['type'];?></td>
                <td> <?php echo $data['harga'];?></td>
                <td> <?php echo $data['stock'];?></td>
                
                 </tr>    
       
            <?php } ?>
            </table>
        </div>

            <div class="tab-2">
               <form action="product.php" method="post">
                <script src="java/code.js"></script>

                Nama Barang :<input type="text" name="nm_brg" id="barang" value="<?php echo $nm_brg;?>">
                Merk :<input type="text" name="merk" id="merk" value="<?php echo $merk;?>">
                Type :<input type="text" name="type" id="type" value="<?php echo $type;?>">
                Harga :<input type="text" name="harga" id="harga" value="<?php echo $harga;?>">
                Stock :<input type="text" name="stock" id="stock" value="<?php echo $stock;?>">
                
                <button id="btn_insert" name="insert" type="submit">Add</button>
                <a href="productgo.php">Update</a>
                <a href="productgo.php">Delete</a>
               </form>

               <?php
               if (isset($_POST['insert'])) {
                    @$nm_brg=$_POST['nm_brg'];
                    @$merk=$_POST['merk'];
                    @$type=$_POST['type'];
                    @$harga=$_POST['harga'];
                    @$stock=$_POST['stock'];

                    if($nm_brg=="" || $merk=="" || $type=="" || $harga=="" || $stock=="")
                    {
                        echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                    }else{
                        $query = "insert into barang(nm_brg,merk,type,harga,stock) values('$nm_brg','$merk','$type','$harga','$stock')";
 
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