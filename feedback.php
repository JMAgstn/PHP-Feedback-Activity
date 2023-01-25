<?php 
include '/xampp/htdocs/sp404/php-feedback-activity/inc/connection.php';
$fb = mysqli_query($conn, "SELECT * FROM feedbacks ORDER BY datePosted DESC");
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
        <h2>Feedback</h2>
        <?php while ($row = mysqli_fetch_array($fb)) { ?>
          <div class="card my-3">
          <div class="card-header text-center">
            <h5><?php echo $row['name']; ?></h5>
            <p><?php echo $row['email']; ?></p>
          </div>
          <div class="card-body">
            <?php echo $row['body']; ?>
          </div>
          <div class="card-footer text-muted text-center">
            <?php echo $row['datePosted'] ?>
          </div>
        </div>

          <?php } ?>
        
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
