<?php include 'Tabbar/Tabbar.php'; 
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../image/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test2</title>
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
     <!-- Focus about body not part about tabbar anymore or about make it get link -->
      <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>


            <!-- login page -->
            <div class="form-box login">
                <h2>เข้าสู่ระบบ</h2> 
                     <form action="register_login.php" method="post">
                     <div class="input-box">
                         <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                         <input type="mail"name="email"required>
                         <label>อีเมล</label>
                    </div>
                        <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password"name="password"required>
                        <label>รหัส</label>
                    </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">
                            จดจำไว้?</label>
                            <a href="#">ลืมรหัส?</a>
                    </div>
                    <button type="submit"name="login_user" class="btn">เช้าสู่ระบบ
                    </button>   
                    <div class="login-register">
                    <p>ไม่มีบัญชี? <a href="#"
                                class="register-link">สมัครบัญชี</a></p>
                    </div> 
                    </form>
            </div>

            <!-- register page rg =  register  -->
            
             <div class="form-box register">
                <h2>สมัครระบบ</h2> 
                <form action="register_login.php" method="post">
                         <div class="input-box">
                         <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                         <input type="username"name="username" required>
                         <label>ผู้ใช้</label>
                    </div>
                     <div class="input-box">
                         <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                         <input type="mail" name="email" required>
                         <label>อีเมล</label>
                    </div>
                        <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password"name="password_1" required>
                        <label>รหัส</label>
                    </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">
                            ฉันยอมรับข้อกำหนดและเงื่อนไข</label>
                    </div>
                    <button type="submit"name="reg_user"class="btn">สมัครระบบ
                    </button>   
                    <div class="login-register">
                    <p>มีบัญชีอยู่แล้ว? <a href="#"
                                class="login-link">เช้าสู่ระบบ</a></p>
                    </div> 
                    </form>
            </div>
        </div>
        <script src="script.js"></script>
</body>
