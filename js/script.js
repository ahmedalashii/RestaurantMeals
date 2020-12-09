/* The Slider Code */
function toLunchMeal() {
    document.querySelector(".rest").classList.remove("active");
    document.querySelector(".brfast").classList.remove("active");
    document.querySelector(".lunch-btn").classList.add("active");
    document.querySelector(".restaurant").classList.remove("show");
    document.querySelector(".breakfast").classList.remove("show");
    document.querySelector(".lunch").classList.add("show");
}
function toBreakfastMeal() {
    document.querySelector(".rest").classList.remove("active");
    document.querySelector(".lunch-btn").classList.remove("active");
    document.querySelector(".brfast").classList.add("active");
    document.querySelector(".restaurant").classList.remove("show");
    document.querySelector(".lunch").classList.remove("show");
    document.querySelector(".breakfast").classList.add("show");
}
function toRestaurantMeal() {
    document.querySelector(".brfast").classList.remove("active");
    document.querySelector(".lunch-btn").classList.remove("active");
    document.querySelector(".rest").classList.add("active");
    document.querySelector(".lunch").classList.remove("show");
    document.querySelector(".breakfast").classList.remove("show");
    document.querySelector(".restaurant").classList.add("show");
}
function emailCheck() {
    var emailSub = document.getElementById("sub-email");
    if (emailSub.value.length == 0) {
        document.getElementById("subscribe-msg").innerHTML = "هذا الحقل اجباري!";
    } else {
        alert("تم اشتراكك بالخدمة بالبريد التالي\n" + emailSub.value);
        emailSub.value = "";
        document.getElementById("subscribe-msg").innerHTML = "";
    }
}
document.getElementById("sub-email").onkeydown = function(){
    document.getElementById("subscribe-msg").innerHTML="";
}
function messageCheck() {
    var name = document.getElementById("name");
    var email = document.getElementById("msg-email");
    var message = document.getElementById("message");
    if (name.value.length == 0) {
        document.getElementById("name-msg").innerHTML = "هذا الحقل اجباري!";
    }
    if (email.value.length == 0) {
        document.getElementById("email-msg").innerHTML = "هذا الحقل اجباري!";
    }
    if (message.value.length == 0) {
        document.getElementById("msg").innerHTML = "هذا الحقل اجباري!";
    }
    if (name.value.length != 0 && email.value.length != 0 && message.value.length != 0) {
        var confirmed = confirm("هل أنت متأكد من ارسال رسالة بالبيانات الآتية ؟ :\n" + name.value + "\n" + email.value + "\n" + message.value);
        if (confirmed) { // == true
            alert("تم ارسال الرسالة بنجاح !");
        } else {
            alert("تم الغاء ارسال الرسالة !");
        }
        name.value = "";
        email.value = "";
        message.value = "";
    }
}
document.getElementById("name").onkeydown = function(){
    document.getElementById("name-msg").innerHTML = "";
}
document.getElementById("msg-email").onkeydown = function(){
    document.getElementById("email-msg").innerHTML = "";
}
document.getElementById("message").onkeydown = function(){
    document.getElementById("msg").innerHTML = "";
}
/* Scroll To Top */

var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
var rootElement = document.documentElement;

function handleScroll() {
  var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
  if ((rootElement.scrollTop / scrollTotal ) > 0) {
    scrollToTopBtn.classList.add("showBtn")
  } else {
    scrollToTopBtn.classList.remove("showBtn")
  }
}

function scrollToTop() {
  rootElement.scrollTo({
    top: 0,
    behavior: "smooth"
  })
}
scrollToTopBtn.addEventListener("click", scrollToTop)
document.addEventListener("scroll", handleScroll)
