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
    var first_name = document.getElementById('first_name').value;
    var last_name = document.getElementById('last_name').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var address = document.getElementById('address').value;
    var postal_code = document.getElementById('postal_code').value;
    var state = document.getElementById('state').value;
    var city = document.getElementById('city').value;
    var quantity = document.getElementById('quantity').value;
    var creditCardType = document.getElementById('creditCardType').selectedIndex;
    var cardNumber = document.getElementById('cardNumber').value;
    var expiryDate = document.getElementById('expiryDate').value;
    var cvv = document.getElementById('cvv').value;


    var form = new FormData();

    form.append('first_name', first_name);
    form.append('last_name', last_name);
    form.append('email', email);
    form.append('mobile', mobile);
    form.append('address', address);
    form.append('postal_code', postal_code);
    form.append('state', state);
    form.append('city', city);
    form.append('quantity', quantity);
    form.append('creditCardType', creditCardType);
    form.append('cardNumber', cardNumber);
    form.append('expiryDate', expiryDate);
    form.append('cvv', cvv);





    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            document.body.innerHTML = text;
            window.scrollTo(0, 0);
        }
    }
    request.open("POST", "order_process.php", true);
    request.send(form);
}