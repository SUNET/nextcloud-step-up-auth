var button = document.getElementById('stepupauth-button');
button.addEventListener("click", redirect_to_eduid);
function redirect_to_eduid(event) {
	event.preventDefault();
	var button = document.getElementById('stepupauth-button');
	var eduid_url = button.formAction;
	var redirect_url = eduid_url + '?redirect=' + window.location.href;
	window.location.replace(redirect_url);

}
