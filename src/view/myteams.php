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
        <div style="text-align: center">Mes equipes</div>

    </header>
    <table>
        <tr>
            <th>team name</th>
            <th>nb members</th>
            <th>team captain</th>
        </tr>
        <?php
        foreach ($teams as $team): ?>
            <tr>
                <td><a href="/?action=Team&id=<?= $team->id ?>"><?= $team->name ?></a></td>
                <td><?= count($team->getMembers()) ?></td>
                <td><?= $team->getCaptain()->name ?></td>
            </tr>
        <?php
        endforeach; ?>
    </table>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';