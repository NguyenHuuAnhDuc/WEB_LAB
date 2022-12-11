<?php 
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

require_once "connection.php";
$usernameErr = $passErr = $loginErr="";
$username = $pass ="";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Please enter your username";
    $_SESSION["error"] = $usernameErr;
    header("location: index.php?page=login#id01");
    exit;
  }else if(!preg_match("/^[a-zA-Z0-9_]*$/",$username)){
    $usernameErr = "Invalid username format";
    $_SESSION["error"] = $usernameErr;
    header("location: index.php?page=login#id01");
    exit;
  }else{
    $username =trim($_POST["username"]);
  }
  
  if (empty($_POST["psw"])) {
    $passErr = "Please enter your password";
    $_SESSION["error"] = $passErr;
    header("location: index.php?page=login#id01");
    exit;
  } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",test_input($_POST["psw"]))){
    $passErr = "Invalid password format";
    $_SESSION["error"] = $passErr;
    header("location: index.php?page=login#id01");
    exit;
  }else{
    $pass = trim($_POST["psw"]);
  }

    if(empty($usernameErr) && empty($passErr)){
      $sql = "SELECT userID, username, password FROM users WHERE username = ?";
      if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        // Set parameters
        $param_username = $username;
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Store result
            mysqli_stmt_store_result($stmt);
            // Check if username exists, if yes then verify password
            if(mysqli_stmt_num_rows($stmt) == 1){                    
              // Bind result variables
              mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
              if(mysqli_stmt_fetch($stmt)){
                if(password_verify($pass, $hashed_password)){
                    // Password is correct, so start a new session
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;                            
                    // Redirect user to welcome page
                    header("location: index.php");
                }else{
                  // Password is not valid, display a generic error message
                  $loginErr = "Wrong password. Please try again";
                  // echo "<script language='javascript'>
                  //   alert('Login failed.Please try again');
                  //   document.location='index.php?page=login#id01';
                  // </script>";
                  $_SESSION["error"] = $loginErr;
                  header("location: index.php?page=login#id01");
                  exit;
                }
              }
            }else{
              // Username doesn't exist, display a generic error message
              $loginErr = "This username doesn't exist. Please try again";
              // echo "<script language='javascript'>
              //     alert('Login failed.Please try again');
              //     document.location='index.php?page=login#id01';
              // </script>";
              $_SESSION["error"] = $loginErr;
              header("location: index.php?page=login#id01");
              exit;
            }
        } else{
          echo "Oops! Something went wrong. Please try again later.";
          // echo "<script language='javascript'>
          //     alert('Login failed.Please try again');
          //     document.location='index.php?page=login#id01';
          // </script>";
        }
        // Close statement
        mysqli_stmt_close($stmt);
      }
    }else {
      // echo "<script language='javascript'>
      //    alert('Login failed.Please try again');
      //    document.location='index.php?page=login#id01';
      // </script>";
      $_SESSION["error"] = "Login failed. Please try again";
      header("location: index.php?page=login#id01");
      exit;
    }
  mysqli_close($conn);
}
