<?php
ob_start();
?>
    <header class="heading managing">
        <h1 style="text-align: center">WELCOME</h1>
        <div style="text-align: right">salut: <?= $_SESSION["loggedmember"]->name ?></div>
    </header>
    <div class="column">
        <a class="button results column" href="/?action=MembersList">go to list :D</a>
    </div>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';