<div>
    <div class="title">
        <span>Shopping Cart</span>
        <a href="/cart-preview" class="card-link" style="padding-left: 30%; color:red">Remove All</a>
    </div>
</div>
<!---Products-->
<div>
    <table class="preview-product">
        <br></br>
        <tr>
            <td class="preview-image">
                <img src="/assets/exatic-logo-2.png" />
            </td>
            <td class="product-name">
                Apples
                <br></br>
                <p class="product-price"> 400 kr.</p>
            </td>
        </tr>
    </table>
    <br>


    <!-- Total Price -->
    <table class="total-price">
        <tr class="total-price-font">
            <td>Total price:</td>
            <td> 5099 kr.</td>
        </tr>
    </table>

    <br>
</div>
<div style="position:absolute;">
    <a href="/shopping-cart" class="link">Go to shopping cart</a>
</div>
<style>
    .title {
        height: 60px;
        border-bottom: 1px solid #E1E8EE;
        padding: 20px 10px;
        color: #5E6977;
        font-size: 17px;
        font-weight: 400;

    }



    .preview-product {
        flex-direction: column;
        border-style: ridge;
        border-color: lightgray;
        border-left: hidden;
        border-right: hidden;
        max-width: 98%;
        margin: 2%;
        box-sizing: border-box;
    }

    .preview-image {
        max-width: 25%;

    }

    .preview-image img {
        max-width: 140px;
        height: auto;
    }

    .product-name {
        font-family: verdana;
        font-size: 13px;
        padding-left: 1%;
        max-width: 20%;
    }

    .product-price {
        font-family: verdana;
        font-weight: bold;
    }

    .delete-button {
        color: red;
    }

    .delete-field {
        max-width: 10.5%;
        text-align: right;
    }

    .total-price-font {
        font-size: 13px;
        font-family: verdana;
        font-weight: bold;
    }

    .total-price {
        position: center;
        flex-direction: column;
        border-style: ridge;
        border-color: lightgray;
        border-left: hidden;
        border-right: hidden;
        max-width: 99%;
        margin: 1%;
        box-sizing: border-box;
    }
</style>