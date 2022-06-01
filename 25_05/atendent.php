<?php
 
session_start();
 
if(isset($_GET['logout'])){    
     
    //Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_destroy();
    header("Location: escolha.html"); //Redirect the user
}
 
if(isset($_POST['enter'])){
    if(!isset($_POST['name'])){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
 // -- USADO CASO DEFINA NOME NA PAG -- 
/* function loginForm(){
    echo
    '<div id="loginform">
    <p>Please enter your name to continue!</p>
    <form action="atendent.php" method="post">
      <label for="name">Name &mdash;</label>
      <input type="text" name="name" id="name" />
      <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
  </div>';
} */
 
?>
<!DOCTYPE HTML>
<head>
    <title>Atendimento remoto</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="atend">

   

    <!-- Three -->
        <section id="three" class="wrapper">
            <div class="innerr">
               
                <div class="qesquerda">
                <div class="image round left">
                    <img src="images/pic08.jpeg" alt="Pic 01" />
                    <p>Atendente</p>
                </div>
                <p>Telefone:(xx) xxxx-xxxx<p>Estado:xx</p>            
                </div>
                
                <div class="qdireita">
                <div class="image round right">
                    <video id="video" autoplay></video>
                    <script src="JS/script.js"></script>
                    <p>Usuario</p>
                </div>
                <p>Telefone:(xx) xxxx-xxxx<p>Estado:xx</p>
                </div>                
            </div>
            
        </section>
        
        <div>
            <link rel="stylesheet" href="CSS/Chat.css" />
            <div class="menu">
                <a id="exit" href="escolha.html"> <div class="back"><i class="fa fa-chevron-left"></i></div></a>
            </div>
            <?php
    if(!isset($_SESSION['name'])){
        loginForm();
    }
    else {
    ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Bem vindo, <b><?php echo $_SESSION['name']; ?></b></p>
            </div>
 
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
 
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 1500);
 
                $("#exit").click(function () {
                    var exit = confirm("Voce quer encerrar a chamada?");
                    if (exit == true) {
                    window.location = "escolha.html?logout=true";
                    }
                });
            });
        </script>
    </body>
</html>
<?php
}
?>
        </div>
        

</body>
</html>