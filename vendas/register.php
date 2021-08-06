<?php

require __DIR__.'/vendor/autoload.php';

echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

// VALIDAÇÂO DO POST
if (isset($_POST['inputNeme'], $_POST['inputEmail'], $_POST['inputPhone'])) {
    
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsForm.php';
include __DIR__.'/includes/footer.php';