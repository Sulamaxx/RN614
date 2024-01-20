function Order(x) {
    var form = new FormData();
    var title;
    var description;
    var color;
    var price;
    var img;

    if (x == 1) {
        title = document.getElementById('title1').innerHTML;
        description = document.getElementById('description1').innerHTML;
        var colorElement = document.getElementById('color1');
        var selectedIndex = colorElement.selectedIndex;
        color = colorElement.options[selectedIndex].innerHTML;
        price = document.getElementById('price1').innerHTML;
        img = document.getElementById('img1').src;
    } else if (x == 2) {
        title = document.getElementById('title2').innerHTML;
        description = document.getElementById('description2').innerHTML;
        var colorElement = document.getElementById('color2');
        var selectedIndex = colorElement.selectedIndex;
        color = colorElement.options[selectedIndex].innerHTML;
        price = document.getElementById('price2').innerHTML;
        img = document.getElementById('img2').src;
    } else if (x == 3) {
        title = document.getElementById('title3').innerHTML;
        description = document.getElementById('description3').innerHTML;
        var colorElement = document.getElementById('color3');
        var selectedIndex = colorElement.selectedIndex;
        color = colorElement.options[selectedIndex].innerHTML;
        price = document.getElementById('price3').innerHTML;
        img = document.getElementById('img3').src;
    } else if (x == 4) {
        title = document.getElementById('title4').innerHTML;
        description = document.getElementById('description4').innerHTML;
        var colorElement = document.getElementById('color4');
        var selectedIndex = colorElement.selectedIndex;
        color = colorElement.options[selectedIndex].innerHTML;
        price = document.getElementById('price4').innerHTML;
        img = document.getElementById('img4').src;
    } else if (x == 5) {
        title = document.getElementById('title5').innerHTML;
        description = document.getElementById('description5').innerHTML;
        var colorElement = document.getElementById('color5');
        var selectedIndex = colorElement.selectedIndex;
        color = colorElement.options[selectedIndex].innerHTML;
        price = document.getElementById('price5').innerHTML;
        img = document.getElementById('img5').src;
    } else if (x == 6) {
        title = document.getElementById('title6').innerHTML;
        description = document.getElementById('description6').innerHTML;
        var colorElement = document.getElementById('color6');
        var selectedIndex = colorElement.selectedIndex;
        color = colorElement.options[selectedIndex].innerHTML;
        price = document.getElementById('price6').innerHTML;
        img = document.getElementById('img6').src;
    }


    form.append('title', title);
    form.append('description', description);
    form.append("color", color);
    form.append("price", price);
    form.append("img", img);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Sucess") {
                window.location.href = "payment.php";
            }
        }
    }
    request.open("POST", "setProductDataToPayment.php", true);
    request.send(form);
}


function OrderProcess() {
    alert("ok")
}