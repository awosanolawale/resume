<?php
     $msg = '';
     $msgClass = '';
    if (filter_has_var(INPUT_POST, 'submit')) {
    
      # getting the email values
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      //$subject = htmlspecialchars($_POST['subject']);
      $message = htmlspecialchars($_POST['message']);

      // checking for required fields
      if (!empty($email) && !empty($email) && !empty($message)) {
        // check email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
            $msg = 'Please fill in a valid email';
            $msgClass = 'alert-danger';
        }else {
            //Recipient email
            $recipient = 'simileoluwaawosan@gmail.com';
            // subject
            $subject = 'Contact Request From' . $name;
            //body
            $body = '<h2>Contact Request</h2>
                <h4>Name<?h4><p>'.$name.'<?p>
                <h4>Name<?h4><p>'.$email.'<?p>
                <h4>Name<?h4><p>'.$message.'<?p>
                ';

                //Headers
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if (mail($recipient, $subject, $body, $headers)) {
                    $msg = 'Your email has been sent';
                    $msgClass = 'alert-success';
                }else {
                    $msg = 'Your email was not sent';
                    $msgClass = 'alert-danger';
                }

        }
      }else {
        $msg = 'Please fill in all required fields';
        $msgClass = 'alert-danger';
      }
    }
    
?>
<?php include 'head.php' ?>
<?php include 'header.php' ?>
<section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row mt-1">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <?php if ($msg != ''):?>
                            <div class = "alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                            <?php endif; ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" role="form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo isset($_POST['name']) ? $name : '';?>">
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo isset($_POST['email']) ? $email : '';?>">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" ><?php echo isset($_POST['message']) ? $message : '';?></textarea>
                            </div>
                            <br>
                            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <?php include 'footer.php' ?>
        <?php include 'scripts.php' ?>