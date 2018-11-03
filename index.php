<!doctype html>
<html lang="en">
<?php 
include 'db.php';
//pagination
$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from tasks limit " . $start . ", " . $perPage . " ";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total / $perPage);

$rows = $db->query($sql);
?>

<head>
  <title>To-Do | PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="container">
    <center>
      <h1>Todo List</h1>
    </center>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover ">
          <button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal"> <i class="fa fa-plus"
              aria-hidden="true"></i> Add Task</button>
          <button type="button" class="btn btn-default float-right" onclick=print()>Print</button>
          <br />
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Add Task</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="add.php" method="post">
                    <div class="form-group">
                      <label for="task">Task</label>
                      <input type="text" name="task" class="form-control" required>
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" value="add task">

                  </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          <br />


          <thead>
            <tr>
              <th>#</th>
              <th class="col-md-10">Task</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php while ($row = $rows->fetch_assoc()) : ?>

              <td scope="row">
                <?php echo $row['id']; ?>
              </td>
              <td>
                <?php echo $row['task'] ?>
              </td>
              <td><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-warning "><i class="fa fa-edit"
                    aria-hidden="true"></i> Edit</a></td>
              <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger "><i class="fa fa-trash"
                    aria-hidden="true"> Delete</a></td>
            </tr>

            <?php endwhile; ?>
          </tbody>
        </table>
        <ul class="pagination justify-content-center">
          <?php for ($i = 1; $i <= $pages; $i++) : ?>
          <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>">
              <?php echo $i; ?></a></li>
          <?php endfor; ?>
        </ul>
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