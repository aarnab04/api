<?php
    $host = "sql309.epizy.com";
    $user = "epiz_32247134";
    $pass = "d7XavssN24bAGGi";
    $db = "epiz_32247134_json";
    
    $conn = mysqli_connect($host, $user, $pass, $db);

    $response = array();
    $sql = "select * from my_to_do_tb";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id'] = $row['id'];
            $response[$i]['albumId'] = $row['albumId'];
            $response[$i]['title'] = $row['title'];
            $response[$i]['url'] = $row['url'];
            $response[$i]['thumbnailUrl'] = $row['thumbnailUrl'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
    else{
        echo "Database Connection Failed";
    }
?>