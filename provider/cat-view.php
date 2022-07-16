<?php
require 'dbcon1.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Cat View</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cat View Details
                            <a href="index1.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM cats WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $cats = mysqli_fetch_array($query_run);
                                ?>
                                <div class="mb-3">
                                    <label>Cat ID</label>
                                    <p class="form-control">
                                        <?= $cats['cat_id']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Name</label>
                                    <p class="form-control">
                                        <?= $cats['name']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Gender</label>
                                    <p class="form-control">
                                        <?= $cats['gender']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Breed</label>
                                    <p class="form-control">
                                        <?= $cats['breed']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Age</label>
                                    <p class="form-control">
                                        <?= $cats['age']; ?>
                                    </p>
                                    <div class="mb-3">
                                        <label>Vaccinated</label>
                                        <p class="form-control">
                                            <?= $cats['vaccinated']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <p class="form-control">
                                            <?= $cats['image']; ?>
                                        </p>
                                    </div>

                            <?php
                                } else {
                                    echo "<h4>No Such Id Found</h4>";
                                }
                            }
                            ?>
                                </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>