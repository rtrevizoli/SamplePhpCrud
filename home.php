<?php
$userName = $_SESSION["login"];
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
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Sales made</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>motto@mdo.com</td>
                <td>R$ 500,00</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>jthornton@fat.com</td>
                <td>R$ 200,00</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>lnoi@twitter.com</td>
                <td>R$ 30,00</td>
            </tr>
        </tbody>
    </table>
</div>