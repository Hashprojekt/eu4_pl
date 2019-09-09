
function ukryj_pokaz(idd){

 var e = document.getElementById('sub_'+idd);
 
 if(e.style.display == 'none'){
 e.style.display = 'block';
 }
 else{
    e.style.display = 'none';
 }

}

function potwierdzenie(zapytanie) {
var sprawdz = window.confirm(zapytanie);
if (sprawdz == true) {
return true;
}
else if (sprawdz == false) {
return false;
}
}
function popupimg(sPicURL) {
window.open( "popup.php?"+sPicURL, "",  
"resizable=1,HEIGHT=200,WIDTH=200");
} 



function numberBaseConverter (number,oldBase,newBase) {
	number = number + "";
	number = number.toUpperCase();
	var characters = "0123456789ABCDEF";
	var dec = 0;
	for (var no = 0; no <=  number.length; no++) {
		dec += (characters.indexOf(number.charAt(no))) * (Math.pow(oldBase , (number.length - no - 1)));
	}
	number = "";
	var magnitude = Math.floor((Math.log(dec))/(Math.log(newBase)));
	for (var no = magnitude; no >= 0; no--) {
		var amount = Math.floor(dec/Math.pow(newBase,no));
		number = number + characters.charAt(amount); 
		dec -= amount*(Math.pow(newBase,no));
	}
	if(number.length==0)number=0;
	return number;
}

// Converts a RGB color to HSV
function toHSV(rgbColor){
	rgbColor = rgbColor.replace('#','');		
	
	red = numberBaseConverter(rgbColor.substr(0,2),16,10);
	green = numberBaseConverter(rgbColor.substr(2,2),16,10);
	blue = numberBaseConverter(rgbColor.substr(4,2),16,10);
	if(red.length==0)red=0;
	if(green.length==0)green=0;
	if(blue.length==0)blue=0;
	red = red/255;
	green = green/255;
	blue = blue/255;
	
	maxValue = Math.max(red,green,blue);
	minValue = Math.min(red,green,blue);
	
	var hue = 0;
	
	if(maxValue==minValue){
		hue = 0;
		saturation=0;
	}else{
		if(red == maxValue){
			hue = (green - blue) / (maxValue-minValue)/1;	
		}else if(green == maxValue){
			hue = 2 + (blue - red)/1 / (maxValue-minValue)/1;	
		}else if(blue == maxValue){
			hue = 4 + (red - green) / (maxValue-minValue)/1;	
		}
		saturation = (maxValue-minValue) / maxValue;
	}
	hue = hue * 60; 
	valueBrightness = maxValue;
	
	if(valueBrightness/1<0.5){
		//saturation = (maxValue - minValue) / (maxValue + minValue);
	}
	if(valueBrightness/1>= 0.5){
		//saturation = (maxValue - minValue) / (2 - maxValue - minValue);
	}	
		
	
	returnArray = [hue,saturation,valueBrightness];
	return returnArray;
}

function toRgb(hue,saturation,valueBrightness){
	Hi = Math.floor(hue / 60);
	if(hue==360)Hi=0;
	f = hue/60 - Hi;
	p = (valueBrightness * (1- saturation)).toPrecision(2);
	q = (valueBrightness * (1 - (f * saturation))).toPrecision(2);
	t = (valueBrightness * (1 - ((1-f)*saturation))).toPrecision(2);

	switch(Hi){
		case 0:
			red = valueBrightness;
			green = t;
			blue = p;				
			break;
		case 1: 
			red = q;
			green = valueBrightness;
			blue = p;
			break;
		case 2: 
			red = q;
			green = valueBrightness;
			blue = t;
			break;
		case 3: 
			red = p;
			green = q;;
			blue = valueBrightness;
			break;
		case 4:
			red = t;
			green = p;
			blue = valueBrightness;
			break;
		case 5:
			red = valueBrightness;
			green = p;
			blue = q;
			break;
	}
	
	if(saturation==0){
		red = valueBrightness;
		green = valueBrightness;
		blue = valueBrightness;		
	}
	
	red*=255;
	green*=255;
	blue*=255;

	red = Math.round(red);
	green = Math.round(green);
	blue = Math.round(blue);	
	
	red = numberBaseConverter(red,10,16);
	green = numberBaseConverter(green,10,16);
	blue = numberBaseConverter(blue,10,16);
	
	red = red + "";
	green = green + "";
	blue = blue + "";

	while(red.length<2){
		red = "0" + red;
	}	
	while(green.length<2){
		green = "0" + green;
	}	
	while(blue.length<2){
		blue = "0" + "" + blue;
	}
	rgbColor = "#" + red + "" + green + "" + blue;
	return rgbColor.toUpperCase();
}

