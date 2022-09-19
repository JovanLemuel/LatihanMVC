<?php

require_once("controllerKaryawan.php");
if (isset($_POST['submit'])) {
    insertKaryawan();
}

if (isset($_GET['delete'])) {
    deleteKaryawan($_GET['delete']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Karyawan</title>
</head>

<body>
    <h1 class="text-center">View Karyawan</h1>
    <div class="container-fluid">
        <table class="table table-mark mt-2 w-50 mx-auto table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (indexKaryawan() as $index => $karyawan) {
                    echo "
                <tr>
                    <td>" . $index . "</td>
                    <td>" . $karyawan->nama . "</td>
                    <td>" . $karyawan->jabatan . "</td>
                    <td>" . $karyawan->usia . "</td>
                    <td><a href='viewKaryawan.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></a></td>
                </tr>
                ";
                }

                ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-center mt-2">Tambah Karyawan</h1>
    <form method="POST" action="viewKaryawan.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputEmail1">Nama</label>
                <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputPassword1">Jabatan</label>
                <input name="jabatan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Jabatan">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputPassword1 ">Usia</label>
                <input type="number" name="usia" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Usia">
            </div>
        </div>
        <button name="submit" type="submit" class="btn d-block mx-auto mt-2 btn-primary">Submit</button>
    </form>
    <a href="viewOffice.php"><button class='btn d-block mx-auto mt-2 btn-primary'>View Office</button></a>
    <a href="view.php"><button class='btn d-block mx-auto mt-2 btn-primary'>View All</button></a>
</body>

</html>