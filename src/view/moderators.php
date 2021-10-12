<?php

ob_start();
/** @var \Teambuilder\model\entity\Team $team */
?>
    <header class="heading managing">
        <div style="text-align: center">moderators page</div>
    </header>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';