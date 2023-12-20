<?php
    if(isset($_POST['action']) && $_POST['action'] == 'loadTerritorios') {
        loadTerritorios();
    }

    if(isset($_POST['action']) && $_POST['action'] == 'loadRuas' && isset($_POST['territorioID'])) {
        loadRuas($_POST['territorioID']);
    }

    if(isset($_POST['action']) && $_POST['action'] == 'loadCasas' && isset($_POST['ruaID'])) {
        loadCasas($_POST['ruaID']);
    }

    if(isset($_POST['action']) && $_POST['action'] == 'registrarCasa' && isset($_POST['territorioID']) && isset($_POST['ruaID']) && isset($_POST['numeroCasa'])) {
        registrarCasa($_POST['territorioID'], $_POST['ruaID'], $_POST['numeroCasa']);
    }

    if(isset($_POST['action']) && $_POST['action'] == 'excluirCasa' && isset($_POST['territorioID']) && isset($_POST['ruaID']) && isset($_POST['numeroCasaID'])) {
        excluirCasa($_POST['territorioID'], $_POST['ruaID'], $_POST['numeroCasaID']);
    }

    function loadTerritorios() {
        include("../includes/connection.php");

        $sql = "CALL sp_select_territorio";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            // Fetch data from $result and store it in an array
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Encode the data array to JSON
            $jsonResponse = json_encode($data);

            // Set appropriate headers and return JSON response
            header('Content-Type: application/json');
            echo $jsonResponse;
        } else {
            // Handle database query error
            echo 'erro';
        }
    }

    function loadRuas($territorioID) {
        include("../includes/connection.php");

        $sql = "CALL sp_select_territorio_rua($territorioID)";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            // Fetch data from $result and store it in an array
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Encode the data array to JSON
            $jsonResponse = json_encode($data);

            // Set appropriate headers and return JSON response
            header('Content-Type: application/json');
            echo $jsonResponse;
        } else {
            // Handle database query error
            echo 'erro';
        }
    }

    function loadCasas($ruaID) {
        include("../includes/connection.php");

        $sql = "CALL sp_select_territorio_rua_casa($ruaID)";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            // Fetch data from $result and store it in an array
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Encode the data array to JSON
            $jsonResponse = json_encode($data);

            // Set appropriate headers and return JSON response
            header('Content-Type: application/json');
            echo $jsonResponse;
        } else {
            // Handle database query error
            echo 'erro';
        }
    }

    function registrarCasa($territorioID, $ruaID, $numeroCasa) {
        include("../includes/connection.php");

        $sql = "CALL sp_insert_territorio_rua_casa($territorioID, $ruaID, '$numeroCasa')";
        $result = $connection->query($sql);

        if ($result) {
            echo 'sucesso';
        } else {
            // Handle database query error
            echo 'erro';
        }
    }

    function excluirCasa($territorioID, $ruaID, $numeroCasaID) {
        include("../includes/connection.php");

        $sql = "CALL sp_delete_territorio_rua_casa($territorioID, $ruaID, $numeroCasaID)";
        $result = $connection->query($sql);

        if ($result) {
            echo 'sucesso';
        } else {
            // Handle database query error
            echo 'erro';
        }
    }
?>