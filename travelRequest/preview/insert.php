<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $mode = $_POST["mode"];
    $air_passport = "";
    $air_expiry_date = "";
    $air_full_name = "";
    $air_proof = "";
    $air_file = "";
    $bus_email = "";
    $bus_age = "";
    $bus_fullname = "";
    $bus_proof = "";
    $bus_file = "";
    $rail_general = "";
    $rail_class = "";
    $rail_full_name = "";
    $rail_proof = "";
    $rail_age = "";
    $rail_file = "";
    $E_id = $_POST['E_id'];
    $email = $_POST['name'];
    $tripType = $_POST['tripType'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $fromCity = $_POST['fromCity'];
    $toCity = $_POST['toCity'];
    $departure_date = $_POST['departure_date'];
    $departure_time = $_POST['departure_time'];
    $return_date = $_POST['return_date'];
    $return_time = $_POST['return_time'];
    $purpose = $_POST['purpose'];
    $billing = $_POST['billing'];
    $from_city_id = $fromCity;

    if ($mode === "Air") {
        $air_passport = $_POST["air_passport"];
        $air_expiry_date = $_POST["air_expiry_date"];
        //$mode="Air";
        //$air_file = $_POST["air_file"];
        //$air_proof = $_POST["air_proof"];
        $air_full_name = $_POST["air_full_name"];
    } else if ($mode === "Bus") {
        $bus_email = $_POST["bus_email"];
        $bus_age = $_POST["bus_age"];
        //$mode = "Bus";
        $bus_fullname = $_POST["bus_fullname"];
        // $bus_proof = $_POST["bus_proof"];
        // $bus_file=$_POST["bus_file"];
    } else if ($mode === "Rail") {
        $rail_general = $_POST["reil_general"];
        $rail_class = $_POST["rail_class"];
        $rail_full_name = $_POST["rail_full_name"];
        //$mode = "Rail";
        //$rail_proof = $_POST["rail_proof"];
        $rail_age = $_POST["rail_age"];
    }



    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'VeeTech';
    //$flag_nextpage = false;
    $connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_error()) {
        exit('Error connceting to the database ');
    }

    $from_city_query = "SELECT * from travel_request_table";
    $result = $connect->query($from_city_query);

    //echo mysqli_num_rows($result);
    $result = mysqli_num_rows($result);

    echo $result;



    // Create connection
    $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $accompanying_count = 5;
    $opt_for_advance = 1;
    $advance_amount = 1234;
    $employee_id = 'E1';
    $purpose_of_visit_id = $purpose;
    $billing_entity_id = $billing /* value of $billing variable */;
    $travel_mode_id = $mode /* value of $mode variable */;
    $status_id = 'Ongoing';
    $from_city_id = $fromCity /* value of $fromCity variable */;
    $to_city_id = $toCity /* value of $toCity variable */;
    $trip_type = $tripType /* value of $tripType variable */;


    
    // Mode 
    $sql_mode = "SELECT travel_mode_id from travel_mode_table where travel_mode=?";
    // Prepare statement
    $stmt_mode = $conn->prepare($sql_mode);
    $stmt_mode->bind_param("s", $mode);
    $stmt_mode->execute();
    $travel_mode_id=$stmt_mode->fetch();
    $conn->close();

    $conn1 = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    // Type 
    $sql_type = "SELECT trip_type_id from trip_type_table where trip_type=?";
    // Prepare statement
    $stmt_type = $conn1->prepare($sql_type);
    $stmt_type->bind_param("s", $trip_type);
    $stmt_type->execute();
    $trip_type=$stmt_type->fetch();
    $conn1->close();

    $conn2 = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
     
    // echo "\nOUTPUT: ".$trip_type;
    // billing
    $sql_billing = "SELECT billing_entity_id from billing_entity_table where billing_entity=?";
    // Prepare statement
    $stmt_billing = $conn2->prepare($sql_billing);
    $stmt_billing->bind_param("s", $billing);
    $stmt_billing->execute();
    $billing_entity_id=$stmt_billing->fetch();
    // echo "Output".$billing_entity_id;
    $conn2->close();

    $conn3 = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // purpose
    $sql_purpose = "SELECT id  from purpose_of_visit_table where purpose_of_visit =?";
    // Prepare statement
    $stmt_purpose = $conn3->prepare($sql_purpose);
    $stmt_purpose->bind_param("s", $purpose);
    $stmt_purpose->execute();
    $purpose_of_visit_id=$stmt_purpose->fetch();
    // echo "Output".$purpose_of_visit_id;
    // echo "Ou".$billing;
    $conn3->close();

    $conn4 = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // status
    $sql_status = "SELECT id from status_table where status_id=?";
    // Prepare statement
    $stmt_status = $conn4->prepare($sql_status);
    $stmt_status->bind_param("s", "Ongoing");
    $stmt_status->execute();
    $status_id=$stmt_status->fetch();
    // echo "Output".$status_id;
    $conn4->close();

    $conn5 = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


    $sql = "INSERT INTO request_table (trip_id,departure_date,departure_time,return_date,return_time,accompanying_count,opt_for_advance,advance_amount,employee_id,purpose_of_visit_id,billing_entity_id,travel_mode_id,status_id,from_city_id,to_city_id,trip_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // // Prepare statement
    // $stmt = $conn->prepare($sql);
    // // Bind parameters to placeholders
    // $stmt->bind_param("sssssissssssssss", $result, $departure_date, $departure_time, $return_date, $return_time, $accompanying_count, $opt_for_advance, $advance_amount, $employee_id, $purpose_of_visit_id, $billing_entity_id, $travel_mode_id, $status_id, $from_city_id, $to_city_id, $trip_type);
    // echo var_dump($stmt);
    // $stmt->execute();


    // // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // // Close connection
    $stmt->close();
    $conn5->close();
}