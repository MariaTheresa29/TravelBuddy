<?php
include('security.php');
include('includes/header.php');
?>

<head>
    <link rel="stylesheet" href="css/payment.css">
</head>
<div class="container  d-md-flex align-items-center" style="background:linear-gradient(to right, #796a6a, #cd8338, #10baae,#159d9d, #0e355b, #1d1d61);">
    <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
        <div class="fw-bolder mb-4"><span class="fas fa-dollar-sign"></span><span class="ps-1">Explore more Features</span></div>
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between text"> <span class="">1 month trial subscription</span> <span class="fas fa-dollar-sign"><span class="ps-1">Rs.199</span></span> </div>
            <div class="d-flex align-items-center justify-content-between text "> <span>6 month subscription</span> <span class="fas fa-dollar-sign"><span class="ps-1"> Rs.399</span></span> </div>
            <div class="d-flex align-items-center justify-content-between text mb-4"> <span>1 year subscription </span> <span class="fas fa-dollar-sign"><span class="ps-1"> Rs.699</span></span> </div>
            <div class="border-bottom mb-4"></div>
            <div class="d-flex flex-column mb-4"> <span class="far fa-file-alt text"><span class="ps-2">Upgrade & enjoy:</span></span><br> <span class="ps-3">Join Trip</span>
                <span class="ps-3">Invite travelers to your trip</span>
                <span class="ps-3">Receive invitations to trips</span>
                <span class="ps-3">Browse anonymously</span>
            </div>
            <div class="d-flex align-items-center justify-content-between text mt-5">
                <div class="d-flex flex-column text"> <span>Customer Support:</span> </div>
                <a href="contact-us.html">
                    <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
                </a>
            </div>
        </div>
    </div>
    <div class="card box2 shadow-sm">
        <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Payment methods</span>
            <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div>
        </div>
        <ul class="nav nav-tabs mb-3 px-md-4 px-2">
            <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="#">Credit Card</a> </li>
        </ul>
        <form action="code.php" method="post">
            <div class="px-md-5 px-4 mb-4 d-flex align-items-center">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="Rs.199" checked>
<label class="btn btn-outline-primary" for="btnradio1">
    <span class="pe-1">+</span>Rs.199
</label></br>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="Rs.399" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">
                        <span class="lpe-1">+</span>Rs.399</label>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="Rs.699" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio3">
                        <span class="lpe-1">+</span>Rs.699</label>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Credit Card</span>
                        <div class="inputWithIcon"> <input class="form-control" name="card_num" required id="card_num" type="text" pattern="^\d{4}\s?\d{4}\s?\d{4}\s?\d{4}$" minlength="19" maxlength="19" placeholder="5136 1845 5468 3894"> <span class=""> <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt=""></span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span>Expiration<span class="ps-1">Date</span></span>
                        <div class="inputWithIcon"> <input type="text" name="exp" pattern="^(0[1-9]|1[0-2])\/\d{2}$" required id="exp"  class="form-control" placeholder="05/20"> <span class="fas fa-calendar-alt"></span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Code CVV</span>
                        <div class="inputWithIcon"> <input type="password" name="cvv" required id="cvv" pattern="^[0-9]{3}$" class="form-control" data-constraints="@Numeric" minlength="3" maxlength="3" placeholder="123"> <span class="fas fa-lock"></span> </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Name</span>
                        <div class="inputWithIcon"> <input class="form-control text-uppercase" name="card_name" required id="card_name" type="text" placeholder="Name on Card"> <span class="far fa-user"></span> </div>
                    </div>
                </div>
                <div class="col-12 px-md-5 px-4 mt-3">
                    <div class="btn btn-primary w-100"><button name="card_submit" class="btn btn-primary  w-100">Upgrade Account</button> </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include('includes/footer.php');
?>