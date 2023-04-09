<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Location:http://localhost/VeeTech/login/login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cnt = 0;
  $email = $_POST['name'];
  if (isset($_POST['start'])) {
    $cnt = $_POST['start'];
  }
  $E_id = $_POST['E_id'];
  $Emp_id = $_POST['Emp_id'];
  $DATABASE_HOST = 'localhost';
  $DATABASE_USER = 'root';
  $DATABASE_PASS = '';
  $DATABASE_NAME = 'VeeTech';
  $flag_nextpage = false;
  $connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_error()) {
    exit('Error connceting to the database ');
  }
  $sql = "SELECT * from travel_request_table WHERE Employee_id = '$E_id'";
  $result = $connect->query($sql);
  $total = mysqli_num_rows($result);

  if ($total % 6 == 0) {
    $total = $total / 6;
  } else {
    $total = (int)($total / 6);
    $total = $total + 1;
  }

  $curr = $cnt;
  if ($curr % 6 == 0) {
    $curr = $curr / 6;
  } else {
    $curr = (int)($curr / 6);
    $curr = $curr + 1;
  }
  $sql_page = "SELECT * from travel_request_table WHERE employee_id = '$E_id' LIMIT 6 OFFSET $cnt";
  $result2 = $connect->query($sql_page);
  $total2 = mysqli_num_rows($result2);
  //$row = mysqli_fetch_assoc($result);
  // $from = mysqli_fetch_assoc($from_city);
  // $to = mysqli_fetch_assoc($to_city);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Travel Request</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <section class="sidebar">
    <img class="logo" src="images/image 128.png">
    <img class="logo2" src="images/image 128.png">
    <div class="nav-header">
      <br><br>
      <i class="bx bx-menu btn-menu" id="menuBtn"></i>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class="bx bx-taxi"></i>
          <span class="title">Travel Request</span>
        </a>
        <span class="tooltip">Travel Request</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-edit"></i>
          <span class="title">Travel Reimbursement</span>
        </a>
        <span class="tooltip">Travel Reimbursement</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-globe"></i>
          <span class="title">Broadband </span>
        </a>
        <span class="tooltip">Broadband Reimbursement</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-wallet-alt"></i>
          <span class="title">Onboard</span>
        </a>
        <span class="tooltip">Onboard</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bxs-bell"></i>
          <span class="title">Notification</span>
        </a>
        <span class="tooltip">Notification</span>
      </li>

      <li>
        <a href="#">
          <i class="bx bxs-cog"></i>
          <span class="title">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>

      <li>
        <a href="http://localhost/VeeTech/login/login.php">
          <i class="bx bx-log-out"></i>
          <span class="title">Log Out</span>
        </a>
        <span class="tooltip">Log Out</span>
      </li>
    </ul>
    <button class='log_out'>Log-out</button>

  </section>
  <section class="home">
    <div class="header">
      <img class="ellipse" src="images/Ellipse 356.png">
      <div class="i-text">TRAVEL REQUEST</div>
      <h4 id="filter">Filter</h4>

      <select name="triptype" id="triptype">
        <option value="">Trip Type</option>
        <option value="domestic">Domestic</option>
        <option value="international">International</option>
      </select>
      <script>
        document.getElementById("triptype").submit();
        console.log("Submit")
      </script>
      <select name="status" id="status">
        <option value="">Status</option>
        <option value="Accepted">Accepted</option>
        <option value="Rejejcted">Rejected</option>
        <option value="Ongoing">Ongoing</option>
      </select>
      <input value="date" type="date" id="date" placeholder="date">
      <button class='add-req'><a onclick="addproduct()" style="text-decoration: none; color: black;">+ Add Request</a></button>
    </div>
    <form action="../Details/details.php" id="addrequest" method="POST">
      <input type="hidden" name='E_id' value='<?php echo $E_id; ?>'>
      <input type="hidden" name='Emp_id' value='<?php echo $Emp_id; ?>'>
      <input type="hidden" name='name' value='<?php echo $email; ?>'>
    </form>
    <div class="container-fluid" id="table">
      <div class=" row rounded-pill align-items-center " style="margin-inline: auto;margin-top: 20;" id="thead">
        <div class="col-2" id="trip_no">TRIP NO</div>
        <div class="col-3" id="from">FROM</div>
        <div class="col-3" id="to">TO</div>
        <div class="col-2" id="status1">STATUS</div>
        <div class="col" id="action">ACTION</div>
        <div class="col" id="dropdown"></div>
      </div>
      <?php while ($row = $result2->fetch_assoc()) {
        $tripid = $row['trip_id'];
        $message_approve = "";
        $message_rejected = "";
        $message_ongoing = "";
        $sql_from_city = "SELECT city_name from city_table where city_id = (Select from_city_id from travel_request_table where trip_id = '$tripid')";
        //echo $sql_from_city;
        $sql_to_city = "SELECT city_name from city_table where city_id = (Select to_city_id from travel_request_table where trip_id = '$tripid')";

        $sql_trip_type="SELECT trip_type from trip_type_table where trip_type_id=(SELECT trip_type from travel_request_table WHERE trip_id='$tripid')";
        $trip_type = $connect->query($sql_trip_type);
        $from_city = $connect->query($sql_from_city);
        $to_city = $connect->query($sql_to_city);
        $from = mysqli_fetch_assoc($from_city);
        $to = mysqli_fetch_assoc($to_city);
        $trip = mysqli_fetch_assoc($trip_type);
        // $message_approve = "Approved";
        if ($row['status_id'] == "1") {
          $message_approve = "Approved";
        } else if ($row["status_id"] == "3") {
          $message_rejected = "Rejected";
        } else {
          $message_ongoing = "Ongoing";
        }

      ?>
        <div class="row rounded " style="margin-inline: auto;margin-top: 20;" id="tbody">
          <div class="col-2" id="trip_no"><?php echo"TI"; echo $row['trip_id'] ?><div class="type"><?php echo $trip['trip_type']; ?></div>
          </div>
          <div class="col-3" id="from"><?php echo $from['city_name']; ?> <div class="time"><?php echo $row['departure_date'], " ", $row['departure_time'] ?></div>
          </div>
          <div class="col-3" id="to"><?php echo $to['city_name'] ?><div class="atime"><?php echo $row['return_date'], " ", $row['return_time'] ?></div>
          </div>
          <div class="col-2" id="status1" style="margin-top: 10px;font-weight:bold;"><?php echo "<font color=skyblue;> $message_ongoing </font>";
                                                                                      echo "<font color=#FF0000;> $message_rejected </font>";
                                                                                      echo "<font color=#04C923;> $message_approve </font>" ?></div>
          <div class="col" id="action" style="height: min-content;"><i class="bx bxs-pencil bx-xs"></i></div>
          <div class="col" id="dropdown" style="margin-top: 10px;"></div>
        </div>
      <?php } ?>
      <form id="myFormLeft" method="post">
        <input type="hidden" name='name' value='<?php echo $email ?>'>
        <input type="hidden" name='E_id' value='<?php echo $E_id ?>'>
        <input type="hidden" name='start' value='<?php echo $cnt - 6 ?>'>
      </form>
      <form id="myFormRight" method="post">
        <input type="hidden" name='name' value='<?php echo $email ?>'>
        <input type="hidden" name='E_id' value='<?php echo $E_id ?>'>
        <input type="hidden" name='start' value='<?php echo $cnt + 6 ?>'>
      </form>
      <div style=" display: flex;justify-content: center;align-items: center; width: 100%; margin-top: 20px;">
        <?php if ($cnt > 0) { ?> <h5 style="cursor: pointer;" onclick="submitLeft()">&lt;&nbsp;</h5> <?php } ?><h5 style="background-color: white; padding-inline: 5px;"><?php echo $curr + 1 ?></h5>
        <h5>/</h5>
        <h5><?php echo $total ?></h5> <?php if ($cnt < $total) { ?><h5 style="cursor: pointer;" onclick="submitRight()">&nbsp;&gt;</h5><?php } ?>

      </div>
    </div>

    </div>

  </section>

  <script>
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");
    const logo = document.querySelector(".logo")
    const logo2 = document.querySelector(".logo2")

    btn_menu.addEventListener("click", function() {
      side_bar.classList.toggle("expand");
      logo2.classList.toggle("hidden");
      logo.classList.add("logo");
      logo.classList.toggle("unhide")
      changebtn();
    });

    function addproduct() {
      document.getElementById("addrequest").submit();
    }

    function submitLeft() {
      document.getElementById("myFormLeft").submit();
    }

    function submitRight() {
      document.getElementById("myFormRight").submit();
    }
  </script>
</body>

</html>