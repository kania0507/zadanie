<?php 
    include_once 'classes/db.php';
    include_once 'classes/connection.php';

    

        $obj = new Connection;
        $obj->connect();

        if (isset( $_POST['q']) && isset($_POST['t']))
            $elem = $obj->getConnectionBy($_POST['q'], $_POST['t']);
        else if (!isset( $_POST['q']) && isset($_POST['t']))
            $elem = $obj->getConnectionBy('', $_POST['t']);
        else if (isset( $_POST['q']) && !isset($_POST['t']))
            $elem = $obj->getConnectionBy($_POST['q'], '');
        
        if ($elem){
            for($i=0; $i<count($elem);$i++)
                echo htmlspecialchars($elem[$i]['dep_time'].' '.$elem[$i]['mdest'].' (przez: '.$elem[$i]['mvia1'].', '.$elem[$i]['mvia2'].') - '.$elem[$i]['bname']).'<br>';
        
        }


?>