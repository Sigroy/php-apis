<?php

if (!empty($_GET["name"])) {

    $response = file_get_contents("https://api.agify.io?name={$_GET['name']}");

    $data = json_decode($response, true);

//var_dump($data['results'][0]['gender']);

    $age = $data['age'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
</head>
<body>
<form action="" method="get">

    <?php if (isset($age)): ?>

        Age: <?= $age ?><br>

    <?php endif; ?>

    <label for="name">Name</label>
    <input type="text" name="name" id="name">

    <button>Guess age</button>
</form>
</body>
</html>
