<!doctype html>
<html lang="en">
<?php 
include 'db.php';

$id = (int)$_GET['id'];
$sql = "select * from tasks where id='$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();
if (isset($_POST['submit'])) {
  $task = htmlspecialchars($_POST['task']);
  $sql2 = "update tasks set task= '$task' where id='$id'";
  $db->query($sql2);
  header('Location: index.php');
}
?>

<head>
  <title>To-Do | PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <center>
      <h1>Todo List</h1>
    </center>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <form method="post">
          <div class="form-group">
            <label for="task">Task</label>
            <input type="text" name="task" class="form-control" value="<?php echo $row['task']; ?>" required>
          </div>

          <input type="submit" class="btn btn-success" name="submit" value="update task">
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
      </div>



    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous"></script>
</body>

</html>