<?php
session_start();

include './Helpers/Dbh.php';
include './Helpers/Client.php';
include './services/SmsService.php';
include './Models/Sms.php';
include './controllers/SmsController.php';



if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending SMS Using clickatell gateway</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center card-container">
            <div class="col-md-7 mt-5">
                <div class="card">
                    <div class="card-header">Sent SMS</div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-header">Send SMS</div>
                    <?php
                    if (isset($success)) :
                    ?>
                        <div class="alert alert-success mx-3 mt-2"><?= $success ?></div>
                    <?php
                    endif;
                    ?>

                    <?php
                    if (isset($error)) :
                    ?>
                        <div class="alert alert-danger mx-3 mt-2"><?= $error ?></div>
                    <?php
                    endif;
                    ?>
                    <form action="./views/sms.view.php" method="post">
                        <div class="card-body">
                            <div>
                                <label class="sr-only" for="inlineFormInputGroup">Phone Number</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-phone    "></i></div>
                                    </div>
                                    <input type="text" name="phone" class="form-control form-control-lg" placeholder="phone number">
                                </div>

                                <?php
                                if (isset($errors['phone number'])) :
                                ?>
                                    <div class="text-danger"><?= $errors['phone number'] ?></div>
                                <?php
                                endif;
                                ?>

                            </div>

                            <div>
                                <label class="sr-only" for="inlineFormInputGroup">SMS</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-envelope    "></i></div>
                                    </div>
                                    <textarea type="text" name="sms" class="form-control form-control-lg"></textarea>
                                </div>

                                <?php
                                if (isset($errors['sms'])) :
                                ?>
                                    <div class="text-danger"><?= $errors['sms'] ?></div>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="sendSMS" value="SEND" class="btn btn-primary float-right">
                        </div>
                    </form>
                </div>

                <div class="alert alert-info mt-2">
                    <strong>
                        NB: The api is in the sandbox development mode.<br>
                        The only phone number that will recieve the SMS sent is +254743751575; <br>
                        This is the only number registered in the test api.
                    </strong>
                </div>
            </div>
        </div>
    </div>
</body>

</html>