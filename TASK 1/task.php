<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<?php
// add coin


if (isset($_POST['addCoin'])) {
    $host='localhost';
    $user='root';
    $password='';
    $db='datacoinbase';
    $conn=mysqli_connect($host,$user,$password,$db);
    
    $nameCoin = $_POST['nameNewCoin'];
    $priceCoin = $_POST['priceCoin'];

    $Insert = "INSERT INTO coins (coinName, coinPrice) VALUES ('$nameCoin', '$priceCoin')";
    $result = mysqli_query($conn, $Insert);
    if ($result) {
        echo 'Coin added successfully.';
    } else {
        echo 'Error adding coin.';
    }
    }
// update coin   

if (isset($_POST['updateCoin'])) {
    $host='localhost';
    $user='root';
    $password='';
    $db='datacoinbase';
    $conn=mysqli_connect($host,$user,$password,$db);
    
    $selectedCoin=$_POST['theOldNameCoin'];
    $newPrice=$_POST['newPriceCoin'];
    $ubdate="UPDATE coins SET coinPrice='$newPrice' WHERE coinName='$selectedCoin' ";
    $resultUpdate= mysqli_query($conn,$ubdate);
    if ($resultUpdate) {
        echo 'Coin Updated successfully.';
    } else {
        echo 'Error Updating coin.';
    }
    }

// delete coin

    if (isset($_POST['deletePriceCoin'])) {
        $host='localhost';
        $user='root';
        $password='';
        $db='datacoinbase';
        $conn=mysqli_connect($host,$user,$password,$db);
        
        $selectedCoin=$_POST['theOldNameCoin'];
        $newPrice=$_POST['newPriceCoin'];
        $delete="DELETE FROM coins WHERE coinName='$selectedCoin' ";
        $resultUpdate= mysqli_query($conn,$delete);
        if ($resultUpdate) {
            echo 'Coin Updated successfully.';
        } else {
            echo 'Error Updating coin.';
        }

        $query = "SELECT * FROM coins";
        $result = mysqli_query($conn, $query);
        $coins = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $coins[] = $row;
        }
        $jsonData = json_encode($coins);
        mysqli_close($conn);
        }


?>

    <form method='post'>
       <!-- add coin -->
<center>
    <label for="">if you need to add coin, please add the name of coin:</label>
    <input type="text" name='nameNewCoin' ><br>

    <label for="">if you need to add coin, please add the price of coin, Please enter the number for the dollar currency rate:</label>
    <input type="text" name='priceCoin' id='priceCoin'></center><br>
    <center><button type='submit' name='addCoin' id='addCoin'>Enter if you need to add</button><br><br><br><br/></center>
    <!-- update coin -->



    <center>
    <label for="">if you need to update coin, please add the name of coin:</label>
    
    <select name="theOldNameCoin" >
        <option value="USD" >Dollar</option>
        <option value="EUR" >EUR</option>
        <option value="EGP" >EGP</option>
        <option value="SAR" >SAR</option>
        <option value="KWD" >KWD</option>
        <option value="AED" >AED</option>
    </select><br>
    <br>
    
    <label for="">Enter the new price</label>
    <input type="text" name='newPriceCoin' id='newPriceCoin'></center><br>
    <center><button type='submit' name='updateCoin' id='updateCoin'>Enter if you need to Update</button><br></center>
    
    <!-- delete coin -->
    
    <center><button type='submit' name='deletePriceCoin' id='deletePriceCoin'>And Enter here if you need to delete</button><br><br><br></center>
    <center>
<?php

session_start();
$host='localhost';
$user='root';
$password='';
$db='datacoinbase';
$conn=mysqli_connect($host,$user,$password,$db);
$query=mysqli_query($conn,"SELECT * FROM `coins`");
?>
<br><br><br>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    <body>
      
    </body>
    </html>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">idCoin</th>
      <th scope="col">nameCoin</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php while( $row = mysqli_fetch_assoc($query) ):?>
    <tr> 
      <th scope="row"></th>
      <td><?php echo $row['IDcoin']?></td>
      <td><?php echo $row['coinName']?></td>
      <td><?php echo $row['coinPrice']?></td>
      <td><a  class="btn btn-primary" href="login_system/edit.php?id=<?= $row['IDcoin']?>">update</a></td>
      <td><a class="btn btn-danger" href="login_system/php/logout.php?id=<?= $row['IDcoin']?>">delete</a></td>
    </tr>
  <?php endwhile; ?>
  <?php
 
  if (isset($_POST['search'])) {
    $searchValue = $_POST['searchBottum'];

    $query = "SELECT * FROM coins WHERE coinName = '$searchValue'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "<table class='table table-dark'>
              <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>idCoin</th>
                  <th scope='col'>nameCoin</th>
                  <th scope='col'>Price</th>
                </tr>
              </thead>
              <tbody>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <th scope='row'></th>
                <td>" . $row['IDcoin'] . "</td>
                <td>" . $row['coinName'] . "</td>
                <td>" . $row['coinPrice'] . "</td>
                <td><a class='btn btn-primary' href='login_system/edit.php?id=" . $row['IDcoin'] . "'>update</a></td>
                <td><a class='btn btn-danger' href='login_system/php/logout.php?id=" . $row['IDcoin'] . "'>delete</a></td>
              </tr>";
      }
      echo "</tbody>
          </table>";
    } else {
      echo "الاسم غير موجود في قاعدة البيانات.";
    }
  }
  ?>

  <button name="search">search</button>
  <input type="text" name="searchBottum">

    
    
  </tbody>
</table>

    </center>
    



    </form>

</body>
</html>