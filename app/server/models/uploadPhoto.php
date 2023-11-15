<?php

require '../services/conn_host.php';
require '../services/prepare.php';

echo json_encode($_FILES['file']);