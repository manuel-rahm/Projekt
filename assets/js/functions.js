function welcomeAnimation() {
    $("#welcomeScreen").fadeIn(1000);
    $("#welcomeScreen").css('display', 'block');
    $("#welcomeScreen").fadeOut(1000);
}
function openBurgerMenu() {
    var x = document.getElementById("navbar");
    if (x.className === "nav") {
        x.className += " responsive";
        $('.burger i').removeClass();
        $('.burger i').addClass("fa fa-arrow-up fa-2x");
    } else {
        x.className = "nav";
        $('.burger i').removeClass();
        $('.burger i').addClass("fa fa-bars fa-2x");
    }
}