    

// // Phone increment


// document.getElementById('phone_plus').addEventListener('click',function(){
//     handlePhonePrice(true);
// });
// document.getElementById('phone_minus').addEventListener('click',function(){
//     handlePhonePrice(false);
// });


function handleProduct(product,isIncrease)
{
    const productInput    = document.getElementById(product+'_qty');
    const productCount    = parseInt(productInput.value);
    //const productCount    = getInputValue(product);
    let  productNewCount  = productCount; 
    if(isIncrease == true )
    {
        productNewCount = productCount + 1;  
    }
    else if(isIncrease == false && productCount > 0){
        productNewCount = productCount - 1;
    }
   
    productInput.value    = productNewCount;
    let productTotal = 0;
    if(product == "phone")
    {
        productTotal = productNewCount * 600;
    }
    else{
        productTotal = productNewCount * 50;
    }
    const subTotal      = document.getElementById(product+'_subTotal').innerText = '$' + productTotal;
    calculateTotal();
}

function calculateTotal()
{
    const phoneCount = getInputValue('phone');
    const caseCount  = getInputValue('case');

    const totalAmount = phoneCount * 600 + caseCount * 50;
    document.getElementById('price_subTotal').innerText = '$'+ totalAmount;
    document.getElementById('price_grandTotal').innerText = '$'+ totalAmount;
}

function getInputValue(product)
{
    const productInput = document.getElementById(product+'_qty');
    const productCount = parseInt(productInput.value);
    return productCount;
}

// document.getElementById('phone_plus').addEventListener('click',function(){
    
//     const phoneInput    = document.getElementById('phone_qty');
//     const phoneCount    = parseInt(phoneInput.value);
   
//     const phoneNewCount = phoneCount + 1;  
//     phoneInput.value    = phoneNewCount;
//     const phoneTotal    = phoneNewCount * 600;
//     const subTotal      = document.getElementById('phone_subTotal').innerText = '$' + phoneTotal;
//     const caseTotal     = document.getElementById('case_subTotal').innerText;
//     document.getElementById('price_subTotal').innerText     = subTotal;
//     document.getElementById('price_grandTotal').innerText   = subTotal;

// });

// // Phone decrement
// document.getElementById('phone_minus').addEventListener('click',function(){
//     const phoneInput    = document.getElementById('phone_qty');
//     const phoneCount    = parseInt(phoneInput.value);
//     if(phoneCount > 1) {
//         const phoneNewCount = phoneCount - 1;  
//         phoneInput.value    = phoneNewCount;
//         const phoneTotal    = phoneNewCount * 600;
//         const subTotal      = document.getElementById('phone_subTotal').innerText = '$' + phoneTotal;
//         document.getElementById('price_subTotal').innerText     = subTotal;
//         document.getElementById('price_grandTotal').innerText   = subTotal;
//     }
// });
