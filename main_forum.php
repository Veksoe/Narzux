<?php

include 'dba.php';
$tbl_name="fquestions"; 


mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";


$result=mysql_query($sql);
?>
<link type="text/css" rel="stylesheet" href="Css/style.css" />
<table>
<tr>
<th width="9%" ><strong>Til</strong></th>
<th width="50%" ><strong>Emne</strong></th>
<th width="15%" ><strong>Set af</strong></th>
<th width="13%" ><strong>Svar</strong></th>
<th width="13%" ><strong>Tidspunkt</strong></th>
</tr>

<?php

// Start looping table row
while($rows = mysql_fetch_array($result)){
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['email']; ?></td>
<td align="center" bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
mysql_close();
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic.php"><strong>Skriv en ny email</strong> </a></td>
</tr>
</table>