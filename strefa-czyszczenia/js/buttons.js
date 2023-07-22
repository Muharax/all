let buttons = document.getElementsByName("btn-poj");
 
for(const button of buttons) {
    button.addEventListener("click", buttonsValue);
}
 
function buttonsValue() {
     document.getElementById("c").innerHTML = this.value;
	 document.getElementById("c").style.background = "green";
}
