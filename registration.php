<?php
require "header.php";
// Include config file
require_once "dbcon.php";
 
echo "<div class ='main'>";
// Define variables and initialize with empty values
$username = $password = $Name = $Surname = $Phone = $Email =  "";
$username_err = $password_err = $Name_err = $Surname_err = $Phone_err = $Email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_ID FROM user WHERE user_ID = ?";
        
        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
	// Validate Name
    if(empty(trim($_POST["Name"]))){
        $Name_err = "Please enter a Name.";     
    } elseif(preg_match('/[^a-zA-Z_]/',trim($_POST["Name"]))){
        $Name_err = "Name must be in characters with no space.";
    } else{
        $Name = trim($_POST["Name"]);
    }
	
	// Validate Surname
    if(empty(trim($_POST["Surname"]))){
        $Surname_err = "Please enter a Surname.";     
    } elseif(preg_match('/[^a-zA-Z_ ]/',trim($_POST["Surname"]))){
        $Surname_err = "Surname must be in characters.";
    } else{
        $Surname = trim($_POST["Surname"]);
    }
    
	// Validate Phone
    if(empty(trim($_POST["Phone"]))){
        $Phone_err = "Please enter a Phone Number.";     
    } elseif(preg_match('/(^[0-9]{10}$)/',trim($_POST["Phone"])) == 0){
        $Phone_err = "Only 10 numbers are allowed for Phone";
    } else{
        $Phone = trim($_POST["Phone"]);
    }
	
	// Validate Email
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter an Email.";     
    } elseif(filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL) != TRUE){
        $Email_err = "Please enter a valid Email";
    } else{
        $Email = trim($_POST["Email"]);
    }
	
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($Name_err) && empty($Surname_err) && empty($Phone_err) && empty($Email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (user_ID, password, Name, Surname, phone, Email ) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ssssss', $param_username, $param_password, $param_Name, $param_Surname, $param_Phone, $param_Email);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
			$param_Name = $Name;
			$param_Surname = $Surname;
			$param_Phone = $Phone;
			$param_Email = $Email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    echo "</div>";
    // Close connection
    $con->close();

}
require 'footer.php';

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
 <style>
.error {color: #FF0000;}
</style>  
</head>
<body>
    <div>
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div>
                <label>Username</label>
                <input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>">
                <span class="error"><?php if(isset($username_err)) {echo $username_err;}?></span>
            </div> 
			
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php if(isset($password)){echo $password;} ?>">
                <span class="error"><?php if(isset($password_err)) {echo $password_err;}?></span>
            </div>
            
			 <div>
                <label>Name</label>
                <input type="text" name="Name" value="<?php if(isset($Name)){echo $Name;} ?>">
                <span class="error"><?php if(isset($Name_err)) {echo $Name_err;}?></span>
            </div>
			
			 <div>
                <label>Surname</label>
                <input type="text" name="Surname" value="<?php if(isset($Surname)){echo $Surname;} ?>">
                <span class="error"><?php if(isset($Surname_err)) {echo $Surname_err;}?></span>
            </div>
			
			 <div>
                <label>Phone</label>
                <input type="text" name="Phone" value="<?php if(isset($Phone)){echo $Phone;} ?>">
                <span class="error"><?php if(isset($Phone_err)) {echo $Phone_err;}?></span>
            </div>
			
			 <div>
                <label>Email</label>
                <input type="text" name="Email" value="<?php if(isset($Email)){echo $Email;} ?>">
                <span class="error"><?php if(isset($Email_err)) {echo $Email_err;}?></span>
            </div>

            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>