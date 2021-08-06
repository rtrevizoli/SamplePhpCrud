<?php
include('./src/db-connection.php');

$to = 'rtrevizoli@yahoo.com.br';
$from = 'ratrevizoli@gmail.com';
$fromName = 'Rafael Trevizoli - Teste';
$subject = date('d/m/Y').' Sales Report';
$message = '';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: ' . $fromName . '<' . $from . '>';




$sql = "Select  V.Vendor_Id, 
	                V.Vendor_Name, 
                    V.Vendor_Email, 
                    V.Vendor_Phone, 
                    Truncate(IfNull(Sum(S.Sale_Value), 0), 2) Vendor_Sales,
                    Truncate(IfNull(Sum(S.Sale_Value), 0) * 0.085, 2) Vendor_Charge
            From Vendor V
                Left Join Sale S On V.Vendor_Id = S.Sale_Vendor_Id
            Where   V.Vendor_Status_Id = 1
                    and S.Sale_Date =".date('Y-m-d')."
            Group by V.Vendor_Id, V.Vendor_Name, V.Vendor_Email, V.Vendor_Phone
        ";

$result = $conn->query($sql);




$message = '
    <html>
        <head>
            <title>Daily Sales Report</title>
        </head>
        <body>
            <p>Good evening!</p>
            <p>Below, sales made today, '.date('d/m/Y').'</p>
            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Sales made</th>
                        <th scope="col">Vendor\'s charge</th>
                    </tr>
                </thead>
                <tbody>
    ';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $message .= '
                    <tr class="table-row" id="vendorsTableRow"' . $row['Vendor_Id'] . '>
                        <th scope="row">' . $row['Vendor_Id'] . '</th> 
                            <td>' . $row['Vendor_Name'] . '</td> 
                            <td>' . $row['Vendor_Email'] . '</td> 
                            <td>' . $row['Vendor_Phone'] . '</td>
                            <td>R$ ' . $row['Vendor_Sales'] . '</td>
                            <td>R$ ' . $row['Vendor_Charge'] . '</td>
                    </tr>
                ';
    }
}

$message .= '
                </tbody>
            </table>
        </body>
    </html>
    ';

mysqli_close($conn);

if (mail($to, $subject, $message, implode("\r\n", $headers))) {
    echo 'Email has sent successfully';
} else {
    echo 'U r a genius';
}
