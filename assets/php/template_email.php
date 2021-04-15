<?php 

function renderMessage ($email, $message, $phone, $name, $model, $regNo, $year, $subject){


return '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Devine Auto Email</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <style>
/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

/*--------------------------------------------------------------
# Google Fonts & Bootstrap CDN
--------------------------------------------------------------*/

/* @import url("https://fonts.googleapis.com/css2?family=Lato&display=swap"); */
/* @import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"); */
/*All the styling goes here*/

/* img {
    border: none;
    -ms-interpolation-mode: bicubic;
    max-width: 100%;
} */

body {
    background-color: #f6f6f6;
    color: #1d0914;
    font-family: "Lato", sans-serif;
    -webkit-font-smoothing: antialiased;
    font-size: 14px;
    line-height: 1.4;
    margin: 0;
    padding: 0;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

a {
    color: #24cd98;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    text-decoration: none;
}

a:hover, a:active, a:focus {
    color: #18d36e;
    outline: none;
    text-decoration: none;
}

p {
    padding: 0;
    margin: 0 0 30px 0;
    font-size: 16px;
}

.border {
    border: 2px solid rgb(248, 108, 1);
    padding: 10px;
    border-radius: 10px;
}

table {
    border-collapse: separate;
    width: 100%;
}

table td {
    background: #ebebeb;
    font-size: 14px;
    vertical-align: top;
}

/* -------------------------------------
              BODY & CONTAINER
          ------------------------------------- */

.body {
    background-color: #f6f6f6;
    width: 100%;
}

/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */

.container {
    display: block;
    margin: 0 auto !important;
    /* makes it centered */
    max-width: 580px;
    padding: 10px;
    width: 580px;
}

/* This should also be a block element, so that it will fill 100% of the .container */

.content {
    box-sizing: border-box;
    display: block;
    margin: 0 auto;
    max-width: 580px;
    padding: 10px;
}

/* -------------------------------------
              HEADER, FOOTER, MAIN
          ------------------------------------- */

.main {
    background: #ffffff;
    border-radius: 3px;
    width: 100%;
}

.content-block {
    padding-bottom: 10px;
    padding-top: 10px;
}
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
    z-index: 997;
    padding: 5px 0;
    margin-left: auto;
    margin-right: auto;
    background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
    display: block;
    flex-wrap: wrap;
    align-content: center;
  }
  #header .logo img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
  }

  /*--------------------------------------------------------------
  # Header Link
  --------------------------------------------------------------*/

.nav-menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .nav-menu>ul>li {
    position: relative;
    white-space: nowrap;
    padding: 10px 0 10px 28px;
  }
  
  .nav-menu a {
    display: block;
    position: relative;
    color: #fff;
    transition: 0.3s;
    /* font-size: 12px; */
    text-transform: uppercase;
    font-weight: 600;
  }
  
  .nav-menu a:hover, .nav-menu .active>a, .nav-menu li:hover>a {
    color: #B4FF00;
  } 
/*--------------------------------------------------------------
# MAIN CONTENT AREA
--------------------------------------------------------------*/

.wrapper h3.header-sec {
    color:rgb(255, 1, 1);
}

.wrapper p.img-upbg {
    border-top: #13547a solid 1px;
}

.wrapper div.hr-header .fileList {
    display:flex;
    background-color: rgba(0, 0, 0, 0.1);
    border-bottom: #13547a solid 2px;
    width: auto;
}

.wrapper .fileList {
    padding-left: 0px;
}

.wrapper .content-mail {
    width: 100%;
}

.wrapper .details {
    color: #f86c01;
}

/* -------------------------------------
              TYPOGRAPHY
          ------------------------------------- */

h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
    line-height: 1.4;
    margin: 0 0 20px 0;
}

h1 {
    font-size: 25px;
    font-weight: 300;
    text-align: center;
    text-transform: capitalize;
}

p, ul {
    /* background: #ebebeb; */
    font-size: 14px;
    font-weight: normal;
    margin: 0;
    margin-bottom: 15px;
}

p li, ul li {
    list-style-position: inside;
    margin-left: 5px;
}

/* -------------------------------------
              RESPONSIVE AND MOBILE FRIENDLY STYLES
          ------------------------------------- */

@media only screen and (max-width: 620px) {
    table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
    }
    table[class=body] p, table[class=body] ul, table[class=body] ol, table[class=body] td, table[class=body] span, table[class=body] a {
        font-size: 16px !important;
    }
    table[class=body] .wrapper, table[class=body] .article {
        padding: 10px !important;
    }
    table[class=body] .content {
        padding: 0 !important;
    }
    table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
    }
    table[class=body] .main-tb {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
    }
}

