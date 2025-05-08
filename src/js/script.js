function showpassword(icon) {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    x.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

document.getElementById("send").addEventListener("click", function () {
  document.getElementById("send").innerHTML =
    '<i class="fa fa-spinner fa-spin"></i>';
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
}
