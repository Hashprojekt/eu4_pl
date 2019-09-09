

<a HREF="index.php?id=przykladowa_grafika&obraz=1" class="link">obraz 1</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=2" class="link">obraz 2</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=3" class="link">obraz 3</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=4" class="link">obraz 4</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=5" class="link">obraz 5</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=6" class="link">obraz 6</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=7" class="link">obraz 7</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=8" class="link">obraz 8</A> | 
<a HREF="index.php?id=przykladowa_grafika&obraz=9" class="link">obraz 9</A> |  
<a HREF="index.php?id=przykladowa_grafika&obraz=10" class="link">baner 1</A> |  
<a HREF="index.php?id=przykladowa_grafika&obraz=11" class="link">baner 2</A> |  
<a HREF="index.php?id=przykladowa_grafika&obraz=12" class="link">baner 3</A> |  
<a HREF="index.php?id=przykladowa_grafika&obraz=13" class="link">baner 4</A> |  
<a HREF="index.php?id=przykladowa_grafika&obraz=14" class="link">baner 5</A> |  
<br><hr><br>
    </td>
<!-- To jest miejsce na tre¶æ dokumentu -->
</tr>

<tr>
    <td>

	<?
$urlo=$obraz.".txt";
 if(!isset($obraz)) {
            print ("nic");
        }
        else {
if(file_exists("doc/$urlo"))
{
include ("doc/$urlo");
}

else{
print ("Wwodniku po Firmach");
}
}
?>

