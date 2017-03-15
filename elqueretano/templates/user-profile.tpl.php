<?php
global $user;
$me = FALSE;
if (arg(1) != $user->uid && !arg(2)) {
    // estoy pidiendo un uid distinto al mío
    $uid = (count($user->roles) == 1 && array_key_exists(2, $user->roles)) ? $user->uid : (int)arg(1);
} else {// este soy yo
    $uid = $user->uid;
    $me = TRUE;
}
unset($user);
?>
<?php if (false): ?>
    <?php
        $block = module_invoke('imx_profile', 'block_view', 'imx_profile');
        print render($block['content']);
    ?>
<?php else: ?>
    <div id="contenedor-principal-misfavoritos" uid="<?php print $user->uid ?>">
        <?php
            $block = module_invoke('imx_users', 'block_view', 'imx_users_profile');
            print render($block['content']);
            $block2 = module_invoke('imx_users', 'block_view', 'imx_users_list');
            print render($block2['content']);
        ?>
    </div>
<?php endif; ?>