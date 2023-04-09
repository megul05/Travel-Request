<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'VeeTech';
$flag_nextpage = false;
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$message = "";
if (mysqli_connect_error()) {
  exit('Error connceting to the database ');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST["from"] === "login") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $E_id = "";
    if (isset($email) && isset($password)) {
      if (empty($email)) {
        echo "email is required";
      } else if (empty($password)) {
        echo "password is required";
      }
      $sql = "SELECT * FROM  login_table WHERE email ='$email' AND password = '$password'";
      // $emp = "Select employee_id from employee_table where id = $row['employee_id'])";
      $result = mysqli_query($connect, $sql);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] == $email && $row['password'] == $password) {
            $emp = "Select employee_id from employee_table where id =". $row['employee_id'];
            //echo $emp;
            $emp_result = mysqli_fetch_assoc(mysqli_query($connect, $emp));
            // echo $emp_result['employee_id'];
            $E_id = $row['employee_id'];
            $Emp_id = $emp_result['employee_id'];
            $flag_nextpage = true;
        } else {
          echo "can not log in";
        }
      } else {
        $message = "Invaild email or password";
      }
    } else {
      echo "outside of if statement";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Log In</title>
</head>

<body>
  <section>
    <div class="register">
      <img id="logo" src="assests/vee.png" width="80" height="80"></img>
      <div class="col-1">
        <h2>Welcome Back!</h2>
        <p>Please enter your contact details to connect.</p>
        <p style="color:red;"><?php echo $message ?> </p>
        <form id="form" class="flex flex-col" method="post">
          <label>Email</label>
          <input type="email" placeholder="name@company.com" name="email" required />
          <label>Password</label>
          <input type="password" placeholder="Password" name="password" required />
          <div class="bottom">
            <label>
            </label>
            <strong>
              <a href="#">Forgot password</a>
            </strong>
          </div>
          <input type="hidden" name="from" value="login" />
          <button class="btn btn-primary" type="submit">login</button>
        </form>
      </div>
      <?php if ($flag_nextpage === TRUE) : ?>
        <form id="myForm" action="../travelRequest/role/role.php" method="post">
          <input type="hidden" name='name' value='<?php echo $email ?>'>
          <input type="hidden" name='E_id' value='<?php echo $E_id ?>'>
          <input type="hidden" name='Emp_id' value='<?php echo $Emp_id ?>'>
        </form>
        <script>
          document.getElementById("myForm").submit();
        </script>
      <?php endif ?>

      <div class="col-2">
        <img id="frntImg" src="assests/Frame.png"></img>
      </div>
    </div>
  </section>
</body>

</html>