@extends('layouts.app')

@section('title', 'Contact Us - Mamas Craft - Everyday Fashion Wear')

@section('content')
<div class="site-section contact-header-section">
        <div class="site-container">
            <div class="section-header site-common-content">
                <h1 class="site-title-h1 text-black">Contact Us</h1>
                <p class="body-text text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p>
            </div>
        </div>
   </div>

   <div class="site-section contact-section">
        <div class="site-container">
            <div class="site-row row-gap-medium">
                <div class="site-col flex-1 for-desktop">
                    <img src="assets/images/contact-form-img.png" class="contact-form-img" alt="">
                </div>

                <div class="site-col flex-1">
                    <div class="site-common-content">
                        <img src="assets/images/contact-form-img-mob.png" class="contact-form-img for-mobile" alt="">

                        <div class="section-header">
                                <h3 class="site-title-h3 text-black">We’re Here to Help</h3>
                                <p class="body-text text-grey">You can reach our customer support team by emailing us at [business email]. We’re here to help with any questions or concerns you may have</p>
                        </div>

                        <form action="" class="contact-form form-flex">
                            <div class="form-col"><input type="text" class="custom-input-style" placeholder="Enter Your Name"></div>
                            <div class="form-col"><input type="email" class="custom-input-style" placeholder="Enter Your Email"></div>
                            <div class="form-col"><textarea class="custom-input-style" name="" id="">Type your Message</textarea></div>
                            <div class="form-col">
                                <div class="form-row checkbox-row">
                                    <input type="checkbox" id="subscribe" name="subscribe" value="newsletter">
                                    <label for="subscribe" class="text-black body-text">I accept the terms</label>
                                </div>
                            </div>
                            <div class="submit-wrapper text-white">
                                 <input type="button" value="Save and Continue" class="submit-all-input">
                            </div>
                        </form>

                        <div class="contact-links dflex bg-grey">
                            <img src="assets/images/email-icn.svg" class="cont-icn">

                            <div class="">
                                <p class="body-text text-black text-bold-700 upper-case">email</p>
                                <a href="#" class="contact-quick-link text-black">email@example <img src="assets/images/arrow-up-icn-black.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
   </div>
@endsection   