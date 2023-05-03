<?php

// check if result is set
if (isset($result)) {
    echo $result;
}
else {
    route('login');
    exit();
}

?>