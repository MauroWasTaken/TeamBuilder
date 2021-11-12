<?php

ob_start();
/** @var \TeamBuilder\model\entity\Team $membersList */
?>
    <header class="heading managing">
        <h1 style="text-align: center">Moderators List</h1>
    </header>
    <table>
        <tr>
            <th>name</th>
        </tr>
        <?php
        array_map(
            function ($obj) { print "<tr><td>" . $obj->name . "</td></tr>"; },
            $membersList
        ) ?>
    </table>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';