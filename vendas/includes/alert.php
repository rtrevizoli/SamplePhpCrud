<?php

if (isset($_GET['status'])) {
    echo '<b-alert alert-text="'.$_GET['status'].'."></b-alert>';
}