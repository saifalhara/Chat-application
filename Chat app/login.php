<?php 
session_start() ; 
if(isset($_SESSION['unique_id'])) {
    header("location: user.php") ;
} 
?>
<?php include_once "header.php" ?> 
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-text"></div>
                    <div class="field input">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email name">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password">   
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>  
                <div class="field button">
                        <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link"> Not yet signed up? <a href="index.php">signup now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>


</body>
</html>