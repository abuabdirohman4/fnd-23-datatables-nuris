<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables</title>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Datatables Button -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap5.min.css">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <style>
        div.dataTables_wrapper div.dataTables_filter {
            float: left;
            margin-bottom: 1rem;
        }
        div.dataTables_wrapper div.dataTables_filter input{
            margin-left: 0;
        }
        div.dataTables_wrapper div.dataTables_filter button{
            margin-left: 1rem;
            background-color: #FF6B00;
            color: white;
        }
        .download-table .dt-buttons{
            float: right;
        }
        .download-table .dt-buttons .btn-secondary {
            background-color: #FF6B00;
            /* width: 15rem; */
        }
    </style>

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

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <!-- Bootstrap 5 -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Button Datatables -->
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

    <script>

        $(document).ready(function() {
            var table = $('#example').DataTable( {
                language: { search: "" },
                dom:
                "<'row'<'col-md-11'f>>" +
                "<'row'<'col-md-11'l><'col-md-1 download-table mb-2'B>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<' col-md-5'i><'col-md-7'p>>",
                // buttons: [ {
                //         extend: 'excel',
                //         text: 'Download',
                // }],
                buttons: ['colvis'],
                initComplete: function() {
                    var input = $('.dataTables_filter input').unbind()
                    self = this.api()
                    $searchButton = $('<button class="btn">')
                            .text('Search')
                            .click(function() {
                                self.search(input.val()).draw();
                            })
                    $('.dataTables_filter').append($searchButton)
                }

            } );
        
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );

            var label = $("label")
        } );

    </script>
</body>
</html>