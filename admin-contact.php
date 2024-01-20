<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <?php
    $connection = new mysqli("localhost", "root", "", "AG");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $select_query = "SELECT * FROM contact_messages";
    $result = $connection->query($select_query);

    if ($result->num_rows > 0) {
        $messages = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $messages = array();
    }

    $connection->close();
    ?>

    <h1>Contact Messages</h1>

    <?php if (!empty($messages)): ?>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
            <?php foreach ($messages as $message): ?>
                <tr>
                    <td>
                        <?php echo $message['name']; ?>
                    </td>
                    <td>
                        <?php echo $message['email']; ?>
                    </td>
                    <td>
                        <?php echo $message['subject']; ?>
                    </td>
                    <td>
                        <?php echo $message['message']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No contact messages found.</p>
    <?php endif; ?>


</body>

</html>