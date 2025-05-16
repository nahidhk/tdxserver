function showpassword(icon) {
    var x = [
        document.getElementById("password"),
        document.getElementById("password1")
    ];
    
    if (x[0].type === "password") {
        x.forEach(field => field.type = "text");
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.forEach(field => field.type = "password");
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}


document.querySelectorAll(".send").forEach(function(button) {
    button.addEventListener("click", function () {
      document.querySelectorAll(".send").forEach(function(btn) {
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
      });
    });
  });
  



function closepopup(mydata) {
  var popup = document.getElementById(mydata);
  popup.classList.remove("open");
  popup.classList.add("close");
}

function openpopup(mydata) {
  var popup = document.getElementById(mydata);
  popup.classList.remove("vcc");
  popup.classList.add("darkbox", "open");
  if (mydata == "login"){
    closepopup('singup')
  }
  if (mydata == "singup"){
    closepopup('login')
  }
}

function working(){
  alert("This feature is not available yet.");
}


document.querySelectorAll('[class*="font:"]').forEach(el => {
  const match = el.className.match(/font:(\d+)px/);
  if (match) {
    el.style.fontSize = match[1] + 'px';
  }
});

document.querySelectorAll('[class*="w:"]').forEach(el => {
  const match = el.className.match(/w:(\d+)%/);
  if (match) {
    el.style.width = match[1];
  }
});

const hash = window.location.hash;
if (hash) {
  if (hash === "#login") {
    openpopup('login');
  }
}


const contolmyaccount = decodeURIComponent(document.cookie.split('; ').find(c => c.startsWith('login='))?.split('=')[1] || '');

if (contolmyaccount === "true") {
 document.getElementById("uiux").style.display = "none";
 document.getElementById("main").style.display = "block";
 document.getElementById("logbox").style.display = "none";
 
}
//const myemail = localStorage.getItem('Email');
//document.getElementById("myemail").innerHTML = myemail;




//  login true and next page load data in cookie


