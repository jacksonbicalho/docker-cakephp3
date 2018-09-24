<?php

if(isset($_SERVER['HTTP_API_KEY'])){

    if ($_SERVER['HTTP_API_KEY'] != 'goiaba') {
        header("HTTP/1.1 401 Unauthorized");
        exit;
    } else {
        echo  "Logado!";

        // insere

        echo "{'status':'302'}";
        // echo "<pre>";
        // print_r( $_POST["data"] );
        // echo "</pre>";

    }

}



