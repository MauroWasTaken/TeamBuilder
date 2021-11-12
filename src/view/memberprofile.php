<?php

ob_start();
/** @var \TeamBuilder\model\entity\Member $member */
/** @var \TeamBuilder\model\entity\Role $role */
/** @var \TeamBuilder\model\entity\MemberStatus $status */
/** @var \TeamBuilder\model\entity\Team[] $captainOf */
/** @var \TeamBuilder\model\entity\Team[] $memberOf */
?>
    <header class="heading managing">
        <div style="text-align: center"><?= $member->name ?></div>
    </header>
    <h3>Role</h3>
<?= $role->name ?>
    <h3>Status</h3>
<?= $status->name ?>
<?php
if (Count($captainOf) > 0) : ?>
    <h3>Capitaine de:</h3>
    <?= implode(
        ' et ',
        array_map(
            function ($obj) { return $obj->name; },
            $captainOf
        )
    ) ?>
<?php
endif; ?>
<?php
if (Count($memberOf) > 0) : ?>
    <h3>Membre de:</h3>
    <?= implode(
        ' et ',
        array_map(
            function ($obj) { return $obj->name; },
            $memberOf
        )
    ) ?>
<?php
endif; ?>
<?php
if (Count($memberOf) == 0 & Count($captainOf) == 0) : ?>
    <br>Inscrit dans aucune équipe
<?php
endif; ?>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';