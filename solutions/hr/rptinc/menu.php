<?php $nMenuItems = 0; ?>
<script language="JavaScript" src="rptjs/menu.js"></script>
<table border="0" cellspacing="0" cellpadding="0"><tr><td>
<script type="text/javascript" language="javascript">
var oMenu_base = new Menu();
var oMenu_PHPReport = oMenu_base.CreateMenu();
oMenu_PHPReport.displayHtml = "Reports";
oMenu_base.AddItem(oMenu_PHPReport);
var oMenu_1 = oMenu_base.CreateMenu();
oMenu_1.displayHtml = "stock";
oMenu_1.href = "stockrpt.php";
oMenu_PHPReport.AddItem(oMenu_1);
oMenu_PHPReport.SetOrientation("v");
<?php $nMenuItems++; ?>
var oMenu_2 = oMenu_base.CreateMenu();
oMenu_2.displayHtml = "rptstock";
oMenu_2.href = "rptstockctb.php";
oMenu_PHPReport.AddItem(oMenu_2);
oMenu_PHPReport.SetOrientation("v");
<?php $nMenuItems++; ?>
oMenu_base.SetOrientation("h");
oMenu_base.SetSize(150, 20);
<?php if ($nMenuItems > 0) { ?>
oMenu_base.Render();
<?php } ?>
</script>
</td>
</tr></table>
