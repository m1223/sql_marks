<?php
include 'db.php';

// ADD STUDENT
if(isset($_POST['add_student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];

    $conn->query("INSERT INTO students (name,roll) 
                  VALUES ('$name','$roll')");
    header("Location: students.php");
    exit;
}

// DELETE STUDENT
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header("Location: students.php");
    exit;
}

// UPDATE STUDENT
if(isset($_POST['update_student'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];

    $conn->query("UPDATE students 
                  SET name='$name', roll='$roll' 
                  WHERE id=$id");
    header("Location: students.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">📊 Mark Management</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">🏠 Marks Entry</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="question.php">📘 Questions</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="students.php">👨‍🎓 Students</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="report.php">📈 Report</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<h2 class="mb-4">👨‍🎓 Students Management</h2>

<!-- Add Student Form -->
<form method="POST" class="row g-3 mb-4">
    <div class="col-md-3">
        <input type="text" name="roll" class="form-control" placeholder="Roll" required>
    </div>
    <div class="col-md-3">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
    <div class="col-md-3">
        <button type="submit" name="add_student" class="btn btn-success w-100">Add Student</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Roll</th>
        <th>Name</th>
        <th width="150">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $students = $conn->query("SELECT * FROM students ORDER BY roll ASC");
    while($row = $students->fetch_assoc()):
        ?>
        <tr>
            <form method="POST">
                <td>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="text" name="roll" value="<?= $row['roll'] ?>" class="form-control">
                </td>
                <td>
                    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control">
                </td>
                <td>
                    <button name="update_student" class="btn btn-primary btn-sm">Update</button>
                    <a href="?delete=<?= $row['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this student?')">
                        Delete
                    </a>
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>