/* -------------------------------------
              PRESERVE THESE STYLES IN THE HEAD
          ------------------------------------- */

@media all {
    .ExternalClass {
        width: 100%;
    }
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
        line-height: 100%;
    }

}
/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

footer {
    clear: both;
    margin-top: 10px;
    text-align: center;
    width: 100%;
    background: #4fd471;
    padding-top: 5px;
    padding-bottom: 5px;
    border-top: #f86c01 solid 2px;
    font-size: 12px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

footer .left-block {
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
}

footer .right-block {
    text-align: right;
    margin-bottom: 0;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
}

.row-flex {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: end;
    -ms-flex-align: end;
    align-items: flex-end;
}

#footer .credits {
    color: #010101;
}

#footer .credits a {
    color: #f86c01;
}

.footer-logo {
    margin-bottom: 0;
}

.footer-logo a .img-responsive {
    width: 60%;
    height: 60%;
    float: right;
}
    </style>
    <!-- Favicons -->
    <!-- <link href="assets/imgs/logo/Devine Auto logo.png" rel="icon"> -->

    <!-- Main CSS File -->
    <!-- <link href="assets/css/maintest.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->

</head>

<body class="">

    <main id="main">

        <!-- ======= presentation Section ======= -->
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
            <tr>
                <td>&nbsp;</td>
                <td class="container">
                    <div class="content">
                        <!-- ======= Header ======= -->
                        <header id="header" class="">
                            <div class="container-fluid">

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 d-flex align-items-center">
                                        <a href="index.html" class="logo mr-auto">
                                            <img data-src="https://dvauto.dvtech.co.za/assets/imgs/logo/Devine%20Auto%20logo.png" alt=""
                                                class="img-fluid"></a>

                                        <nav class="nav-menu d-none ">
                                            <ul>
                                                <h1>
                                                    <li class="active headerLink">
                                                        <a href="https://dvauto.dvtech.co.za/">
                                                            Web Mail: '.$subject .'
                                                        </a>
                                                    </li>
                                                </h1>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </header>

                        <!-- CENTERED WHITE CONTAINER -->
                        <table role="presentation" class="main-tb">

                            <!-- MAIN CONTENT AREA -->
                            <tr>
                                <td class="wrapper">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                        <tr class="content-mail">
                                            <td>
                                                <h3 class="header-sec">CONTACT DETAILS </h3>
                                                <p>Hi there, <a class="details"> '.$name.'</a> require your services </p>
                                                <p>Their no. is <a href="tel:'.$phone.'">'.$phone.'</a> and e-mail is
                                                    <a href="mailto:'.$email.'"> '.$email.'</a></p>

                                                <h3 class="header-sec">CAR DETAILS</h3>
                                                <div class="pb"></div>
                                                <p>Car Make/Model: <a class="details"> '.$model.'</a></p>
                                                <div class="pb"></div>
                                                <p>Vehicle Registration:<a class="details"> '.$regNo.'</a></p>
                                                <div class="pb"></div>
                                                <p>Year:<a class="details"> '.$year.'</a></p>
                                                <div class="pb"></div>
                                                <p>Service Type:<a class="details"> '.$subject.'</a></p>

                                                <h3 class="header-sec">Message is below </h3>
                                                <p class="border"><a class="details">'.$message.'</a></p>
                                                <p>Good luck!</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- End MAIN CONTENT AREA -->
                        </table>
                        <!-- End CENTERED WHITE CONTAINER -->

                        <!-- ======= FOOTER ======= -->
                        <footer id="footer">

                            <div class="container">
                                <div class="row-flex">

                                    <div class="left-block">
                                        <div class="copyright">
                                            <span><span>&copy; &nbsp; </span>Devine Auto </span>
                                            <span class="year"></span> - All Rights Reserved.
                                        </div>

                                        <div class="credits">
                                            Designed by <a href="https://github.com/FimKG">Moloto KA</a>
                                        </div>
                                    </div>

                                    <div class="right-block">
                                        <div class="footer-logo">
                                            <a href="https://dvauto.dvtech.co.za/" class="logo2">
                                                <img data-src="https://dvauto.dvtech.co.za/assets/imgs/logo/Devine%20Auto%20logo.png" alt=""
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </footer><!-- End FOOTER -->

                    </div>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table><!-- End presentation Section -->

    </main><!-- End #main -->

    <!-- layout-design JS Files -->


    <!-- Main JS File -->

</body>

</html>';

}

?>