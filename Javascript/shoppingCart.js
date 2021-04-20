//increment button
var incrementButtonShoppingCart = document.getElementsByClassName('incrementButton');
for(var i = 0; i < incrementButtonShoppingCart.length; i++) {
    var button = incrementButtonShoppingCart[i];
    button.addEventListener('click', function(event){
      var buttonClicked = event.target;

      var input = buttonClicked.parentElement.children[1].innerText;
    
      if(input != '0'){
        buttonClicked.parentElement.children[1].innerText = parseInt(input) + 1;
        updateTotalQuantityShoppingCart();
        updateTotalPriceShoppingCart();
      }
    })
}

//decrement button
var decrementButtonShoppingCart = document.getElementsByClassName('decrementButton');
for(var i = 0; i < decrementButtonShoppingCart.length; i++) {
    var button = decrementButtonShoppingCart[i];
    button.addEventListener('click', function(event){
      var buttonClicked = event.target;

      var input = buttonClicked.parentElement.children[1].innerText;
    
      if(input != '0'){
        buttonClicked.parentElement.children[1].innerText = parseInt(input) - 1;
        updateTotalQuantityShoppingCart();
        updateTotalPriceShoppingCart();
      }
    })
}

//Remove items
var removeItem = document.getElementsByClassName("delete-trash")

for (var i = 0; i < removeItem.length; i++) {
    var button = removeItem[i]
    button.addEventListener('click', function(event) {
        var buttonClicked = event.target
        buttonClicked.parentElement.parentElement.parentElement.parentElement.remove()
        updateTotalQuantityShoppingCart()
        updateTotalPriceShoppingCart()
        
    })
}

//Update total quantity
function updateTotalQuantityShoppingCart() {
    var cartItemContainer = document.getElementsByClassName('Cart')[0]
    var cartRows = cartItemContainer.getElementsByClassName('listMyCart')
    var quantity = 0
    
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var quantityElement = parseInt(cartRow.getElementsByClassName('quantityProduct')[0].innerText)

        quantity = quantity + quantityElement;

    }
    
    document.getElementsByClassName("totalItems")[0].innerText = quantity 

    $.ajax({
        url: "shoppingCart.php", 
        type: "POST", 
        data: {toto: quantity }, 
        success: function(data){ 
         
               console.log(data);
        }
    }).done(function(){
        
        console.log("Success.");
    }).fail(function(){
      
        console.log("An error has occurred.");
    }).always(function(){
      
          console.log("Complete.");
    });
}

//Update total prices
function updateTotalPriceShoppingCart() {
    var cartItemContainer = document.getElementsByClassName('Cart')[0]
    var cartRows = cartItemContainer.getElementsByClassName('listMyCart')
    var subTotal = 0
    var total = 0
    var GSTtaxe = 0
    var QSTtaxe = 0

    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('priceItem')[0].innerText
        var quantityElement = parseInt(cartRow.getElementsByClassName('quantityProduct')[0].innerText)

        var price = parseFloat(priceElement.replace('$',''))
        console.log(price);
        subTotal = subTotal + (price*quantityElement)

    }

    GSTtaxe = (0.05*subTotal)
    QSTtaxe = (0.09975*subTotal)

    total = (subTotal+GSTtaxe+QSTtaxe)
    
    document.getElementsByClassName("subtotalPrice")[0].innerText = '$ ' + subTotal.toFixed(2)
    document.getElementsByClassName("GSTPrice")[0].innerText = '$ ' + GSTtaxe.toFixed(2)
    document.getElementsByClassName("QSTPrice")[0].innerText = '$ ' + QSTtaxe.toFixed(2)
    document.getElementsByClassName("totalPrice")[0].innerText = '$ ' + total.toFixed(2)

    $.ajax({
        url: "../php/shoppingCart.php", 
        type: "POST", 
        data: {p1: subTotal }, 
        success: function(data){ 
           
               console.log(data);
        }
    }).done(function(){
       
        console.log("Success.");
    }).fail(function(){
       
        console.log("An error has occurred.");
    }).always(function(){
     
          console.log("Complete.");
    });
}

