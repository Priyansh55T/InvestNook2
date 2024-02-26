<?php
$server = "localhost";
$user = "root";
$pssd = "";
$dbname = "product";

$conn = new mysqli($server, $user, $pssd, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['companylogo'] = $_POST['c_l'];
    $_SESSION['productdescription'] = $_POST['p_d'];
    $_SESSION['productname'] = $_POST['p_n'];
    $_SESSION['companyname'] = $_POST['c_n'];
    $_SESSION['fund'] = $_POST['fund'];
    $_SESSION['equity'] = $_POST['e_o'];
    $_SESSION['productphoto'] = $_POST['p_i'];
    $_SESSION['small_business_upi'] = $_POST['upi'];
    $_SESSION['contact'] = $_POST['no'];


    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO product_table (Company_logo,Product_Description,Company_Name,Product_Name,Fund_Required,Equity_Offered,Product_Photo,Small_Business_UPI, Contact
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the prepare statement succeeded
    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $result = $stmt->bind_param("ssssiissi", $_SESSION['companylogo'], $_SESSION['productdescription'],  $_SESSION['companyname'], $_SESSION['productname'], $_SESSION['fund'], $_SESSION['equity'],$_SESSION['productphoto'],$_SESSION['small_business_upi'], $_SESSION['contact']);

    // Check if the bind_param succeeded
    if ($result === false) {
        die("Error in bind_param: " . $stmt->error);
    }

    $stmt->execute();
    $stmt->close();

    echo "<script>
    alert('Data Inserted');
    window.location.href = 'Product_retrive.php';
    </script>";
} else {
    echo "Invalid request.";
}

$conn->close();
?>