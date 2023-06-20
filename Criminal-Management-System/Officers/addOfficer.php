<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Criminal Management System - Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_1.css'>
    <script type="text/javascript">
    function submitBtn() {
        if (document.forms["offInfo"]["contact"].value.length == 11) {

        } else {
            alert('Please enter a valid number');
        }
    }
    </script>
</head>

<body>
    <button name="logout"><img src="../logout.png" style="width:10px"><a href="../logout.php">Log out</a></button>
    <div class="container" style="height:900px; margin-left:11%; margin-top:-10px">
        <div class="finaldiv">
            <span class="head1"><img src="police_logo.png" width="16.2%"></span>
            <span class="head_txt">Criminal Management System</span>
            <span class="head2"><img src="police_logo.png" width="38%"></span>

            <br>
            <div class="navbar">
                <ul style="margin-left:135px">
                    <li><a href="addOfficer.php" class="active"><b>Add Officer</b></a></li>
                    <li><a href="searchOff.php"><b>Search Officer</b></a></li>
                    <li><a href="weapon.php"><b>Weapons Assigned</b></a></li>
                </ul>
            </div>
            <div id="crimeInfo"
                style="background-image: url('police_logo_1.png'); background-repeat:no-repeat;margin-top: 50px; background-size: 60%;">
                <form id="offInfo" method="post">
                    <table>
                        <tr>
                            <td>
                                Officers Name
                            </td>
                            <td>
                                <input type="text" name="offName">
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>
                                Officers ID
                            </td>
                            <td>
                                <input type="text" name="offID">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Assigned Case(ID)
                            </td>
                            <td>
                                <input type="text" name="ID">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contact
                            </td>
                            <td>
                                <input type="text" name="contact">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                <input type="radio" name="gender" value="M">Male &nbsp;&nbsp;<input type="radio"
                                    name="gender" value="F">Female
                            </td>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Weapon Assigned
                            </td>

                            <td>
                                <select name="weapon">
                                    <option><b>--Select weapon assigd to officer--</b></option>
                                    <option value="M4">M4</option>
                                    <option value="M107">M107</option>
                                    <option value="Smith and Wesson M&P">Smith and Wesson M&P</option>
                                    <option value="Glock Pistol">Glock Pistol</option>
                                    <option value="Pistol Auto 9mm 1A">Pistol Auto 9mm 1A</option>
                                    <option value="MP5 German Automatic Sub-machine Gun">MP5 German Automatic
                                        Sub-machine Gun</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Select Role
                            </td>
                            <td>

                                <select name="role">
                                    <option><b>--Select role of officer--</b></option>
                                    <option value="Sr.PI">Sr.PI(Senior Police Inspector)</option>
                                    <option value="API">API(Asst. Police Inspector)</option>
                                    <option value="PSI">PSI(Police Sub-Inspector)</option>
                                    <option value="HC">HC(Head Constable)</option>
                                    <option value="C">Constable</option>
                                </select>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>

                    </table>
                    <button type="submit" class="submitBtn1" onclick="submitBtn()"><b>Add Officer</b></button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
$db = "criminalinfo1";
$servername = "localhost";
$username = "root";
$pass = "";
$offName = $offID = $ID = $contact = $gender = $weapon = $role = $result = " ";
$conn = mysqli_connect($servername, $username, $pass, $db);

if (!$conn) {
    echo "error: " . mysqli_connect_error();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offName = $_POST['offName'];
    $offID = $_POST['offID'];
    $ID = $_POST['ID'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $weapon = $_POST['weapon'];
    $role = $_POST['role'];

    // Check if the record already exists
    $checkQuery = "SELECT * FROM `officer` WHERE `offID` = ?";
    $stmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmt, "s", $offID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);

    if ($rowCount > 0) {
        echo "<script>alert('Officer with the same ID already exists.');</script>";
    } else {
        $insertQuery = "INSERT INTO `officer`(`offName`, `offID`, `ID`, `contact`, `gender`, `weapon`, `role`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sssssss", $offName, $offID, $ID, $contact, $gender, $weapon, $role);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Officer Added Successfully');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
