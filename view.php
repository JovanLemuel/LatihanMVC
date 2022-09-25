<?php
require_once("controller.php");
if (isset($_POST['submit'])) {
    insert();
}

if (isset($_GET['delete'])) {
    delete($_GET['delete']);
}

if (isset($_POST['edit'])) {
    edit($_POST['edit']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Main</title>
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
    <h1 class="text-center mt-5">Employee Office</h1>
    <div class="container-fluid">
        <table class="table table-mark mt-2 w-50 mx-auto table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Karyawan</th>
                    <th scope="col">Office</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (index() as $index => $model) {
                    echo "
                    <tr>
                        <td>" . $model->karyawanData . "</td>
                        <td>" . $model->officeData . "</td>
                        <td><a href='view.php?edit=" . $index . "'><button class='btn btn-primary'>Edit</button></a></td>
                        <td><a href='view.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></a></td>
                    </tr>
                    ";
                }

                ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-center mt-2"><?php echo isset($_GET['edit']) ? ' Edit' : 'Set' ?> Details</h1>
    <form method="POST" action="view.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="karyawanData">Pilih Karyawan</label>
                <select name="karyawanData" class="form-select">
                    <?php
                    foreach (dataKaryawan() as $storeKaryawan) {
                        echo "<option value='$storeKaryawan->nama'>";
                        echo $storeKaryawan->nama;
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="officeData">Pilih Office</label>
                <select name="officeData" class="form-select">
                    <?php
                    foreach (dataOffice() as $storeOffice) {
                        echo "<option value='$storeOffice->officeName'>";
                        echo $storeOffice->officeName;
                        echo "</option>";
                    }

                    ?>
                </select>
            </div>
        </div>
        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'submit' ?>" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : '' ?>" type="submit" class="btn d-block mx-auto mt-2 btn-primary">Save</button>
    </form>
</body>

</html>