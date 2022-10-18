<div class="card cardpreview" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Your shopping cart</h5>
        <p>Products</p>
    </div>
    <div class="card-body cartcardcontent">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
        </ul>

        <table class="totalpricetable">
            <tr class="totalpricefield">
                <td>Total price:</td>
                <td>{{ totalPrice }} kr.</td>
            </tr>
        </table>
        <a href="#" class="card-link">Close</a>
        <a href="#" class="card-link">Go to shopping cart</a>
    </div>
</div>

<style>
    .cardpreview {
        position: absolute;
        z-index: 50;
        height: 75%;
        overflow: auto;
        margin-top: 2px;
        background-color: #fff;
        padding: 1% 1% 0% 2%;
        border: 1% solid #ddd;
        max-width: 30%;
        border-radius: 1%;
        box-shadow: 0px 0px 8px 0px #888;
        right: 1%;
    }

    .cartcardcontent {
        box-sizing: border-box;
    }

    .previewTable {
        flex-direction: column;
        border-style: ridge;
        border-color: lightgray;
        border-left: hidden;
        border-right: hidden;
        max-width: 98%;
        margin: 2%;
        box-sizing: border-box;
    }

    .imageurlfield {
        max-width: 25%;
    }

    .imageurlfield img {
        max-width: 140px;
        height: auto;
    }

    .productidfield {
        font-family: Courier, monospace;
    }

    .productshortnamefield {
        font-family: verdana;
        font-size: 13px;
        padding-left: 1%;
        max-width: 20%;
    }

    .containername {
        border-color: black;
    }

    .productpricefield {
        font-family: verdana;
        font-weight: bold;
    }

    .deletebutton {
        color: red;
    }

    .deletefield {
        max-width: 10.5%;
        text-align: right;
    }

    .totalpricefield {
        font-size: 13px;
        font-family: verdana;
        font-weight: bold;
    }

    .totalpricetable {
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