<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Location:http://localhost/VeeTech/login/login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['name'];
  $E_id = $_POST['E_id'];
  $Emp_id = $_POST['Emp_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>status</title>


  <style>
    body {
      margin: 0;
      background-color: #414141;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      /* padding-top: 10vh; */
    }

    .fx {
      display: flex;
      flex-wrap: wrap;
      max-width: 60vw;
      border: solid 2px #FFD300;
      height: min-content;
      padding: 25px;
      border-radius: 30px;
    }

    .rounded-3 {
      height: min-content;
      padding-block: 7px;
      padding-inline: 3rem;
      margin-inline: 15px;
      margin-block: 20px;
      font-size: 2rem;
      border-radius: 30px;
      color: white;
      font-weight: bold;
      background-color: #414141;
      border: solid 2px white;
      cursor: pointer;
    }

    .rounded-3:hover {
      background-color: #FFD300;
      border: solid 2px #414141;
      color: #414141;
    }

    h3 {
      top: 50px;
      font-size: 3rem;
      color: #FFD300;
      margin: 50px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #continue {
      padding-block: 7px;
      padding-inline: 4rem;
      margin-block: 20px;
      font-size: 2rem;
      border-radius: 30px;
      background-color: #FFD300;
      border: solid 2px #414141;
      color: #414141;
      position: relative;
      left: 23vw;
    }
  </style>
</head>

<body>
  <h3>SELECT JOB ROLE</h3>
  <div class="fx">
    <button class="rounded-3" id="user" name="user" onclick="user()">Employee</button>
    <!-- <button class="rounded-3" name="Manager">Manager</button>
    <button class="rounded-3" name="BU Head">BU Head</button>
    <button class="rounded-3" name="Travel Desk">Travel Desk</button>
    <button class="rounded-3" name="Finance Manager">Finance Manager</button>
    <button class="rounded-3" name="Approver">Approver</button>
    <button class="rounded-3" name="Reviewer">Reviewer</button>
    <button class="rounded-3" name="Super Admin">Super Admin</button>-->
  </div> 
  <form id="myForm" action="../Histroy/index.php" method="post">
    <input type="hidden" name='name' value='<?php echo $email ?>'>
    <input type="hidden" name='E_id' value='<?php echo $E_id ?>'>
    <input type="hidden" name='Emp_id' value='<?php echo $Emp_id ?>'>
  </form>
</body>
    <script>
      function user(){
        document.getElementById("myForm").submit();
      }
    </script>
</html>