<?php

// check if success is set
if (isset($success)) {
    echo $success;
}
else {
    // iterate through errors
    foreach ($errors as $error)
    {
        echo $error;
    }
}

?>