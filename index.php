<?php
    // MIME-Types that are whitelisted.
    $aWhitelistedExtensions = array(
        'jpeg',
        'jpg',
        'png'
    );

    // Get all Filepaths from files in the "images" folder
    $aFiles = glob('images'. DIRECTORY_SEPARATOR .'*');

    if (!$aFiles) {
        throw new Exception('No files in images directory!');
    } else {
        $iSelector = random_int(0, count($aFiles) - 1);
        $sFilePath = $aFiles[$iSelector];
        $sFileExtension = explode('.', $sFilePath)[count(explode('.', $sFilePath))-1];
        if (in_array($sFileExtension, $aWhitelistedExtensions)) {
            header('Content-Type:image/'.$sFileExtension);
            readfile($sFilePath);
        } else {
            throw new Exception('File extension not whitelisted! (Currently whitelisted: jpg, jpeg, png)');
        }
    }
?>