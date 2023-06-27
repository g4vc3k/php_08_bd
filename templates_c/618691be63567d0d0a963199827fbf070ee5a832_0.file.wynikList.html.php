<?php
/* Smarty version 3.1.30, created on 2023-06-27 18:00:48
  from "C:\xampp\htdocs\php_08_bd\app\views\wynikList.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_649b07b05c4695_47142001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '618691be63567d0d0a963199827fbf070ee5a832' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_08_bd\\app\\views\\wynikList.html',
      1 => 1687881644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649b07b05c4695_47142001 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Moc (W)</th>
            <th>Czas (h)</th>
            <th>Cena prądu (1kWh)</th>
            <th>Koszt (zł)</th>
            <th>Rola</th>
            
            <?php if (inRole('rok')) {?>
                <th>Opcje</th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["moc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["czas"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["cena"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["wynik"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["rola"];?>
</td><?php if (inRole('rok')) {?><td><a id="recordDelete" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wynikiDelete&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">Usuń</a></td><?php }?></tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
    </table><?php }
}
