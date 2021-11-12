<?php

ob_start();
/** @var \TeamBuilder\model\entity\Team $team */
?>
    <header class="heading managing">
        <div style="text-align: center"><?= $team->name ?></div>
    </header>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';