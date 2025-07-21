<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css">
<script src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>

<style>
    ul{padding:0;margin:0;list-style:none;}
    header.page-header {display: none;}
    .cource-container {max-width: 1150px;margin: 0 auto;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;}
    .cource-inner-container {max-width: 978px;width: 100%;margin: 0 auto;position: relative;}
    .cource-container .cource-leftbanner {max-width: 580px;}
    .cource-container .cource-rightbanner {max-width: 420px;}
    section.maincource {background: -o-linear-gradient(left, #dd5876 0%, #be318d 100%);background: -webkit-gradient(linear, left top, right top, from(#dd5876), to(#be318d));background: linear-gradient(90deg, #dd5876 0%, #be318d 100%);padding: 23px 0;max-width: 1190px;margin: 0 auto;border-radius: 0 0 140px 0;position: relative;}
    section.maincource:after {content: "";background: #dd5876;left: -100vw;top: 0;width: 100vw;position: absolute;height: 100%;}
    .cource-container .cource-leftbanner h1 {color: var(--pure-white, #fff);font-family: "Futura LT";font-size: 34px;font-style: normal;font-weight: 700;line-height: normal;max-width: 574px;margin: 0 0 47px;}
    .cource-container .cource-leftbanner ul {margin: 0 0 20px;padding: 0;list-style: none;display: -webkit-box;display: -ms-flexbox;display: flex;}
    .cource-container .cource-leftbanner ul li {display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-ms-flex-line-pack: center;align-content: center;margin: 0 25px 0 0;}
    .cource-container .cource-leftbanner ul li i {margin: 0 5px 0 0;width: 24px;height: 24px;}
    .cource-container .cource-leftbanner ul li p {color: var(--pure-white, #fff);text-align: center;font-family: "Open Sans";font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;max-width: inherit;margin: 0;}
    .cource-container .cource-leftbanner p {color: var(--pure-white, #fff);font-family: "Open Sans";font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;max-width: 574px;}.cource-container .cource-rightbanner .cource-rightinner .cource_profile {width: 188px;height: 188px;display: -webkit-inline-box;display: -ms-inline-flexbox;display: inline-flex;display: inline-flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;gap: 15px;border: solid 3px #f1f3f4;border-radius: 50%;overflow: hidden;-webkit-box-flex: 0;-ms-flex: 0 0 188px;flex: 0 0 188px;margin-right: 20px;}.cource-container .cource-rightbanner .cource-rightinner .cource_description label {color: var(--pure-white, #fff);font-family: "Open Sans";font-size: 14px;font-style: normal;font-weight: 400;line-height: normal;}.cource-container .cource-rightbanner .cource-rightinner {display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-ms-flex-line-pack: center;align-content: center;margin-bottom: 25px;}.cource-container .cource-rightbanner .cource-rightinner .cource_description h3 {color: var(--pure-white, #fff);font-family: "Futura LT";font-size: 16px;font-style: normal;font-weight: 700;line-height: normal;}.cource-container .cource-rightbanner .cource-rightinner .cource_description a.oterauthor {color: var(--pure-white, #fff);font-family: "Open Sans";font-size: 13px;font-style: normal;font-weight: 400;line-height: normal;-webkit-text-decoration-line: underline;text-decoration-line: underline;}.cource-container .cource-rightbanner .cource_rightbottominner {display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-ms-flex-line-pack: center;align-content: center;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;}.cource-container .cource-rightbanner .cource_rightbottominner img {margin: 0 15px;max-width: 48%;width: calc(100% - 30px);display: block;}section.cource_video {padding: 0px 0 60px;}.cource-inner-container video {position: relative;border-radius: 24px;}.play-button-wrapper {position: absolute;top: 50%;left: 50%;-webkit-transform: translate(-50%,-50%);-ms-transform: translate(-50%,-50%);transform: translate(-50%,-50%);cursor: pointer;}section.cource_module {padding-bottom: 60px;}section.cource_module .cource-inner-container {max-width: 978px;width: 100%;margin: 0 auto;position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;}section.cource_module .cource-inner-container .cource-inner-container_left {display: -webkit-box;display: -ms-flexbox;display: flex;width: 469px;-webkit-box-pack: start;-ms-flex-pack: start;justify-content: flex-start;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-ms-flex-negative: 0;flex-shrink: 0;-ms-flex-wrap: wrap;flex-wrap: wrap;align-content: flex-start;}section.cource_module .cource-inner-container .cource-inner-container_right {width: 473px;border-radius: 24px;position: relative;}section.cource_module .cource-inner-container .cource-inner-container_right .cource-lock-img {position: absolute;top: 50%;left: 50%;-webkit-transform: translate(-50%,-50%);-ms-transform: translate(-50%,-50%);transform: translate(-50%,-50%);z-index: 99;}section.cource_module .cource-inner-container .cource-inner-container_left h2 {color: var(--technical-gray, #6D7B83);font-family: "Futura LT";font-size: 16px;font-style: normal;font-weight: 700;line-height: normal;margin: 0;width: 100%;}section.cource_module .cource-inner-container .cource-inner-container_left h3 {color: var(--Primary-text, #45474F);font-family: "Futura LT";font-size: 25px;font-style: normal;font-weight: 700;line-height: normal;margin: 0;width: 100%;}section.cource_module .cource-inner-container .cource-inner-container_left p{color: var(--Primary-text, #45474F);font-family: "Open Sans";font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;margin: 10px 0 15px;width: 100%;}section.cource_module .cource-inner-container .cource-inner-container_left ul {margin: 0;padding: 0;list-style: none;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-pack: start;-ms-flex-pack: start;justify-content: flex-start;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-ms-flex-line-pack: center;align-content: center;}section.cource_module .cource-inner-container .cource-inner-container_left ul li{margin-right: 10px;}section.cource_module .cource-inner-container .cource-inner-container_left ul li:last-child{margin-right: 0;}section.cource_module .cource-inner-container .cource-inner-container_left ul li .pricetext {background: var(--horizontal-grad-1, linear-gradient(90deg, #FD4B7A -2.36%, #4D00AE 159.05%));background-clip: text;-webkit-background-clip: text;-webkit-text-fill-color: transparent;font-family: "Futura LT";font-size: 19px;font-style: normal;font-weight: 700;line-height: normal;}section.cource_module .cource-inner-container .cource-inner-container_left ul li a.addcartbtns{display: -webkit-box;display: -ms-flexbox;display: flex;width: 182px;padding: 7px 10px 8px 10px;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;gap: 5px;border-radius: 302px;background: var(--horizontal-grad-1, linear-gradient(90deg, #FD4B7A -2.36%, #4D00AE 159.05%));color: var(--pure-white, #FFF);font-family: "Open Sans";font-size: 14px;font-style: normal;font-weight: 400;line-height: 82%;}section.cource_module .cource-inner-container .cource-inner-container_left ul li a.checkoutbtns{display: -webkit-box;display: -ms-flexbox;display: flex;width: 120px;padding: 7px 10px 8px 10px;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;gap: 5px;border-radius: 302px;background: #292A30;color: var(--pure-white, #FFF);font-family: "Open Sans";font-size: 14px;font-style: normal;font-weight: 400;line-height: 82%;}section.cource_rating {padding: 60px 0;}section.cource_rating ul {margin: 0;padding: 0;list-style: none;display: flex;align-items: center;align-content: center;}section.cource_rating ul li {margin-right: 20px;}section.cource_rating ul li:nth-child(2) {margin-right: 55px;}section.cource_rating ul li:nth-child(3) {margin-right: 40px;}section.cource_rating ul li:last-child {margin-right: 0;}section.cource_rating ul li a.rating_addcartbtns {display: flex;width: 233px;padding: 20px 30px;justify-content: center;align-items: center;gap: 10px;border-radius: 302px;background: var(--horizontal-grad-1, linear-gradient(90deg, #FD4B7A -2.36%, #4D00AE 159.05%));color: var(--pure-white, #FFF);font-family: "Open Sans";font-size: 16px;font-style: normal;font-weight: 400;line-height: 82%;}section.cource_rating ul li a.rating_checkoutbtns {display: flex;width: 233px;height: 53px;padding: 15px 30px;justify-content: center;align-items: center;gap: 5px;border-radius: 302px;background: var(--Black-button, #292A30);color: var(--pure-white, #FFF);font-family: "Open Sans";font-size: 16px;font-style: normal;font-weight: 400;line-height: 82%;}section.cource_rating ul li .listprice_cource label{color: var(--Primary-text, #45474F);font-family: "Open Sans";font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;}section.cource_rating ul li .listprice_cource h4{font-family: "Futura LT";font-size: 34px;font-style: normal;font-weight: 700;line-height: normal;background: var(--horizontal-grad-1, linear-gradient(90deg, #FD4B7A -2.36%, #4D00AE 159.05%));background-clip: text;-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin: 0;}

    section.cource_module .cource-inner-container .cource-inner-container_left ul.halfprice {
    flex-wrap: wrap;
}
section.cource_module .cource-inner-container .cource-inner-container_left ul.halfprice li {
    width: 100%;
    margin: 0 0 5px;
}
section.cource_module .cource-inner-container .cource-inner-container_left ul.halfprice li .pricetextwithicon {
    display: flex;
    align-items: center;
}
section.cource_module .cource-inner-container .cource-inner-container_left ul.halfprice li .pricetextwithicon a i {
    width: 24px;
    height: 24px;
    margin: 0 5px 0px 0;
}
section.cource_module .cource-inner-container .cource-inner-container_left ul.halfprice li .pricetextwithicon a {
    display: inline-flex;
    align-items: flex-start;
    color: var(--Primary-text, #45474F);
    font-family: "Open Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    text-decoration-line: underline;
}




section.cource_video.pink ul.halfprice {
    flex-wrap: wrap;
}
section.cource_video.pink ul.halfprice li {
    width: 100%;
    margin: 0 0 5px;
}
section.cource_video.pink ul.halfprice li .pricetextwithicon {
    display: flex;
    align-items: center;
}
section.cource_video.pink ul.halfprice li .pricetextwithicon a i {
    width: 24px;
    height: 24px;
    margin: 0 5px 0px 0;
}
section.cource_video.pink ul.halfprice li .pricetextwithicon a {
    display: inline-flex;
    align-items: flex-start;
    color: var(--Primary-text, #45474F);
    font-family: "Open Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    text-decoration-line: underline;
}

section.cource_video.pink .titleblock h4 {
    color: var(--Primary-text, #45474F);
    font-family: "Futura LT";
    font-size: 34px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin: 40px 0 10px;
}
/* black */

section.cource_video.pink {
    padding: 60px 0 60px;
}

section.maincource.black {
    background: #242730;
    padding: 23px 0;
    max-width: 1190px;
    margin: 0 auto;
    border-radius: 0 0 140px 0;
    position: relative;
}
section.maincource.black:after {
    content: "";
    background: #242730;
    left: -100vw;
    top: 0;
    width: 100vw;
    position: absolute;
    height: 100%;
}

section.othermodulerbox .othermodulerbox_container {
    max-width: 1318px;
    height: 260px;
    flex-shrink: 0;
    border-radius: 60px;
    background: linear-gradient(180deg, #F5F7F7 0%, rgba(241, 243, 244, 0.00) 89.71%);
    margin: 0 auto;
    padding: 30px 60px;
}
section.othermodulerbox .othermodulerbox_container h4 {
    color: var(--Primary-text, #45474F);
    font-family: "Futura LT";
    font-size: 34px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin: 0 0 10px;
    padding: 0 10px;
}


.gallery-responsive.portfolio_slider .inner {
    padding: 10px;
}

.othermodulbox {
    border-radius: 24px;
    background: #2E434D;
    box-shadow: 0px 15px 30px 0px rgba(0, 0, 0, 0.03);
    padding: 20px 20px 30px;
    min-height: 212px;
}

.pink .othermodulbox {
    border-radius: 24px;
    background: linear-gradient(90deg, #DD5876 0%, #BE318D 100%);
    box-shadow: 0px 15px 30px 0px rgba(0, 0, 0, 0.03);
    padding: 20px 20px 30px;
    min-height: 212px;
}

.othermodulbox i.lock {
    width: 24px;
    height: 24px;
    display: block;
    margin: 0 auto;
}
section.othermodulerbox .othermodulerbox_container .othermodulbox h3 {
    color: var(--pure-white, #FFF);
    text-align: center;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin: 5px auto 10px;
    max-width: 200px;
    text-align: center;
}

section.othermodulerbox .othermodulerbox_container .othermodulbox h5 {
    color: var(--pure-white, #FFF);
    font-family: "Futura LT";
    font-size: 25px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin: 0 auto;
    max-width: 200px;
    text-align: center;
}
button.slick-arrow {
    background: transparent;
    width: 26px;
    height: 59px;
}
.slick-prev:before {
    content: '';
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='26' height='59' viewBox='0 0 26 59' fill='none'%3E%3Cpath opacity='0.2' d='M25.2798 54.2044L14.5055 29.5L25.2798 4.79556C26.0816 3.29163 26.3863 1.91998 25.2798 0.822849C24.1733 -0.274283 22.3796 -0.274283 21.273 0.822849L0.830258 27.5136C0.276278 28.0629 6.49302e-07 28.7808 6.17863e-07 29.5C5.86423e-07 30.2192 0.276278 30.9371 0.830258 31.4864L21.273 58.1771C22.3796 59.2743 24.1733 59.2743 25.2798 58.1771C26.3863 57.08 25.8692 55.5829 25.2798 54.2044Z' fill='black'/%3E%3C/svg%3E");
background-repeat: no-repeat no-repeat;
background-position: center center;
background-size: cover;
width: 26px;
height: 59px;
display: block;
}

.slick-next:before {
    content: '';
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='26' height='59' viewBox='0 0 26 59' fill='none'%3E%3Cpath opacity='0.2' d='M0.720197 54.2044L11.4945 29.5L0.720195 4.79556C-0.0816335 3.29163 -0.386346 1.91998 0.720195 0.822849C1.82674 -0.274283 3.62043 -0.274283 4.72698 0.822849L25.1697 27.5136C25.7237 28.0629 26 28.7808 26 29.5C26 30.2192 25.7237 30.9371 25.1697 31.4864L4.72698 58.1771C3.62044 59.2743 1.82674 59.2743 0.720197 58.1771C-0.386343 57.08 0.130838 55.5829 0.720197 54.2044Z' fill='black'/%3E%3C/svg%3E");
background-repeat: no-repeat no-repeat;
background-position: center center;
background-size: cover;
width: 26px;
height: 59px;
display: block;
}

button.slick-next.slick-arrow {
    right: -40px;
}
button.slick-prev.slick-arrow {
    left: -40px;
}



.backtocoursemain {
    width: 292px;
    height: 89px;
    flex-shrink: 0;
    border-radius: 53px;
    border: 1px solid rgba(231, 239, 239, 0.75);
    background: var(--gray-lt2, #F8F9F9);
    position: relative;
    margin: 105px auto 30px;
}

a.backtocourse {
    display: flex;
    width: 256px;
    padding: 20px 30px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    border-radius: 302px;
    background: var(--horizontal-grad-1, linear-gradient(90deg, #FD4B7A -2.36%, #4D00AE 159.05%));
    color: var(--pure-white, #FFF);
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 82%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
/* black */

    /* Large desktops and laptops */
@media (min-width: 1200px) {

}

/* Landscape tablets and medium desktops */
@media (min-width: 992px) and (max-width: 1199px) {

}

/* Portrait tablets and small desktops */
@media (min-width: 768px) and (max-width: 991px) {

    section.cource_rating ul {
    justify-content: center;
}
section.cource_rating ul li a.rating_addcartbtns,
section.cource_rating ul li a.rating_checkoutbtns{width:100%;}

section.cource_module .cource-inner-container {
    width: 95%;
}

.cource-container {
    padding: 0 15px;
}
.cource-container .cource-leftbanner {
    max-width: 50%;
}
.cource-container .cource-rightbanner {
    max-width: 50%;
}

section.cource_module .cource-inner-container .cource-inner-container_left {
    width: 55%;
    margin-right: 15px;
}

}

/* Landscape phones and portrait tablets */
@media (max-width: 767px) {
    .cource-container {
    flex-wrap: wrap;
    width: 90%;
}

.cource-container .cource-leftbanner h1 {
    font-size: 28px;
    margin: 0 0 15px;
}

.cource-container .cource-rightbanner {
    max-width: 420px;
    padding-top: 30px;
    border-top: solid 1px #EDF3F3;
}
.cource-container .cource-rightbanner .cource_rightbottominner {
    flex-wrap: wrap;
    justify-content: center;
}
.cource-container .cource-rightbanner .cource_rightbottominner img {
    margin: 15px 0;
    max-width: 100%;
    width: auto;
    display: block;
}
section.cource_rating ul {
    flex-wrap: wrap;
    width: 90%;
    justify-content: space-between;
    display: flex;
    margin: 0 auto;
}

section.cource_rating {
    padding: 30px 0;
}

section.cource_rating ul li:first-child {
    order: 3;width: 49%;margin: 0;
}
section.cource_rating ul li:nth-child(2) {
    order: 4;width: 49%;margin: 0;
}
section.cource_rating ul li:nth-child(3) {
    order: 1;width: 50%;margin: 0 0 15px;
}
section.cource_rating ul li:last-child {
    order: 2;width: 50%;margin: 0;
}
section.cource_rating ul li a.rating_addcartbtns,
section.cource_rating ul li a.rating_checkoutbtns{width: 100%;}

section.cource_module .cource-inner-container{width: 100%;flex-wrap: wrap;}
section.cource_module .cource-inner-container .cource-inner-container_right{margin: 15px 0 0;}
section.cource_module .cource-inner-container .cource-inner-container_left {
    padding: 0 15px;
    width: 100%;
}
section.othermodulerbox .othermodulerbox_container{height: auto;}
section.othermodulerbox .slick-prev, 
section.othermodulerbox .slick-next {
    position: relative;
}
section.othermodulerbox button.slick-prev.slick-arrow,
section.othermodulerbox button.slick-next.slick-arrow {
    left: 0;
    transform: rotate(90deg);
    margin: 0 auto;
}
section.othermodulerbox button.slick-next.slick-arrow {
    right: 0;
}
.backtocoursemain {
    width: 292px;
    height: 89px;
    flex-shrink: 0;
    border-radius: 53px;
    border: 1px solid rgba(231, 239, 239, 0.75);
    background: var(--gray-lt2, #F8F9F9);
    position: relative;
    margin: 20px auto;
}

}

/* Portrait phones and smaller */
@media (max-width: 480px) {

}

    
</style>

<main>
<section class="maincource">
    <div class="cource-container">
        <div class="cource-leftbanner">
            <h1>How to Learn Digital Marketing for (Nearly) Free in 6 Months</h1>
            <ul>
                <li>
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.25 3.5H4.75C3.2335 3.5 2 4.734 2 6.25V17.75C2 19.266 3.2335 20.5 4.75 20.5H19.25C20.7665 20.5 22 19.266 22 17.75V6.25C22 4.734 20.7665 3.5 19.25 3.5ZM12.75 6C12.75 5.724 12.974 5.5 13.25 5.5H13.75C14.026 5.5 14.25 5.724 14.25 6V6.5C14.25 6.776 14.026 7 13.75 7H13.25C12.974 7 12.75 6.776 12.75 6.5V6ZM9.75 6C9.75 5.724 9.974 5.5 10.25 5.5H10.75C11.026 5.5 11.25 5.724 11.25 6V6.5C11.25 6.776 11.026 7 10.75 7H10.25C9.974 7 9.75 6.776 9.75 6.5V6ZM5.25 18C5.25 18.276 5.026 18.5 4.75 18.5H4.25C3.974 18.5 3.75 18.276 3.75 18V17.5C3.75 17.224 3.974 17 4.25 17H4.75C5.026 17 5.25 17.224 5.25 17.5V18ZM5.25 6.5C5.25 6.776 5.026 7 4.75 7H4.25C3.974 7 3.75 6.776 3.75 6.5V6C3.75 5.724 3.974 5.5 4.25 5.5H4.75C5.026 5.5 5.25 5.724 5.25 6V6.5ZM8.25 18C8.25 18.276 8.026 18.5 7.75 18.5H7.25C6.974 18.5 6.75 18.276 6.75 18V17.5C6.75 17.224 6.974 17 7.25 17H7.75C8.026 17 8.25 17.224 8.25 17.5V18ZM8.25 6.5C8.25 6.776 8.026 7 7.75 7H7.25C6.974 7 6.75 6.776 6.75 6.5V6C6.75 5.724 6.974 5.5 7.25 5.5H7.75C8.026 5.5 8.25 5.724 8.25 6V6.5ZM11.25 18C11.25 18.276 11.026 18.5 10.75 18.5H10.25C9.974 18.5 9.75 18.276 9.75 18V17.5C9.75 17.224 9.974 17 10.25 17H10.75C11.026 17 11.25 17.224 11.25 17.5V18ZM14.25 18C14.25 18.276 14.026 18.5 13.75 18.5H13.25C12.974 18.5 12.75 18.276 12.75 18V17.5C12.75 17.224 12.974 17 13.25 17H13.75C14.026 17 14.25 17.224 14.25 17.5V18ZM14.556 12.7615L10.806 14.8865C10.6725 14.9625 10.524 15 10.375 15C10.2225 15 10.0705 14.96 9.9345 14.881C9.6655 14.7245 9.5 14.4365 9.5 14.125V9.875C9.5 9.5635 9.6655 9.2755 9.9345 9.119C10.2025 8.9625 10.535 8.96 10.806 9.114L14.556 11.239C14.8305 11.394 15 11.685 15 12C15 12.315 14.8305 12.606 14.556 12.7615ZM17.25 18C17.25 18.276 17.026 18.5 16.75 18.5H16.25C15.974 18.5 15.75 18.276 15.75 18V17.5C15.75 17.224 15.974 17 16.25 17H16.75C17.026 17 17.25 17.224 17.25 17.5V18ZM17.25 6.5C17.25 6.776 17.026 7 16.75 7H16.25C15.974 7 15.75 6.776 15.75 6.5V6C15.75 5.724 15.974 5.5 16.25 5.5H16.75C17.026 5.5 17.25 5.724 17.25 6V6.5ZM20.25 18C20.25 18.276 20.026 18.5 19.75 18.5H19.25C18.974 18.5 18.75 18.276 18.75 18V17.5C18.75 17.224 18.974 17 19.25 17H19.75C20.026 17 20.25 17.224 20.25 17.5V18ZM20.25 6.5C20.25 6.776 20.026 7 19.75 7H19.25C18.974 7 18.75 6.776 18.75 6.5V6C18.75 5.724 18.974 5.5 19.25 5.5H19.75C20.026 5.5 20.25 5.724 20.25 6V6.5Z"
                                fill="white"
                            />
                        </svg>
                    </i>
                    <p>6 videos</p>
                </li>
                <li>
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 1C14.4625 1 12 3.4625 12 6.5C12 9.5375 14.4625 12 17.5 12C20.5375 12 23 9.5375 23 6.5C23 3.4625 20.5375 1 17.5 1ZM4.25 2.5C3.0095 2.5 2 3.5095 2 4.75V15.25C2 16.4905 3.0095 17.5 4.25 17.5H8.5V20H6.75C6.65062 19.9986 6.55194 20.017 6.45972 20.054C6.36749 20.0911 6.28355 20.1461 6.21277 20.2159C6.142 20.2857 6.08579 20.3688 6.04743 20.4605C6.00907 20.5522 5.98932 20.6506 5.98932 20.75C5.98932 20.8494 6.00907 20.9478 6.04743 21.0395C6.08579 21.1312 6.142 21.2143 6.21277 21.2841C6.28355 21.3539 6.36749 21.4089 6.45972 21.446C6.55194 21.483 6.65062 21.5014 6.75 21.5H9.12695C9.20747 21.5132 9.2896 21.5132 9.37012 21.5H14.627C14.7075 21.5132 14.7896 21.5132 14.8701 21.5H17.25C17.3494 21.5014 17.4481 21.483 17.5403 21.446C17.6325 21.4089 17.7164 21.3539 17.7872 21.2841C17.858 21.2143 17.9142 21.1312 17.9526 21.0395C17.9909 20.9478 18.0107 20.8494 18.0107 20.75C18.0107 20.6506 17.9909 20.5522 17.9526 20.4605C17.9142 20.3688 17.858 20.2857 17.7872 20.2159C17.7164 20.1461 17.6325 20.0911 17.5403 20.054C17.4481 20.017 17.3494 19.9986 17.25 20H15.5V17.5H19.75C20.9905 17.5 22 16.4905 22 15.25V11.1836C20.832 12.3066 19.248 13 17.5 13C13.91 13 11 10.09 11 6.5C11 4.99 11.5198 3.6035 12.3838 2.5H4.25ZM17 3C17.276 3 17.5 3.224 17.5 3.5V6.5H20C20.276 6.5 20.5 6.724 20.5 7C20.5 7.276 20.276 7.5 20 7.5H17C16.724 7.5 16.5 7.276 16.5 7V3.5C16.5 3.224 16.724 3 17 3ZM10 17.5H14V20H10V17.5Z"
                                fill="white"
                            />
                        </svg>
                    </i>
                    <p>4 hours</p>
                </li>
            </ul>
            <p>
                Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Sed libero enim sed faucibus turpis in eu mi. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien. Arcu cursus euismod quis viverra. Dignissim
                diam quis enim lobortis scelerisque fermentum dui. In pellentesque massa placerat duis ultricies lacus sed.
            </p>
        </div>
        <div class="cource-rightbanner">
            <div class="cource-rightinner">
                <div class="cource_profile">
                    <img src="/wp-content/uploads/2024/03/image-94.png" alt="img" />
                </div>
                <div class="cource_description">
                    <label>Taught by:</label>
                    <h3>Sarah McNamara</h3>

                    <label>Main MAP:</label>
                    <h3>HubSpot</h3>

                    <a href="javascript:void(0)" class="oterauthor">
                        View other courses<br />
                        by Sahar McNamara
                    </a>
                </div>
            </div>
            <div class="cource_rightbottominner">
                <img src="/wp-content/uploads/2024/03/Lbadge-sales-pardot.png" alt="img" />
                <img src="/wp-content/uploads/2024/03/Lbadge-founding-member.png" alt="img" />
            </div>
        </div>
    </div>
</section>

<section class="cource_rating">
    <div class="cource-inner-container">
        <ul>
            <li>
                <a href="javascript:void(0);" class="rating_addcartbtns">
                    Add to cart
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                    </i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="rating_checkoutbtns">
                    Checkout
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                    </i>
                </a>
            </li>
            <li>
                <div class="listprice_cource">
                    <label>Bundle price</label>
                    <h4>$26.99</h4>
                </div>
            </li>
            <li>
                <div class="listprice_cource">
                    <label>Rating</label>
                    <ul class="ratingsratr">
                        <li>
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="155" height="31" viewBox="0 0 155 31" fill="none">
                                    <path d="M15.5063 3.22917C15.3253 3.22804 15.1475 3.27766 14.9932 3.37242C14.839 3.46717 14.7143 3.60326 14.6334 3.76526L11.3059 10.4204L3.40451 11.6364C3.22765 11.6637 3.06182 11.7395 2.9254 11.8553C2.78898 11.9711 2.6873 12.1225 2.63165 12.2926C2.576 12.4626 2.56855 12.6448 2.61012 12.8189C2.65169 12.993 2.74066 13.1521 2.86716 13.2787L8.33278 18.7443L7.11553 26.6545C7.0883 26.8315 7.11065 27.0125 7.18009 27.1776C7.24953 27.3426 7.36335 27.4852 7.50891 27.5895C7.65447 27.6937 7.82608 27.7556 8.00469 27.7683C8.1833 27.7809 8.36192 27.7438 8.52072 27.6611L15.5 24.0194L22.4793 27.6611C22.6381 27.7438 22.8167 27.7809 22.9953 27.7683C23.1739 27.7556 23.3456 27.6937 23.4911 27.5895C23.6367 27.4852 23.7505 27.3426 23.8199 27.1776C23.8894 27.0125 23.9117 26.8315 23.8845 26.6545L22.6672 18.7443L28.1329 13.2787C28.2594 13.1521 28.3483 12.993 28.3899 12.8189C28.4315 12.6448 28.424 12.4626 28.3684 12.2926C28.3127 12.1225 28.2111 11.9711 28.0746 11.8553C27.9382 11.7395 27.7724 11.6637 27.5955 11.6364L19.6941 10.4204L16.3666 3.76526C16.2867 3.60518 16.164 3.47036 16.0122 3.37573C15.8603 3.28111 15.6852 3.23038 15.5063 3.22917Z" fill="url(#paint0_linear_1_771)"/>
                                    <path d="M46.5063 3.22917C46.3253 3.22804 46.1475 3.27766 45.9932 3.37242C45.839 3.46717 45.7143 3.60326 45.6334 3.76526L42.3059 10.4204L34.4045 11.6364C34.2277 11.6637 34.0618 11.7395 33.9254 11.8553C33.789 11.9711 33.6873 12.1225 33.6317 12.2926C33.576 12.4626 33.5686 12.6448 33.6101 12.8189C33.6517 12.993 33.7407 13.1521 33.8672 13.2787L39.3328 18.7443L38.1155 26.6545C38.0883 26.8315 38.1106 27.0125 38.1801 27.1776C38.2495 27.3426 38.3633 27.4852 38.5089 27.5895C38.6545 27.6937 38.8261 27.7556 39.0047 27.7683C39.1833 27.7809 39.3619 27.7438 39.5207 27.6611L46.5 24.0194L53.4793 27.6611C53.6381 27.7438 53.8167 27.7809 53.9953 27.7683C54.1739 27.7556 54.3456 27.6937 54.4911 27.5895C54.6367 27.4852 54.7505 27.3426 54.8199 27.1776C54.8894 27.0125 54.9117 26.8315 54.8845 26.6545L53.6673 18.7443L59.1329 13.2787C59.2594 13.1521 59.3483 12.993 59.3899 12.8189C59.4315 12.6448 59.424 12.4626 59.3684 12.2926C59.3127 12.1225 59.2111 11.9711 59.0746 11.8553C58.9382 11.7395 58.7724 11.6637 58.5955 11.6364L50.6941 10.4204L47.3666 3.76526C47.2867 3.60518 47.164 3.47036 47.0122 3.37573C46.8603 3.28111 46.6852 3.23038 46.5063 3.22917Z" fill="url(#paint1_linear_1_771)"/>
                                    <path d="M77.5063 3.22917C77.3253 3.22804 77.1475 3.27766 76.9932 3.37242C76.839 3.46717 76.7143 3.60326 76.6334 3.76526L73.3059 10.4204L65.4045 11.6364C65.2276 11.6637 65.0618 11.7395 64.9254 11.8553C64.789 11.9711 64.6873 12.1225 64.6316 12.2926C64.576 12.4626 64.5685 12.6448 64.6101 12.8189C64.6517 12.993 64.7407 13.1521 64.8672 13.2787L70.3328 18.7443L69.1155 26.6545C69.0883 26.8315 69.1106 27.0125 69.1801 27.1776C69.2495 27.3426 69.3633 27.4852 69.5089 27.5895C69.6545 27.6937 69.8261 27.7556 70.0047 27.7683C70.1833 27.7809 70.3619 27.7438 70.5207 27.6611L77.5 24.0194L84.4793 27.6611C84.6381 27.7438 84.8167 27.7809 84.9953 27.7683C85.1739 27.7556 85.3456 27.6937 85.4911 27.5895C85.6367 27.4852 85.7505 27.3426 85.8199 27.1776C85.8894 27.0125 85.9117 26.8315 85.8845 26.6545L84.6673 18.7443L90.1329 13.2787C90.2594 13.1521 90.3483 12.993 90.3899 12.8189C90.4315 12.6448 90.424 12.4626 90.3684 12.2926C90.3127 12.1225 90.2111 11.9711 90.0746 11.8553C89.9382 11.7395 89.7724 11.6637 89.5955 11.6364L81.6941 10.4204L78.3666 3.76526C78.2867 3.60518 78.164 3.47036 78.0122 3.37573C77.8603 3.28111 77.6852 3.23038 77.5063 3.22917Z" fill="url(#paint2_linear_1_771)"/>
                                    <path d="M108.506 3.22902C108.325 3.22789 108.147 3.27752 107.993 3.37227C107.839 3.46703 107.714 3.60312 107.633 3.76511L104.306 10.4202L96.4044 11.6362C96.2275 11.6635 96.0617 11.7393 95.9253 11.8551C95.7889 11.971 95.6872 12.1223 95.6315 12.2924C95.5759 12.4625 95.5684 12.6447 95.61 12.8187C95.6516 12.9928 95.7405 13.152 95.8671 13.2785L101.333 18.7442L100.115 26.6544C100.088 26.8313 100.111 27.0124 100.18 27.1774C100.249 27.3425 100.363 27.485 100.509 27.5893C100.654 27.6936 100.826 27.7555 101.005 27.7681C101.183 27.7808 101.362 27.7437 101.521 27.6609L108.5 24.0193L115.479 27.6609C115.638 27.7437 115.817 27.7808 115.995 27.7681C116.174 27.7555 116.345 27.6936 116.491 27.5893C116.637 27.485 116.75 27.3425 116.82 27.1774C116.889 27.0124 116.912 26.8313 116.884 26.6544L115.667 18.7442L121.133 13.2785C121.259 13.152 121.348 12.9928 121.39 12.8187C121.431 12.6447 121.424 12.4625 121.368 12.2924C121.313 12.1223 121.211 11.971 121.075 11.8551C120.938 11.7393 120.772 11.6635 120.595 11.6362L112.694 10.4202L109.366 3.76511C109.287 3.60504 109.164 3.47022 109.012 3.37559C108.86 3.28097 108.685 3.23024 108.506 3.22902Z" fill="url(#paint3_linear_1_771)"/>
                                    <path d="M139.506 3.22917C139.325 3.22804 139.148 3.27766 138.993 3.37242C138.839 3.46717 138.714 3.60326 138.633 3.76526L135.306 10.4204L127.405 11.6364C127.228 11.6637 127.062 11.7395 126.925 11.8553C126.789 11.9711 126.687 12.1225 126.632 12.2926C126.576 12.4626 126.569 12.6448 126.61 12.8189C126.652 12.993 126.741 13.1521 126.867 13.2787L132.333 18.7443L131.116 26.6545C131.088 26.8315 131.111 27.0125 131.18 27.1776C131.25 27.3426 131.363 27.4852 131.509 27.5895C131.654 27.6937 131.826 27.7556 132.005 27.7683C132.183 27.7809 132.362 27.7438 132.521 27.6611L139.5 24.0194L146.479 27.6611C146.638 27.7438 146.817 27.7809 146.995 27.7683C147.174 27.7556 147.346 27.6937 147.491 27.5895C147.637 27.4852 147.751 27.3426 147.82 27.1776C147.889 27.0125 147.912 26.8315 147.884 26.6545L146.667 18.7443L152.133 13.2787C152.259 13.1521 152.348 12.993 152.39 12.8189C152.431 12.6448 152.424 12.4626 152.368 12.2926C152.313 12.1225 152.211 11.9711 152.075 11.8553C151.938 11.7395 151.772 11.6637 151.596 11.6364L143.694 10.4204L140.367 3.76526C140.287 3.60518 140.164 3.47036 140.012 3.37573C139.86 3.28111 139.685 3.23038 139.506 3.22917Z" fill="url(#paint4_linear_1_771)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint4_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </i>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</section>

<section class="cource_video">
    <div class="cource-inner-container">
        <video id="video" poster="https://marketingops.com/wp-content/uploads/2024/03/image-111.png">
            <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
        </video>
        <div class="play-button-wrapper">
			<div title="Play video" class="play-gif" id="circle-play-b">
				<!-- SVG Play Button -->
                <svg width="124" height="90" viewBox="0 0 124 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H78.9009C103.754 90 123.901 69.8528 123.901 45C123.901 20.1472 103.754 0 78.9009 0H45ZM45.1504 71.4501V19.3153L89.4633 45.3853L45.1504 71.4501Z" fill="black"/>
                    </g>
                    <path opacity="0.9" d="M45.1505 19.3154V71.4503L89.4633 45.3854L45.1505 19.3154Z" fill="white"/>
                </svg>
			</div>
		</div>
    </div>
</section>

<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 1</h2>
            <h3>Turpis egestas pretium</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In hac habitasse platea dictumst  
            </p>
            <ul>
                <li>
                    <div class="pricetext">
                        $4.99
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);" class="addcartbtns">
                        Add module to cart
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="checkoutbtns">
                        Checkout
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-97.png" alt="img" />
            <div class="cource-lock-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="90" viewBox="0 0 124 90" fill="none">
                    <path opacity="0.9" d="M62.3333 16C56.4659 16 51.6667 20.7992 51.6667 26.6667V32H47C43.692 32 41 34.692 41 38V63.3333C41 66.6413 43.692 69.3333 47 69.3333H77.6667C80.9747 69.3333 83.6667 66.6413 83.6667 63.3333V38C83.6667 34.692 80.9747 32 77.6667 32H73V26.6667C73 20.7992 68.2008 16 62.3333 16ZM62.3333 20C66.0392 20 69 22.9608 69 26.6667V32H55.6667V26.6667C55.6667 22.9608 58.6274 20 62.3333 20ZM62.3333 46.6667C64.5427 46.6667 66.3333 48.4573 66.3333 50.6667C66.3333 52.876 64.5427 54.6667 62.3333 54.6667C60.124 54.6667 58.3333 52.876 58.3333 50.6667C58.3333 48.4573 60.124 46.6667 62.3333 46.6667Z" fill="white"/>
                    <path opacity="0.45" fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H79C103.853 90 124 69.8528 124 45C124 20.1472 103.853 0 79 0H45ZM51.6667 26.6667C51.6667 20.7992 56.4659 16 62.3333 16C68.2008 16 73 20.7992 73 26.6667V32H77.6667C80.9747 32 83.6667 34.692 83.6667 38V63.3333C83.6667 66.6413 80.9747 69.3333 77.6667 69.3333H47C43.692 69.3333 41 66.6413 41 63.3333V38C41 34.692 43.692 32 47 32H51.6667V26.6667ZM69 26.6667C69 22.9608 66.0392 20 62.3333 20C58.6274 20 55.6667 22.9608 55.6667 26.6667V32H69V26.6667ZM66.3333 50.6667C66.3333 48.4573 64.5427 46.6667 62.3333 46.6667C60.124 46.6667 58.3333 48.4573 58.3333 50.6667C58.3333 52.876 60.124 54.6667 62.3333 54.6667C64.5427 54.6667 66.3333 52.876 66.3333 50.6667Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 2</h2>
            <h3>Nunc consequat interdum varius sit amet mattis</h3>
            <p>
                Nam aliquam sem et tortor consequat id porta nibh venenatis. Turpis in eu mi bibendum neque egestas congue. Gravida neque convallis a cras semper auctor neque.
            </p>
            <ul>
                <li>
                    <div class="pricetext">
                        $4.99
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);" class="addcartbtns">
                        Add module to cart
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="checkoutbtns">
                        Checkout
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-98.png" alt="img" />
            <div class="cource-lock-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="90" viewBox="0 0 124 90" fill="none">
                    <path opacity="0.9" d="M62.3333 16C56.4659 16 51.6667 20.7992 51.6667 26.6667V32H47C43.692 32 41 34.692 41 38V63.3333C41 66.6413 43.692 69.3333 47 69.3333H77.6667C80.9747 69.3333 83.6667 66.6413 83.6667 63.3333V38C83.6667 34.692 80.9747 32 77.6667 32H73V26.6667C73 20.7992 68.2008 16 62.3333 16ZM62.3333 20C66.0392 20 69 22.9608 69 26.6667V32H55.6667V26.6667C55.6667 22.9608 58.6274 20 62.3333 20ZM62.3333 46.6667C64.5427 46.6667 66.3333 48.4573 66.3333 50.6667C66.3333 52.876 64.5427 54.6667 62.3333 54.6667C60.124 54.6667 58.3333 52.876 58.3333 50.6667C58.3333 48.4573 60.124 46.6667 62.3333 46.6667Z" fill="white"/>
                    <path opacity="0.45" fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H79C103.853 90 124 69.8528 124 45C124 20.1472 103.853 0 79 0H45ZM51.6667 26.6667C51.6667 20.7992 56.4659 16 62.3333 16C68.2008 16 73 20.7992 73 26.6667V32H77.6667C80.9747 32 83.6667 34.692 83.6667 38V63.3333C83.6667 66.6413 80.9747 69.3333 77.6667 69.3333H47C43.692 69.3333 41 66.6413 41 63.3333V38C41 34.692 43.692 32 47 32H51.6667V26.6667ZM69 26.6667C69 22.9608 66.0392 20 62.3333 20C58.6274 20 55.6667 22.9608 55.6667 26.6667V32H69V26.6667ZM66.3333 50.6667C66.3333 48.4573 64.5427 46.6667 62.3333 46.6667C60.124 46.6667 58.3333 48.4573 58.3333 50.6667C58.3333 52.876 60.124 54.6667 62.3333 54.6667C64.5427 54.6667 66.3333 52.876 66.3333 50.6667Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 3</h2>
            <h3>Mattis rhoncus urna neque</h3>
            <p>
                Vitae justo eget magna fermentum iaculis. Fermentum dui faucibus in ornare. Tempor id eu nisl nunc. Est sit amet facilisis magna. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique.
            </p>
            <ul>
                <li>
                    <div class="pricetext">
                        $4.99
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);" class="addcartbtns">
                        Add module to cart
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="checkoutbtns">
                        Checkout
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-99.png" alt="img" />
            <div class="cource-lock-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="90" viewBox="0 0 124 90" fill="none">
                    <path opacity="0.9" d="M62.3333 16C56.4659 16 51.6667 20.7992 51.6667 26.6667V32H47C43.692 32 41 34.692 41 38V63.3333C41 66.6413 43.692 69.3333 47 69.3333H77.6667C80.9747 69.3333 83.6667 66.6413 83.6667 63.3333V38C83.6667 34.692 80.9747 32 77.6667 32H73V26.6667C73 20.7992 68.2008 16 62.3333 16ZM62.3333 20C66.0392 20 69 22.9608 69 26.6667V32H55.6667V26.6667C55.6667 22.9608 58.6274 20 62.3333 20ZM62.3333 46.6667C64.5427 46.6667 66.3333 48.4573 66.3333 50.6667C66.3333 52.876 64.5427 54.6667 62.3333 54.6667C60.124 54.6667 58.3333 52.876 58.3333 50.6667C58.3333 48.4573 60.124 46.6667 62.3333 46.6667Z" fill="white"/>
                    <path opacity="0.45" fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H79C103.853 90 124 69.8528 124 45C124 20.1472 103.853 0 79 0H45ZM51.6667 26.6667C51.6667 20.7992 56.4659 16 62.3333 16C68.2008 16 73 20.7992 73 26.6667V32H77.6667C80.9747 32 83.6667 34.692 83.6667 38V63.3333C83.6667 66.6413 80.9747 69.3333 77.6667 69.3333H47C43.692 69.3333 41 66.6413 41 63.3333V38C41 34.692 43.692 32 47 32H51.6667V26.6667ZM69 26.6667C69 22.9608 66.0392 20 62.3333 20C58.6274 20 55.6667 22.9608 55.6667 26.6667V32H69V26.6667ZM66.3333 50.6667C66.3333 48.4573 64.5427 46.6667 62.3333 46.6667C60.124 46.6667 58.3333 48.4573 58.3333 50.6667C58.3333 52.876 60.124 54.6667 62.3333 54.6667C64.5427 54.6667 66.3333 52.876 66.3333 50.6667Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 4</h2>
            <h3>Turpis egestas pretium</h3>
            <p>
                Ac placerat vestibulum lectus mauris ultrices eros in. Tellus id interdum velit laoreet id. Duis at tellus at urna condimentum mattis pellentesque id. Enim tortor at auctor urna nunc id cursus metus.
            </p>
            <ul>
                <li>
                    <div class="pricetext">
                        $4.99
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);" class="addcartbtns">
                        Add module to cart
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="checkoutbtns">
                        Checkout
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-100.png" alt="img" />
            <div class="cource-lock-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="90" viewBox="0 0 124 90" fill="none">
                    <path opacity="0.9" d="M62.3333 16C56.4659 16 51.6667 20.7992 51.6667 26.6667V32H47C43.692 32 41 34.692 41 38V63.3333C41 66.6413 43.692 69.3333 47 69.3333H77.6667C80.9747 69.3333 83.6667 66.6413 83.6667 63.3333V38C83.6667 34.692 80.9747 32 77.6667 32H73V26.6667C73 20.7992 68.2008 16 62.3333 16ZM62.3333 20C66.0392 20 69 22.9608 69 26.6667V32H55.6667V26.6667C55.6667 22.9608 58.6274 20 62.3333 20ZM62.3333 46.6667C64.5427 46.6667 66.3333 48.4573 66.3333 50.6667C66.3333 52.876 64.5427 54.6667 62.3333 54.6667C60.124 54.6667 58.3333 52.876 58.3333 50.6667C58.3333 48.4573 60.124 46.6667 62.3333 46.6667Z" fill="white"/>
                    <path opacity="0.45" fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H79C103.853 90 124 69.8528 124 45C124 20.1472 103.853 0 79 0H45ZM51.6667 26.6667C51.6667 20.7992 56.4659 16 62.3333 16C68.2008 16 73 20.7992 73 26.6667V32H77.6667C80.9747 32 83.6667 34.692 83.6667 38V63.3333C83.6667 66.6413 80.9747 69.3333 77.6667 69.3333H47C43.692 69.3333 41 66.6413 41 63.3333V38C41 34.692 43.692 32 47 32H51.6667V26.6667ZM69 26.6667C69 22.9608 66.0392 20 62.3333 20C58.6274 20 55.6667 22.9608 55.6667 26.6667V32H69V26.6667ZM66.3333 50.6667C66.3333 48.4573 64.5427 46.6667 62.3333 46.6667C60.124 46.6667 58.3333 48.4573 58.3333 50.6667C58.3333 52.876 60.124 54.6667 62.3333 54.6667C64.5427 54.6667 66.3333 52.876 66.3333 50.6667Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 5</h2>
            <h3>Turpis egestas pretium</h3>
            <p>
                Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Sed libero enim sed faucibus turpis in eu mi. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien.
            </p>
            <ul>
                <li>
                    <div class="pricetext">
                        $4.99
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);" class="addcartbtns">
                        Add module to cart
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="checkoutbtns">
                        Checkout
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-101.png" alt="img" />
            <div class="cource-lock-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="90" viewBox="0 0 124 90" fill="none">
                    <path opacity="0.9" d="M62.3333 16C56.4659 16 51.6667 20.7992 51.6667 26.6667V32H47C43.692 32 41 34.692 41 38V63.3333C41 66.6413 43.692 69.3333 47 69.3333H77.6667C80.9747 69.3333 83.6667 66.6413 83.6667 63.3333V38C83.6667 34.692 80.9747 32 77.6667 32H73V26.6667C73 20.7992 68.2008 16 62.3333 16ZM62.3333 20C66.0392 20 69 22.9608 69 26.6667V32H55.6667V26.6667C55.6667 22.9608 58.6274 20 62.3333 20ZM62.3333 46.6667C64.5427 46.6667 66.3333 48.4573 66.3333 50.6667C66.3333 52.876 64.5427 54.6667 62.3333 54.6667C60.124 54.6667 58.3333 52.876 58.3333 50.6667C58.3333 48.4573 60.124 46.6667 62.3333 46.6667Z" fill="white"/>
                    <path opacity="0.45" fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H79C103.853 90 124 69.8528 124 45C124 20.1472 103.853 0 79 0H45ZM51.6667 26.6667C51.6667 20.7992 56.4659 16 62.3333 16C68.2008 16 73 20.7992 73 26.6667V32H77.6667C80.9747 32 83.6667 34.692 83.6667 38V63.3333C83.6667 66.6413 80.9747 69.3333 77.6667 69.3333H47C43.692 69.3333 41 66.6413 41 63.3333V38C41 34.692 43.692 32 47 32H51.6667V26.6667ZM69 26.6667C69 22.9608 66.0392 20 62.3333 20C58.6274 20 55.6667 22.9608 55.6667 26.6667V32H69V26.6667ZM66.3333 50.6667C66.3333 48.4573 64.5427 46.6667 62.3333 46.6667C60.124 46.6667 58.3333 48.4573 58.3333 50.6667C58.3333 52.876 60.124 54.6667 62.3333 54.6667C64.5427 54.6667 66.3333 52.876 66.3333 50.6667Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 6</h2>
            <h3>Turpis egestas pretium</h3>
            <p>
                Arcu cursus euismod quis viverra. Dignissim diam quis enim lobortis scelerisque fermentum dui. In pellentesque massa placerat duis ultricies lacus sed. Enim sit amet venenatis urna cursus eget.
            </p>
            <ul>
                <li>
                    <div class="pricetext">
                        $4.99
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);" class="addcartbtns">
                        Add module to cart
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="checkoutbtns">
                        Checkout
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-102.png" alt="img" />
            <div class="cource-lock-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="90" viewBox="0 0 124 90" fill="none">
                    <path opacity="0.9" d="M62.3333 16C56.4659 16 51.6667 20.7992 51.6667 26.6667V32H47C43.692 32 41 34.692 41 38V63.3333C41 66.6413 43.692 69.3333 47 69.3333H77.6667C80.9747 69.3333 83.6667 66.6413 83.6667 63.3333V38C83.6667 34.692 80.9747 32 77.6667 32H73V26.6667C73 20.7992 68.2008 16 62.3333 16ZM62.3333 20C66.0392 20 69 22.9608 69 26.6667V32H55.6667V26.6667C55.6667 22.9608 58.6274 20 62.3333 20ZM62.3333 46.6667C64.5427 46.6667 66.3333 48.4573 66.3333 50.6667C66.3333 52.876 64.5427 54.6667 62.3333 54.6667C60.124 54.6667 58.3333 52.876 58.3333 50.6667C58.3333 48.4573 60.124 46.6667 62.3333 46.6667Z" fill="white"/>
                    <path opacity="0.45" fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H79C103.853 90 124 69.8528 124 45C124 20.1472 103.853 0 79 0H45ZM51.6667 26.6667C51.6667 20.7992 56.4659 16 62.3333 16C68.2008 16 73 20.7992 73 26.6667V32H77.6667C80.9747 32 83.6667 34.692 83.6667 38V63.3333C83.6667 66.6413 80.9747 69.3333 77.6667 69.3333H47C43.692 69.3333 41 66.6413 41 63.3333V38C41 34.692 43.692 32 47 32H51.6667V26.6667ZM69 26.6667C69 22.9608 66.0392 20 62.3333 20C58.6274 20 55.6667 22.9608 55.6667 26.6667V32H69V26.6667ZM66.3333 50.6667C66.3333 48.4573 64.5427 46.6667 62.3333 46.6667C60.124 46.6667 58.3333 48.4573 58.3333 50.6667C58.3333 52.876 60.124 54.6667 62.3333 54.6667C64.5427 54.6667 66.3333 52.876 66.3333 50.6667Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>



<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 7</h2>
            <h3>Turpis egestas pretium</h3>
            <p>
                Arcu cursus euismod quis viverra. Dignissim diam quis enim lobortis scelerisque fermentum dui. In pellentesque massa placerat duis ultricies lacus sed. Enim sit amet venenatis urna cursus eget.
            </p>
            <ul class="halfprice">
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                        Labore et dolore magna aliqua  
                        </a>  
                    </div>
                </li>
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                            Convallis tellus id interdum velit laoreet – consequat semper viverra   
                        </a>  
                    </div>
                </li>
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                            Turpis egestas sed tempus urna   
                        </a>  
                    </div>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-102.png" alt="img" />
            <div class="cource-lock-img">
                <svg width="124" height="90" viewBox="0 0 124 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H78.9009C103.754 90 123.901 69.8528 123.901 45C123.901 20.1472 103.754 0 78.9009 0H45ZM45.1504 71.4501V19.3153L89.4633 45.3853L45.1504 71.4501Z" fill="black"/>
                    </g>
                        <path opacity="0.9" d="M45.1504 19.3154V71.4503L89.4632 45.3854L45.1504 19.3154Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
</section>


<section class="cource_module">
    <div class="cource-inner-container">
        <div class="cource-inner-container_left">
            <h2>Module 8</h2>
            <h3>Turpis egestas pretium</h3>
            <p>
                Arcu cursus euismod quis viverra. Dignissim diam quis enim lobortis scelerisque fermentum dui. In pellentesque massa placerat duis ultricies lacus sed. Enim sit amet venenatis urna cursus eget.
            </p>
            <ul class="halfprice">
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                            Vitae nunc sed velit dignissim sodales
                        </a>  
                    </div>
                </li>
            </ul>
        </div>
        <div class="cource-inner-container_right">
            <img src="https://marketingops.com/wp-content/uploads/2024/03/image-102.png" alt="img" />
            <div class="cource-lock-img">
                <svg width="124" height="90" viewBox="0 0 124 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H78.9009C103.754 90 123.901 69.8528 123.901 45C123.901 20.1472 103.754 0 78.9009 0H45ZM45.1504 71.4501V19.3153L89.4633 45.3853L45.1504 71.4501Z" fill="black"/>
                    </g>
                        <path opacity="0.9" d="M45.1504 19.3154V71.4503L89.4632 45.3854L45.1504 19.3154Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
</section>
</main>




<main>
<section class="maincource black">
    <div class="cource-container">
        <div class="cource-leftbanner">
            <h1>How to Learn Digital Marketing for (Nearly) Free in 6 Months</h1>
            <ul>
                <li>
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.25 3.5H4.75C3.2335 3.5 2 4.734 2 6.25V17.75C2 19.266 3.2335 20.5 4.75 20.5H19.25C20.7665 20.5 22 19.266 22 17.75V6.25C22 4.734 20.7665 3.5 19.25 3.5ZM12.75 6C12.75 5.724 12.974 5.5 13.25 5.5H13.75C14.026 5.5 14.25 5.724 14.25 6V6.5C14.25 6.776 14.026 7 13.75 7H13.25C12.974 7 12.75 6.776 12.75 6.5V6ZM9.75 6C9.75 5.724 9.974 5.5 10.25 5.5H10.75C11.026 5.5 11.25 5.724 11.25 6V6.5C11.25 6.776 11.026 7 10.75 7H10.25C9.974 7 9.75 6.776 9.75 6.5V6ZM5.25 18C5.25 18.276 5.026 18.5 4.75 18.5H4.25C3.974 18.5 3.75 18.276 3.75 18V17.5C3.75 17.224 3.974 17 4.25 17H4.75C5.026 17 5.25 17.224 5.25 17.5V18ZM5.25 6.5C5.25 6.776 5.026 7 4.75 7H4.25C3.974 7 3.75 6.776 3.75 6.5V6C3.75 5.724 3.974 5.5 4.25 5.5H4.75C5.026 5.5 5.25 5.724 5.25 6V6.5ZM8.25 18C8.25 18.276 8.026 18.5 7.75 18.5H7.25C6.974 18.5 6.75 18.276 6.75 18V17.5C6.75 17.224 6.974 17 7.25 17H7.75C8.026 17 8.25 17.224 8.25 17.5V18ZM8.25 6.5C8.25 6.776 8.026 7 7.75 7H7.25C6.974 7 6.75 6.776 6.75 6.5V6C6.75 5.724 6.974 5.5 7.25 5.5H7.75C8.026 5.5 8.25 5.724 8.25 6V6.5ZM11.25 18C11.25 18.276 11.026 18.5 10.75 18.5H10.25C9.974 18.5 9.75 18.276 9.75 18V17.5C9.75 17.224 9.974 17 10.25 17H10.75C11.026 17 11.25 17.224 11.25 17.5V18ZM14.25 18C14.25 18.276 14.026 18.5 13.75 18.5H13.25C12.974 18.5 12.75 18.276 12.75 18V17.5C12.75 17.224 12.974 17 13.25 17H13.75C14.026 17 14.25 17.224 14.25 17.5V18ZM14.556 12.7615L10.806 14.8865C10.6725 14.9625 10.524 15 10.375 15C10.2225 15 10.0705 14.96 9.9345 14.881C9.6655 14.7245 9.5 14.4365 9.5 14.125V9.875C9.5 9.5635 9.6655 9.2755 9.9345 9.119C10.2025 8.9625 10.535 8.96 10.806 9.114L14.556 11.239C14.8305 11.394 15 11.685 15 12C15 12.315 14.8305 12.606 14.556 12.7615ZM17.25 18C17.25 18.276 17.026 18.5 16.75 18.5H16.25C15.974 18.5 15.75 18.276 15.75 18V17.5C15.75 17.224 15.974 17 16.25 17H16.75C17.026 17 17.25 17.224 17.25 17.5V18ZM17.25 6.5C17.25 6.776 17.026 7 16.75 7H16.25C15.974 7 15.75 6.776 15.75 6.5V6C15.75 5.724 15.974 5.5 16.25 5.5H16.75C17.026 5.5 17.25 5.724 17.25 6V6.5ZM20.25 18C20.25 18.276 20.026 18.5 19.75 18.5H19.25C18.974 18.5 18.75 18.276 18.75 18V17.5C18.75 17.224 18.974 17 19.25 17H19.75C20.026 17 20.25 17.224 20.25 17.5V18ZM20.25 6.5C20.25 6.776 20.026 7 19.75 7H19.25C18.974 7 18.75 6.776 18.75 6.5V6C18.75 5.724 18.974 5.5 19.25 5.5H19.75C20.026 5.5 20.25 5.724 20.25 6V6.5Z"
                                fill="white"
                            />
                        </svg>
                    </i>
                    <p>6 videos</p>
                </li>
                <li>
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 1C14.4625 1 12 3.4625 12 6.5C12 9.5375 14.4625 12 17.5 12C20.5375 12 23 9.5375 23 6.5C23 3.4625 20.5375 1 17.5 1ZM4.25 2.5C3.0095 2.5 2 3.5095 2 4.75V15.25C2 16.4905 3.0095 17.5 4.25 17.5H8.5V20H6.75C6.65062 19.9986 6.55194 20.017 6.45972 20.054C6.36749 20.0911 6.28355 20.1461 6.21277 20.2159C6.142 20.2857 6.08579 20.3688 6.04743 20.4605C6.00907 20.5522 5.98932 20.6506 5.98932 20.75C5.98932 20.8494 6.00907 20.9478 6.04743 21.0395C6.08579 21.1312 6.142 21.2143 6.21277 21.2841C6.28355 21.3539 6.36749 21.4089 6.45972 21.446C6.55194 21.483 6.65062 21.5014 6.75 21.5H9.12695C9.20747 21.5132 9.2896 21.5132 9.37012 21.5H14.627C14.7075 21.5132 14.7896 21.5132 14.8701 21.5H17.25C17.3494 21.5014 17.4481 21.483 17.5403 21.446C17.6325 21.4089 17.7164 21.3539 17.7872 21.2841C17.858 21.2143 17.9142 21.1312 17.9526 21.0395C17.9909 20.9478 18.0107 20.8494 18.0107 20.75C18.0107 20.6506 17.9909 20.5522 17.9526 20.4605C17.9142 20.3688 17.858 20.2857 17.7872 20.2159C17.7164 20.1461 17.6325 20.0911 17.5403 20.054C17.4481 20.017 17.3494 19.9986 17.25 20H15.5V17.5H19.75C20.9905 17.5 22 16.4905 22 15.25V11.1836C20.832 12.3066 19.248 13 17.5 13C13.91 13 11 10.09 11 6.5C11 4.99 11.5198 3.6035 12.3838 2.5H4.25ZM17 3C17.276 3 17.5 3.224 17.5 3.5V6.5H20C20.276 6.5 20.5 6.724 20.5 7C20.5 7.276 20.276 7.5 20 7.5H17C16.724 7.5 16.5 7.276 16.5 7V3.5C16.5 3.224 16.724 3 17 3ZM10 17.5H14V20H10V17.5Z"
                                fill="white"
                            />
                        </svg>
                    </i>
                    <p>4 hours</p>
                </li>
            </ul>
            <p>
                Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Sed libero enim sed faucibus turpis in eu mi. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien. Arcu cursus euismod quis viverra. Dignissim
                diam quis enim lobortis scelerisque fermentum dui. In pellentesque massa placerat duis ultricies lacus sed.
            </p>
        </div>
        <div class="cource-rightbanner">
            <div class="cource-rightinner">
                <div class="cource_profile">
                    <img src="/wp-content/uploads/2024/03/image-94.png" alt="img" />
                </div>
                <div class="cource_description">
                    <label>Taught by:</label>
                    <h3>Sarah McNamara</h3>

                    <label>Main MAP:</label>
                    <h3>HubSpot</h3>

                    <a href="javascript:void(0)" class="oterauthor">
                        View other courses<br />
                        by Sahar McNamara
                    </a>
                </div>
            </div>
            <div class="cource_rightbottominner">
                <img src="/wp-content/uploads/2024/03/Lbadge-sales-pardot.png" alt="img" />
                <img src="/wp-content/uploads/2024/03/Lbadge-founding-member.png" alt="img" />
            </div>
        </div>
    </div>
</section>

<section class="cource_rating">
    <div class="cource-inner-container">
        <ul>
            <li>
                <a href="javascript:void(0);" class="rating_addcartbtns">
                    Add to cart
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                    </i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="rating_checkoutbtns">
                    Checkout
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_9_18)"><path d="M10.5262 3.49457C10.2892 3.48546 10.0693 3.62103 9.97249 3.8375C9.87452 4.05396 9.91667 4.30688 10.0807 4.48005L11.8728 6.41682H0.592831C0.382065 6.4134 0.187248 6.52391 0.0812957 6.70619C-0.0257965 6.88734 -0.0257965 7.11292 0.0812957 7.29406C0.187248 7.47634 0.382065 7.58685 0.592831 7.58344H11.8728L10.0807 9.52021C9.9349 9.67287 9.88363 9.89161 9.94515 10.0933C10.0067 10.2949 10.1719 10.4476 10.3769 10.4931C10.5831 10.5387 10.7973 10.4692 10.9375 10.3131L14.001 7.00013L10.9375 3.68711C10.8326 3.5709 10.6834 3.50027 10.5262 3.49457Z" fill="white"/></g><defs><clipPath id="clip0_9_18"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                    </i>
                </a>
            </li>
            <li>
                <div class="listprice_cource">
                    <label>Bundle price</label>
                    <h4>$26.99</h4>
                </div>
            </li>
            <li>
                <div class="listprice_cource">
                    <label>Rating</label>
                    <ul class="ratingsratr">
                        <li>
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="155" height="31" viewBox="0 0 155 31" fill="none">
                                    <path d="M15.5063 3.22917C15.3253 3.22804 15.1475 3.27766 14.9932 3.37242C14.839 3.46717 14.7143 3.60326 14.6334 3.76526L11.3059 10.4204L3.40451 11.6364C3.22765 11.6637 3.06182 11.7395 2.9254 11.8553C2.78898 11.9711 2.6873 12.1225 2.63165 12.2926C2.576 12.4626 2.56855 12.6448 2.61012 12.8189C2.65169 12.993 2.74066 13.1521 2.86716 13.2787L8.33278 18.7443L7.11553 26.6545C7.0883 26.8315 7.11065 27.0125 7.18009 27.1776C7.24953 27.3426 7.36335 27.4852 7.50891 27.5895C7.65447 27.6937 7.82608 27.7556 8.00469 27.7683C8.1833 27.7809 8.36192 27.7438 8.52072 27.6611L15.5 24.0194L22.4793 27.6611C22.6381 27.7438 22.8167 27.7809 22.9953 27.7683C23.1739 27.7556 23.3456 27.6937 23.4911 27.5895C23.6367 27.4852 23.7505 27.3426 23.8199 27.1776C23.8894 27.0125 23.9117 26.8315 23.8845 26.6545L22.6672 18.7443L28.1329 13.2787C28.2594 13.1521 28.3483 12.993 28.3899 12.8189C28.4315 12.6448 28.424 12.4626 28.3684 12.2926C28.3127 12.1225 28.2111 11.9711 28.0746 11.8553C27.9382 11.7395 27.7724 11.6637 27.5955 11.6364L19.6941 10.4204L16.3666 3.76526C16.2867 3.60518 16.164 3.47036 16.0122 3.37573C15.8603 3.28111 15.6852 3.23038 15.5063 3.22917Z" fill="url(#paint0_linear_1_771)"/>
                                    <path d="M46.5063 3.22917C46.3253 3.22804 46.1475 3.27766 45.9932 3.37242C45.839 3.46717 45.7143 3.60326 45.6334 3.76526L42.3059 10.4204L34.4045 11.6364C34.2277 11.6637 34.0618 11.7395 33.9254 11.8553C33.789 11.9711 33.6873 12.1225 33.6317 12.2926C33.576 12.4626 33.5686 12.6448 33.6101 12.8189C33.6517 12.993 33.7407 13.1521 33.8672 13.2787L39.3328 18.7443L38.1155 26.6545C38.0883 26.8315 38.1106 27.0125 38.1801 27.1776C38.2495 27.3426 38.3633 27.4852 38.5089 27.5895C38.6545 27.6937 38.8261 27.7556 39.0047 27.7683C39.1833 27.7809 39.3619 27.7438 39.5207 27.6611L46.5 24.0194L53.4793 27.6611C53.6381 27.7438 53.8167 27.7809 53.9953 27.7683C54.1739 27.7556 54.3456 27.6937 54.4911 27.5895C54.6367 27.4852 54.7505 27.3426 54.8199 27.1776C54.8894 27.0125 54.9117 26.8315 54.8845 26.6545L53.6673 18.7443L59.1329 13.2787C59.2594 13.1521 59.3483 12.993 59.3899 12.8189C59.4315 12.6448 59.424 12.4626 59.3684 12.2926C59.3127 12.1225 59.2111 11.9711 59.0746 11.8553C58.9382 11.7395 58.7724 11.6637 58.5955 11.6364L50.6941 10.4204L47.3666 3.76526C47.2867 3.60518 47.164 3.47036 47.0122 3.37573C46.8603 3.28111 46.6852 3.23038 46.5063 3.22917Z" fill="url(#paint1_linear_1_771)"/>
                                    <path d="M77.5063 3.22917C77.3253 3.22804 77.1475 3.27766 76.9932 3.37242C76.839 3.46717 76.7143 3.60326 76.6334 3.76526L73.3059 10.4204L65.4045 11.6364C65.2276 11.6637 65.0618 11.7395 64.9254 11.8553C64.789 11.9711 64.6873 12.1225 64.6316 12.2926C64.576 12.4626 64.5685 12.6448 64.6101 12.8189C64.6517 12.993 64.7407 13.1521 64.8672 13.2787L70.3328 18.7443L69.1155 26.6545C69.0883 26.8315 69.1106 27.0125 69.1801 27.1776C69.2495 27.3426 69.3633 27.4852 69.5089 27.5895C69.6545 27.6937 69.8261 27.7556 70.0047 27.7683C70.1833 27.7809 70.3619 27.7438 70.5207 27.6611L77.5 24.0194L84.4793 27.6611C84.6381 27.7438 84.8167 27.7809 84.9953 27.7683C85.1739 27.7556 85.3456 27.6937 85.4911 27.5895C85.6367 27.4852 85.7505 27.3426 85.8199 27.1776C85.8894 27.0125 85.9117 26.8315 85.8845 26.6545L84.6673 18.7443L90.1329 13.2787C90.2594 13.1521 90.3483 12.993 90.3899 12.8189C90.4315 12.6448 90.424 12.4626 90.3684 12.2926C90.3127 12.1225 90.2111 11.9711 90.0746 11.8553C89.9382 11.7395 89.7724 11.6637 89.5955 11.6364L81.6941 10.4204L78.3666 3.76526C78.2867 3.60518 78.164 3.47036 78.0122 3.37573C77.8603 3.28111 77.6852 3.23038 77.5063 3.22917Z" fill="url(#paint2_linear_1_771)"/>
                                    <path d="M108.506 3.22902C108.325 3.22789 108.147 3.27752 107.993 3.37227C107.839 3.46703 107.714 3.60312 107.633 3.76511L104.306 10.4202L96.4044 11.6362C96.2275 11.6635 96.0617 11.7393 95.9253 11.8551C95.7889 11.971 95.6872 12.1223 95.6315 12.2924C95.5759 12.4625 95.5684 12.6447 95.61 12.8187C95.6516 12.9928 95.7405 13.152 95.8671 13.2785L101.333 18.7442L100.115 26.6544C100.088 26.8313 100.111 27.0124 100.18 27.1774C100.249 27.3425 100.363 27.485 100.509 27.5893C100.654 27.6936 100.826 27.7555 101.005 27.7681C101.183 27.7808 101.362 27.7437 101.521 27.6609L108.5 24.0193L115.479 27.6609C115.638 27.7437 115.817 27.7808 115.995 27.7681C116.174 27.7555 116.345 27.6936 116.491 27.5893C116.637 27.485 116.75 27.3425 116.82 27.1774C116.889 27.0124 116.912 26.8313 116.884 26.6544L115.667 18.7442L121.133 13.2785C121.259 13.152 121.348 12.9928 121.39 12.8187C121.431 12.6447 121.424 12.4625 121.368 12.2924C121.313 12.1223 121.211 11.971 121.075 11.8551C120.938 11.7393 120.772 11.6635 120.595 11.6362L112.694 10.4202L109.366 3.76511C109.287 3.60504 109.164 3.47022 109.012 3.37559C108.86 3.28097 108.685 3.23024 108.506 3.22902Z" fill="url(#paint3_linear_1_771)"/>
                                    <path d="M139.506 3.22917C139.325 3.22804 139.148 3.27766 138.993 3.37242C138.839 3.46717 138.714 3.60326 138.633 3.76526L135.306 10.4204L127.405 11.6364C127.228 11.6637 127.062 11.7395 126.925 11.8553C126.789 11.9711 126.687 12.1225 126.632 12.2926C126.576 12.4626 126.569 12.6448 126.61 12.8189C126.652 12.993 126.741 13.1521 126.867 13.2787L132.333 18.7443L131.116 26.6545C131.088 26.8315 131.111 27.0125 131.18 27.1776C131.25 27.3426 131.363 27.4852 131.509 27.5895C131.654 27.6937 131.826 27.7556 132.005 27.7683C132.183 27.7809 132.362 27.7438 132.521 27.6611L139.5 24.0194L146.479 27.6611C146.638 27.7438 146.817 27.7809 146.995 27.7683C147.174 27.7556 147.346 27.6937 147.491 27.5895C147.637 27.4852 147.751 27.3426 147.82 27.1776C147.889 27.0125 147.912 26.8315 147.884 26.6545L146.667 18.7443L152.133 13.2787C152.259 13.1521 152.348 12.993 152.39 12.8189C152.431 12.6448 152.424 12.4626 152.368 12.2926C152.313 12.1225 152.211 11.9711 152.075 11.8553C151.938 11.7395 151.772 11.6637 151.596 11.6364L143.694 10.4204L140.367 3.76526C140.287 3.60518 140.164 3.47036 140.012 3.37573C139.86 3.28111 139.685 3.23038 139.506 3.22917Z" fill="url(#paint4_linear_1_771)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                        <linearGradient id="paint4_linear_1_771" x1="-0.950729" y1="15.5591" x2="240.9" y2="15.5591" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD4B7A"/>
                                            <stop offset="1" stop-color="#4D00AE"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </i>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</section>

<section class="cource_video">
    <div class="cource-inner-container">
        <video id="video" poster="https://marketingops.com/wp-content/uploads/2024/03/image-111.png">
            <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
        </video>
        <div class="play-button-wrapper">
			<div title="Play video" class="play-gif" id="circle-play-b">
				<!-- SVG Play Button -->
                <svg width="124" height="90" viewBox="0 0 124 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H78.9009C103.754 90 123.901 69.8528 123.901 45C123.901 20.1472 103.754 0 78.9009 0H45ZM45.1504 71.4501V19.3153L89.4633 45.3853L45.1504 71.4501Z" fill="black"/>
                    </g>
                    <path opacity="0.9" d="M45.1505 19.3154V71.4503L89.4633 45.3854L45.1505 19.3154Z" fill="white"/>
                </svg>
			</div>
		</div>
    </div>
</section>

<section class="othermodulerbox">
    <div class="othermodulerbox_container">
        <h4>Other modules of this course</h4>
        <div class="gallery gallery-responsive portfolio_slider">
            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C9.79971 2 8 3.79971 8 6V8H6.25C5.0095 8 4 9.0095 4 10.25V19.75C4 20.9905 5.0095 22 6.25 22H17.75C18.9905 22 20 20.9905 20 19.75V10.25C20 9.0095 18.9905 8 17.75 8H16V6C16 3.79971 14.2003 2 12 2ZM12 3.5C13.3897 3.5 14.5 4.61029 14.5 6V8H9.5V6C9.5 4.61029 10.6103 3.5 12 3.5ZM12 13.5C12.8285 13.5 13.5 14.1715 13.5 15C13.5 15.8285 12.8285 16.5 12 16.5C11.1715 16.5 10.5 15.8285 10.5 15C10.5 14.1715 11.1715 13.5 12 13.5Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 2</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 3</h3>
                    <h5>Viverra vitae congue eu consequat</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 4</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C9.79971 2 8 3.79971 8 6V8H6.25C5.0095 8 4 9.0095 4 10.25V19.75C4 20.9905 5.0095 22 6.25 22H17.75C18.9905 22 20 20.9905 20 19.75V10.25C20 9.0095 18.9905 8 17.75 8H16V6C16 3.79971 14.2003 2 12 2ZM12 3.5C13.3897 3.5 14.5 4.61029 14.5 6V8H9.5V6C9.5 4.61029 10.6103 3.5 12 3.5ZM12 13.5C12.8285 13.5 13.5 14.1715 13.5 15C13.5 15.8285 12.8285 16.5 12 16.5C11.1715 16.5 10.5 15.8285 10.5 15C10.5 14.1715 11.1715 13.5 12 13.5Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 2</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 3</h3>
                    <h5>Viverra vitae congue eu consequat</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 4</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>
        </div>
    </div>
    
</section>
<div class="backtocoursemain">
    <a href="javascript:void(0);" class="backtocourse">
        <i class="backbutton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none"><g clip-path="url(#clip0_1_869)"><path d="M4.47382 2.99408C4.71079 2.98497 4.93067 3.12054 5.02751 3.33701C5.12548 3.55347 5.08333 3.80639 4.91928 3.97956L3.12719 5.91633H14.4072C14.6179 5.91291 14.8128 6.02342 14.9187 6.20571C15.0258 6.38685 15.0258 6.61243 14.9187 6.79357C14.8128 6.97586 14.6179 7.08637 14.4072 7.08295H3.12719L4.91928 9.01972C5.0651 9.17238 5.11637 9.39112 5.05485 9.59277C4.99333 9.79443 4.82813 9.94709 4.62306 9.99266C4.41685 10.0382 4.20267 9.96874 4.06254 9.81266L0.999025 6.49964L4.06254 3.18662C4.16735 3.07042 4.3166 2.99978 4.47382 2.99408Z" fill="white"/></g><defs><clipPath id="clip0_1_869"><rect width="15" height="10" fill="white" transform="matrix(-1 0 0 1 15.5 0.5)"/></clipPath></defs></svg></i> Back to whole course
    </a>
</div>    
</main>






<main>
<section class="maincource">
    <div class="cource-container">
        <div class="cource-leftbanner">
            <h1>How to Learn Digital Marketing for (Nearly) Free in 6 Months</h1>
            <ul>
                <li>
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.25 3.5H4.75C3.2335 3.5 2 4.734 2 6.25V17.75C2 19.266 3.2335 20.5 4.75 20.5H19.25C20.7665 20.5 22 19.266 22 17.75V6.25C22 4.734 20.7665 3.5 19.25 3.5ZM12.75 6C12.75 5.724 12.974 5.5 13.25 5.5H13.75C14.026 5.5 14.25 5.724 14.25 6V6.5C14.25 6.776 14.026 7 13.75 7H13.25C12.974 7 12.75 6.776 12.75 6.5V6ZM9.75 6C9.75 5.724 9.974 5.5 10.25 5.5H10.75C11.026 5.5 11.25 5.724 11.25 6V6.5C11.25 6.776 11.026 7 10.75 7H10.25C9.974 7 9.75 6.776 9.75 6.5V6ZM5.25 18C5.25 18.276 5.026 18.5 4.75 18.5H4.25C3.974 18.5 3.75 18.276 3.75 18V17.5C3.75 17.224 3.974 17 4.25 17H4.75C5.026 17 5.25 17.224 5.25 17.5V18ZM5.25 6.5C5.25 6.776 5.026 7 4.75 7H4.25C3.974 7 3.75 6.776 3.75 6.5V6C3.75 5.724 3.974 5.5 4.25 5.5H4.75C5.026 5.5 5.25 5.724 5.25 6V6.5ZM8.25 18C8.25 18.276 8.026 18.5 7.75 18.5H7.25C6.974 18.5 6.75 18.276 6.75 18V17.5C6.75 17.224 6.974 17 7.25 17H7.75C8.026 17 8.25 17.224 8.25 17.5V18ZM8.25 6.5C8.25 6.776 8.026 7 7.75 7H7.25C6.974 7 6.75 6.776 6.75 6.5V6C6.75 5.724 6.974 5.5 7.25 5.5H7.75C8.026 5.5 8.25 5.724 8.25 6V6.5ZM11.25 18C11.25 18.276 11.026 18.5 10.75 18.5H10.25C9.974 18.5 9.75 18.276 9.75 18V17.5C9.75 17.224 9.974 17 10.25 17H10.75C11.026 17 11.25 17.224 11.25 17.5V18ZM14.25 18C14.25 18.276 14.026 18.5 13.75 18.5H13.25C12.974 18.5 12.75 18.276 12.75 18V17.5C12.75 17.224 12.974 17 13.25 17H13.75C14.026 17 14.25 17.224 14.25 17.5V18ZM14.556 12.7615L10.806 14.8865C10.6725 14.9625 10.524 15 10.375 15C10.2225 15 10.0705 14.96 9.9345 14.881C9.6655 14.7245 9.5 14.4365 9.5 14.125V9.875C9.5 9.5635 9.6655 9.2755 9.9345 9.119C10.2025 8.9625 10.535 8.96 10.806 9.114L14.556 11.239C14.8305 11.394 15 11.685 15 12C15 12.315 14.8305 12.606 14.556 12.7615ZM17.25 18C17.25 18.276 17.026 18.5 16.75 18.5H16.25C15.974 18.5 15.75 18.276 15.75 18V17.5C15.75 17.224 15.974 17 16.25 17H16.75C17.026 17 17.25 17.224 17.25 17.5V18ZM17.25 6.5C17.25 6.776 17.026 7 16.75 7H16.25C15.974 7 15.75 6.776 15.75 6.5V6C15.75 5.724 15.974 5.5 16.25 5.5H16.75C17.026 5.5 17.25 5.724 17.25 6V6.5ZM20.25 18C20.25 18.276 20.026 18.5 19.75 18.5H19.25C18.974 18.5 18.75 18.276 18.75 18V17.5C18.75 17.224 18.974 17 19.25 17H19.75C20.026 17 20.25 17.224 20.25 17.5V18ZM20.25 6.5C20.25 6.776 20.026 7 19.75 7H19.25C18.974 7 18.75 6.776 18.75 6.5V6C18.75 5.724 18.974 5.5 19.25 5.5H19.75C20.026 5.5 20.25 5.724 20.25 6V6.5Z"
                                fill="white"
                            />
                        </svg>
                    </i>
                    <p>6 videos</p>
                </li>
                <li>
                    <i>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 1C14.4625 1 12 3.4625 12 6.5C12 9.5375 14.4625 12 17.5 12C20.5375 12 23 9.5375 23 6.5C23 3.4625 20.5375 1 17.5 1ZM4.25 2.5C3.0095 2.5 2 3.5095 2 4.75V15.25C2 16.4905 3.0095 17.5 4.25 17.5H8.5V20H6.75C6.65062 19.9986 6.55194 20.017 6.45972 20.054C6.36749 20.0911 6.28355 20.1461 6.21277 20.2159C6.142 20.2857 6.08579 20.3688 6.04743 20.4605C6.00907 20.5522 5.98932 20.6506 5.98932 20.75C5.98932 20.8494 6.00907 20.9478 6.04743 21.0395C6.08579 21.1312 6.142 21.2143 6.21277 21.2841C6.28355 21.3539 6.36749 21.4089 6.45972 21.446C6.55194 21.483 6.65062 21.5014 6.75 21.5H9.12695C9.20747 21.5132 9.2896 21.5132 9.37012 21.5H14.627C14.7075 21.5132 14.7896 21.5132 14.8701 21.5H17.25C17.3494 21.5014 17.4481 21.483 17.5403 21.446C17.6325 21.4089 17.7164 21.3539 17.7872 21.2841C17.858 21.2143 17.9142 21.1312 17.9526 21.0395C17.9909 20.9478 18.0107 20.8494 18.0107 20.75C18.0107 20.6506 17.9909 20.5522 17.9526 20.4605C17.9142 20.3688 17.858 20.2857 17.7872 20.2159C17.7164 20.1461 17.6325 20.0911 17.5403 20.054C17.4481 20.017 17.3494 19.9986 17.25 20H15.5V17.5H19.75C20.9905 17.5 22 16.4905 22 15.25V11.1836C20.832 12.3066 19.248 13 17.5 13C13.91 13 11 10.09 11 6.5C11 4.99 11.5198 3.6035 12.3838 2.5H4.25ZM17 3C17.276 3 17.5 3.224 17.5 3.5V6.5H20C20.276 6.5 20.5 6.724 20.5 7C20.5 7.276 20.276 7.5 20 7.5H17C16.724 7.5 16.5 7.276 16.5 7V3.5C16.5 3.224 16.724 3 17 3ZM10 17.5H14V20H10V17.5Z"
                                fill="white"
                            />
                        </svg>
                    </i>
                    <p>4 hours</p>
                </li>
            </ul>
            <p>
                Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Sed libero enim sed faucibus turpis in eu mi. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien. Arcu cursus euismod quis viverra. Dignissim
                diam quis enim lobortis scelerisque fermentum dui. In pellentesque massa placerat duis ultricies lacus sed.
            </p>
        </div>
        <div class="cource-rightbanner">
            <div class="cource-rightinner">
                <div class="cource_profile">
                    <img src="/wp-content/uploads/2024/03/image-94.png" alt="img" />
                </div>
                <div class="cource_description">
                    <label>Taught by:</label>
                    <h3>Sarah McNamara</h3>

                    <label>Main MAP:</label>
                    <h3>HubSpot</h3>

                    <a href="javascript:void(0)" class="oterauthor">
                        View other courses<br />
                        by Sahar McNamara
                    </a>
                </div>
            </div>
            <div class="cource_rightbottominner">
                <img src="/wp-content/uploads/2024/03/Lbadge-sales-pardot.png" alt="img" />
                <img src="/wp-content/uploads/2024/03/Lbadge-founding-member.png" alt="img" />
            </div>
        </div>
    </div>
</section>

<section class="cource_video pink">
    <div class="cource-inner-container">
        <video id="video" poster="https://marketingops.com/wp-content/uploads/2024/03/image-111.png">
            <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
        </video>
        <div class="play-button-wrapper">
			<div title="Play video" class="play-gif" id="circle-play-b">
				<!-- SVG Play Button -->
                <svg width="124" height="90" viewBox="0 0 124 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M45 0C20.1472 0 0 20.1472 0 45C0 69.8528 20.1472 90 45 90H78.9009C103.754 90 123.901 69.8528 123.901 45C123.901 20.1472 103.754 0 78.9009 0H45ZM45.1504 71.4501V19.3153L89.4633 45.3853L45.1504 71.4501Z" fill="black"/>
                    </g>
                    <path opacity="0.9" d="M45.1505 19.3154V71.4503L89.4633 45.3854L45.1505 19.3154Z" fill="white"/>
                </svg>
			</div>
		</div>
    </div>
    <div class="cource-inner-container titleblock">
        <h4>Lesson materials</h4>
        <ul class="halfprice">
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                        Labore et dolore magna aliqua
                        </a>  
                    </div>
                </li>
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                            Convallis tellus id interdum velit laoreet – consequat semper viverra   
                        </a>  
                    </div>
                </li>
                <li>
                    <div class="pricetextwithicon">
                        <a href="javascript:void(0);">
                        <i>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9854 2.98631C11.7203 2.9902 11.4676 3.09914 11.2829 3.28922C11.0981 3.47929 10.9964 3.73494 11 3.99999V13.5859L9.70703 12.293C9.61373 12.197 9.50212 12.1208 9.37883 12.0688C9.25554 12.0168 9.12307 11.9901 8.98926 11.9902C8.79041 11.9905 8.59615 12.05 8.43129 12.1612C8.26643 12.2724 8.13846 12.4302 8.06372 12.6144C7.98898 12.7987 7.97088 13.0011 8.01171 13.1957C8.05255 13.3903 8.15047 13.5683 8.29297 13.707L11.293 16.707C11.4805 16.8945 11.7348 16.9998 12 16.9998C12.2652 16.9998 12.5195 16.8945 12.707 16.707L15.707 13.707C15.803 13.6149 15.8796 13.5045 15.9324 13.3824C15.9852 13.2602 16.0131 13.1288 16.0144 12.9958C16.0158 12.8627 15.9906 12.7308 15.9403 12.6076C15.89 12.4844 15.8156 12.3725 15.7216 12.2784C15.6275 12.1843 15.5156 12.11 15.3924 12.0597C15.2692 12.0094 15.1373 11.9842 15.0042 11.9855C14.8712 11.9869 14.7397 12.0148 14.6176 12.0676C14.4955 12.1204 14.3851 12.197 14.293 12.293L13 13.5859V3.99999C13.0018 3.86628 12.9768 3.73356 12.9265 3.60969C12.8761 3.48581 12.8014 3.3733 12.7068 3.27879C12.6122 3.18428 12.4996 3.1097 12.3757 3.05947C12.2518 3.00923 12.1191 2.98436 11.9854 2.98631ZM6 8.49999C4.35498 8.49999 3 9.85497 3 11.5V18C3 19.645 4.35498 21 6 21H18C19.645 21 21 19.645 21 18V11.5C21 9.85497 19.645 8.49999 18 8.49999H16.5C16.3675 8.49811 16.2359 8.52259 16.113 8.57201C15.99 8.62142 15.8781 8.69478 15.7837 8.78783C15.6893 8.88087 15.6144 8.99174 15.5632 9.114C15.5121 9.23626 15.4858 9.36746 15.4858 9.49999C15.4858 9.63251 15.5121 9.76371 15.5632 9.88597C15.6144 10.0082 15.6893 10.1191 15.7837 10.2121C15.8781 10.3052 15.99 10.3786 16.113 10.428C16.2359 10.4774 16.3675 10.5019 16.5 10.5H18C18.564 10.5 19 10.936 19 11.5V18C19 18.564 18.564 19 18 19H6C5.43602 19 5 18.564 5 18V11.5C5 10.936 5.43602 10.5 6 10.5H7.5C7.63251 10.5019 7.76407 10.4774 7.88704 10.428C8.01001 10.3786 8.12193 10.3052 8.2163 10.2121C8.31067 10.1191 8.38561 10.0082 8.43676 9.88597C8.4879 9.76371 8.51424 9.63251 8.51424 9.49999C8.51424 9.36746 8.4879 9.23626 8.43676 9.114C8.38561 8.99174 8.31067 8.88087 8.2163 8.78783C8.12193 8.69478 8.01001 8.62142 7.88704 8.57201C7.76407 8.52259 7.63251 8.49811 7.5 8.49999H6Z" fill="#6D7B83"/>
                            </svg>
                        </i>
                            Turpis egestas sed tempus urna   
                        </a>  
                    </div>
                </li>
            </ul>
    </div>
</section>

<section class="othermodulerbox pink">
    <div class="othermodulerbox_container">
        <h4>Other modules of this course</h4>
        <div class="gallery gallery-responsive portfolio_slider">
            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C9.79971 2 8 3.79971 8 6V8H6.25C5.0095 8 4 9.0095 4 10.25V19.75C4 20.9905 5.0095 22 6.25 22H17.75C18.9905 22 20 20.9905 20 19.75V10.25C20 9.0095 18.9905 8 17.75 8H16V6C16 3.79971 14.2003 2 12 2ZM12 3.5C13.3897 3.5 14.5 4.61029 14.5 6V8H9.5V6C9.5 4.61029 10.6103 3.5 12 3.5ZM12 13.5C12.8285 13.5 13.5 14.1715 13.5 15C13.5 15.8285 12.8285 16.5 12 16.5C11.1715 16.5 10.5 15.8285 10.5 15C10.5 14.1715 11.1715 13.5 12 13.5Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 2</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 3</h3>
                    <h5>Viverra vitae congue eu consequat</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 4</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C9.79971 2 8 3.79971 8 6V8H6.25C5.0095 8 4 9.0095 4 10.25V19.75C4 20.9905 5.0095 22 6.25 22H17.75C18.9905 22 20 20.9905 20 19.75V10.25C20 9.0095 18.9905 8 17.75 8H16V6C16 3.79971 14.2003 2 12 2ZM12 3.5C13.3897 3.5 14.5 4.61029 14.5 6V8H9.5V6C9.5 4.61029 10.6103 3.5 12 3.5ZM12 13.5C12.8285 13.5 13.5 14.1715 13.5 15C13.5 15.8285 12.8285 16.5 12 16.5C11.1715 16.5 10.5 15.8285 10.5 15C10.5 14.1715 11.1715 13.5 12 13.5Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 2</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 3</h3>
                    <h5>Viverra vitae congue eu consequat</h5>
                </div>
            </div>

            <div class="inner">
                <div class="othermodulbox">
                    <i class="lock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.25 3.5C2.7335 3.5 1.5 4.7335 1.5 6.25V15.25C1.5 16.7665 2.7335 18 4.25 18H19.75C21.2665 18 22.5 16.7665 22.5 15.25V6.25C22.5 4.7335 21.2665 3.5 19.75 3.5H4.25ZM10.4775 7.99805C10.5619 7.99418 10.6501 8.01191 10.7334 8.05566L15.0127 10.3076C15.3687 10.4946 15.3682 11.0049 15.0117 11.1924L10.7324 13.4453C10.3999 13.6203 10 13.3789 10 13.0029V8.49805C10 8.21567 10.2246 8.00965 10.4775 7.99805ZM7.75 19.5C7.65062 19.4986 7.55194 19.517 7.45972 19.554C7.36749 19.5911 7.28355 19.6461 7.21277 19.7159C7.142 19.7857 7.08579 19.8688 7.04743 19.9605C7.00907 20.0522 6.98932 20.1506 6.98932 20.25C6.98932 20.3494 7.00907 20.4478 7.04743 20.5395C7.08579 20.6312 7.142 20.7143 7.21277 20.7841C7.28355 20.8539 7.36749 20.9089 7.45972 20.946C7.55194 20.983 7.65062 21.0014 7.75 21H16.25C16.3494 21.0014 16.4481 20.983 16.5403 20.946C16.6325 20.9089 16.7164 20.8539 16.7872 20.7841C16.858 20.7143 16.9142 20.6312 16.9526 20.5395C16.9909 20.4478 17.0107 20.3494 17.0107 20.25C17.0107 20.1506 16.9909 20.0522 16.9526 19.9605C16.9142 19.8688 16.858 19.7857 16.7872 19.7159C16.7164 19.6461 16.6325 19.5911 16.5403 19.554C16.4481 19.517 16.3494 19.4986 16.25 19.5H7.75Z" fill="white"/>
                        </svg>
                    </i>
                    <h3>Module 4</h3>
                    <h5>Name of the workshop</h5>
                </div>
            </div>
        </div>
    </div>
    
</section>
<div class="backtocoursemain">
    <a href="javascript:void(0);" class="backtocourse">
        <i class="backbutton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none"><g clip-path="url(#clip0_1_869)"><path d="M4.47382 2.99408C4.71079 2.98497 4.93067 3.12054 5.02751 3.33701C5.12548 3.55347 5.08333 3.80639 4.91928 3.97956L3.12719 5.91633H14.4072C14.6179 5.91291 14.8128 6.02342 14.9187 6.20571C15.0258 6.38685 15.0258 6.61243 14.9187 6.79357C14.8128 6.97586 14.6179 7.08637 14.4072 7.08295H3.12719L4.91928 9.01972C5.0651 9.17238 5.11637 9.39112 5.05485 9.59277C4.99333 9.79443 4.82813 9.94709 4.62306 9.99266C4.41685 10.0382 4.20267 9.96874 4.06254 9.81266L0.999025 6.49964L4.06254 3.18662C4.16735 3.07042 4.3166 2.99978 4.47382 2.99408Z" fill="white"/></g><defs><clipPath id="clip0_1_869"><rect width="15" height="10" fill="white" transform="matrix(-1 0 0 1 15.5 0.5)"/></clipPath></defs></svg></i> Back to whole course
    </a>
</div>    
</main>
<script>

const video = document.getElementById("video");
const circlePlayButton = document.getElementById("circle-play-b");

function togglePlay() {
	if (video.paused || video.ended) {
		video.play();
	} else {
		video.pause();
	}
}

circlePlayButton.addEventListener("click", togglePlay);
video.addEventListener("playing", function () {
	circlePlayButton.style.opacity = 0;
});
video.addEventListener("pause", function () {
	circlePlayButton.style.opacity = 1;
});



jQuery('.gallery-responsive').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        vertical: true,
  verticalSwiping: true,
  slidesToShow: 3,
  slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

</script>    