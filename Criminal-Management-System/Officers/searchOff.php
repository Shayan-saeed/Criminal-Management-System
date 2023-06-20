<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Criminal Management System - Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../style_1.css'>
    <script src='main.js'></script>
</head>

<body>
    <button name="logout"><img src="../logout.png" style="width:10px"><a href="../logout.php">Log out</a></button>
    <div class="container" style="height:900px; margin-left:11%; margin-top:-10px">
        <div class="finaldiv">
            <span class="head1"><img src="../police_logo.png" width="16.2%"></span>
            <span class="head_txt">Criminal Management System</span>
            <span class="head2"><img src="../police_logo.png" width="38%"></span>

            <br>
            <div class="navbar">
                <ul style="margin-left:135px">
                    <li><a href="addOfficer.php"><b>Add Officer</b></a></li>
                    <li><a href="searchOff.php" class="active"><b>Search Officer</b></a></li>
                    <li><a href="weapon.php"><b>Weapons Assigned</b></a></li>
                </ul>
            </div>
            <span class="searchGroup">
                <form method="post">
                    <input type="text" class="searchBar"
                        placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search Officer By Name" name="search">
                    <button class="searchBtn"><img src="../search.png" width="50%"></button>
                    <img src="police_logo_1.png" style="margin-left:-90px;margin-top: 85px;">
                </form>
                <?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "criminalinfo1";

$conn = mysqli_connect($servername, $username, $pass, $db);
if (!$conn) {
    echo "error: " . mysqli_connect_error();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        $data = $_POST['search'];
        $q1 = "SELECT offName, offID, ID, contact, gender, weapon, role FROM officer WHERE offName='$data'";
        $result = mysqli_query($conn, $q1);
        if ($result) {
            if (mysqli_num_rows($result) <= 0) {
                echo "<script>alert('Record Not Found')</script>";
                die('');
            }
            echo '
            <table border="5" style="position:absolute; left:-50px;top:200px;">
            <tr>
                <th>Officer Name</th>
                <th>Officer ID</th>
                <th>Assigned case ID</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Weapon</th>
                <th>Role</th>
                <th>Action</th>
            </tr>';

            while ($row = mysqli_fetch_array($result)) {
                echo '
                <tr>
                    <td>' . $row['offName'] . '</td>
                    <td>' . $row['offID'] . '</td>
                    <td>' . $row['ID'] . '</td>
                    <td>' . $row['contact'] . '</td>
                    <td>' . $row['gender'] . '</td>
                    <td>' . $row['weapon'] . '</td>
                    <td>' . $row['role'] . '</td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delOffID" value="' . $row['offID'] . '">
                            <button type="submit" name="delbtn">Delete</button>
                        </form>
                    </td>
                </tr>';
            }
        }
    }

    if (isset($_POST['delbtn'])) {
        $delOffID = $_POST['delOffID'];
        $q2 = "DELETE FROM `officer` WHERE offID='$delOffID'";
        $result2 = mysqli_query($conn, $q2);
        if ($result2) {
            echo "<script>alert('Record Deleted')</script>";
        }
    }
}

mysqli_close($conn);
?>




                </table>
        </div>
        </span>
    </div>
    </div>
</body>

</html>