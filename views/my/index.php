тут мой Action Index

<?= $hi ?>
<?php
echo "<pre>";
print_r($names);
echo "</pre>";

foreach($names as $name){
    echo "<br> $name";
}
echo '<br> ты написал: ' . $id;