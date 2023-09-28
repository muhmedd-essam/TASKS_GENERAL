<!DOCTYPE html>
<html>
<head>
    <title>Create Options using JavaScript</title>
</head>
<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'datacoinbase';
    $conn = mysqli_connect($host, $user, $password, $db);

    $query = "SELECT * FROM coins";
    $result = mysqli_query($conn, $query);
    $coins = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $coins[] = $row;
    }

    $jsonData = json_encode($coins);

    mysqli_close($conn);
    ?>

<select name="theOldNameCoin" id="mySelect" >
    <script>
        var coinsData = <?php echo $jsonData; ?>;
        var select = document.getElementById("mySelect");
        console.log(coinsData)

        for (var i = 0; i < coinsData.length; i++) {
            var option = document.createElement("option");
            option.value = coinsData[i].coinPrice;
            option.text = coinsData[i].coinName;
            select.appendChild(option);
        }
    </script>
    </select>
    
</body>
</html>