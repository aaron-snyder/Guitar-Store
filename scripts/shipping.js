const $ = (id) => {
    return document.getElementById(id);
};

document.addEventListener("DOMContentLoaded", function() {
    $("calculateButton").addEventListener("click", calculate);

    $("productCost").focus();
});

function calculate() {
    var parsedInput = parseInt($("productCost").value);

    if (!isNaN(parsedInput) && parsedInput > 0) {
        calculateShipping(parsedInput);
    } else {
        $("error").innerText = "Please enter a valid integer greater than 0.";
        $("productCost").focus();
    }
}

function calculateShipping(parsedInput) {
    var costOfShipping;

    if (parsedInput <= 50) {
        costOfShipping = parsedInput * 0.2;
    } else if (parsedInput <= 200) {
        costOfShipping = parsedInput * 0.18;
    } else if (parsedInput <= 500) {
        costOfShipping = parsedInput * 0.15;
    } else if (parsedInput <= 1000) {
        costOfShipping = parsedInput * 0.12;
    } else {
        costOfShipping = parsedInput * 0.08;
    }

    $("result").value = "$" + (parsedInput + costOfShipping).toFixed(2);

    $("productCost").focus();
}
