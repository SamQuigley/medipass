 <?php
     
    include('config.php');
     
    // if(isset($_POST['firstname']) && !empty($_POST['firstname']) AND isset($_POST['surname']) && !empty($_POST['surname']) // Checking if all fields have been filled in, if not then no data will be inserted into database.
    // AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
        // Form Submited
        
        echo $fname = mysqli_real_escape_string($connection,$_POST['firstname']);        // Turn our post into a local variable also prevented SQL injection by removing special characters.
        $sname = mysqli_real_escape_string($connection,$_POST['surname']);          // Turn our post into a local variable also prevented SQL injection by removing special characters.
        $email = mysqli_real_escape_string($connection,$_POST['email']);            // Turn our post into a local variable also prevented SQL injection by removing special characters.
        $pass = mysqli_real_escape_string($connection,$_POST['password']);          // Turn our post into a local variable also prevented SQL injection by removing special characters.
        $passcode = md5($pass);                                                     // Encrypted password variable.
        $hash = md5( rand(0,1000) );                                                // Generate random 32 character hash and assign it to a local variable.
                                                                                    // Example output: f4552671f8909587cf485ea990207f3b
        
        $SQL = "INSERT INTO patient (patientId,patientName,patientSurname,age,email,password,hash,telephoneMobile,telephoneHome,eircode,locationId,sex,ppsn,medicalCard,active,physicianId,county) VALUES 
                                    ('','$fname','$sname',null,'$email','$passcode','$hash',null,null,null,null,null,null,0,1,0,0)";    // assigning the SQL injection to a variable called $SQL.
        $result = mysqli_query($connection,$SQL);                                                           // executes SQL code by using the connection to database from config.php file, and then inserting variabe $SQL from above.
        
        session_start();
        $_SESSION['myEmailVer'] = $email;
    // }    
?>

