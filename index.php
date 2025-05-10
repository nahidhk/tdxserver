
<?php
session_start();

$email = "admin@admin.com";

require_once __DIR__ . '/config/config.php'; // config.php ইনক্লুড করো

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql); // ✅ এখানে $conn

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
    integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link id="dynamic-style" rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>tdx Server</title>
</head>

<body>
  <section class="end" id="uiux">
  <nav class="nav animate__animated animate__bounceInDown">
    <div class="flex around">
      <div>
        <blockquote class="flex">
          <img height="40em" src="/src/img/logo.png" alt="" srcset="">
          <h1 class="mblogo">TDX SERVER</h1>
        </blockquote>
      </div>
      <div>
        <blockquote>
          <div class="btnbox" id="logbox">
            <button onclick="openpopup('login')" class="btn cr">Login</button>
            <button onclick="openpopup('singup')" class="btn cr active">New Account</button>
          </div>
          
        </blockquote>
      </div>
    </div>
  </nav>
  <!-- login code  -->
  <div id="login" class="vcc">
    <div class="popup ">
      <div class="underline flex beet">
        <br>
        <h1>Login</h1>
        <div class="pointer flex center medel icon" onclick="closepopup('login')">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <br>
      <br>
      <form action="/account/login.php" method="post">
        <div class="flex inputbox">
          <label for="email" class="input-icon">
            <i class="fas fa-envelope"></i>
          </label>
          <input class="input-tag" type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="flex inputbox">
          <label for="" class="input-icon">
            <i class="fas fa-user-lock"></i>
          </label>
          <input type="password" class="input-tag" id="password" name="password" placeholder="if password">
          <span class="input-icon">
            <i onclick="showpassword(this)" class="fas fa-eye pointer"></i>
          </span>
        </div>
        <div class="flex center">
          <button class="btn send">Login</button>
        </div>
      </form>
      <p class="flex center">
        <span>Don't have an account?</span>
        <button onclick="openpopup('singup')" class="btn cr">Create Account</button>
        <hr>
      <p class="flex center">
        connect with
      </p>
      <div class="flex center colam" onclick="working()">
        <div class="contbtn github">
          <i class="fab fa-github"></i>
          Github
        </div>
        <div class="contbtn google ">
          <i class="fab fa-google"></i>
          Google
        </div>
        <div class="contbtn facebook">
          <i class="fab fa-facebook"></i>
          Facebook
        </div>
      </div>
      <br>
      <div class="flex"></div>
    </div>
  </div>



  <!-- new accountcode -->
  <div class="darkbox vcc" id="singup">
    <div class="popup">
      <div class="underline flex beet">
        <br>
        <h1>Singup</h1>
        <div class="pointer flex center medel icon" onclick="closepopup('singup')">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <br>
      <br>
      <form action="/account/create.php" method="post">
        <div class="flex inputbox">
          <label for="email" class="input-icon">
            <i class="fas fa-envelope"></i>
          </label>
          <input class="input-tag" type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="flex inputbox">
          <label for="" class="input-icon">
            <i class="fas fa-phone-flip"></i>
          </label>
          <select name="code" class="tel" name="tel" id="tel">
            <option value="+880">+880</option>
          </select>
          <input name="phone" type="tel" class="input-tag" placeholder="18xx-xxxxxx" required>
        </div>
        <div class="flex inputbox">
          <label for="" class="input-icon">
            <i class="fas fa-user-lock"></i>
          </label>
          <input type="password" class="input-tag" id="password1" name="password" placeholder="new password" required>
          <span class="input-icon">
            <i onclick="showpassword(this)" class="fas fa-eye pointer"></i>
          </span>
        </div>
        <div class="flex center">
          <button class="btn send">Create Account</button>
        </div>

      </form>
      <p class="flex center">
        <span>Already have an account?</span>
        <button onclick="openpopup('login')" class="btn cr">Login</button>

      </p>
      <hr>
      <p class="flex center">
        connect with
      </p>
      <div class="flex center colam" onclick="working()">
        <div class="contbtn github">
          <i class="fab fa-github"></i>
          Github
        </div>
        <div class="contbtn google ">
          <i class="fab fa-google"></i>
          Google
        </div>
        <div class="contbtn facebook">
          <i class="fab fa-facebook"></i>
          Facebook
        </div>
      </div>
      <br>
    </div>
  </div>



  <!-- UIUX -->
  

    <div class="flex center">
      <div class="flex mbaround style padding">
        <div>

          <p class="">
          <blockquote>

            <span class="font:20px otc">TDX Server</span>
            <br>
            <span class="font:40px textstyle">Free Cloud And Stroge</span><br>
            <span class="otc">Upload your Photo, Video and Document with shear Link</span>
            <br>
          </blockquote>
          <div>
            <blockquote class="flex">
              <div class="btnbox">
                <button onclick="openpopup('login')" class="btn cr">singin</button>
                <button onclick="openpopup('singup')" class="btn cr active">Create Account</button>
              </div>
            </blockquote>
          </div>
          </p>
        </div>
        <div class="mvc">
          <img height="300px" class="img" src="/src/img/home.png" alt="" srcset="">
        </div>
      </div>
    </div>

    <div class="end1">

    </div>

  </section>



  <!-- Main Account and home page  -->

  <section class="vcc" id="main">
   <div class="mynav flex around">
    <span class="line">TDX SERVER</span>
      <span onclick="openpopup('account')" class="cr">Account</span>
      
   </div>
  <div class="darkbox" id="account">
    <div class="popup">
      <div class="underline flex beet">
        <br>
        <h1>UserID : <?php echo $user['id']?><?php echo $user['username']?></h1>
        <div class="pointer flex center medel icon" onclick="closepopup('account')">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <br>
      <div class="flex center">
        <div class="textcenter">
          <img  class="userlogo" src="/src/img/home.png" alt="" srcset="">

          <h1>
            <?php echo $user['name']?> <i class="fas fa-pen-to-square cr"></i>
          </h1>
        </div>
      </div>
    </div>
  </div>
  </section>











  <!-- Project JavaScript -->
  <script id="dynamic-script" src="src/js/script.js"></script>
  <script src="cachebuster.js"></script>
</body>

</html>