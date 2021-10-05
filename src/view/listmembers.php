<?php
ob_start();
?>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <header class="heading managing">
        <h1 style="text-align: center">Members List</h1>
    </header>
    <table>
        <tr>
            <th>Membre</th>
            <th>Equipe(s)</th>
        </tr>
        <?php foreach ($membersList as $member): ?>
            <tr>
                <td><?= $member->name ?></td>
                <td>
                    <?php $teams = $member->teams() ?>
                    <?php $first = true; ?>
                    <?php foreach ($teams as $team): ?>
                        <?php if ($first): ?>
                            <?= $team->name ?>
                            <?php $first = false ?>
                        <?php else: ?>
                            <?= ", " . $team->name ?>
                        <?php endif ?>

                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';