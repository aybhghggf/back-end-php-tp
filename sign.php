<?php 
if(isset($_POST['name'])&&isset( $_POST['email'])&&isset($_POST['password'])){
    $Nom = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $hasedpassword= password_hash( $Password, PASSWORD_DEFAULT );
    require_once 'config.php';
    SignIn( $Nom, $Email, $hasedpassword );
}

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>تسجيل حساب جديد</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f7f7f7;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .register-form {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .register-form h2 {
      margin-bottom: 20px;
      font-weight: 600;
      color: #d32f2f;
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 14px;
      border-radius: 8px;
      border: 1px solid #ccc;
      transition: 0.3s;
    }

    input:focus {
      outline: none;
      border-color: #d32f2f;
      box-shadow: 0 0 5px rgba(211, 47, 47, 0.2);
    }

    button {
      background-color: #d32f2f;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #b71c1c;
    }

    .login-link {
      margin-top: 15px;
      text-align: center;
      font-size: 0.9rem;
    }

    .login-link a {
      color: #d32f2f;
      text-decoration: none;
      font-weight: 500;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <form class="register-form" action="sign.php" method="POST">
    <h2>إنشاء حساب جديد</h2>

    <div class="form-group">
      <label for="name">الاسم الكامل</label>
      <input type="text" id="name" name="name" placeholder="أدخل اسمك الكامل" required>
    </div>

    <div class="form-group">
      <label for="email">البريد الإلكتروني</label>
      <input type="email" id="email" name="email" placeholder="example@email.com" required>
    </div>

    <div class="form-group">
      <label for="password">كلمة السر</label>
      <input type="password" id="password" name="password" placeholder="********" required>
    </div>

    <button type="submit">تسجيل</button>

    <div class="login-link">
      لديك حساب بالفعل؟ <a href="login.php">تسجيل الدخول</a>
    </div>
  </form>

</body>
</html>
