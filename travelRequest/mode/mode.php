<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Location:http://localhost/VeeTech/login/login.php');
  // echo var_dump($_GET);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

  $air = "";
  $car = "";
  $bus = "";
  $rail = "";
}

?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="mode.css" />
    <title>Mode</title>
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

    <!-- <section class="home"> -->
    <div class="header">
      <img class="ellipse" src="assets/Ellipse 356.png" alt="" />
      <div class="i-text">TRAVEL REQUEST</div>
      <h1>Purpose of visit & other details</h1>

      <div class="container">
        <div class="progress">
          <div class="steps">
            <span class="circle active">1</span>
            <span class="circle active">2</span>
            <span class="circle">3</span>
            <span class="circle">4</span>

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
      </div>
      <div>
        <span class="profile-text" style="font-size: 15px"><?php echo $email; ?></span>
        <span class="profile-id" style="font-size: 15px"><?php echo $Emp_id; ?></span>
        <img class="profile" src="../Details/assests/userimg.png" alt="" />
      </div>
    </div>

    <div class="hello">
      <div id="form">
        <div id="title">
          <p style="text-align: center;" class="p1">MODE OF TRANSPORT & PERSONAL DETAILS</p>
        </div>
        <div id="details">
          <form id="mode" action="../purpose/purpose.php" method="post">
            <div class="mode">
              <label for="mode" class="label-mode">Mode of transport</label>
              <input type="radio" id="air" name="mode" value="Air" />
              <label for="air" class="label-air">Air</label>
              <input type="radio" id="car" name="mode" value="Car" />
              <label for="car" class="label-car">car</label>
              <input type="radio" id="bus" name="mode" value="Bus" />
              <label for="bus" class="label-bus">bus</label>
              <input type="radio" id="rail" name="mode" value="Rail" />
              <label for="rail" class="label-rail">Rail</label>
            </div>
            <!-- <div id="car-bus" hidden>
        <label for="mode" class="label-mode">bus required</label>
        <input type="radio" id="yes" name="bus_required" value="yes" />
        <label for="mode" class="label-yes">Yes</label>
        <input type="radio" id="no" name="bus_required" value="no" />
        <label for="mode" class="label-no">No</label>
      </div> -->
            <div id="busdetails" hidden>
              <label for="email" id="label-email">Email</label>
              <input type="email" name="bus_email" id="input-email" />
              <label for="age" id="label-age">Age</label>
              <input type="number" name="bus_age" id="input-age" />
              <label for="name" id="label-name">Full name</label>
              <input type="text" name="bus_fullname" id="input-name" />
              <label for="id" id="label-id">ID proof</label>
              <select name="bus_proof" id="input-id">
                <option value="aadhar">Aadhar</option>
                <option value="license">Driving License</option>
                <option value="pan">Pan</option>
              </select>
              <!-- <label class="file-upload">
            <input type="bus_file" /> -->
            </div>
            <div id="cardetails" hidden>
              <label class="employees" for="employees">Accompanying employee ID's</label>
              <input type="text" name="employee_id_dropdown" id="employeesI" /> <!-- PENDING -->
              <input type="number" id="pax" /> <!-- NUMBER OF EMPLOYEE -->
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
            </div>

            <div id="airDetails" hidden>
              <label for="email" id="label-email">Passport no</label>
              <input type="text" name="air_passport" id="input-email" />

              <label for="age" id="label-age">Expiry Date</label>
              <input type="date" name="air_expiry_date" id="input-age" />

              <label for="name" id="label-name">Full name</label>
              <input type="text" name="air_full_name" id="input-name" />

              <label for="id" id="label-id">ID proof</label>
              <select name="air_proof" id="input-id">
                <option value="aadhar">Aadhar</option>
                <option value="license">Driving License</option>
                <option value="pan">Pan</option>
              </select>
              <!-- <input type="upload" id="label-upload" name=""/> -->
              <label class="custom-file-upload">
                <input type="file" class="custom-file-upload" name="air_file" />
            </div>

            <div id="railDetails" hidden>
              <select name="rail_general" id="input-cmpt" class="email">
                <option value="general">General</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>

              <select name="rail_class" id="input-class">
                <option value="1">All classes</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>

              <label for="full_name" id="label-nameR">Full name</label>
              <input type="text" name="rail_full_name" id="input-nameR" />

              <label for="id" id="label-idR">ID proof</label>
              <select name="rail_proof" id="input-idR">
                <option value="aadhar">Aadhar</option>
                <option value="license">Driving License</option>
                <option value="pan">Pan</option>
              </select>

              <label for="name" id="label-ages">Age</label>
              <input type="number" name="rail_age" id="input-ages" />
              <label class="custom-file-upload">
                <input type="file" class="custom-file-upload" name="rail_file" />
            </div>
            <input type="hidden" name="name" value="<?php echo $email ?>" />
            <input type="hidden" name="Emp_id" value="<?php echo $Emp_id ?>" />
            <input type="hidden" name='E_id' value='<?php echo $E_id; ?>'>
            <input type="hidden" name="tripType" value="<?php echo $tripType ?>" />
            <input type="hidden" name="state" value="<?php echo $state ?>" />
            <input type="hidden" name="country" value="<?php echo $country ?>" />
            <input type="hidden" name="fromCity" value="<?php echo $fromCity ?>" />
            <input type="hidden" name="toCity" value="<?php echo $toCity ?>" />
            <input type="hidden" name="departure_date" value="<?php echo $departure_date ?>" />
            <input type="hidden" name="departure_time" value="<?php echo $departure_time ?>" />
            <input type="hidden" name="return_date" value="<?php echo $return_date ?>" />
            <input type="hidden" name="return_time" value="<?php echo $return_time ?>" />

            <div class="btn-next">
              <button id="mydetails btn-next" type="submit" class="spn-next" style="cursor: pointer; border:none; ">Next</button>
              <i class="bx bx-right-arrow-alt bx-sm"></i>
            </div>

            <a href="../Details/details.php" class="btn-back">
              <i class="bx bx-right-arrow-alt bx-flip-horizontal bx-sm"></i><span class="spn-back">Back</span>
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
      document.getElementById("bus").addEventListener(
        "click",
        () => {
          document.getElementById("busdetails").hidden = false;
          document.getElementById("airDetails").hidden = true;
          document.getElementById("railDetails").hidden = true;
          document.getElementById("cardetails").hidden = true;
        },
        false
      );

      document.getElementById("car").addEventListener(
        "click",
        () => {
          document.getElementById("cardetails").hidden = false;
          document.getElementById("airDetails").hidden = true;
          document.getElementById("railDetails").hidden = true;
          document.getElementById("busDetails").hidden = true;
        },
        false
      );



      //when rail clicked
      document.getElementById("rail").addEventListener(
        "click",
        () => {
          document.getElementById("railDetails").hidden = false;
          document.getElementById("cardetails").hidden = true;
          document.getElementById("airDetails").hidden = true;
          document.getElementById("busDetails").hidden = true;
        },
        false
      );



      //when air clicked
      document.getElementById("air").addEventListener(
        "click",
        () => {
          document.getElementById("airDetails").hidden = false;
          document.getElementById("railDetails").hidden = true;
          document.getElementById("cardetails").hidden = true;
          document.getElementById("busDetails").hidden = true;
        },
        false
      );
    </script>
  </body>

  </html>

<?php } ?>