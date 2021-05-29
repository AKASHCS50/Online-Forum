 <?php

    // $db = mysqli_connect(getenv(''), 'root', '', 'discussx') or die('Could not connect to database');
    $db = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME')) or die('Could not connect to database');

   ?>