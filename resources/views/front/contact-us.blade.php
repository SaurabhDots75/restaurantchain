@extends('front.layouts.app')

@section('contents')
<div class="contact-panel">
    <div class="container">
        <div class="content-top">
            <h1>Contact Us</h1>
            <p>Got a question? You might find the answer in our help centre. Otherwise, see all the ways you can speak to our team below.</p>
        </div>

        <div class="contact-info">
            <div class="contact-box">
                <div class="contact-box-inner">
                    <img src="http://127.0.0.1:8000/front/images/live-chat.png" alt="">
                    <h3>Live Chat</h3>
                    <span>Online</span>
                    <p>Send us a chat during business hours for fast assistance.</p>
                </div>
                <a href="#" class="btns">Shop All</a>
            </div>

            <div class="contact-box">
                <div class="contact-box-inner">
                    <img src="http://127.0.0.1:8000/front/images/email.png" alt="">
                    <h3>Email</h3>
                    <span><a href="#">contact@printit4less.com</a></span>
                    <p>Our customer care team is here to help.</p>
                </div>
                <a href="#" class="btns">Shop All</a>
            </div>
            

            <div class="contact-box">
                <div class="contact-box-inner">
                    <img src="http://127.0.0.1:8000/front/images/phone.png" alt="">
                    <h3>Phone</h3>
                    <span><a href="#">1-800-370-5591</a></span>
                    <p>9:00 am – 5:00 pm EST
                    Monday-Friday</p>
                </div>
                <a href="#" class="btns">Shop All</a>
            </div>
        </div>

        <div class="from-block">
            <h4>Please fill out your information below, and a customer service representative will contact you:</h4>
        <div class="form-contact">
                <div class="form-field">
                    <label for="name">First Name</label>
                    <input class="inhut-box" id="name" placeholder="Name">
                </div>

                <div class="form-field">
                    <label for="lastname">Last Name</label>
                    <input class="inhut-box" placeholder="Name">
                </div>

                <div class="form-field">
                    <label for="email">Email <span>*</span></label>
                    <input class="inhut-box" placeholder="Email">
                </div>

                <div class="form-field field-full">
                    <label for="message">Message</label>
                    <textarea class="inhut-box" placeholder="Message"></textarea>
                </div>

                <div class="roboat-form"><img src="http://127.0.0.1:8000/front/images/robot.png" alt=""></div>
         </div>
                <a href="#" class="btns">Submit</a>
        </div>
    </div>
</div>
@endsection