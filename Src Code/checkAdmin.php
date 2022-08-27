<br/>
<form action="" method="POST">
    <label> Enter 4 digit Verification Code : </label>
    <div class="form-group">  <!------------------ verification code --------------------------->
        <input name="ver_code_field" type="password" class="form-control" placeholder="4-Digit Code" required>
    </div>
    <br/>    
    <button type='submit' name="vercode" class="form-control btn px-3 gap-1"> Sign in </button>
</form>
//2Step Verification, first step pass, second step : email code
    $admin_email = $row['admin_backup'];
    $verCode = rand(0000, 9000);
    ini_set("SMTP", "smtp-mail.outlook.com");
    ini_set('smtp_port', 587);
    //ini_set("sendmail_from", "linaloai126@outlook.com");
    mail('lanaloaigharibeh20002000@gmail.com', 'Verification Code', 'Your Verification Code is : '.$verCode);


    //Then the User may renter the verification code
    include 'checkAdmin.php';