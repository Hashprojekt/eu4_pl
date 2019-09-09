<?
if (isset($_GET['id']) && preg_match('/^foto-[0-9]+.jpg$/', $_GET['id'])) {
$n = 'duze/' . $_GET['id'];
$exif = exif_read_data($n, 'IFD0');
echo "<table id='popuptable'>
<tr>
<th>Aparat:</th>
<td>{$exif['Make']}</td>
</tr>
<tr>
<th>Model:</th>
<td>{$exif['Model']}</td>
</tr>

</table>";
}
?>