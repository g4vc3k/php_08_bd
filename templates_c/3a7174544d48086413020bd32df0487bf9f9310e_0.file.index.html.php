<?php
/* Smarty version 3.1.30, created on 2023-06-27 17:22:02
  from "C:\xampp\htdocs\php_08_bd\app\views\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_649afe9a2944e5_16439658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a7174544d48086413020bd32df0487bf9f9310e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_08_bd\\app\\views\\index.html',
      1 => 1686158520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.html' => 1,
    'file:messages.html' => 1,
  ),
),false)) {
function content_649afe9a2944e5_16439658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_541496816649afe9a283a35_38692399', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1559620081649afe9a2844d5_96376774', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1867415040649afe9a293c87_67284400', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'header'} */
class Block_541496816649afe9a283a35_38692399 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_1559620081649afe9a2844d5_96376774 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1867415040649afe9a293c87_67284400 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


			<header id="header">
				<div class="content">
					<h4>Kalkulator zużycia prądu</h4>
					<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post">
	<label for="id_moc">Pobór mocy w watach: </label>
	<input id="id_moc" type="text" name="moc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->moc;?>
" /><br />
    
	<label for="id_czas">Czas w godzinach: </label>
	<input id="id_czas" type="text" name="czas" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->czas;?>
" /><br />
    
    <label for="id_cena">Cena prądu za 1kWh: </label>
    <input id="id_cena" type="text" name="cena" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cena;?>
" /><br />
    

    <input type="submit" value="Oblicz" />
</form>	

    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="pure-button pure-button-active">Wyloguj</a>
    
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
chroniona" class="pure-button pure-button-active">Inna strona</a>


<?php $_smarty_tpl->_subTemplateRender("file:messages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isWynik()) {?>
                <h3>Wynik:</h3>
                <div>
                    <ol>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getWynik(), 'wyn');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['wyn']->value) {
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['wyn']->value;?>
</li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ol>
                </div>
                <?php }?>

				</div>
				
			</header>

			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'content'} */
}
