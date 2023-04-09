<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //echo var_dump($_POST);
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
  $Emp_id = $_POST['Emp_id'];
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

  $advance = $_POST['advance'];
  $accomadation_type = "";
  $travel_type = "";
  $total = "";
  $accomadation_amount = "";
  $accomadation_type = "";
  $travel_type = "";
  $travel_amount = "";
  $input_comment = $_POST['input-comment'];
  if($advance==="yes"){
    $accomadation_type = $_POST['accomodation_type'];
    $travel_type = $_POST['travel_type'];
    $total = $_POST['total'];
    $accomadation_amount = $_POST['accomodation_amount'];
    $travel_amount = $_POST['travel_amount'];
  }

  if ($mode === "Air") {
    $air_passport = $_POST["air_passport"];
    $air_expiry_date = $_POST["air_expiry_date"];
    $air_full_name = $_POST["air_full_name"];
  } else if ($mode === "Bus") {
    $bus_email = $_POST["bus_email"];
    $bus_age = $_POST["bus_age"];
    $bus_fullname = $_POST["bus_fullname"];
  } else if ($mode === "Rail") {
    $rail_general = $_POST["reil_general"];
    $rail_class = $_POST["rail_class"];
    $rail_full_name = $_POST["rail_full_name"];
    $rail_age = $_POST["rail_age"];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="preview.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Details</title>
  <style>
    .container {
      width: 100%;
      height: 97vh;

      background: #d7d9db;
      background-size: cover;
      margin: 0%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn {
      padding: 10px 60px;
      background: #fff;
      border: 0;
      outline: none;
      cursor: pointer;
      font-size: 22px;
      font-weight: 500;
      border-radius: 30px;
    }

    .popup {
      width: 30%;
      height: 75%;
      background: #F8F8F8;
      ;
      border-radius: 15px;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.1);
      text-align: center;
      padding: 0 30px 30px;
      color: #333;
      visibility: hidden;
      overflow: hidden;

      transition: transform 0.4s, top 0.4s;
    }

    .ellipse_a {
      left: 0%;
      bottom: 360px;
      background-color: yellow;
      position: absolute;
      width: 500px;
      height: 180px;
      border-radius: 10px;
      overflow: hidden;
      transform: rotate(45deg);
    }

    .ellipse1 {
      left: 0%;
      bottom: 50px;
      background-color: yellow;
      position: absolute;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      transform: rotate(30deg);
    }

    .open-popup {
      visibility: visible;
      top: 50%;
      transform: translate(-50%, -50%) scale(1);

    }

    .popup img {
      width: 100px;
      margin-top: -40px;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .popup h2 {
      font-size: 38px;
      font-weight: 500;
      margin: 30px 0 10px;
    }

    .popup button {
      width: 100%;
      margin-top: 50px;
      padding: 10px 0;
      background: #6fd649;
      color: #fff;
      border: 0;
      outline: none;
      font-size: 18px;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    .container2 {
      width: 100%;
      height: 100vh;

      background: #3c5077;
      background-size: cover;

      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn {
      padding: 10px 60px;
      background: #fff;
      border: 0;
      outline: none;
      cursor: pointer;
      font-size: 22px;
      font-weight: 500;
      border-radius: 30px;
    }

    .popup2 {
      width: 60%;
      height: 67%;
      background: #F8F8F8;
      ;
      border-radius: 6px;
      position: absolute;
      top: 0;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.1);
      text-align: center;
      padding: 0 30px 30px;
      color: #333;
      visibility: hidden;
      transition: transform 0.4s, top 0.4s;
    }

    .open-popup2 {
      visibility: visible;
      top: 50%;
      transform: translate(-50%, -50%) scale(1);

    }

    .popup2 img {
      width: 100px;
      margin-top: 80px;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .popup2 h2 {
      font-size: 38px;
      font-weight: 500;
      margin: 30px 0 10px;
    }

    .popup2 button {
      width: 100%;
      margin-top: 50px;
      padding: 10px 0;
      background: #6fd649;
      color: #fff;
      border: 0;
      outline: none;
      font-size: 18px;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    .inner-div {
      width: 500px;
      height: 200px;
      border: 18px solid #E3E3E3;
      margin: 0 auto;



    }

    .point {
      box-sizing: border-box;

      position: absolute;
      width: 20px;
      height: 20px;

      left: 230px;
      top: 333px;

      background: #CDCDCD;
      border: 1px solid #D3D3D3;
      border-radius: 1px;
    }

    #busdetails {
      position: absolute;
      top: 22%;
      border-radius: 10px;
      left: 25%;
      background-color: white;
      height: 50%;
      width: 70%;
    }

    #cardetails {
      position: absolute;
      top: 23%;
      border-radius: 10px;
      left: 25%;
      background-color: white;
      height: 55%;
      width: 70%;
    }

    #airDetails {
      position: absolute;
      top: 23%;
      border-radius: 10px;
      left: 25%;
      background-color: white;
      height: 55%;
      width: 70%;
    }

    #railDetails {
      position: absolute;
      top: 23%;
      border-radius: 10px;
      left: 25%;
      background-color: white;
      height: 60%;
      width: 70%;
    }

    #input-email {
      border-radius: 5px;
      position: absolute;
      left: 3%;
      top: 20%;
      height: 20px;
      background-color: white;
      border-style: solid;
      border-width: 0.5px;
      border-color: #000;
    }

    #label-age {
      position: absolute;
      left: 50%;
      top: 5%;
    }

    #input-age {
      border-radius: 5px;
      position: absolute;
      left: 50%;
      top: 20%;
      height: 20px;
      background-color: white;
      border-style: solid;
      border-width: 0.5px;
      border-color: #000;
    }

    #label-name {
      position: absolute;
      left: 3%;
      top: 50%;
    }

    #input-name {
      border-radius: 5px;
      position: absolute;
      left: 3%;
      top: 65%;
      height: 20px;
      background-color: white;
      border-style: solid;
      border-width: 0.5px;
      border-color: #000;
    }

    #label-nameR {
      position: absolute;
      left: 3%;
      top: 35%;
    }

    #input-nameR {
      border-radius: 5px;
      position: absolute;
      left: 3%;
      top: 50%;
      height: 20px;
      background-color: white;
      border-style: solid;
      border-width: 0.5px;
      border-color: #000;
    }

    #label-ages {
      top: 70%;
      left: 3%;
    }

    #input-ages {
      border-radius: 5px;
      height: 20px;
      background-color: white;
      border-style: solid;
      border-width: 0.5px;
      border-color: #000;
      position: absolute;
      top: 85%;
      left: 3%;
    }
  </style>
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

  <div class="header">
    <img class="ellipse" src="assests/Ellipse 356.png" alt="" />
    <div class="i-text">TRAVEL REQUEST</div>
    <h1>Basic details</h1>

    <div class="navbar2">
      <a href="#" class="active">Details</a>
      <a href="#">Purpose</a>
      <a href="#">Mode</a>
      <a href="#">Advance</a>
    </div>
    <div>
      <span class="profile-text"><?php echo $email; ?></span>
      <span class="profile-id"><?php echo $Emp_id; ?></span>
      <img class="profile" src="/images/userimg.png" alt="" />
    </div>
  </div>
  <div class="hello">

    <form id="form" method="POST" action="insert.php">
      <h5>Preview</h5>
      <button type="submit">Submit</button>

      <div style="float: right;margin-right: 50px; background: none;">
        <a href="#" onclick="openPopup()" class="btn-next" type="submit" style="width: 100px; height: 40px; top: 110px;">
          <span class="spn-next">Submit</span></a>
        <a href="../Details/details.html" class="btn-next" style="width: 90px; height: 40px; top: 110px;left: 68.5%; background-color:gray;">
          <span class="spn-next" style="text-align: center; justify-content: center;background-color:gray">Edit</span></a>
        </a>
      </div>
      <div class="tab" id="traveldetails"><u>Travel Details</u></div>
      <div id="details">
        <label class="tripType" for="tripTypeS"> Trip Type</label>
        <input type="text" class="tripType" id="tripTypeS" value="<?php echo $tripType;  ?>" readonly>

        
        <label class="country" for="country">Country / State</label>
        <input type="text" class="country" id="countryS" value="<?php echo $country. " / " .$state  ?>" readonly>
    
        <label class="fromCity" for="fromCityS">From city</label>
        <input type="text" class="fromCity" id="fromCityS" value="<?php echo $fromCity; ?>" readonly>

        <label class="toCity" for="toCityS">To city</label>
        <input type="text" class="toCity" id="toCityS" value="<?php echo $toCity; ?>" readonly>

        <label for="departureDateI" class="departureDate">Departure date</label>
        <input type="text" id="departureDateI" class="departureDate" value="<?php echo $departure_date; ?>" readonly />

        <label for="returnDateI" class="returnDate">Return date</label>
        <input type="text" id="returnDateI" class="returnDate" value="<?php echo $return_date ?>" readonly />

        <label for="departureTimeI" class="departureTime">Departure Time</label>
        <input type="text" id="departureTimeI" class="departureTime" value="<?php echo $departure_time; ?> " readonly />

        <label for="returnTimeI" class="returnTime">Return Time</label>
        <input type="text" id="returnTimeI" class="returnTime" value="<?php echo $return_time; ?>" readonly />
      </div>


      <div class="tab" id="mode"><u>Mode of Transport</u></div>
      <div id="mode_details" class="mode_details">
        <label for="mode" class="modeType">Mode of transport</label>
        <input type="text" class="modeType" id="modeTypeS" value="<?php echo $mode; ?>" readonly>
      </div>
      <div id="mode_details2">
        <?php if ($mode === "Car") { ?>

          <input type="text" class="employees" id="pax" value="3" readonly />
          <label class="modeType" for="employees">Accompanying employee ID's</label>
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Name</th>
            </tr>
            <tr>
              <td>EU4567</td>
              <td>John</td>
            </tr>
            <tr>
              <td>EU5673</td>
              <td>Sam</td>
            </tr>
            <tr>
              <td>EU5655</td>
              <td>Smith</td>
            </tr>
          </table>

        <?php } else if ($mode === "Air") { ?>
          <div id="airDetails">
            <label for="email" id="label-email">Passport no</label>
            <input type="text" name="air_passport" id="input-email" value="<?php echo $air_passport; ?> " readonly />

            <label for="age" id="label-age">Expiry Date</label>
            <input type="date" name="air_expiry_date" id="input-age" value="<?php echo $air_expiry_date; ?>" readonly />

            <label for="name" id="label-name">Full name</label>
            <input type="text" name="air_full_name" id="input-name" value="<?php echo $air_passport; ?> " readonly />

          </div>
        <?php } else if ($mode === "Bus") { ?>
          <div id="busdetails">
            <label for="email" id="label-email">Email</label>
            <input type="email" name="bus_email" id="input-email" value="<?php echo $bus_email; ?> " readonly />
            <label for="age" id="label-age">Age</label>
            <input type="number" name="bus_age" id="input-age" value="<?php echo $bus_age; ?> " readonly />
            <label for="name" id="label-name">Full name</label>
            <input type="text" name="bus_fullname" id="input-name" value="<?php echo $bus_fullname; ?> " readonly />
          </div>
        <?php } else if ($mode === "Rail") {
        ?>
          <div id="railDetails">
            <input type="text" value="<?php echo $rail_general; ?> " readonly />
            <input type="text" value="<?php echo $rail_class; ?> " readonly />
            <label for="full_name" id="label-nameR">Full name</label>
            <input type="text" name="rail_full_name" id="input-nameR" value="<?php echo $rail_full_name; ?> " readonly />
            <label for="name" id="label-ages">Age</label>
            <input type="number" name="rail_age" id="input-ages" value="<?php echo $rail_age; ?> " readonly />
          </div>
        <?php } ?>
      </div>

      <div class="tab" id="purpose"><u>Purpose</u></div>
      <div id="purpose_details">
        <label class="purpose" for="purpose">Purpose of visit</label>
        <input class="purpose" id="purposeS" value="<?php echo $purpose; ?>" readonly>

        <label class="billing" for="billing">Billing entity</label>
        <input class="billing" id="billingS" value="<?php echo $billing; ?>" readonly>
      </div>

      <div class="tab" id="mode"><u>Advance</u></div>
      <div id="mode_details">
        <label for="mode" class="modeType">Opt for advance</label>
        <input type="text" class="modeType" id="modeTypeS" value="<?php echo $advance; ?> " readonly>
      </div>
      <div id="mode_details2">
        <table>
          <tr>
            <th>Expense name</th>
            <th>Limit</th>
            <th>Amount</th>
            <th>cash/ account</th>
          </tr>
          <tr>
            <td>Accomodation</td>
            <td>10,000</td>
            <td><?php echo $accomadation_amount; ?> </td>
            <td><?php echo $accomadation_type; ?> </td>
          </tr>
          <tr>
            <td>Travel</td>
            <td>12,500</td>
            <td><?php echo $travel_amount; ?> </td>
            <td><?php echo $accomadation_type;  ?> </td>
          </tr>
          <tr>
            <td><b>Total</b></td>
            <td></td>
            <td><?php echo $total; ?> </td>
            <td></td>
          </tr>
        </table>
      </div>
      <div id="mode_details3">
        <label for="mode" class="modeType3">Comment</label>
        <input type="text" class="modeType3" id="modeTypeS" value="<?php echo $input_comment; ?> " readonly>
      </div>

      <input type="hidden" name="name" value="<?php echo $email ?>" />
      <input type="hidden" name="E_id" value="<?php echo $E_id ?>" />
      <input type="hidden" name="Emp_id" value="<?php echo $Emp_id ?>" />
      <input type="hidden" name="tripType" value="<?php echo $tripType ?>" />
      <input type="hidden" name="state" value="<?php echo $state ?>" />
      <input type="hidden" name="country" value="<?php echo $country ?>" />
      <input type="hidden" name="fromCity" value="<?php echo $fromCity ?>" />
      <input type="hidden" name="toCity" value="<?php echo $toCity ?>" />
      <input type="hidden" name="departure_date" value="<?php echo $departure_date ?>" />
      <input type="hidden" name="departure_time" value="<?php echo $departure_time ?>" />
      <input type="hidden" name="return_date" value="<?php echo $return_date ?>" />
      <input type="hidden" name="return_time" value="<?php echo $return_time ?>" />
      <input type="hidden" name="mode" value="<?php echo $mode ?>" />      

      <input type="hidden" name="air_passport" value="<?php echo $air_passport ?>" />
      <input type="hidden" name="air_expiry_date" value="<?php echo $air_expiry_date ?>" />
      <input type="hidden" name="air_full_name" value="<?php echo $air_full_name ?>" />

      <input type="hidden" name="bus_email" value="<?php echo $bus_email ?>" />
      <input type="hidden" name="bus_age" value="<?php echo $bus_age ?>" />
      <input type="hidden" name="bus_fullname" value="<?php echo $bus_fullname ?>" />

      <input type="hidden" name="rail_general" value="<?php echo $rail_general ?>" />
      <input type="hidden" name="rail_class" value="<?php echo $rail_class ?>" />
      <input type="hidden" name="rail_full_name" value="<?php echo $rail_full_name ?>" />
      <input type="hidden" name="rail_age" value="<?php echo $rail_age ?>" />

      <input type="hidden" name="purpose" value="<?php echo $purpose ?>" />
      <input type="hidden" name="billing" value="<?php echo $billing ?>" />

      <input type="hidden" name="accomadation_type" value="<?php echo $accomadation_type ?>" />
      <input type="hidden" name="total" value="<?php echo $total ?>" />
      <input type="hidden" name="advance" value="<?php echo $advance ?>" />
      <input type="hidden" name="accomadation_amount" value="<?php echo $accomadation_amount ?>" />
      <input type="hidden" name="travel_amount" value="<?php echo $travel_amount ?>" />

      <a href="#" onclick="openPopup2()" class="btn-next" type="submit" style="width: 100px; height: 40px; top: 102%;">
      <span class="spn-next">Submit</span></a>
    <a href="../Details/details.php" class="btn-next" style="width: 90px; height: 40px; left: 68.5%; top: 102%; background-color: gray;">
      <span class="spn-next" style="background-color: gray;">Cancel</span></a>
      

    </form>
    
  </div>
  </div>

  </div>

  <script>
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");
    const logo = document.querySelector(".logo");
    const logo2 = document.querySelector(".logo2");
    var form = document.getElementById("form");
    var fg = 0;
    btn_menu.addEventListener("click", function() {
      side_bar.classList.toggle("expand");
      if (fg == 0) {
        form.style.width = "75vw";
        fg = 1;
      } else {
        form.style.width = "85vw";
        fg = 0;
      }
      logo2.classList.toggle("hidden");
      logo.classList.add("logo");
      logo.classList.toggle("unhide");

      changebtn();
    });

    const links = document.querySelectorAll(".navbar2 a");

    links.forEach((link) => {
      link.addEventListener("click", function() {
        links.forEach((link) => {
          link.classList.remove("active");
        });
        this.classList.add("active");
      });
    });

    function submit() {
      location("http://127.0.0.1:5501/sample/view.html")
    }
  </script>
  <div class="popup2" id=popup2>
    <h2 style="font-weight: bold;">Travel Policy & Disclaimers</h2>
    <div class="inner-div">

    </div>
    <div class="point"></div>

    <p style="margin-left: 70px;">I have read and agree to the primary policy,terms of services. </p>

    <button type="button" onclick="openPopup()" style="margin-top:8px;width: 100px;
        height: 50px;
        left: 50px;
        top: 50px;
        background-color:#FFD300;
        color:black;
        ">Submit
      <i class="fa fa-check" style="left: 10px;"></i>
    </button>

  </div>
  <script>
    let popup2 = document.getElementById("popup2");

    function openPopup2() {
      popup2.classList.add("open-popup2");
    }

    function closePopup2() {
      popup2.classList.remove("open-popup2");

    }
  </script>


  <div class="popup" id=popup>
    <div>
      <div style="height: 130px;position: relative; top: -10px;margin-left: -65px; transform: rotate(12deg); overflow: hidden; width: 150px; border-radius: 50%; background-color:yellow;">
      </div>
      <div style="height: 50px;position: relative; left: -17px; top: 4px; width: 50px; border-radius: 50%; background-color:yellow;">
      </div>
      <img style="top: -30px;" src="Vector (6).png">
    </div>
    <h2 style="color:#04C923">SUBMITTED</h2>
    <h4>Trip No: DTU17TU</h4>
    <p>Your Request have been Submitted Successfully ! </p>
    <a type="button" href="../Histroy/index.php" onclick="closePopup()" style="margin-top:2px;width: 100px;
  height: 30px;
  left: 50px;
  top: 20px;
  padding: 10px 20px;
  text-decoration: none;
  cursor: pointer;
  background-color:#FFD300;
  color:black; ">Ok
    </a>

  </div>

  <script>
    let popup = document.getElementById("popup");
    let body = document.querySelector("body");

    function openPopup() {
      popup.classList.add("open-popup");
    }

    function closePopup() {
      popup.classList.remove("open-popup");

    }
  </script>

</body>

</html>