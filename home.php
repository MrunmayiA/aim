<?php
include 'db_conn.php';

require 'vendor/autoload.php';  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        if ($username === 'Mrunmayi' && $password === 'Mrunmayi12345') {

            // Create PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                
                $mail->SMTPDebug = 2;
                $mail->isSMTP(); 
                $mail->Host = 'smtp.gmail.com'; 
                $mail->SMTPAuth = true; 
                $mail->Username = ''; //enter sender email id
                $mail->Password = ''; //enter sender email id password 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port = 587; 

                
                $mail->setFrom('@gmail.com', 'Asset Inventory System'); // Sender email
                $mail->addAddress(''); // Recipient email

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Login Notification';
                $mail->Body = '<p>Hello, ' . $username . '! You have successfully logged in at ' . date('Y-m-d H:i:s') . '</p>';

              
                if ($mail->send()) {
                    echo 'Login email notification sent successfully';
                } else {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }

            } catch (Exception $e) {
               
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            
            header('Location: ./home2.php');
            exit;
        } else {
            echo '<script>alert("Invalid username or password. Please try again.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Asset Sense - Asset Inventory Manager</title>
    <style>
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5, #ff9a9e);
            background-size: 300% 300%;
            animation: gradientAnimation 8s ease infinite;
        }

        .login-page {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
            text-align: center;
        }

        .login-page:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        h1 {
            margin-bottom: 10px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #666;
            font-weight: normal;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #74ebd5;
            outline: none;
        }

        button {
            background-color: #74ebd5;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #4fc3d3;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        button:active {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .message a {
            color: #74ebd5;
            text-decoration: none;
        }

        .message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <h1>Asset Sense</h1>
        <h2>Asset Inventory Manager</h2>
        <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" placeholder="Username" name="username" required />
            <input type="password" placeholder="Password" name="password" required />
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</body>
</html>
