var sentence = "Most przerzutowy";
sentence = sentence.toUpperCase();

var sentenceLength = sentence.length;

var sentence1 = "";
var wrongAnswerCount = 0;

for (i=0; i<sentenceLength; i++) {
	if(sentence.charAt(i)==" ") sentence1 = sentence1 + " ";
	else sentence1 = sentence1 + "-";
}

function writeTheSentence() {
	document.getElementById("gameBoard").innerHTML = sentence1;
}



window.onload = start;

var letters = new Array(26);

letters[0] = "A";
letters[1] = "B";
letters[2] = "C";
letters[3] = "D";
letters[4] = "E";
letters[5] = "F";
letters[6] = "G";
letters[7] = "H";
letters[8] = "I";
letters[9] = "J";
letters[10] = "K";
letters[11] = "L";
letters[12] = "M";
letters[13] = "N";
letters[14] = "O";
letters[15] = "P";
letters[16] = "Q";
letters[17] = "R";
letters[18] = "S";
letters[19] = "T";
letters[20] = "U";
letters[21] = "V";
letters[22] = "W";
letters[23] = "X";
letters[24] = "Y";
letters[25] = "Z";

function start()
{
	var alphaContent = "";
	
	for (i=0; i<=25; i++) {
		var element = "lettter" + i;
		alphaContent = alphaContent + '<div class="letter" onclick="checkTheElement('+i+')" id="'+element+'">'+letters[i]+'</div>';
	}
	
	document.getElementById("alphabet").innerHTML = alphaContent;
	
	writeTheSentence();
}

String.prototype.setSign = function(place, sign) {
	if (place > this.length - 1) return this.toString();
	else return this.substr(0, place) + sign + this.substr(place+1);
}

function checkTheElement(nmbr) {
	
	var scored = false;
	
	for (i=0; i<sentenceLength; i++) {
		if (sentence.charAt(i) == letters[nmbr]) {
			sentence1 = sentence1.setSign(i,letters[nmbr]);
			scored = true;
		}
	}

	if(scored == true){
		var element = "lettter" + nmbr;
		document.getElementById(element).style.background = "green";
		document.getElementById(element).style.color = "lime";
		document.getElementById(element).style.border = "3px solid lime";
		document.getElementById(element).style.cursor = "default";
		
		writeTheSentence();
	}
	else {
		var element = "lettter" + nmbr;
		document.getElementById(element).style.background = "#331111";
		document.getElementById(element).style.color = "red";
		document.getElementById(element).style.border = "3px solid red";
		document.getElementById(element).style.cursor = "default";
		document.getElementById(element).setAttribute("onclick",";");
		
		//Wrong Answers
		wrongAnswerCount++;
		var machineImage = "gra-img/g"+wrongAnswerCount+".jpg";
		document.getElementById("machine").innerHTML = '<img src="'+machineImage+'" alt=""/>';
	}
	
	//win
	if (sentence == sentence1)
		document.getElementById("alphabet").innerHTML = "Wygrana ! Poprawne hasło to: "+sentence+'<br /><br /><span class="reset" onclick="location.reload()">Kliknij TUTAJ aby zagrać jeszcze raz</span>';
	
	//lost
	if (wrongAnswerCount>=9)
		document.getElementById("alphabet").innerHTML = "Nieprawidłowe hasło! "+'<br /><br /><span class="reset" onclick="location.reload()">Zagraj jeszcze raz!</span>';
}