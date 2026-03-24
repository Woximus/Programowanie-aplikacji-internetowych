<?php
/* Smarty version 5.5.1, created on 2026-03-24 21:50:32
  from 'file:C:\xampp\htdocs\Szablonowanie Smart\app\../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_69c2f918a81751_99191123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77d8a421ebdf3388c3d7f411073336ef039d4a14' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Szablonowanie Smart\\app\\../templates/main.html',
      1 => 1774385428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69c2f918a81751_99191123 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Szablonowanie Smart\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Kalkulator Kredytowy" ?? null : $tmp);?>
</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/style.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
    <div id="page-wrapper">
        <div id="wrapper">
            <section class="panel banner right">
                <div class="content color0 span-4-5">
                    
                    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_102192807469c2f918a80919_79750921', 'content');
?>


                </div>
            </section>
            
            <div class="copyright">&copy; Strona Stworzona przez Wiktora Włodarczyka</div>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'content'} */
class Block_102192807469c2f918a80919_79750921 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Szablonowanie Smart\\templates';
?>
 <?php
}
}
/* {/block 'content'} */
}
