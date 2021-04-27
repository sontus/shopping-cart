// First Product
const proMinusBtn       = document.getElementById('pro_minus');
const proPlusBtn        = document.getElementById('pro_plus');
const proQty            = document.getElementById('pro_qty').value;
const proSubTotal       = document.getElementById('pro_subTotal').innerText;
const priceSubTotal     = document.getElementById('price_subTotal').innerText;
const priceGrandTotal   = document.getElementById('price_grandTotal').innerText;
// Second Product
const secondProPlus     = document.getElementById('second_pro_plus');
const secondProMinus    = document.getElementById('second_pro_minus');
const secondProQty      = document.getElementById('second_pro_qty').value;
const secondProSubTotal = document.getElementById('second_subTotal').innerText;

// First Product
proMinusBtn.addEventListener('click', function(){
    const currentQty    = document.getElementById('pro_qty').value;
    const newQtyM       = parseInt(currentQty) - 1;
    const newPrice      = parseInt(proSubTotal) * newQtyM;

    
    const oldGrandTotal          = document.getElementById('price_grandTotal').innerText;
    console.log(newPrice);
    document.getElementById('pro_qty').value = newQtyM;
    document.getElementById('pro_subTotal').innerText = newPrice;
    document.getElementById('price_subTotal').innerText     = parseInt(oldGrandTotal) - parseInt(newPrice);
    document.getElementById('price_grandTotal').innerText   = parseInt(oldGrandTotal) - parseInt(newPrice);
});

proPlusBtn.addEventListener('click', function(){
    const currentQty    = document.getElementById('pro_qty').value;
    const newQty        = parseInt(currentQty)  + 1;
    const newPrice      = parseInt(proSubTotal) * newQty;

    const oldSecondTotal = document.getElementById('second_subTotal').innerText;
    document.getElementById('pro_qty').value = newQty;
    document.getElementById('pro_subTotal').innerText = newPrice;
    document.getElementById('price_subTotal').innerText = parseInt(oldSecondTotal) + parseInt(newPrice);
    document.getElementById('price_grandTotal').innerText = parseInt(oldSecondTotal) + parseInt(newPrice);
});

// Second Product
// secondProPlus.addEventListener('click',function(){
//    const secProCurrQty          = document.getElementById('second_pro_qty').value;
//    const secNewQty              = parseInt(secProCurrQty) + 1;
//    const secSubTotalPrice       = parseInt(secondProSubTotal) * secNewQty
//    const oldGrandTotal          = document.getElementById('price_grandTotal').innerText; 
  

//    document.getElementById('second_pro_qty').value      = secNewQty;
//    document.getElementById('second_subTotal').innerText = secSubTotalPrice;
//    document.getElementById('price_subTotal').innerText = parseInt(oldGrandTotal) + parseInt(secSubTotalPrice);
//    document.getElementById('price_grandTotal').innerText = parseInt(oldGrandTotal) + parseInt(secSubTotalPrice);
// });

// secondProMinus.addEventListener('click',function(){
//     const secProCurrQty = document.getElementById('second_pro_qty').value;
    
// });