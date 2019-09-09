<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
</head>
<body><script type="text/javascript">
var roz = new Date().getTime()-(<?php echo date(U); ?>*1000);
v=new Date(<? echo time()*1000; ?>); 
var bx0=document.getElementById('bx0');


function zegar(){
miesiace= new Array ('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień')
D = new Date();
D.setTime(D.getTime()-roz);
G = D.getHours();
M = D.getMinutes(); M=M<10?'0'+M:M;
S = D.getSeconds(); S=S<10?'0'+S:S;
r = D.getFullYear();
m = miesiace[D.getMonth()];
d = D.getDate();

document.getElementById('czas').innerHTML=' '+ G + ':' + M + ':' + S;
document.getElementById('data').innerHTML=' '+ d + ' ' + m + ' ' + r + ' ' + 'roku';



s2=0+Math.round((D.getTime()-v.getTime())/1000);
m2=0;
h2=0;
if(s2<0){
bx0.innerHTML='-';
}
else{
   if(s2>59){
   m2=Math.floor(s2/60);
   s2=s2-m2*60;
   }
   if(m2>59){
   h2=Math.floor(m2/60);
   m2=m2-h2*60;
   } 
   if(s2<10){
   s2="0"+s2;
   }
   if(m2<10){
   m2="0"+m2;
   }
document.getElementById('bx0').innerHTML=""+h2+":"+m2+":"+s2+'';

}

setTimeout('zegar()', 1000);
}
</script>
<b>Teraz jest godzina:</b> <span id="czas"></span> (<span id="data"></span>)<br><b>Czas pracy:&nbsp;</b></div> <div id="bx0" style="float:left"></div>
<script type="text/javascript">zegar()</script>
</body></html>