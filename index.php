<?php include '/xampp/htdocs/sp404/php-feedback-activity/inc/connection.php';
// define variables and set to empty values
$nameErr = "Enter your name";
$emailErr = "Enter your email";
$bodyErr = "Enter your feedback";
$name = $email = $body = "";
$datePosted = date('d-m-y h:i:s');



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
    } 
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["body"])) {
    $bodyErr = "Feedback is required";
  } else {
    $body = htmlspecialchars($_POST["body"]);
  }

  if ($name !== "" && $email !== "" && $body !== "") {mysqli_query($conn, "INSERT INTO feedbacks (name, email, body, datePosted) VALUES ('$name', '$email', '$body', '$datePosted')"); 
		$_SESSION['message'] = "feedback saved"; 
		header('location: index.php');
    $name = $email = $body = "";
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Leave Feedback</title>
  </head>
  <body>
    <?php include '/xampp/htdocs/sp404/php-feedback-activity/inc/header.php'; ?>
    <main>
      <div class="container d-flex flex-column align-items-center">
        <img src="./img/logo.png" class="w-25 mb-3" alt="" />
        <h2>Feedback</h2>
        <p class="lead text-center">Leave feedback for Kodego SP404</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="mt-4 w-75">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="<?php echo $nameErr?>"
              value="<?php echo $name?>"
            />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="<?php echo $emailErr?>"
              value="<?php echo $email?>"
            />
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Feedback</label>
            <textarea
              class="form-control"
              id="body"
              name="body"
              placeholder="<?php echo $bodyErr?>"
            ><?php echo $body?></textarea>
          </div>
          <div class="mb-3">
            <input
              type="submit"
              name="submit"
              value="Send"
              class="btn btn-dark w-100"
            />
          </div>
        </form>
      </div>
    </main>

    <?php include '/xampp/htdocs/sp404/php-feedback-activity/inc/footer.php' ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
