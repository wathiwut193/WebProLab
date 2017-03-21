<!DOCTYPE html>
<html>
    <?php
    include("db.php");
        session_start();
        $name = $_POST['name'];
        $email=$_POST['email'];
        $comment=$_POST['comment'];
        $_SESSION['$name']=$name;

    $query= "SELECT * FROM chat";
    mysqli_query("SET NAMES utf8");
    $run = $con->query($query);
    $offline=0;
    if(isset($_POST['enter'])){ 
        $query= "SELECT * FROM chat";
        mysqli_query("SET NAMES utf8");
        $run = $con->query($query); $check=0;
        while($row = $run->fetch_array()){
            if($_POST["name"] == $row["name"] && $_POST["email"] == $row["email"]) {$check=1;}
        }
        if($check==0){
            $query = "INSERT INTO chat (name,email,status,onChat) VALUES ('$name','$email',1,0)";
            $run = $con->query($query);
        }
        if($check==1) {
             $query = "UPDATE chat SET status=1 WHERE name='".$_POST['name']."' AND email='".$_POST['email']."' AND msg is NULL";
             $run = $con->query($query);
        }
    }else if(isset($_POST['sent'])){ 
        $query = "INSERT INTO chat (name,email,status,onChat,msg) VALUES ('$name','$email',0,1,'$comment')";
        $run = $con->query($query);
    }else if (isset($_POST['logout'])) {
        $query = "U PDATE chat SET status=0 WHERE name='".$_POST['name']."' AND email='".$_POST['email']."' AND msg is NULL";
        $run = $con->query($query);
        $offline=1;
        header("Location: http://angsila.cs.buu.ac.th/~58160638/887371/mini/test/login.php");
        exit;
    }
    ?>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>My Chat App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" media="all" />
    <script> 
        function chat_ajax(){ 
            var req = new XMLHttpRequest(); 
            req.onreadystatechange = function() { 
            if(req.readyState == 4 && req.status == 200){ 
                document.getElementById('text').innerHTML = req.responseText; 
            } 
        } 
        req.open('GET', 'chat.php', true); 
        req.send(); 
    } 
    setInterval(function(){chat_ajax()}, 1000)

    function user_ajax(){ 
            var req = new XMLHttpRequest(); 
            req.onreadystatechange = function() { 
            if(req.readyState == 4 && req.status == 200){ 
                document.getElementById('us').innerHTML = req.responseText; 
            }
        } 
        req.open('GET', 'userOnline.php', true); 
        req.send(); 
    } 
    setInterval(function(){user_ajax()}, 1000)

    function check(){
        document.getElementById("check").submit();
    }

     function logout(){
        document.getElementById("logout").submit();
    }
    
    </script>
</head>

<body style="background: lightblue">

    <?php //============================================================================================================== ?>

    <div class="container">
     <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">ChatByAjax</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <p>58160193</p>
    <p>58160638</p>
    <p>58160397</p>
    </ul>
  </div>
</nav>

        <div class="row pad-top pad-bottom">
            <div class=" col-lg-8 col-md-8 col-sm-8">
                <div class="chat-box-div">
                    <div class="chat-box-head">
                        หน้าต่างสนทนา
                    </div>
                    <div class="panel-body chat-box-main">
                        <div id="text">
                            
                        </div>
                    </div>
                    <form action="chatpage.php" id="check" method="post">
                    <div class="chat-box-footer">
                        <div class="input-group">
                            <input type="text" name="comment" class="form-control" placeholder="Enter Text Here..." maxlength=100>
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <span class="input-group-btn">
                                <input value="SEND" class="btn btn-info" type="submit" name="sent">
                            </span>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="chat-box-new-div">
                    <div class="chat-box-new-head">
                        Online Active
                    </div>
                    <div class="panel-body chat-box-new">
                        <?php if ($offline == 0) {
                        echo "<p>*  ". $name . "*  </p>"; } ?>
                            <hr class="hr-clas-low" />
                        <p id="us"></p>
                    </div>
                    <form action="chatpage.php" id="logout" method="post">
                    <div class="chat-box-footer">
                        <div class="input-group">
                            <span align="right"><input class="btn btn-info" type="submit" name="logout" value="logout" >
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="hidden" name="email" value="<?php echo $email; ?>"></span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_POST["sent"])){ ?>
    <script> check(); </script>
    <?php }?>

    <?php if(isset($_POST["logout"])){ ?>
    <script> logout(); </script>
    <?php }?>
</body>
</html>