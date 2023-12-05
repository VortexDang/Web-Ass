<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Custom CSS for card */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }
    </style>
    <title>Home</title>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">Your Resumes</h3>
        <div class="row">
            <?php
            // Create a database connection
            $mysqli = new mysqli("localhost", "root", "", "WebAss");

            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Query to retrieve resumes
            $sql = "SELECT id, name, full_name FROM resumes";
            $result = $mysqli->query($sql);

            // Check if there are any resumes
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display each resume in a box
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Name: ' . $row['name'] . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">Full Name: ' . $row['full_name'] . '</h6>';
                    echo '<p class="card-text">ID: ' . $row['id'] . '</p>';
                    // Add a "Choose Template" button
                    echo '<a href="choose_template.php?id=' . $row['id'] . '" class="btn btn-primary">Choose Template</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No resumes found.</p>';
            }

            // Close the database connection
            $mysqli->close();
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>