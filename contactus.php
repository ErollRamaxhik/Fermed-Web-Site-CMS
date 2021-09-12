<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>
<?php include "includes/functions.php";?>
<?php
$warning=3;
    if(isset($_POST['submit'])){

    
        $to = "exwave96@gmail.com";
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $message = $_POST['message'];

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phonenumber) && !empty($message)){
            $warning=1;

            $body = "";
            $body .= "First Name: ";
            $body .= $firstname;
            $body .= "\nLast Name: ";
            $body .= $lastname;
            $body .= "\nEmail: ";
            $body .= $email;
            $body .= "\nPhone Number : ";
            $body .= $phonenumber;
            $body .= "\nMessage : ";
            $body .= $message;

            // send email
            mail($to,"Fermed",$body);
            
        }else{
            $warning=0;
        }


    }
?>

<body>


    <!--NAVBAR SECTION-->
    <?php $page="contactus.php";?>
    <?php include "includes/navigation.php";?>

    <!--PAGE HEADER-->

    <header id="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <h1>Contact Us</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, eaque!</p>
                </div>
            </div>
        </div>
    </header>

    <!--CONTACT US SECTION-->

    <section id="contact" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body">
                            <h4>Get In Touch</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, quibusdam.</p>
                            <h4>Address</h4>
                            <hr>
                            <p>Prishtine, KOSOVO</p>
                            <h4>Email</h4>
                            <hr>
                            <p>test@test.com</p>
                            <h4>Phone</h4>
                            <hr>
                            <p>(555)-555-55-55</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card p-4">
                        <div class="card-body">
                            <h3 class="text-center">Please fill out this from to contact us</h3>
                            <hr>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name" name="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-2">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Submit" class="btn btn-outline-danger w-100" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if($warning==1){
                                echo "<div class='mt-2 alert alert-success text-center' role='alert'>
                                Your Message has been sent!
                                </div>";
                            }else if($warning==0){
                                echo "<div class='mt-2 alert alert-danger text-center' role='alert'>
                                Fields cannot be empty!
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--STAFF-->

    <section id="staff" class="py-5 text-center bg-dark text-white">
        <div class="container">
            <h1>Our Staff</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-4">
                    <img src="img/ferdimazrek.jpg" alt="" class="img-fluid rounded-circle mb-2">
                    <h4>Ferdi Mazrek</h4>
                    <small>Dentist</small>
                    <div class="d-flex justify-content-center" style="font-size: 1.5rem;">
                        <div class="p-2">
                            <a href="https://www.linkedin.com/in/erollramaxhik/" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <div class="p-2">
                            <a href="#" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-instagram "></i>
                            </a>
                        </div>
                        <div class="p-2">
                            <a href="#" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <img src="img/erollramaxhik.jpg" alt="" class="img-fluid rounded-circle mb-2">
                    <h4>Eroll Ramaxhik</h4>
                    <small>Computer Engineer</small> 
                    <div class="d-flex justify-content-center" style="font-size: 1.5rem;">
                        <div class="p-2">
                            <a href="https://www.linkedin.com/in/erollramaxhik/" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <div class="p-2">
                            <a href="#" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-instagram "></i>
                            </a>
                        </div>
                        <div class="p-2">
                            <a href="#" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--FOOTER-->

    <?php include "includes/footer.php";?>
    
</body>

</html>

