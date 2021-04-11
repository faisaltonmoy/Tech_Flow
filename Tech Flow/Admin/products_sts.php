<!doctype html>
<html lang="en">
  <head>
    <title>Feedback</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
        <div class="container">
                <div class="title">
                    <h3>User's Feedback</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                fopen("feedback.csv", "a");
                                if (($messages_file = fopen("feedback.csv", "r")) !== FALSE) {
                                while (($message_data = fgetcsv($messages_file, 5000, ",")) !== FALSE) {
                                    echo '<tr>';
                                            echo '<td>' . $message_data[0] . '</td>';
                                            echo '<td>' . $message_data[1] . '</td>';
                                            echo '<td>' . $message_data[2] . '</td>';
                                            echo '<td>' . $message_data[3] . '</td>';
                                            echo '<td>' . $message_data[4] . '</td>';
                                            echo '<td>' . $message_data[5] . '</td>';
                                    echo '</tr>';
                                }
                                fclose($messages_file);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>