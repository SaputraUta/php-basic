<?php
// INSERT INTO TABLE
// $username = "Patrick";
// $password = "rockbottom";
// $hashPassword = password_hash($password, PASSWORD_DEFAULT);
// $sql = "INSERT INTO users (user, password) VALUES ('$username', '$hashPassword')";
// try {
//     mysqli_query($conn, $sql);
//     echo "User's registered!";
// } catch(mysqli_sql_exception) {
//     echo "Could not register user";
// }

// SELECT FROM DATABASE
// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row["id"] . "<br>";
//         echo $row["user"] . "<br>";
//         echo $row["register_date"] . "<br>";
//     };
// } else {
//     echo "No user found";
// }
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2>Welcome to Fakebook!</h2>
        username: <br>
        <input type="text" name="username"><br>
        password: <br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="register">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "Please enter a username";
    } elseif (empty($password)) {
        echo "Please enter a password";
    } else {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, password) VALUES ('$username', '$hashPassword')";
        try {
            mysqli_query($conn, $sql);
            echo "User is registered";
        } catch (mysqli_sql_exception) {
            echo "That username is taken";
        }
    }
}
mysqli_close($conn);
?>