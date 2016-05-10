<?php
    if(isset($_POST['button1'])){
       header("location:main_forum.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="Css/style2.css" />
</head>
<body>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td><form method="POST" action=''>
<input type="submit" name="button1"  value="Tilbage">
</form></td>
<form id="form1" name="form1" method="post" action="add_new_topic.php">
<td colspan="2" bgcolor="#E6E6E6"><strong>Skriv en ny email</strong> </td>
</tr>
<tr>
<td width="14%"><strong>Emme</strong></td>

<td width="84%"><input name="topic" type="text" id="topic" size="50"required /></td>
</tr>
<tr>
<td valign="top"><strong>Tekst:</strong></td>
<td><textarea name="detail" style="margin: 0px; width: 375px; height: 180px;" id="detail"required></textarea></td>
</tr>
<tr>
<td><strong>Navn:</strong></td>
<td><input name="name" type="text" id="name" size="50"required /></td>
</tr>
<tr>
<td><strong>Til:</strong></td>
<td><input name="email" type="text" id="email" size="50" required/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Send" /> </td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</body>
</html>