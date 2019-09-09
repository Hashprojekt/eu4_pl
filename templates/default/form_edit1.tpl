

<h2>Edycja wizytówki firmy</h2>


<form action="{akcja}" method="post" enctype="multipart/form-data">
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

<br style="clear: both"><br style="clear: both">
<h2>Wybierz kategorie <span style="color: red">*</span></h2>{kategorie}
<br>




<div class="fl">S³owa kluczowe: (oddzielaj przecinkiem)</div>
<div class="fr"><input type="text" name="kluczowe" value="{kluczowe}"><input type="hidden" name="c" value="a"></div>


<div class="ff">Opis Firmy:{RD}</div>

<br style="clear: both">
<textarea name="opis" rows="10" cols="50">{opis}</textarea><br>

{MAPKA}
<b>Mapka:</b>(Dozwolone rozszerzenia: jpg, jpeg, gif, png)<br>
<input type="file" name="file" size="40" class="file">
<br>
<br>
{RD} - pola obowi±zkowe
<br>
<br>
<input type="submit" value="Zapisz zmiany" class="button1">
</form>
