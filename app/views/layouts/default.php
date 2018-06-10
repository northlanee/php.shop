<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?= $this->getMeta();?>
</head>
<body>

<?= $content;?>

<?php
    $logs = \R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();

    debug( $logs->grep( 'SELECT' ) );
?>
</body>
</html>