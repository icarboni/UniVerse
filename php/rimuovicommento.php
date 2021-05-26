<?php
    $idcommento = (int)$_POST['idcommento'];

    include "connect.php";

    $sql = "DELETE FROM commenti WHERE commenti.id = $idcommento OR commenti.reply_to = $idcommento";
    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else echo "0";

?>