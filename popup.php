<HTML>
<head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
 <TITLE>Zdjęcie</TITLE>
 <script language='javascript'>
   var arrTemp=self.location.href.split("popup.php?");
   var picUrl = (arrTemp.length>0)?arrTemp[1]:"";
   var NS = (navigator.appName=="Netscape")?true:false;

     function FitPic() {
       iWidth = (NS)? window.innerWidth:document.body.clientWidth;
       iHeight = (NS)? window.innerHeight:document.body.clientHeight;
       iWidth = document.images[0].width - iWidth;
       iHeight = document.images[0].height - iHeight;
       window.resizeBy(iWidth, iHeight);
       self.focus();
     };
 </script>
</HEAD>
<BODY bgcolor="#000000" onload='FitPic();' topmargin="0"  
marginheight="0" leftmargin="0" marginwidth="0">
 <script language='javascript'>
 document.write( "<img src='" + picUrl + "' border=0 OnClick='window.close();' style='cursor: pointer;'>" );
 </script>
</BODY>
</HTML>
