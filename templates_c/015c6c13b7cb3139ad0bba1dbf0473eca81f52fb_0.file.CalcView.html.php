<?php
/* Smarty version 3.1.30, created on 2023-06-27 17:55:20
  from "C:\xampp\htdocs\php_08_bd\app\views\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_649b0668b594e3_70101053',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '015c6c13b7cb3139ad0bba1dbf0473eca81f52fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_08_bd\\app\\views\\CalcView.html',
      1 => 1687881319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.html' => 1,
    'file:messages.html' => 1,
    'file:wynikList.html' => 1,
  ),
),false)) {
function content_649b0668b594e3_70101053 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
    
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1062076163649b0668b58e03_45401612', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_1062076163649b0668b58e03_45401612 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	
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

    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="pure-button pure-button-active">Wyloguj</a>
    
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
chronionaView" class="pure-button pure-button-active">Inna strona</a>

	<div>
		<?php $_smarty_tpl->_subTemplateRender("file:messages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isWyniki()) {?>
		<h3>Wynik:</h3>
		<div>
			<ol class="wyniki">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getWyniki(), 'w');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
?>
			<li><?php echo $_smarty_tpl->tpl_vars['w']->value;?>
</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ol>
		</div>
		<?php }?>

		<?php $_smarty_tpl->_subTemplateRender("file:wynikList.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	</div>
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
