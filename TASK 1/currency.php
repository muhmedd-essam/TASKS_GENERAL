<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST['Convert'])) {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'datacoinbase';
    $conn = mysqli_connect($host, $user, $password, $db);
    $theFromCoin = $_POST['theFromCoin2'];
    $valueTheFromCoin = "SELECT coinPrice FROM coins WHERE coinName = '$theFromCoin'";
    $valueFrom = mysqli_query($conn, $valueTheFromCoin);

    $theToCoin = $_POST['theToCoin2'];
    $valueTheToCoin = "SELECT coinPrice FROM coins WHERE coinName = '$theToCoin'";
    $valueTo = mysqli_query($conn, $valueTheToCoin);



    $culomn = mysqli_fetch_assoc($valueTo);
    $row = mysqli_fetch_assoc($valueFrom);
    
    $benifits = $culomn['coinPrice'] / $row['coinPrice'];
    
    $amount= floatval($_POST['amountFrom']);


    $convert= $benifits * $amount;
    $convert = floatval($convert);
    $convert = number_format($convert, 2, '.', '');
    

}
?>

<form method='post'>
    <div style="margin-top: 100px;">
        <div style="text-align: center;">
            <input type="text" name="amountFrom"><br>
            <label for="">From</label>
            <select name="theFromCoin2" style="width: 100px;">
                <option value="USD">Dollar</option>
                <option value="EUR">EUR</option>
                <option value="EGP">EGP</option>
                <option value="SAR">SAR</option>
                <option value="KWD">KWD</option>
                <option value="AED">AED</option>
            </select>
        </div>

        <div style="text-align: center;">
            <input type="text" name="amountTo" value="<?php echo $convert; ?>"><br>
            <label for="">To</label>
            <select name="theToCoin2" style="margin-left: 20px; width: 100px;">
                <option value="USD">Dollar</option>
                <option value="EUR">EUR</option>
                <option value="EGP">EGP</option>
                <option value="SAR">SAR</option>
                <option value="KWD">KWD</option>
                <option value="AED">AED</option>
            </select>
            <br><br>
            <button type='submit' name='Convert' id='convert'>Enter if you need to Update</button><br>
        </div>
    </div>
</form>
</body>
</html>