function findColorByDegrees(rgbColor,degrees){
	rgbColor = rgbColor.replace('#','');
	myArray = toHSV(rgbColor);
	myArray[0]+=degrees;
	if(myArray[0]>=360)myArray[0]-=360;
	if(myArray[0]<0)myArray[0]+=360;	
	return toRgb(myArray[0],myArray[1],myArray[2]);
}

function findColorByBrightness(rgbColor,brightness){
	
	rgbColor = rgbColor.replace('#','');
	myArray = toHSV(rgbColor);
	
	myArray[2]+=brightness/100;
	if(myArray[2]>1)myArray[2]=1;
	if(myArray[2]<0)myArray[2]=0;	
	
	myArray[1]+=brightness/100;
	if(myArray[1]>1)myArray[1]=1;
	if(myArray[1]<0)myArray[1]=0;		
	
	return toRgb(myArray[0],myArray[1],myArray[2]);	
	
}


	
	var initActiveMenuItem = 0; // 	If one of the menu items should be initially highlighted.(-1 = none, 0 = first item, 1 = second...)
	var activeSmallSquareColor = ['#c70000']; // Color of small square at the left of each menu item - only one item in the array if you only have one color
	var colorSquareWidth = 4; 	// Width of small square;
	var marginSquare = 1;
	
	
	var bgColorLinks = ["#FAFAFA"];	// Background color for menu links - one element for each menu color
	var degreesToDarkenOrLighten = [11]; // How many percent point to darken/lighten,or change saturation of the color above on mouse over (10-15 percent point is usually enough).
	var changeBrightnessOrSaturation = ['brightness'];	// Possible values: "saturation" and "brightness" - which one to adjust on mouseover
	
	var textColorMenuItems = ['#000000'];	/* Text color of links - one array item for each group of colors */
	/*
	You can use the color schemer at www.dhtmlgoodies.com to find your colors
	
	We use the HSB color system here, The HSB color system is based on three values
	
	* Hue = Which color, i.e. degree on color wheel
	* Saturation = Intensity of the color to use
	* Brightness = Brightness of the color
	
	
	When you use the color schemer at the site, pick a color from the palett or type it into the RGB text box(format #RRGGBB, example #E2EBED)
	Then adjust the value of brightness by typing in a new value in that text box(label "B"). 
	
	*/
	
	
	var darkenOnMouseOver = [true,false];	// Darken or Lighten on mouse over (true = darken, false = lighten) 
											// One element for each menu color. 
											// (Or more or less saturation if that is chosen in changeBrightnessOrSaturation 
											// NB!!! - false = more saturation, true = less saturation);
	
	var timeStepOpacitySquare = 15;	// Microseconds between each opacity change	-> Lower value = faster
	var opacityChangePerStep = 10;	// Steps - change in opacity - on mouse out	= Higher = faster	
	var timeStepSwitchBgColor = 10;	// Microseconds between each text background change(darken or lighten)	-> Lower value = faster
	var bgColorStep  = [1,1];	// lower value = slower bg color fading. This value should usually be about 10 percent of the degrees to lighten/darken
	/************************************************************************************************************
	/* Don't change anything below here 
	************************************************************************************************************/
	var activeMenuItem = false;
	var activeMenuLink = false;	
	var menuObj;
	var brightnessLink = new Array(); 
	var saturationLink = new Array(); 
	var brightnessLinkMin = new Array();
	var saturationLinkMin = new Array();
	var darkenBrightnessCounter = new Array(); // Darken or lighten - this variable is set manually
	var startHue = new Array();
	var startSat = new Array();
	var startBri = new Array();
	
	
	
	function showMenuItem()
	{
		var hsb = toHSV(this.getAttribute('bgColorItem'));
		currentIndex = this.className.replace(/[^\d]/g,'');
		if(changeBrightnessOrSaturation[currentIndex]=='saturation'){
			if(darkenOnMouseOver[currentIndex]){
				var saturation = hsb[1] - (degreesToDarkenOrLighten[currentIndex]/100);
			}else{
				var saturation = hsb[1] + (degreesToDarkenOrLighten[currentIndex]/100);
			}
			if(saturation<0)saturation=0;
			if(saturation>1)saturation=1;
			var rgb = toRgb(hsb[0],saturation,hsb[2]);
		}else{
			if(darkenOnMouseOver[currentIndex]){
				var brightness = hsb[2] - (degreesToDarkenOrLighten[currentIndex]/100);
			}else{
				var brightness = hsb[2] + (degreesToDarkenOrLighten[currentIndex]/100);
			}
			if(brightness<0)brightness=0;
			if(brightness>1)brightness=1;
			var rgb = toRgb(hsb[0],hsb[1],brightness);
		}
		this.style.backgroundColor = rgb;
		this.currentBgColorItem = rgb;
		this.setAttribute('currentBgColorItem',rgb);
		
		var obj = this.parentNode.getElementsByTagName('DIV')[0];
		obj.setAttribute('okToHide','0');
		obj.okToHide = 0;
		this.setAttribute('okToHide','0');
		this.okToHide = 0;
		obj.style.visibility = 'visible';
		
		obj.style.opacity = 0.98;	
		obj.style.filter = 'alpha(opacity=98)';
		

	}
	
	function hideMenuItem()
	{
		if(this.getAttribute('initActive')=='1')return;
		if(this.initActive=='1')return;
		var obj = this.parentNode.getElementsByTagName('DIV')[0];
		obj.setAttribute('okToHide','1');
		obj.okToHide = 1;
		this.setAttribute('okToHide','1');
		this.okToHide = 1;
		obj.style.visibility = 'visible';		
		if(navigator.userAgent.indexOf('Opera')>=0){
			obj.style.visibility = 'hidden';
		}else{
			progressHideSquare(obj.id,(opacityChangePerStep*-1));	
		}		
		progressShowHideBgColor(this.id);	
	}
	
	
	function progressShowHideBgColor(inputId)
	{
		
		var obj = document.getElementById(inputId);
		var currentBgColor = obj.getAttribute('currentBgColorItem');
		if(obj.getAttribute('okToHide')=='0')return;
		if(!currentBgColor)currentBgColor = obj.currentBgColorItem;
		if(currentBgColor){
			var index = obj.className.replace(/[^\d]/g,'');
			var hsb = toHSV(currentBgColor);
			if(changeBrightnessOrSaturation[index]=='saturation'){
				var saturation = hsb[1];			
				saturation+=darkenBrightnessCounter[index];
				if((saturation>saturationLink[index] && darkenOnMouseOver[index]) || (saturation<saturationLink[index] && !darkenOnMouseOver[index]))saturation = saturationLink[index];
				var rgb = toRgb(startHue[index],saturation,startBri[index]);	
				
				obj.style.backgroundColor = rgb;
				obj.currentBgColorItem = rgb;
				obj.setAttribute('currentBgColorItem',rgb);		
				if((hsb[1]<saturation && darkenOnMouseOver[index]) || (hsb[1]>saturation && !darkenOnMouseOver[index])){
					setTimeout('progressShowHideBgColor(\'' + inputId + '\')',timeStepSwitchBgColor);				
				}else{
					var index = obj.className.replace(/[^\d]/g,'');				
					obj.style.backgroundColor = bgColorLinks[index];
				}
										
			}else{
				var brightness = hsb[2];			
				brightness+=darkenBrightnessCounter[index];
				if((brightness>brightnessLink[index] && darkenOnMouseOver[index]) || (brightness<brightnessLink[index] && !darkenOnMouseOver[index]))brightness = brightnessLink[index];
				var rgb = toRgb(startHue[index],startSat[index],brightness);
				obj.style.backgroundColor = rgb;
				obj.currentBgColorItem = rgb;
				obj.setAttribute('currentBgColorItem',rgb);		
				if((hsb[2]<brightness && darkenOnMouseOver[index]) || (hsb[2]>brightness && !darkenOnMouseOver[index])){
					setTimeout('progressShowHideBgColor(\'' + inputId + '\')',timeStepSwitchBgColor);				
				}else{
					var index = obj.className.replace(/[^\d]/g,'');				
					obj.style.backgroundColor = bgColorLinks[index];
				}
							
			}

		}			
	}	
	
	function progressHideSquare(inputId,step)
	{
		
		var obj = document.getElementById(inputId);

		if(obj.getAttribute('okToHide')=='0' && step<0)return;
				
		if(document.all){
			var currentOpacity = obj.style.filter.replace(/[^\d]/g,'')/1;

			if(currentOpacity>=99){

			}
			else if(currentOpacity==11){
				obj.style.visibility='hidden';
			}else{
				currentOpacity = currentOpacity + step;
				if(currentOpacity<1)currentOpacity=1;
				if(currentOpacity>99)currentOpacity=9;
				obj.style.filter = 'alpha(opacity=' + currentOpacity + ')';
				setTimeout('progressHideSquare("' + inputId + '",' + (step) + ')',timeStepOpacitySquare);
			}				
		}else{
			step = step / 100;
			var currentOpacity = obj.style.opacity/1;

			if(currentOpacity>=0.99){

			}
			else if(currentOpacity==0.01){
				obj.style.visibility='hidden';
			}else{
				currentOpacity = currentOpacity + step;

				if(currentOpacity<0.01)currentOpacity=0.01;
				if(currentOpacity>0.99)currentOpacity=0.99;
				obj.style.opacity = currentOpacity;
				setTimeout('progressHideSquare("' + inputId + '",' + (step*100) + ')',timeStepOpacitySquare);
			}	
		}		
	}
	
	
	function dhtmlgoodies_initMenu()
	{
		menuObj = document.getElementById('dhtmlgoodies_menu');
		for(var no=0;no<bgColorLinks.length;no++){
			var hsbArray = toHSV(bgColorLinks[no]);
			brightnessLink.push(hsbArray[2]);
			saturationLink.push(hsbArray[1]);
			startHue.push(hsbArray[0]);
			startSat.push(hsbArray[1]);
			startBri.push(hsbArray[2]);
			if(darkenOnMouseOver[no]){
				brightnessLinkMin.push(Math.max(hsbArray[2] - (degreesToDarkenOrLighten[no]/100),0));
				saturationLinkMin.push(Math.max(hsbArray[1] - (degreesToDarkenOrLighten[no]/100),0));
				darkenBrightnessCounter.push(bgColorStep[no]/100);
			}else{
				brightnessLinkMin.push(Math.min(hsbArray[2] + (degreesToDarkenOrLighten[no]/100),1));
				saturationLinkMin.push(Math.min(hsbArray[1] + (degreesToDarkenOrLighten[no]/100),1));
				darkenBrightnessCounter.push((bgColorStep[no]/100)*-1);
			}
		}
		var listItems = menuObj.getElementsByTagName('LI');
		for(var no=0;no<listItems.length;no++){
			
	
			var menuLink = listItems[no].getElementsByTagName('A')[0];
			if(menuLink){
				if(!menuLink.className)menuLink.className = 'menuGroup0';
				var groupIndex = menuLink.className.replace(/[^\d]/g,'');
				listItems[no].id = 'listItem' + no;	
				var height = menuLink.offsetHeight;	
				menuLink.style.display='block';
				menuLink.style.height=height + 'px';
				menuLink.style.lineHeight=height + 'px';
				menuLink.onmouseover = showMenuItem;		
				menuLink.onmouseout = hideMenuItem;		
				menuLink.style.backgroundColor = bgColorLinks[groupIndex];
				menuLink.setAttribute('bgColorItem',bgColorLinks[groupIndex]);
				menuLink.bgColorItem = bgColorLinks[groupIndex];
				menuLink.setAttribute('currentBgColorItem',bgColorLinks[groupIndex]);
				menuLink.currentBgColorItem = bgColorLinks[groupIndex];
				menuLink.id = 'listLink' + no;
				menuLink.style.color = textColorMenuItems[groupIndex];
				
				
				var colorDiv = document.createElement('DIV');
				colorDiv.innerHTML = '<span><\/span>';
				colorDiv.style.height = height + 'px';
				colorDiv.style.width = colorSquareWidth + 'px';
				colorDiv.style.backgroundColor = activeSmallSquareColor[groupIndex];
				colorDiv.style.marginRight = marginSquare + 'px';
				colorDiv.style.visibility = 'hidden'			
				colorDiv.id = 'colorSquare' + no;
				colorDiv.style.opacity = 0.99;	// Not possible to use 1 because of JS flickering in Firefox
				colorDiv.style.filter = 'alpha(opacity=100)';
				
				if(initActiveMenuItem==no){
					colorDiv.style.visibility = 'visible';
					if(changeBrightnessOrSaturation[groupIndex]=='saturation'){
						menuLink.style.backgroundColor = toRgb(startHue[groupIndex],saturationLinkMin[groupIndex],startBri[groupIndex]);
					}else{
						menuLink.style.backgroundColor = toRgb(startHue[groupIndex],startSat[groupIndex],brightnessLinkMin[groupIndex]);
					}
					menuLink.initActive = '1';
					menuLink.setAttribute('initActive','1');
					
				}
				
				listItems[no].appendChild(colorDiv);			
				listItems[no].appendChild(menuLink);
	
				var clearDiv = document.createElement('DIV');
				clearDiv.style.clear='both';
				listItems[no].appendChild(clearDiv);
				clearDiv.innerHTML = '<span></span>';
							
				var currentWidth = (listItems[no].offsetWidth - colorDiv.offsetWidth - marginSquare);
				menuLink.style.width =  currentWidth + 'px';
				while(listItems[no].offsetHeight>=(menuLink.offsetHeight*2)){		
					currentWidth--;	
					menuLink.style.width =  currentWidth + 'px';
					
				}
				listItems[no].style.overflow='hidden';
			}
		}		
	}
	window.onload = dhtmlgoodies_initMenu;
	
