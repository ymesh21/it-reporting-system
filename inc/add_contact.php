<?php
// Define variables and initialize with empty values
$firstname = $lastname = $sex = $woreda = $position = $phone = $email = "";
$firstname_err = $lastname_err = $sex_err = $woreda_err = $position_err = $phone_err = $email_err =  "";

if(isset($_POST['add_contact'])){
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate firstname
        $input_firstname = trim($_POST["firstname"]);
        if(empty($input_firstname)){
            $firstname_err = "Please enter a Firstname.";
        } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $firstname_err = "Please enter a valid Firstname.";
        } else{
            $firstname = $input_firstname;
        }

        // Validate lastname
        $input_lastname = trim($_POST["lastname"]);
        if(empty($input_lastname)){
            $lastname_err = "Please enter a Lastname.";
        } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $lastname_err = "Please enter a valid Lastname.";
        } else{
            $lastname = $input_lastname;
        }
        
        // Validate sex
        $input_sex = trim($_POST["sex"]);
        if(empty($input_sex)){
            $sex_err = "Please select a sex.";     
        } else{
            $sex = $input_sex;
        }

        // Validate woreda
        $input_woreda = trim($_POST["woreda"]);
        if(empty($input_woreda)){
            $woreda_err = "Please enter an woreda.";     
        } else{
            $woreda = $input_woreda;
        }

        // Validate position
        $input_position = trim($_POST["position"]);
        if(empty($input_position)){
            $position_err = "Please enter a position.";
        } elseif(!filter_var($input_position, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z&.\s]+$/")))){
            $lastname_err = "Please enter a valid position.";
        } else{
            $position = $input_position;
        }
        
        // Validate phone
        $input_phone = trim($_POST["phone"]);
        if(empty($input_phone)){
            $phone_err = "Please enter the phone number.";     
        } else{
            $phone = $input_phone;
        }
        
        // Validate email
        $input_email = trim($_POST["email"]);
        if(empty($input_email)){
            $email_err = "Please enter an email.";
        }  else{
            $email = $input_email;
        }

        // Check input errors before inserting in database
        if(empty($firstname_err) && empty($lastname_err) && empty($sex_err) && empty($woreda_err) && empty($position_err) && empty($phone_err) && empty($email_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO contacts (firstname, lastname, sex, woreda, position, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            if($stmt = $conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("sssssss", $param_firstname, $param_lastname, $param_sex, $param_woreda, $param_position, $param_phone, $input_email);
                
                // Set parameters
                $param_firstname = $firstname;
                $param_lastname = $lastname;
                $param_sex = $sex;
                $param_woreda = $woreda;
                $param_position = $position;
                $param_phone = $phone;
                $param_email = $email;
                // $param_status = $status;
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Records created successfully. Redirect to landing page
                    header("location: ../contacts.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            $stmt->close();
        }
    }
}
