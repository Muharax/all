
	if(Cookie.get('mybb_logo_hide')) {
		hideLogo();
	}

	function hideLogo() {
		let head = document.head;
		let style = document.createElement("style");

		style.type = "text/css";
		style.appendChild(document.createTextNode(`
.logo-a { display: none; }
.logo-hide-button { top: -8px; }
@media only screen and (max-width: 768px) {
.logo-hide-button {
padding-top: 50px;
}
}
`));

		head.appendChild(style);
	}

	function showLogo() {
		let head = document.head;
		let style = document.createElement("style");

		style.type = "text/css";
		style.appendChild(document.createTextNode(`
.logo-a { display: initial; }
@media only screen and (max-width: 768px) {
.logo-hide-button {
padding-top: initial;
}
}
`));

		head.appendChild(style);
	}

	function processLogoToggle() {
		if(Cookie.get('mybb_logo_hide')) {
			Cookie.unset('mybb_logo_hide');
			showLogo();
		} else {
			Cookie.set('mybb_logo_hide', 1);
			hideLogo();
		}
	}