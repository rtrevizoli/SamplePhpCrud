<?php

if (isset($_GET['status'], $_GET['message'])) {
    echo '<b-alert status="'.$_GET['status'].'" alert-text="'.$_GET['message'].'."></b-alert>';
}