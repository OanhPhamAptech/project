function show1() {
    document.getElementById("box-arrow-top-1").style.display = "block";
    document.getElementById("box-arrow-top-2").style.display = "none";
    document.getElementById("box-arrow-top-3").style.display = "none";
    document.getElementById("box-arrow-top-4").style.display = "none";
    document.getElementById("box-arrow-top-5").style.display = "none";
    document.getElementById("box-arrow-top-6").style.display = "none";
}

function show2() {
    document.getElementById("box-arrow-top-2").style.display = "block";
    document.getElementById("box-arrow-top-1").style.display = "none";
    document.getElementById("box-arrow-top-3").style.display = "none";
    document.getElementById("box-arrow-top-4").style.display = "none";
    document.getElementById("box-arrow-top-5").style.display = "none";
    document.getElementById("box-arrow-top-6").style.display = "none";
}

function show3() {
    document.getElementById("box-arrow-top-3").style.display = "block";
    document.getElementById("box-arrow-top-1").style.display = "none";
    document.getElementById("box-arrow-top-2").style.display = "none";
    document.getElementById("box-arrow-top-4").style.display = "none";
    document.getElementById("box-arrow-top-5").style.display = "none";
    document.getElementById("box-arrow-top-6").style.display = "none";
}

function show4() {
    document.getElementById("box-arrow-top-4").style.display = "block";
    document.getElementById("box-arrow-top-1").style.display = "none";
    document.getElementById("box-arrow-top-2").style.display = "none";
    document.getElementById("box-arrow-top-3").style.display = "none";
    document.getElementById("box-arrow-top-5").style.display = "none";
    document.getElementById("box-arrow-top-6").style.display = "none";
}

function show5() {
    document.getElementById("box-arrow-top-5").style.display = "block";
    document.getElementById("box-arrow-top-1").style.display = "none";
    document.getElementById("box-arrow-top-2").style.display = "none";
    document.getElementById("box-arrow-top-3").style.display = "none";
    document.getElementById("box-arrow-top-4").style.display = "none";
    document.getElementById("box-arrow-top-6").style.display = "none";
}

function show6() {
    document.getElementById("box-arrow-top-6").style.display = "block";
    document.getElementById("box-arrow-top-1").style.display = "none";
    document.getElementById("box-arrow-top-2").style.display = "none";
    document.getElementById("box-arrow-top-3").style.display = "none";
    document.getElementById("box-arrow-top-4").style.display = "none";
    document.getElementById("box-arrow-top-5").style.display = "none";
}

$(document).ready(function () {

    var quantitiy = 0;
    $('.quantity-right-plus').click(function (e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);


        // Increment

    });

    $('.quantity-left-minus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 1) {
            $('#quantity').val(quantity - 1);
        }
    });

});