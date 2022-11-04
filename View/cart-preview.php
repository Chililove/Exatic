<body>
    <div class="shopping-cart">
        <!-- Title -->
        <div class="title">
            Shopping Cart
        </div>

        <!-- Product #1 -->
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>

            <div class="image">
                <img src="" alt="" />
            </div>

            <div class="description">
                <span>Common Projects</span>
                <span>Bball High</span>
                <span>White</span>
            </div>

            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    <img src="Exatic/assets/plus-lg.svg" alt="" />
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    <img src="Exatic/assets/dash.svg" alt="" />
                </button>
            </div>

            <div class="total-price">$549</div>
        </div>

        <!-- Product #2 -->
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>

            <div class="image">
                <img src="item-2.png" alt="" />
            </div>

            <div class="description">
                <span>Maison Margiela</span>
                <span>Future Sneakers</span>
                <span>White</span>
            </div>

            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    <img src="Exatic/assets/plus-lg.svg" alt="" />
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    <img src="Exatic/assets/dash.svg" alt="" />
                </button>
            </div>

            <div class="total-price">$870</div>
        </div>

        <!-- Product #3 -->
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>

            <div class="image">
                <img src="item-3.png" alt="" />
            </div>

            <div class="description">
                <span>Our Legacy</span>
                <span>Brushed Scarf</span>
                <span>Brown</span>
            </div>

            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    <img src="Exatic/assets/plus-lg.svg" alt="" />
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    <img src="Exatic/assets/dash.svg" alt="" />
                </button>
            </div>

            <div class="total-price">$349</div>
        </div>
    </div>
</body>
<script>
    $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
    });
</script>
<style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        background-color: #7EC855;
        font-family: 'Roboto', sans-serif;
    }

    .shopping-cart {
        width: 750px;
        height: 423px;
        margin: 80px auto;
        background: #FFFFFF;
        box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
        border-radius: 6px;

        display: flex;
        flex-direction: column;
    }

    .title {
        height: 60px;
        border-bottom: 1px solid #E1E8EE;
        padding: 20px 30px;
        color: #5E6977;
        font-size: 18px;
        font-weight: 400;
    }

    .item {
        padding: 20px 30px;
        height: 120px;
        display: flex;
    }

    .item:nth-child(3) {
        border-top: 1px solid #E1E8EE;
        border-bottom: 1px solid #E1E8EE;
    }

    .buttons {
        position: relative;
        padding-top: 30px;
        margin-right: 60px;
    }

    .delete-btn,
    .like-btn {
        display: inline-block;
        Cursor: pointer;
    }

    .delete-btn {
        width: 18px;
        height: 17px;
        background: url('Exatic/assets/x-lg.svg') no-repeat center;
    }

    .like-btn {
        position: absolute;
        top: 28px;
        left: 40px;
        background: url('Exatic/assets/heart.svg');
        width: 30px;
        height: 30px;
        background-size: 70%;
        background-repeat: no-repeat;
    }

    .is-active {
        animation-name: animate;
        animation-duration: .8s;
        animation-iteration-count: 1;
        animation-timing-function: steps(28);
        animation-fill-mode: forwards;
    }

    @keyframes animate {
        0% {
            background-position: left;
        }

        50% {
            background-position: right;
        }

        100% {
            background-position: right;
        }
    }

    .image {
        margin-right: 50px;
    }

    .description {
        padding-top: 10px;
        margin-right: 60px;
        width: 115px;
    }

    .description span {
        display: block;
        font-size: 14px;
        color: #43484D;
        font-weight: 400;
    }

    .description span:first-child {
        margin-bottom: 5px;
    }

    .description span:last-child {
        font-weight: 300;
        margin-top: 8px;
        color: #86939E;
    }


    .quantity {
        padding-top: 20px;
        margin-right: 60px;
    }

    .quantity input {
        -webkit-appearance: none;
        border: none;
        text-align: center;
        width: 32px;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
    }

    button[class*=btn] {
        width: 30px;
        height: 30px;
        background-color: #E1E8EE;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .minus-btn img {
        margin-bottom: 3px;
    }

    .plus-btn img {
        margin-top: 2px;
    }

    button:focus,
    input:focus {
        outline: 0;
    }

    .total-price {
        width: 83px;
        padding-top: 27px;
        text-align: center;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
    }

    @media (max-width: 800px) {
        .shopping-cart {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .item {
            height: auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image img {
            width: 50%;
        }

        .image,
        .quantity,
        .description {
            width: 100%;
            text-align: center;
            margin: 6px 0;
        }

        .buttons {
            margin-right: 20px;
        }
    }
</style>