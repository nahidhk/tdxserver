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
}
