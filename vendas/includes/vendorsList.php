<?php
$headers = '';
$rows = '';

if (count($vendors) > 0) {
        $headers = '
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Sales made</th>
                            <th scope="col">Vendor\'s charge</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    ';

    foreach($vendors as $vendor) {
        $rows .= '
                    <tr class="table-row" id="vendorsTableRow"'.$vendor->Vendor_Id.' data-href="#">
                        <th scope="row">'.$vendor->Vendor_Id.'</th>
                            <td>'.$vendor->Vendor_Name.'</td>
                            <td>'.$vendor->Vendor_Email.'</td>
                            <td>'.$vendor->Vendor_Phone.'</td>
                            <td>R$ '.$vendor->Vendor_Sales.'</td>
                            <td>R$ '.$vendor->Vendor_Charge.'</td>
                            <td>
                                <a class="btn btn-outline-warning" href = "edit.php?vendorId='.$vendor->Vendor_Id.'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>'.' Edit Vendor '.'
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger" href ="delete.php?vendorId='.$vendor->Vendor_Id.'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>'.' Delete '.'
                                </a>
                            </td>
                        </th>
                    </tr>
                ';
    }
} else {
    $rows .= '
                <tr>
                    <td>'.' No vendor registered '.'</td>
                </tr>
            ';
}
?>

<main>
    <section>
        <div class="row align-items-start">
            <div class="col-md-2">
                <a class="btn btn-success" style="width: 100%;" href="register.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </a>
            </div>
            <div class="col-md">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Vendor name" name="vendorsSearch" value="">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="container" style="width: 90%;">
            <table class="table table-hover table-responsive">
                <thead>
                    <?=$headers?>
                </thead>
                <tbody>
                    <?=$rows?>
                </tbody>
            </table>
        </div>
    </section>
</main>