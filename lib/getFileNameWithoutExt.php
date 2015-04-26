<?php

function getFileNameWithoutExt($fileName) {
    $lastDotIndex = strrpos($fileName, ".");
    return substr($fileName, 0, $lastDotIndex);
}

?>
