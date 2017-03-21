<html>
<head>
<meta charset="utf-8">
<title>LOGIN</title>
<script>
  $('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
  });

  function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }
        return true;
}
</script>

<link rel="stylesheet" href="login.css" media="all" />
</head>

<body>

<div class="login-page">
  <div class="form">
    <form class="login-form" action="chatpage.php" method="post">
      <h1>Log in</h1>
     
      <input type="text" name="email" placeholder="email" onblur="validateEmail(this);"/>
      <input type="text" name="name" placeholder="username"/>
      
      <button type="submit" name="enter">เข้าสู่ห้องสนทนา</button>
    </form>
  </div>
</div>
</body>
</html>