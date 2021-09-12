<?php include "includes/db.php"; ?>
<link href="admin/dist/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/dist/">
<?php include "includes/head.php"; ?>

<?php include "includes/navigation.php";?>

        <div id="layoutAuthentication_content" class="bg-dark">>
            <main>
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="height:100vh">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form action="includes/login.php" method="post">
                                        <div class="form-group">
                                            <input class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Enter Username" name="username"/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter Password" name="password"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="forgot.php?forgot=<?php echo uniqid(true);?>">Forgot Password?</a>
                                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      <?php include"includes/footer.php";?>
