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
var id;
var newsrc;
var emptysrcid;
var newsrcempty;
function zoomImage() {
    $('#myModal').css('display', 'flex');
    var src = $(this).attr('src');
    id = parseInt($(this).attr('id'));
    $('.customModalContent').attr('src', src);
    $('.customModalContent').data('src', src);
    var arr = src.split('/');
    var file = arr[arr.length - 1];
    href = "gallery.php?filename=";
    $('#deleteButton').attr('href', function () {
        return href + file;
    });
    emptysrcid = id + 1;
    newsrcempty = $("#" + emptysrcid + "").attr('src');
    if (id == 8 || newsrcempty == undefined) {
        $('#rightArrow').hide();
    }
    if (id == 0) {
        $('#leftArrow').hide();
    }
}
function closeModal() {
    $('#myModal').css('display', 'none');
    $('.customModalContent').attr('src', "");
    id = undefined;
    newsrc = undefined;
    $('.arrow').show();
}
function swipeLeft() {
    id = id - 1;
    newsrc = $("#" + id + "").attr('src');
    $('.customModalContent').attr('src', newsrc);
    var arr = newsrc.split('/');
    var file = arr[arr.length - 1];
    href = "gallery.php?filename=";
    $('#deleteButton').attr('href', function () {
        return href + file;
    });

    newsrc = undefined;
    if (id == 0) {
        $('#leftArrow').hide();
    }
    if (id < 8) {
        $('#rightArrow').show();
    }
}
function swipeRight() {
    id = id + 1;
    emptysrcid = id + 1;
    newsrc = $("#" + id + "").attr('src');
    newsrcempty = $("#" + emptysrcid + "").attr('src');
    $('.customModalContent').attr('src', newsrc);
    var arr = newsrc.split('/');
    var file = arr[arr.length - 1];
    href = "gallery.php?filename=";
    $('#deleteButton').attr('href', function () {
        return href + file;
    });
    newsrc = undefined;
    if (id == 8 || newsrcempty == undefined) {
        $('#rightArrow').hide();
    }
    if (id > 0) {
        $('#leftArrow').show();
    }
}
function zoomVideo() {
    $('#myModal').css('display', 'flex');
    var src = $(this).attr('src');
    id = parseInt($(this).attr('id'));
    $('.customModalContent').attr('src', src);
    $('.customModalContent').data('src', src);
    $('.customModalContent').attr('controls', true);
    var arr = src.split('/');
    var file = arr[arr.length - 1];
    var href = "videos.php?filename="
    $('#deleteButtonVid').attr('href', function () {
        return href + file;
    });
    emptysrcid = id + 1;
    newsrcempty = $("#" + emptysrcid + "").attr('src');
    if (id == 8 || newsrcempty == undefined) {
        $('#rightArrowVideo').hide();
    }
    if (id == 0) {
        $('#leftArrowVideo').hide();
    }
}
function swipeRightVideo() {
    id = id + 1;
    emptysrcid = id + 1;
    newsrc = $("#" + id + "").attr('src');
    newsrcempty = $("#" + emptysrcid + "").attr('src');
    $('.customModalContent').attr('src', newsrc);
    var arr = newsrc.split('/');
    var file = arr[arr.length - 1];
    var href = "videos.php?filename="
    $('#deleteButtonVid').attr('href', function () {
        return href + file;
    });
    newsrc = undefined;
    if (id == 8 || newsrcempty == undefined) {
        $('#rightArrowVideo').hide();
    }
    if (id > 0) {
        $('#leftArrowVideo').show();
    }
}
function swipeLeftVideo() {
    id = id - 1;
    newsrc = $("#" + id + "").attr('src');
    $('.customModalContent').attr('src', newsrc);
    var arr = newsrc.split('/');
    var file = arr[arr.length - 1];
    var href = "videos.php?filename="
    $('#deleteButtonVid').attr('href', function () {
        return href + file;
    });
    newsrc = undefined;
    if (id == 0) {
        $('#leftArrowVideo').hide();
    }
    if (id < 8) {
        $('#rightArrowVideo').show();
    }
}