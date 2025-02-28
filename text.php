<?php 
include('include/header.php');
require 'include/config.php';

$errormsg = $successmsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Function to validate and sanitize user input  
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return $data;
    }

    // Validate input
    $name = $phonenumber = $email = $subject = $message = "";
    $name = validate_input($_POST['name']);
    $phonenumber = validate_input($_POST['phone']);
    $email = validate_input($_POST['email']);
    $subject = validate_input($_POST['subject']);
    $message = validate_input($_POST['message']);
    
    // Date & Time
    $date = date("Y-m-d"); // Use proper SQL date format
    $time = date("H:i:s"); 

    // Check for empty fields
    if (empty($name) || empty($phonenumber) || empty($email) || empty($subject) || empty($message)) {
        $errormsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Some fields are empty. Please fill in all required fields before submitting the form.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                     </div>";
    } else {
        // Prepare the SQL query
        $stmt = $con->prepare("INSERT INTO inquiry (name, subject, email, mobile, message, date, time) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param("sssssss", $name, $subject, $email, $phonenumber, $message, $date, $time);

            if ($stmt->execute()) {
                $successmsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                Thank you for contacting us. We will get back to you shortly.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
            } else {
                $errormsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                An error occurred. Your message was not submitted. Please try again later.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                             </div>";
            }
            $stmt->close();
        } else {
            $errormsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Database error: Unable to prepare statement.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                         </div>";
        }
    }
}
?>

<!-- Contact Form Section -->
<div class="container mt-3">
    <div class="row mb-3 mx-0">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-3">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="row mx-0">
                    <div class="col-lg-12">
                        <?php echo $errormsg . $successmsg; ?>
                    </div>
                </div>
                <div class="row mb-3 mx-0">
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone number" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Write message" required></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <button type="submit" class="btn btn-color btn-md">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include('include/footer.php'); ?>





✅ Fixed database connection check
✅ Used FILTER_SANITIZE_FULL_SPECIAL_CHARS instead of deprecated FILTER_SANITIZE_STRING
✅ Better validation: Ensures fields are checked before executing SQL
✅ Fixed SQL execution logic: Handles query failures properly
✅ Formatted messages properly
✅ Ensured SQL date format consistency (Y-m-d and H:i:s)

Now, your contact form is more secure and efficient!
