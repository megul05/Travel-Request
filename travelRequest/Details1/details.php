<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Location:http://localhost/VeeTech/login/login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $DATABASE_HOST = 'localhost';
  $DATABASE_USER = 'root';
  $DATABASE_PASS = '';
  $DATABASE_NAME = 'VeeTech';
  $flag_nextpage = false;
  $connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_error()) {
    exit('Error connceting to the database ');
  }
  $E_id = $_POST['E_id'];
  $email = $_POST['name'];
  $tripType = "";
  $state = "";
  $country = "";
  $fromCity = "";
  $toCity = "";
  $departure_date = "";
  $departure_time = "";
  $return_date = "";
  $return_time = "";
  $from_city_query = "SELECT state from state_table";
  $from_city_result = $connect->query($from_city_query);
  $to_city_query = "SELECT state from state_table";
  $to_city_result = $connect->query($to_city_query);
}
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="details.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Details</title>
</head>

<body>
  <section class="sidebar">
    <img class="logo" src="assests/image 128.png" />
    <img class="logo2" src="assests/image 128.png" />
    <div class="nav-header">
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
        <a href="#">
          <i class="bx bx-log-out"></i>
          <span class="title">Log Out</span>
        </a>
        <span class="tooltip">Log Out</span>
      </li>
    </ul>
    <button class="log_out">Log-out</button>
  </section>

  <!-- <section class="home"> -->
  <div class="header">
    <img class="ellipse" src="assests/Ellipse 356.png" alt="" />
    <div class="i-text">TRAVEL REQUEST</div>
    <h1>Basic details</h1>

    <div class="container">
      <div class="progress">
        <div class="steps">
          <span class="circle active">1</span>
          <span class="circle">2</span>
          <span class="circle">3</span>
          <span class="circle">4</span>

          <div class="progress-bar">
            <span class="indicator"></span>
          </div>
        </div>
        <div class="heading" id="heading" style="
              display: flex;
              width: 700px;
              flex-wrap: wrap;
              justify-content: space-between;
            ">
          <p style="padding-left: 3px">DETAILS</p>
          <p style="padding-left: 18px">MODE</p>
          <p style="padding-left: 15px">PURPOSE</p>
          <p>ADVANCE</p>
        </div>
      </div>
    </div>
    <div>
      <span class="profile-text" style="font-size: 15px"><?php echo $email; ?></span>
      <span class="profile-id" style="font-size: 15px"><?php echo $E_id; ?></span>
      <img class="profile" src="./assests/userimg.png" alt="" />
    </div>
  </div>
  <div class="hello">
    <div id="form">
      <div id="title">
        <p style="text-align: center; margin: auto" class="p1">
          TRAVEL DETAILS
        </p>
      </div>
      <div id="details">
        <form action="../mode/mode.php" method="POST" id="basic_details">
          <label class="tripType" for="tripType">Trip type</label>
          <select class="tripType" id="tripTypeS" name="tripType" id="" required>
            <option value=""></option>
            <option value="Domestic">Domestic</option>
            <option value="International">International</option>
          </select>
          <label class="country" for="country">Country</label>
          <select class="country" id="countryS" style="width: 80px" name="country" id="" required>
            <option value=""></option>
            <option value="India">India</option>
            <option value="Pakistan">England</option>

          </select>
          <label class="state" for="state">State</label>
          <select class="state" id="stateS" style="width: 80px" name="state" id="" required>
            <option value=""></option>
            <option value="Tamil Nadu">Tamilnadu</option>
            <option value="Karnataka">Karnataka</option>
          </select> 

          <label class="fromCity" for="fromCity">From city</label>
          <select class="fromCity" id="fromCityS" name="fromCity" id="" required>
            <option value=""></option>
            <?php
            if ($from_city_result->num_rows > 0) {
              while ($optionData = $from_city_result->fetch_assoc()) {
                $from_city_name = $optionData['state'];
            ?>
                <option value="<?php echo $from_city_name; ?>"><?php echo $from_city_name; ?> </option>
            <?php
              }
            }
            ?>
          </select>

          <label class="toCity" for="toCity">To city</label>
          <select class="toCity" id="toCityS" name="toCity" id="" required>
            <option value=""></option>
            <?php
            if ($to_city_result->num_rows > 0) {
              while ($optionData = $to_city_result->fetch_assoc()) {
                $to_city_name = $optionData['state'];
            ?>
                <option value="<?php echo $to_city_name; ?>"><?php echo $to_city_name; ?> </option>
            <?php
              }
            }
            ?>
          </select>
          <label for="date" class="departureDate">Departure date</label>
          <input type="date" id="departureDateI" class="departureDate" name="departure_date" required />

          <label for="date" class="returnDate">Return date</label>
          <input type="date" id="returnDateI" class="returnDate" name="return_date" required />

          <label for="date" class="departureTime">Departure Time</label>
          <input type="time" id="departureTimeI" class="departureTime" name="departure_time" required />

          <label for="date" class="returnTime">Return Time</label>
          <input type="time" id="returnTimeI" class="returnTime" name="return_time" required />
          <input type="hidden" name="name" value="<?php echo $email ?>" />
          <input type="hidden" name="E_id" value="<?php echo $E_id ?>" />
          <a class="btn-next">
            <button id="mydetails btn-next" type="submit" class="spn-next" style="cursor: pointer; border:none;">Next</button>
            <i class="bx bx-right-arrow-alt bx-sm"></i>
          </a>
        </form>
      </div>
    </div>
  </div>
  <!-- </section> -->

  <script>
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");
    const logo = document.querySelector(".logo");
    const logo2 = document.querySelector(".logo2");

    var heading = document.getElementById("heading");
    var tf = 0;

    btn_menu.addEventListener("click", function() {
      side_bar.classList.toggle("expand");
      console.log(heading.style.width);
      // side_bar.classList.remove("logo");
      if (tf == 0) {
        heading.style.width = "575px";
        tf = 1;
      } else {
        heading.style.width = "700px";
        tf = 0;
      }
      logo2.classList.toggle("hidden");
      logo.classList.add("logo");
      logo.classList.toggle("unhide");

      changebtn();
    });

    function next() {
      document.getElementById("basic_details").submit();
    }
  </script>
</body>

</html>