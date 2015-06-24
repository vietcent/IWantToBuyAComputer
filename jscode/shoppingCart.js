// Final Project
// shoppingCart.js
// Summer 2015
// Vincent Nguyen

function addToCart(productId)
{
    document.productform.productId.value = productId;
    document.productform.command.value = 'add';
    document.productform.submit();
}

// The following js are all necessary to determine which button on the
// form the user clicked

function del(productId)
{
    if (confirm('Are you sure you want to delete this item?')) {

        document.cartform.command.value = productId;
        document.cartform.command. value
        document.cartform.submit();
    }
}

function clearCart()
{
    if (confirm('Are you sure you wish to empty your cart?')) {
        document.cartform.command.value ='clear';
        document.cartform.submit();

    }
}

function updateCart()
{
    document.cartform.command.value = 'update';
    document.cartform.submit();
}

function completeOrder()
{
    document.cartform.commmand.value = 'complete';
    document.cartform.submit();
}
