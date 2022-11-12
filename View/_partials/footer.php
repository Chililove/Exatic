<footer>
    <div class="container-fluid">

        <div class="row" id="background">
            <div style="background-color: #C3DBB6;">
                <p class="footer-p" style="color: #C3DBB6;">Hi I'm a hidden p! Don't look at me!</p>
            </div>
            <div class="col" style="font-weight: 300; margin-left: 10%;">
                <div class="content">
                    <h5 class="big-text-class">About Us:</h5>
                    <hr>
                    <p>"Exatic is a reserved <br> delivery company <br> made specifically for <br> asian lovers. Enjoy!"</p>
                </div>
            </div>
            <div class="col">
                <div class="content">
                    <h5 class="big-text-class">Contact Us:</h5>
                    <hr>
                    <div class="contact">
                        <p class="footer-p">Address: </p> address 89 <br>
                        <p class="footer-p">Phone:</p> 2323232323232<br>
                        <p class="footer-p">Email: </p> email@email.com
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="content">
                    <h5 class="big-text-class">Opening Hours:</h5>
                    <hr>
                    <div class="hours">
                        <?php
                        // example for adding columns from db for later/set key value
                        // foreach ($index->getWorkdays() as $key => $value) {
                        //  ($value['startingHour'])
                        ?>
                        <div class="col-sm">
                            <p class="footer-p"> 8:00</p>
                        </div>
                        <div class="col-sm">
                            <p class="footer-p">23:00</p>
                        </div>
                        <div class="col-sm">
                            <p class="footer-p">All weeks</p>
                        </div>
                        <?php

                        ?>
                    </div>

                </div>

            </div>
            <div class="footer-row mx-0 justify-content-center" style="background-color: #C3DBB6; text-align: center; color: #5D5A57; ">
                <p class="footer-p">© Copyright 2022 Exatic. All Rights Reserved.</p>
            </div>
        </div>
    </div>

</footer>


<style lang="css">
    .footer-p {
        color: #0B0501;
        display: inline;
        line-height: 2;
    }

    hr {
        margin-left: 0;
        height: 2%;
        width: 15%;
        border-width: 2%;
        background-color: #0B0501;
    }

    .big-text-class {
        font-weight: 700;
        font-family: Marcellus;
        text-transform: uppercase;
    }

    .footer-row {
        color: #0B0501;
        justify-content: center;
        align-items: center;
    }

    .footer-col {
        text-align: center;
        margin-left: 10%;
        font-weight: 300;
    }

    .content {
        display: inline-block;
        text-align: left;
        padding-top: 8%;
        padding-bottom: 5%;
    }

    .contact {
        color: #0B0501;
    }

    .hours {
        color: #0B0501;
        line-height: 1;
    }

    #background {
        position: absolute;
        height: 220px;
        width: 100%;
        /*background: #C3DBB6;*/
        /* You must set a specified height */
        background-position: center;
        /* Center the image */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-size: cover;
        color: #0B0501;
    }

    .hours {
        display: grid;
        grid-template-columns: 20% 30% 50%;
        margin-left: -5%;
    }
</style>