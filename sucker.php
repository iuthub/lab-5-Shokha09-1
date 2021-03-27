<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucker page</title>
    <link href="webpage/buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php if(isset($_REQUEST["name"])&& isset($_REQUEST["creditCard"])&&
        isset($_REQUEST["section"])&&isset($_REQUEST["card"])) { ?>
<?php
    $name=$_POST['name'];
    $section=$_POST['section'];
    $credit=$_POST['creditCard'];
    $card=$_POST['card'];
    $file = fopen('suckers.txt', 'a');
    $text = $name.';'.$section.';'.$credit.';'.$card."\n";
    fwrite($file, $text);
    fclose($file);
    $filecontents = file_get_contents('suckers.txt');
?>
<?php
if($_SERVER["REQUEST_METHOD"]!="POST") { ?>
    <p>This is not the right method</p>
<?php } else { ?>
    <h2>Thanks, sucker!</h2>
    <p>Your information has been recorded</p>
<dl>
    <dt>Name</dt>
    <dd>
        <?= $_POST['name'] ?>
    </dd>
    <dt>Section</dt>
    <dd>
        <?= $_POST['section'] ?>
    </dd>
    <dt>Credit Card</dt>
    <dd>
        <?= $_POST['creditCard'] ?> (<?= $_POST['card']?>)
    </dd>
</dl>
    <p>
        Here are all the suckers who have submitted:
    </p>
    <pre><?=$filecontents?></pre>
<?php } ?>
<?php } else { ?>
    <h1>
        Sorry
    </h1>
    <p>You didn't fill out the form completely.<a href="webpage/buyagrade.html">Try again?</a></p>
<?php } ?>
</body>
</html>
