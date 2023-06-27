<?php
/* Smarty version 3.1.30, created on 2023-06-27 17:56:51
  from "C:\xampp\htdocs\php_08_bd\app\views\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_649b06c31689e9_66030322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '074c398684908223b5735f47e93f755d9698c857' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_08_bd\\app\\views\\templates\\main.html',
      1 => 1687881409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649b06c31689e9_66030322 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Fractal by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

	
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1151603060649b06c315fd26_15611750', 'header');
?>

<nav id="nav">
    <div class="splash-container">
        <div class="splash">
            <h3 class="splash-head"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h3>
            <p class="splash-subhead"></p>
        </div>
    </div>
</nav>
        <div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_243127945649b06c3167f97_49265912', 'content');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81850220649b06c31685e6_19330801', 'footer');
?>

	
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
				</ul>
				<p class="copyright">&copy; Untitled. Credits: <a href="http://html5up.net">HTML5 UP</a></p>
			</footer>
        </div>
	
        </body>
</html><?php }
/* {block 'header'} */
class Block_1151603060649b06c315fd26_15611750 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'content'} */
class Block_243127945649b06c3167f97_49265912 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_81850220649b06c31685e6_19330801 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
}
