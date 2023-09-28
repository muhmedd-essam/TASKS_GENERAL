<?php

if (isset($_POST['valid'])) {
    $DNA = array("A", "C", "G", "T");

    $inputDna = $_POST['validText'];
    $upperInputDna = strtoupper($inputDna);
    $splitInputDna = str_split($upperInputDna);
    $found = false;

    $count1 = 0;
    foreach ($splitInputDna as $x) {
        $count1++;
        if (!in_array($x, $DNA)) {
            echo "<pre>";
            echo "The $x  at number $count1 not valid in DNA ";
            $found = true;
        }
    };
    if ($found === false) {
        echo "the DNA is Valid";
        echo"<pre>";
        $count = 0;
        foreach($splitInputDna as $x){
            $count++;
        }
        echo "the lenth of DNA is $count";
        echo"<pre>";

        for ($i = 0; $i < count($splitInputDna); $i++) {
            $splitInputDna[$i] = str_replace("T", "U", $splitInputDna[$i]);
        }
        $theRNA = implode("", $splitInputDna);
        echo"<pre>";

        echo "The RNA = $theRNA ";


    
    }else{
        echo"<pre>";
        echo "Overall , the DNA not valid, please try again";

    }
}

    





?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validDna</title>
</head>
<body>
    <form action="" method="post">

        <input type="text" name="validText">
        <button name="valid">DNA Validation</button>
    
    
    
    </form>
</body>
</html>