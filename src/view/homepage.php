<?php

ob_start();
?>
    <header class="heading managing">
        <div style="text-align: center">WELCOME</div>
        <h1 style="text-align: right">salut: <?= $_SESSION["loggedmember"]->name ?></h1>
    </header>
    <div class="container dashboard">
        <section class="row">
            <div class="column">
                <a class="button results column" href="/?action=MembersList">Questions list</a>
                <a class="button results column" href="/?action=MyTeams">my questions</a>
                <a class="button results column" href="/?action=ModeratorsList">my questions</a>
            </div>
        </section>
    </div>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';