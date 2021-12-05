<?php

    // Check if User Coming From A Request

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Assign into Variables

        $user = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING); 
        $mail = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $cell = filter_var(trim($_POST['cellphone']), FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

        // trim for removing spacing from left and right. 

        if (strlen($user) < 8){
            $userError = '*Username Must be <strong>Larger Than 8</strong>';
        }

        if (strlen($mail) === ''){
            $mailError = '*The Email Must Be a <strong>Valid Email</strong>';
        }

        if (strlen($cell) < 8){
            $cellError = '*Phone Number Must be <strong>Larger Than 8</strong>';
        }
        
        if (strlen($msg) < 10){
            $msgError = '*The Message Can\'t be <strong>less Than 10</strong>';
        }
        
        //If There's No Errors it Will Send The Message to Email

        $headers = 'From: ' . $mail . '\r\n';
        $myEmail = 'mahmoud.masri1996@gmail.com';
        $subject = 'My subject';
        
        if (empty ($userError && $mailError && $cellError && $msgError)){
            
            mail($myEmail, $subject, $msg, $headers);

            $user = '';
            $mail = '';
            $cell = '';
            $msg = '';

             $success = '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            <strong>Thank You, We have Recieved Your Message.</strong>
                        </div>
                        </div>';

            header("Refresh:5");

         }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/design.css">
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@700;900&display=swap">
    
    <title>Contact-Form</title>
</head>
<body>
        <!-- Form Start -->
        <div class="container">
            <h1 class="text-center">Contact US</h1>
 
            <form class="contact-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <?php if(isset($success)) { echo $success; } ?>
                <div class="form-group">
                <input 
                    type="text" 
                    class="form-control user" 
                    name="username" 
                    autocomplete="off" 
                    placeholder="Enter Your Username"
                    value="<?php if(isset($user)){ echo $user; } ?>">
                <i class="fas fa-user fa-fw"></i>
                <span class="asterisk">*</span>
                <div class="alert alert-danger errors">*Username Must be <strong>Larger Than 8</strong></div> 
                </div>
                <?php 
                    if (isset ($user)){
                        echo $userError = '<div class="alert alert-danger errors">*Username Must be <strong>Larger Than 8</strong></div>';
                    }
                ?>

                <div class="form-group">
                <input 
                    type="email" 
                    class="form-control email" 
                    name="email"
                    autocomplete="off" 
                    placeholder="Please Enter A Validate Email"
                    value="<?php if(isset($mail)){ echo $mail; } ?>">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="asterisk">*</span>
                <div class="alert alert-danger errors">*The Email Must Be a <strong>Valid Email</strong></div>
                </div>
                <?php 
                    if (isset ($mail)){
                        echo $mailError = '<div class="alert alert-danger errors">*The Email Must Be a <strong>Valid Email</strong></div>';
                    }
                ?>

                <div class="form-group">
                <input 
                    type="text" 
                    class="form-control phone" 
                    name="cellphone" 
                    autocomplete="off" 
                    placeholder="Enter Your Cell Phone"
                    value="<?php if(isset($cell)){ echo $cell; } ?>">
                <i class="fas fa-phone-alt fa-fw"></i>
                <span class="asterisk">*</span>
                <div class="alert alert-danger errors">*Phone Number Must be <strong>Larger Than 8</strong></div> 
                </div>
                <?php 
                    if (isset ($cell)){
                        echo $cellError = '<div class="alert alert-danger errors">*Phone Number Must be <strong>Larger Than 8</strong></div>';
                    }
                ?>

                <div class="form-floating">
                <div class="form-group">
                <textarea 
                class="form-control msg"
                name="message" 
                rows="8" 
                autocomplete="off" 
                placeholder="Type Your Message....."
                value="<?php if(isset($msg)){ echo $msg; } ?>"></textarea>
                <span class="asterisk">*</span>
                <div class="alert alert-danger errors">*The Message Can not be <strong>less Than 10</strong></div>
            </div>
        </div>
        
                <?php 
                    if (isset ($msg)){
                        echo $msgError = '<div class="alert alert-danger errors">*The Message Can\'t be <strong>less Than 10</strong></div>';
                    }
                
                ?>

                <input 
                    type="submit" 
                    class="btn btn-success btn" 
                    value="Send Message">
                <i class="fas fa-paper-plane fa-fw send"></i>
            </form>
        </div>
        <!-- Form End -->

    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>