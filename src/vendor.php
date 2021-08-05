<?php 
include('db-connection.php');
$vendorId = $_GET['vendorId'];

$name = "";
$email = "";
$phone = "";

if (isset($_POST['submitButton'])) {

    $name = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $phone = $_POST['inputPhone'];

    if (!isset($_GET['edit'])) {
        $sql = "Insert Into Vendor (Vendor_Name, 
                                    Vendor_Email, 
                                    Vendor_Phone, 
                                    Vendor_Status_Id) 
                Values ('" . $name . "', 
                        '" . $email . "', 
                        '" . $phone . "', 
                        1)
            ";
    } else {
        $sql = "Update Vendor
                Set Vendor_Name = '" . $name . "',
                    Vendor_Email = '" . $email . "',
                    Vendor_Phone = '" . $phone . "'
                Where Vendor_Id = " . $vendorId
            ;
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record success";
      } else {
        echo "Record error: " . $conn->error;
      }

    header("Location: ../tray-homework-php-test/");

}

if (isset($_GET['edit'])) {
    $sql = "Select  Vendor_Name, 
                    Vendor_Email, 
                    Vendor_Phone 
            From Vendor 
            Where Vendor_Id = '" . $vendorId . "'
        ";
        
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
                        <label for="inputName" class="form-label">Vendor name</label>
                        <input type="text" class="form-control" name="inputName" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="inputEmail" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="inputPhone" value="<?php echo $phone; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>