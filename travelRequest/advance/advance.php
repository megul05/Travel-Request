<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Location:http://localhost/VeeTech/login/login.php');
  // echo var_dump($_POST);
}
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="advance.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>advance</title>
</head>

<body>
  <section class="sidebar">
    <img class="logo" src="assets/image 128.png" />
    <img class="logo2" src="assets/image 128.png" />
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
    <img class="ellipse" src="assets/Ellipse 356.png" alt="" />
    <div class="i-text">TRAVEL REQUEST</div>
    <h1>Purpose of visit & other details</h1>

    <div class="progress">
      <div class="steps">
        <span class="circle active">1</span>
        <span class="circle active">2</span>
        <span class="circle active">3</span>
        <span class="circle active">4</span>

        <div class="progress-bar">
          <span class="indicator"></span>
        </div>
      </div>
      <div class="heading" id="heading" style="display: flex;color:#fff;width: 700px;flex-wrap: wrap;justify-content: space-between;">
        <p style="padding-left: 3px;">DETAILS</p>
        <p style="padding-left: 18px;">MODE</p>
        <p style="padding-left: 15px;">PURPOSE</p>
        <p>ADVANCE</p>
      </div>
    </div>
    <div>
        <span class="profile-text" style="font-size: 15px"><?php echo $email; ?></span>
        <span class="profile-id" style="font-size: 15px"><?php echo $Emp_id; ?></span>
        <img class="profile" src="../Details/assests/userimg.png" alt="" />
      </div>
  </div>

  <div class="hello">
    <form id="form" method="POST" action="../preview/preview.php">
      <div id="title">
        <p style="text-align: center;margin: auto;" class="p1">OPT FOR ADVANCE</p>
      </div>

      <div class="advance">
        <label for="mode" class="label-advance">Opt for advance</label>

        <input type="radio" id="yes" value="yes" name="advance" />
        <label for="mode" class="label-yes">Yes</label>

        <input type="radio" id="no" value="no" name="advance" />
        <label for="mode" class="label-no">No</label>
      </div>

      <div id="additional" hidden>
        <label for="mode" class="label-additional">Additional</label>
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
            <td><input type="number" class="input " id="acc_input" value="0" name="accomodation_amount" /></td>
            <td>
              <select name="accomodation_type" id="">
                <option value="cash">cash</option>
                <option value="account">account</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Travel</td>
            <td>12,500</td>
            <td><input type="number" class="input" id="travel_input" value="0" name="travel_amount"></td>
            <td>
              <select name="travel_type" id="">
                <option value="cash">cash</option>
                <option value="account">account</option>
              </select>
            </td>
          </tr>

          <input type="hidden" id="total" name="total" value="0">


        </table>
      </div>

      <div id="comment">
        <label for="mode" class="label-mode">Comment</label>

        <input type="text" name="input-comment" id="input-comment" />
      </div>

      <div class="btn-next">
        <div id="mydetails btn-next" onclick="submit_fun()" class="spn-next" style="cursor: pointer; border:none; font-weight: bold; font-size: 20px; ">Next</div>
        <i class="bx bx-right-arrow-alt bx-sm"></i>
      </div>

      <a href="../purpose/purpose.html" class="btn-back">
        <i class="bx bx-right-arrow-alt bx-flip-horizontal bx-sm"></i><span class="spn-back">Back</span>
      </a>

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


    </form>
  </div>

  <script>
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");
    const logo = document.querySelector(".logo");
    const logo2 = document.querySelector(".logo2");
    var heading = document.getElementById("heading");
    const acc_input = document.getElementById("acc_input");
    const total = document.getElementById("total");
    const travel_input = document.getElementById("travel_input");
    const form = document.getElementById("form");
    var tf = 0;

    btn_menu.addEventListener("click", function() {
      side_bar.classList.toggle("expand");
      // side_bar.classList.remove("logo");

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

    travel_input.addEventListener("input", function() {
      var num = parseInt(travel_input.value);
      if (num > 12500) {
        alert("Travel amount cannot be greater than 12,500");
        travel_input.value = 0;
      }

    });

    acc_input.addEventListener("input", function() {
      var num = parseInt(acc_input.value);
      if (num > 10000) {
        alert("Accomodation cannot be greater than amount 10,000");
        acc_input.value = 0;
      }
      //console.log(num+" "+acc_input.value);

    });

    function submit_fun() {
      var acc = parseInt(acc_input.value);
      var travel = parseInt(travel_input.value);

      total.value = acc + travel;
      //console.log(total.value);
      form.submit();

    }

    // function changebtn() {
    //   if (side_bar.classList.contains("expand")) {
    //     btn_menu.classList.replace("bx-menu", "bx-menu-alt-right");
    //   } else {
    //     btn_menu.classList.replace("bx-menu-alt-right", "bx-menu");
    //   }
    // }

    //when clicked yes for advance

    document.getElementById("yes").addEventListener("click", () => {
        document.getElementById("additional").hidden = false;
        document.getElementById("comment").hidden = false;
      },
      false
    );

    document.getElementById("no").addEventListener("click", () => {
        document.getElementById("additional").hidden = true;
      },
      false
    );
  </script>
</body>

</html>