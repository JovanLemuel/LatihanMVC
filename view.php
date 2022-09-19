<?php
require_once("controller.php");
if (isset($_POST['submit'])) {
    insert();
}

if (isset($_GET['delete'])) {
    delete($_GET['delete']);
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
    <h1 class="text-center">Employee Office</h1>
    <div class="container-fluid">
        <table class="table table-mark mt-2 w-50 mx-auto table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Office</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                var_dump(index());
                foreach (index() as $index => $model) {
                    echo "
                <tr>
                    <td>" . $model->nama . "</td>
                    <td>" . $model->officeName . "</td>
                    <td><a href='view.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></a></td>
                </tr>
                ";
                }

                ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-center mt-2">Set Details</h1>
    <form method="POST" action="view.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleFormControlSelect1">Pilih Nama Karyawan</label>
                <select name="nama" type="text" class="form-control">
                    <?php
                    foreach (dataKaryawan() as $index => $karyawan) {
                        echo "<option value=nama>";
                        echo $karyawan->nama;
                        echo "</option>";
                    }

                    <?php foreach (indexKaryawan() as $indexka => $karyawan): ?>
                        <option value="<?= $index ?>"><?= $karyawan->nama ?></option>
                    <?php endforeach; ?>

                    ?>
                </select>
                <div class="form-group text-start w-50 d-inline-block">
                    <label for="exampleFormControlSelect2">Pilih Office</label>
                    <select name="officeName" class="form-control">
                        <?php
                        foreach (dataOffice() as $index => $office) {
                            echo "<option value=officeName>";
                            echo $office->officeName;
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <button name=" submit" type="submit" class="btn d-block mx-auto mt-2 btn-primary">Save</button>
    </form>
    <a href="viewKaryawan.php"><button class='btn d-block mx-auto mt-2 btn-primary'>View Karyawan</button></a>
    <a href="viewOffice.php"><button class='btn d-block mx-auto mt-2 btn-primary'>View Office</button></a>
</body>

</html>