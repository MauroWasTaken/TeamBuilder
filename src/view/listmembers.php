<?php

ob_start();
/** @var \TeamBuilder\model\entity\Member[] $membersList */
/** @var bool $isModerator */
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
            <th>teamname</th>
            <th>Equipe(s)</th>
        </tr>
        <?php
        foreach ($membersList as $member): ?>
            <tr>
                <?php
                if ($isModerator): ?>
                    <td><a href="/?action=MemberProfile&id=<?= $member->id ?>"><?= $member->name ?></a></td>
                <?php
                else: ?>
                    <td><?= $member->name ?></td>
                <?php
                endif; ?>
                <td>
                    <?= implode(
                        ', ',
                        array_map(
                            function ($obj) { return "<a href='#'>" . $obj->name . "</a>"; },
                            $member->teams()
                        )
                    ) ?>
                </td>
            </tr>
        <?php
        endforeach; ?>
    </table>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';