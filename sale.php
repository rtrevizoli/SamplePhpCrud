<?php 
include('db-connection.php');
$vendorId = $_GET['vendorId'];
$saleId = $_GET['saleId'];

$saleValue = "";
$saleDate = "";

if (isset($_POST['submitButton'])) {

    $saleValue = $_POST['inputSaleValue'];
    $saleDate = $_POST['inputSaleDate'];

    if (!isset($_GET['edit'])) {
        $sql = "Insert Into Sale (Sale_Vendor_Id, 
                                  Sale_Value, 
                                  Sale_Date, 
                                  Sale_Status_Id) 
                Values ('" . $vendorId . "',
                        '" . $saleValue . "',
                        '" . $saleDate . "',
                        1)
            ";
    } else {
        $sql = "Update Sale
                Set Sale_Value = '" . $saleValue . "',
                    Sale_Date = '" . $saleDate . "'
                Where Sale_Id = " . $saleId
            ;
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record success";
      } else {
        echo "Record error: " . $conn->error;
      }

    header("Location: http://localhost/tray-homework-php-test/?vendorId=" . $vendorId . "&sales");

}

if (isset($_GET['edit'])) {
    $sql = "Select  Sale_Value, 
                    Sale_Date 
            From Sale 
            Where   Sale_Id = '" . $saleId . "' 
                    and Sale_Vendor_Id ='" . $vendorId . "'
        ";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $saleValue = $row["Sale_Value"];
        $saleDate = $row['Sale_Date'];
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