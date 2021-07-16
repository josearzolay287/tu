function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
	  var c = ca[i];
	  while (c.charAt(0) == ' ') c = c.substring(1);
	  if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
	}
	return "";
  }
  function createAcceptCookie() {
	var cookieBanner = document.getElementById("cookie-banner");
	document.cookie = "accepted_cookie_policy=yes; expires=" + setExpiryDate() + ";";
	cookieBanner.classList.add("accepted-cookie-policy");
	document.getElementById("cookie-banner").remove();
  }
  function createAcceptCookiex() {
	var cookieBanner = document.getElementById("cookie-bannerx");
	document.cookie = "accepted_cookie_policyx=yes; expires=" + setExpiryDate() + ";";
	cookieBanner.classList.add("accepted-cookie-policy");
	
	document.getElementById("cookie-bannerx").remove();
	
  }
  function setExpiryDate() {
	var d = new Date();
	d.setFullYear(d.getFullYear() + 1);
	return d.toUTCString();
  }
  var isCookieSet = getCookie("accepted_cookie_policy");
  var isCookieSet2 = getCookie("accepted_cookie_policyx");
  /*
  $(document).ready(function() {
	  if (isCookieSet2 == "yes" && isCookieSet == "yes") {
		document.getElementById("cookie-banner").style.display = "none";
		document.getElementById("cookie-bannerx").style.display = "none";
		document.getElementById("cookie-banner").remove();
		document.getElementById("cookie-bannerx").remove();
  
	  } else if (isCookieSet2 == "yes" && isCookieSet == "") {
		document.getElementById("cookie-banner").style.display = "block";
		document.getElementById("cookie-bannerx").style.display = "none";
		
		document.getElementById("cookie-bannerx").remove();
	  } else if (isCookieSet2 == "" && isCookieSet == "yes") {
		document.getElementById("cookie-banner").style.display = "none";
		document.getElementById("cookie-bannerx").style.display = "block";
		
		document.getElementById("cookie-banner").remove();
	  } else if (isCookieSet2 == "" && isCookieSet == "") {
		document.getElementById("cookie-banner").style.display = "block";
		document.getElementById("cookie-bannerx").style.display = "none";
		
		document.getElementById("cookie-bannerx").remove();
	  }
  });*/
  
  $(document).ready(function() {
	  if (isCookieSet == "yes") {
		document.getElementById("cookie-banner").style.display = "none";
		document.getElementById("cookie-banner").remove();
  
	  } else {
		document.getElementById("cookie-banner").style.display = "block";
	  }
  });