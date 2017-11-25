<?php
function isExtensionLoaded($extension_name){
    return extension_loaded($extension_name);
}

echo isExtensionLoaded('curl') ? 'true' : 'false';