<?php
require_once '../../app/configs/sessions.php';
startSession();
require_once '../../app/models/detailStudentsModel.php';


$student = getE($conn);
deleteE($conn);

