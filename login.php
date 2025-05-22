<?php 
if( isset( $_POST['email'])&& isset($_POST['password']) ){
  $email = $_POST['email'];
  $password = $_POST['password'];
  require_once 'config.php';
  Login( $email, $password );
}
if(isset($_GET['message']) && $_GET['message'] == "sign") {
  echo '
  <div class="fixed top-8 left-1/2 transform -translate-x-1/2 z-50">
    <div class="flex items-center gap-3 bg-white border-2 border-green-500 text-green-700 px-6 py-4 rounded-lg shadow-md" role="alert">
      <span class="text-2xl">✔️</span>
      <span class="font-medium">تم إنشاء الحساب بنجاح!</span>
      <button onclick="this.parentElement.parentElement.style.display=\'none\'" class="ml-4 text-green-700 hover:text-green-900 focus:outline-none text-xl">
        ×
      </button>
    </div>
  </div>
  ';
}

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>تسجيل الدخول</title>
  <script src="https://cdn.tailwindcss.com"></script>
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

    .login-form {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-form h2 {
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

    .register-link {
      margin-top: 15px;
      text-align: center;
      font-size: 0.9rem;
    }

    .register-link a {
      color: #d32f2f;
      text-decoration: none;
      font-weight: 500;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <form class="login-form" action="login.php" method="POST">
    <h2>تسجيل الدخول</h2>

    <div class="form-group">
      <label for="email">البريد الإلكتروني</label>
      <input type="email" id="email" name="email" placeholder="example@email.com" required>
    </div>

    <div class="form-group">
      <label for="password">كلمة السر</label>
      <input type="password" id="password" name="password" placeholder="********" required>
    </div>

    <button type="submit">دخول</button>

    <div class="register-link">
      لا تتوفر على حساب؟ <a href="sign.php">إنشاء حساب</a>
    </div>
  </form>

</body>
</html>
