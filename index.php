<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables</title>

    <!-- Library JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- Libary CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Title</th>
                    <th>BirthDate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'env.php';
                    $employees = mysqli_query($mysql, "SELECT * FROM employees");
                    // echo $employees;
                    while($row = mysqli_fetch_assoc($employees)) {
                        echo "
                            <tr>
                                <td>".$row['FirstName']."</td>
                                <td>".$row['LastName']."</td>
                                <td>".$row['Title']."</td>
                                <td>".$row['BirthDate']."</td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $("#example").DataTable();
        })
    </script>

</body>
</html>