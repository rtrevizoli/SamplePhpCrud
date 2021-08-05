<?php 
include('db-connection.php');
$vendorId = $_GET['vendorId'];

$saleValue = "";
$saleDate = "";

if (isset($_POST['submitButton'])) {

    $saleValue = $_POST['inputSaleValue'];
    $saleDate = $_POST['inputSaleDate'];

    if (!isset($_GET['edit'])) {
        $sql = "Insert Into Sale (Sale_Vendor_Id, Sale_Value, Sale_Date, Sale_Status_Id) 
                Values ('" . $vendorId . "', '" . $saleValue . "', '" . $saleDate . "', 1)";
    } else {
        $sql = "Update Vendor
                Set Vendor_Name = '" . $name . "',
                Vendor_Email = '" . $email . "',
                Vendor_Phone = '" . $phone . "'
                Where Vendor_Id = " . $vendorId;
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record success";
      } else {
        echo "Record error: " . $conn->error;
      }

    header("Location: http://localhost/tray-homework-php-test/");

}

if (isset($_GET['edit'])) {
    $sql = "Select Vendor_Name, Vendor_Email, Vendor_Phone From Vendor Where Vendor_Id = '" . $vendorId . "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $name = $row["Vendor_Name"];
        $email = $row['Vendor_Email'];
        $phone = $row['Vendor_Phone'];
      }

}

mysqli_close($conn);

?>
<div class="container py-4" style="width: 70%;">
        <div class="p-5 my-5 bg-light rounded-3">
            <div class="container-fluid">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="inputSaleValue" class="form-label">Sale value</label>
                        <input type="text" class="form-control" name="inputSaleValue" value="<?php echo $saleValue; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputSaleDate" class="form-label">Sale date</label>
                        <input type="date" class="form-control" name="inputSaleDate" value="<?php echo $saleDate; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>