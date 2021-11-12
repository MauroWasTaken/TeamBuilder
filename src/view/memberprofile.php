<?php

ob_start();
/** @var \TeamBuilder\model\entity\Member $member */
/** @var \TeamBuilder\model\entity\Role $role */
/** @var \TeamBuilder\model\entity\MemberStatus $status */
/** @var \TeamBuilder\model\entity\Team[] $captainOf */
/** @var \TeamBuilder\model\entity\Team[] $memberOf */
/** @var bool $edit */
/** @var bool $isModerator */
?>

    <header class="heading managing">
        <div style="text-align: center">Profil de <?= $member->name ?></div>
    </header>
<?php
if ($edit): ?>
    <form action="/?action=SaveProfile&id=<?= $member->id ?>" method="post">
        <?php
        if ($isModerator): ?>
            <h3>Nom</h3>
            <?= $member->name ?>
            <h3>Role</h3>
            <input type="text" id="role" name="role" value="<?= $role->id ?>">
            <h3>Status</h3>
            <input type="text" id="status" name="status" value="<?= $status->id ?>">
        <?php
        else: ?>
            <h3>Nom</h3>
            <input type="text" id="name" name="name" value="<?= $member->name ?>">
            <h3>Role</h3>
            <?= $role->name ?>
            <h3>Status</h3>
            <?= $status->name ?>
        <?php
        endif; ?>
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
        <div class="container dashboard">
            <section class="row">
                <div class="column">
                    <input data-confirm="Are you sure?" class="button popup-confirm" type="submit" value="Sauvegarder
                    Modifications">
                </div>
            </section>
        </div>
    </form>
<?php
else: ?>
    <h3>Nom</h3>
    <?= $member->name ?>
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
                function ($obj) {
                    return $obj->name;
                },
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
                function ($obj) {
                    return $obj->name;
                },
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
    <div class="container dashboard">
        <section class="row">
            <div class="column">
                <a class="button results column" href="/?action=ModifyProfile&id=<?= $member->id ?>">Modifier le
                    profil</a>
            </div>
        </section>
    </div>
<?php
endif; ?>
    <script>
      document.querySelectorAll('.popup-confirm').forEach(element => {
        console.debug('test')
        element.addEventListener('click', event => {
          if (!confirm(element.dataset.confirm)) {
            event.preventDefault()
          }
        })
      })
    </script>
<?php
$content = ob_get_clean();
require 'src/view/layout.php';