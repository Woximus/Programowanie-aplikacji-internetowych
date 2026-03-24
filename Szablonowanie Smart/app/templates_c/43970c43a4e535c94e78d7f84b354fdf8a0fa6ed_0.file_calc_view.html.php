<?php
/* Smarty version 5.5.1, created on 2026-03-24 21:55:21
  from 'file:C:\xampp\htdocs\Szablonowanie Smart/app/calc_view.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_69c2fa39c514f4_56022624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43970c43a4e535c94e78d7f84b354fdf8a0fa6ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Szablonowanie Smart/app/calc_view.html',
      1 => 1774385623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69c2fa39c514f4_56022624 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Szablonowanie Smart\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_66452204069c2fa39c41c84_41521609', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_66452204069c2fa39c41c84_41521609 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Szablonowanie Smart\\app';
?>

<h2 class="major">Kalkulator Kredytowy</h2>
<form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="POST">
    <div class="fields">
        <div class="field">
            <label for="kwota">Kwota kredytu:</label>
            <input type="text" name="kwota" id="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
">
        </div>
        <div class="field">
            <label for="lata">Okres (lata):</label>
            <input type="text" name="lata" id="lata" value="<?php echo $_smarty_tpl->getValue('form')['lata'];?>
">
        </div>
        <div class="field">
            <label for="oprocentowanie">Oprocentowanie (%):</label>
            <input type="text" name="oprocentowanie" id="oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')['oprocentowanie'];?>
">
        </div>
    </div>
    <ul class="actions">
        <li><button type="submit" class="button primary">Oblicz ratę</button></li>
    </ul>
</form>
<div class="messages">
    <?php if ((true && ($_smarty_tpl->hasVariable('messages') && null !== ($_smarty_tpl->getValue('messages') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
        <ul style="color: #ffaaaa;">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
            <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }
if ((true && (true && null !== ($_smarty_tpl->getValue('result')['rata'] ?? null)))) {?>
        <p style="color: #aaffaa; font-weight: bold; font-size: 1.1em;">
            Miesięczna rata: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('result')['rata'],2,',',' ');?>
 PLN<br>
            Suma do spłaty: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('result')['calkowita'],2,',',' ');?>
 PLN
        </p>
    <?php }?>
</div>
<?php
}
}
/* {/block 'content'} */
}
