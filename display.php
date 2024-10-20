<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style type="text/css">
        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            width: 100%;
            overflow-x: auto;
        }

        .content-table thead tr {
            background-color: #250821;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="sign up.php" class="btn btn-primary mb-3">Add user</a>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>UID</th>
                    <th>Authority</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM login";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["First_name"] . "</td>";
                        echo "<td>" . $row["Last_name"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["uid"] . "</td>";
                        echo "<td>" . $row["authority"] . "</td>";
                        echo '<td class="btn-group">';
                        echo '<a href="update.php?id=' . $row["id"] . '" class="btn btn-primary mr-2">Update</a>';
                        echo '<a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';
                        echo '<a href="active.php?id=' . $row["id"] . '" class="btn btn-alive" onclick="return confirm(\'Are you sure you want to acvtive this record?\')">active</a>';
                        echo '<a href="deactive.php?id=' . $row["id"] . '" class="btn btn-dead" onclick="return confirm(\'Are you sure you want to deactive this record?\')">deactive</a>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
``