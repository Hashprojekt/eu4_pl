

<h2>Rejestracja</h2>
<form action="index.php?id=zamawiam_rozszerzony" method="post" enctype="multipart/form-data">


<div class="fl">Login:{RD}</div>
<div class="fr"><input type="text" name="login" value="{login}"></div>


<div class="fl">Has�o:{RD}</div>
<div class="fr"><input type="text" name="haslo"></div>


<div class="fl">Wpisz ponownie Has�o:{RD}</div>
<div class="fr"><input type="text" name="haslo2"></div>
<br style="clear: both">
<h3>Dane Publiczne Firmy</h3>
<div class="fl">Nazwa:{RD}</div>
<div class="fr"><input type="text" name="nazwa_firmy" value="{nazwa_firmy}"></div>
<div class="fl">Miasto:{RD}</div>
<div class="fr"><input type="text" name="miasto" value="{miasto}"></div>
<div class="fl">Kod pocztowy:{RD}</div>
<div class="fr"><input type="text" name="kod" size="5" value="{kod}"></div>
<div class="fl">Ulica:{RD}</div>
<div class="fr"><input type="text" name="ulica" value="{ulica}">  </div>
<div class="fl">Numer lokalu:{RD}</div>
<div class="fr"><input type="text" name="lokal" size="1" value="{lokal}"></div>
<div class="fl">Telefon:{RD}</div>
<div class="fr"><input type="text" name="telefon" value="{telefon}"></div>



<div class="fl">Adres strony www:</div>
<div class="fr"><input type="text" name="www" value="{www}"></div>

<div class="fl">Adres e-mail:{RD}</div>
<div class="fr"><input type="text" name="email" value="{email}"></div>


<br style="clear: both">
<h3>Dane Prywatne Firmy</h3>



<div class="fl">Imi� i nazwisko osoby upowa�nionej:{RD}</div>
<div class="fr"><input type="text" name="imieinazwisko" value="{imieinazwisko}"></div>


<div class="fl">NIP:{RD} (bez �adnych znak�w, same cyfry)</div>
<div class="fr"><input type="text" name="nip" value="{nip}"></div>


<div class="fl">REGON:{RD} (bez �adnych znak�w, same cyfry)</div>
<div class="fr"><input type="text" name="regon" value="{regon}"></div>


<div class="fl">Telefon kontaktowy:{RD}</div>
<div class="fr"><input type="text" name="telefonkontaktowy" value="{telefonkontaktowy}"></div>

<br style="clear: both"><br style="clear: both">
<h2>Wybierz kategorie <span style="color: red">*</span></h2>{kategorie}
<br>



<div class="fl">S�owa kluczowe: (oddzielaj przecinkiem)</div>
<div class="fr"><input type="text" name="kluczowe" value="{kluczowe}"><input type="hidden" name="c" value="a"></div>




<div class="ff">Opis Firmy:{RD}</div>

<br style="clear: both">
<textarea name="opis" rows="10" cols="50">{opis}</textarea><br>


<b>Mapka:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file" size="40" class="file">

<hr>

<b>Logo firmy:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file2" size="40" class="file"><br><br>
<br>

<b>Zdj�cie do galerii nr. 1:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file3" size="40" class="file"><br>
<b>Opis do zdj�cia pierwszego:</b><br>
<textarea name="opis1" rows="10"></textarea><br>
<b>Zdj�cie do galerii nr. 2:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file4" size="40" class="file"><br>
<b>Opis do zdj�cia drugiego:</b><br>
<textarea name="opis2" rows="10"></textarea><br>
<b>Zdj�cie do galerii nr. 3:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file5" size="40" class="file"><br>
<b>Opis do zdj�cia trzeciego:</b><br>
<textarea name="opis3" rows="10"></textarea><br>
<b>Zdj�cie do galerii nr. 4:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file6" size="40" class="file"><br>
<b>Opis do zdj�cia czwartego:</b><br>
<textarea name="opis4" rows="10"></textarea><br>
<hr>


<br>
<br>
{RD} - pola obowi�zkowe



<br>
<br>



<input type="submit" value="Z�� zam�wienie" class="button1">
</form>
