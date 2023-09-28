var coinsData = <?php echo $jsonData; ?>;
        var select = document.getElementById("theOldNameCoin");
        console.log(coinsData)

        for (var i = 0; i < coinsData.length; i++) {
            var option = document.createElement("option");
            option.value = coinsData[i].coinPrice;
            option.text = coinsData[i].coinName;
            select.appendChild(option);
        }