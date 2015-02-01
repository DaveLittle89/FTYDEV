<?php
print "CONTENT_TYPE: " . $_SERVER['CONTENT_TYPE'] . "<BR />";
$data = file_get_contents('php://input');
print "DATA: <pre>";
var_dump($data);
var_dump($_POST);
print "</pre>";
?>
<form method="post">

    <input type="text" name="name" value="ok" />
    <input type="submit" name="submit" value="submit" />

</form>
