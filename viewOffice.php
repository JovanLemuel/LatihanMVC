<?php

require_once("controllerOffice.php");
if (isset($_POST['submit'])) {
    insertOffice();
}

if (isset($_GET['delete'])) {
    deleteOffice($_GET['delete']);
}

if (isset($_POST['edit'])) {
    editOffice($_POST['edit']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Office</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-nav">
                <a class="nav-link" href="view.php">Main</a>
                <a class="nav-link" href="viewkaryawan.php">Karyawan</a>
                <a class="nav-link" href="viewoffice.php">Office</a>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-5">View Office</h1>
    <div class="container-fluid">
        <table class="table table-mark mt-2 w-50 mx-auto table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Office</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (indexOffice() as $index => $office) {
                    echo "
                <tr>
                    <td>" . $index . "</td>
                    <td>" . $office->officeName . "</td>
                    <td>" . $office->address . "</td>
                    <td>" . $office->city . "</td>
                    <td>" . $office->phone . "</td>
                    <td><a href='viewOffice.php?edit=" . $index . "'><button class='btn btn-primary'>Edit</button></a></td>
                    <td><a href='viewOffice.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></a></td>
                </tr>
                ";
                }

                ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-center mt-2"><?php echo isset($_GET['edit']) ? ' Edit' : 'Add' ?> Office Details</h1>
    <form method="POST" action="viewOffice.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputEmail1">Office</label>
                <input name="officeName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo isset($_GET['edit']) ? ' Edit' : 'Add' ?> Office Name" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputPassword1">Address</label>
                <input name="address" type="text" class="form-control" id="exampleInputPassword1" placeholder="<?php echo isset($_GET['edit']) ? ' Edit' : 'Add' ?> Address" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputPassword1">City</label>
                <input name="city" type="text" class="form-control" id="exampleInputPassword1" placeholder="<?php echo isset($_GET['edit']) ? ' Edit' : 'Add' ?> City" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputPassword1">Phone</label>
                <input name="phone" type="number" class="form-control" id="exampleInputPassword1" placeholder="<?php echo isset($_GET['edit']) ? ' Edit' : 'Add' ?> Phone" required>
            </div>
        </div>
        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'submit' ?>" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : '' ?>" type="submit" class="btn d-block mx-auto mt-2 btn-primary">Submit</button>
    </form>
</body>

</html>