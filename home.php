<?php
$userName = $_SESSION["login"];

function makeVendorsTableHead() {
    echo "<tr>
            <th scope='col'>#</th>
            <th scope='col'>Name</th>
            <th scope='col'>E-mail</th>
            <th scope='col'>Phone</th>
            <th scope='col'>Sales made</th>
        </tr>";
};

function makeVendorsTable()
{
    include('db-connection.php');

    $sql = "Select * From Vendor Where Vendor_Status_Id = 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <th scope='row'>" . $row["Vendor_Id"] . "</th> 
                    <td>" . $row["Vendor_Name"] . "</td> 
                    <td>" . $row["Vendor_Email"] . "</td> 
                    <td>" . $row['Vendor_Phone'] . "</td>
                    <td>" . $row['Vendor_Sales'] . "</td>
                </tr>";
        }
    }
    mysqli_close($conn);
}

?>

<h1><?php echo "Hello, " . $userName; ?></h1>

<a class="btn btn-primary" href="http://localhost/tray-homework-php-test/?logout">Logout</a>

<div class="container py-4" style="width: 80%;">
    <div class="row align-items-start">
        <div class="col-md-2">
            <a class="btn btn-success" style="width: 100%;" href="http://localhost/tray-homework-php-test/?vendorId">+</a>
        </div>
        <div class="col-md">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Vendor name" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
        </div>
    </div>
</div>
<div class="container" style="width: 80%;">
    <table class="table table-responsive">
        <thead>
            <?php makeVendorsTableHead(); ?>
        </thead>
        <tbody>
            <?php makeVendorsTable(); ?>
        </tbody>
    </table>
</div>