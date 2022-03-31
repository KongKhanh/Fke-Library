<?php 

    try {

        $database_engine =  [

            'connections' => [
    
                'mysql' => [
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'database' => 'first_form',
                    'username' => 'root',
                    'password' => '',
                ],
            ]
        ];

        $servername = $database_engine['connections']['mysql']['driver'];
    
        $database_host = $database_engine['connections']['mysql']['host'];
    
        $database_username = $database_engine['connections']['mysql']['username'];
    
        $database_password = $database_engine['connections']['mysql']['password'];
    
        $database_name = $database_engine['connections']['mysql']['database'];

        $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_username, $database_password);

        return $conn;
    }
    
    catch (PDOException $e) {

        echo '<p style="color: #FF0000; font-size: 18px;">Error when connecting to database: ' . $e->getMessage() . '</p>';

        return 500;
    }
    
?>