<?php

require 'dbconfig/config.php';
    @$kd_brg="";
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

         <?php
                if(isset($_POST['search'])){
                    //echo '<script type="text/javascript">alert("Go button Clicked")</script>';
                    
                    $kd_brg = $_POST['kd_brg'];
                    
                    if($kd_brg=="")
                    {
                        echo '<script type="text/javascript">alert("Enter Kode to get prodcut details")</script>';
                    }
                    else
                    {
                        $query = "select * from barang where kd_brg=$kd_brg";
                        $query_run = mysqli_query($con,$query);
                        if($query_run)
                        {
                            if(mysqli_num_rows($query_run)>0)
                            {
                                $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                                @$kd_brg =$row['kd_brg'];
                                @$nm_brg=$row['nm_brg'];
                                @$merk=$row['merk'];
                                @$type=$row['type'];
                                @$harga=$row['harga'];
                                @$stock=$row['stock'];
                            }
                            else{
                                echo '<script type="text/javascript">alert("Invalid Kode")</script>';
                            }
                        }
                        else{
                            echo '<script type="text/javascript">alert("Error in query")</script>';
                        }
                        
                    }
                    
                }
            ?>


            <div class="tab-2">
               <form action="productgo.php" method="post">
                <script src="java/code.js"></script>
                <div class="btn">
                    <button name="search" type="submit">Cari Kode...</button>
                  <div class="pilih">
                    <select name="Pilih">
                        <option value="">Pilih ...</option>
                        <option value="1">Nama Barang</option>
                        <option value="2">Merk</option>
                        <option value="3">Type</option>
                        <option value="4">Harga</option>
                    </select>
                </div>
                </div>

                Kode :<input type="number" name="kd_brg" id="kode" value="<?php echo @$_POST['kd_brg'];?>">
                Nama Barang :<input type="text" name="nm_brg" id="barang" value="<?php echo $nm_brg;?>">
                Merk :<input type="text" name="merk" id="merk" value="<?php echo $merk;?>">
                Type :<input type="text" name="type" id="type" value="<?php echo $type;?>">
                Harga :<input type="text" name="harga" id="harga" value="<?php echo $harga;?>">
                Stock :<input type="text" name="stock" id="stock" value="<?php echo $stock;?>">

                <button id="btn_update" name="update" type="submit">Update</button>
                <button id="btn_delete" name="delete" type="submit">Delete</button>
               </form>

               <?php
                if(isset($_POST['delete']))
                    {
                        if($_POST['kd_brg']=="")
                    {
                        echo '<script type="text/javascript">alert("Enter Kode to delete product")</script>';
                    }

                    else{
                        $kd_brg = $_POST['kd_brg'];
                        $query = "delete from barang WHERE kd_brg=$kd_brg";
                        $query_run = mysqli_query($con,$query);
                        if($query_run)
                        {
                            echo '<script type="text/javascript">alert("Nilai berhasil diDelete refresh terus")</script>';
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("Error in query")</script>';
                        }
                    }

                }

                else if(isset($_POST['update']))
                {
                    //echo '<script type="text/javascript">alert("Update Clicked")</script>';
                    if($_POST['kd_brg']=="" || $_POST['nm_brg']=="" || $_POST['merk']=="" || $_POST['type']=="" || $_POST['harga']=="" || $_POST['stock']=="")
                    {
                        echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
                    }
                    else
                    {
                        @$kd_brg =$_POST['kd_brg'];
                        @$nm_brg=$_POST['nm_brg'];
                        @$merk=$_POST['merk'];
                        @$type=$_POST['type'];
                        @$harga=$_POST['harga'];
                        @$stock=$_POST['stock'];
                        
                        $query = "update barang SET kd_brg=$kd_brg,nm_brg='$nm_brg',merk='$merk',type='$type',harga='$harga',stock='$stock' WHERE kd_brg=$kd_brg";
                            
                        $query_run = mysqli_query($con,$query);
                
                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("Nilai berhasil diUpdate refresh terus")</script>';
                            }
                            else{
                                echo '<script type="text/javascript">alert("Error")</script>';
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