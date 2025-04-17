<?php
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "todolist";

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

// get all tasks
$tasksQuery = $conn->query("select * from tasks");
// add a new task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'])) {
    $content = trim($_POST['content']);

    if (!empty($content)) {
        $sql = "INSERT INTO tasks (content) VALUES ('$content')";
        $conn->query($sql);
    }
    header("Location: index.php");
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-sm mt-4" style="max-width: 600px">
        <form class="mb-2" method='post'>
            <input class="form-control" name='content' placeholder="Add a new task" required />
            <button type="submit" class="btn btn-primary mt-2">Add</button>
       </form>

       <?php
            if ($tasksQuery->num_rows > 0) {
                  while ($row = $tasksQuery->fetch_assoc()) {
                    echo "<div class='card mt-2'>
                                   <div class='card-body d-flex justify-content-between'>
                                     <h4>".$row['content']."</h4>
                                     <div>
                                         <button class='btn btn-success'>Complete</button>
                                         <button class='btn btn-danger'>Delete</button>
                                     </div>
                                   </div>
                         </div>";
                  }
                } else {
                  echo "<tr><td colspan='2'>No task</td></tr>";
                }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>