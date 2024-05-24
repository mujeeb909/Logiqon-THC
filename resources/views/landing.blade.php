@extends('layouts.landing_layout')

@section('landing-page')
    <div class="landing-page">
        <header class="rectangle-parent">
            {{-- <div class="frame-child"></div> --}}
            <div class="talent-hub-wrapper">
                <div class="talent-hub">Talent Hub</div>
            </div>
            <nav class="frame-wrapper">
                <nav class="home-parent">
                    <div class="home"><a class="pricing-a" href="/">Home</a></div>
                    <div class="pricing"><a class="pricing-a" href="#pricing">Pricing</a></div>

                </nav>
            </nav>
            <div class="frame-container ">
                <button class="join-parent join-btn">
                    <div class="join"><a class="pricing-a" href="signup">Join</a></div>
                    <div class="frame-item"></div>
                </button>

            </div>



            <div id="mobile-hamburger" class="hamburger-menu">
                <i class='bx bx-menu-alt-right' style="font-size: 61px;" onclick="toggleMenu()"></i>
            </div>

            <nav id="mobile-menu" style="display: none;">
                <div id="mobile-hamburger-close" class="hamburger-menu">
                    <i class='bx bx-x' style="font-size: 61px;" onclick="toggleMenu()"></i>
                </div>
                <div class="home"><a class="pricing-a" href="/">Home</a></div>
                <div class="pricing"><a class="pricing-a" href="#pricing">Pricing</a></div>
                <button class="join-parent join-btn" style="margin-top: 4px;">
                    <div class="join">Join</div>
                    <div class="frame-item"></div>
                </button>
            </nav>



        </header>



        <div class="landing-page-child"></div>
        <section class="frame-parent">
            <div class="rectangle-group">


            </div>
            <div class="bxsup-arrow-parent">
                <img class="bxsup-arrow-icon" loading="lazy" alt="" src="assets/arrows/bxs_up-arrow.png" />
                <div class="frame-div">
                    <div class="frame-child1"></div>
                    <div class="frame-wrapper1">
                        <button class="frame-button">
                            <div class="frame-child2"></div>

                            <div class="music">Music</div>
                            <img class="bxsup-arrow-icon1" alt="" src="assets/arrows/bxs_up-arrow-2.png" />
                        </button>
                    </div>

                    <div class="art">Art</div>

                    <div class="frame-group">
                        <div class="frame-parent1">
                            <div class="unleash-your-potential-join-t-parent">
                                <h1 class="unleash-your-potential">
                                    Unleash your potential,<br> Join Talent Hub Connect
                                </h1>
                                <div class="videos-btn">
                                    <div class="ellipse-parent">
                                        <div class="ellipse-div"></div>
                                        <div class="frame-child3"></div>
                                    </div>
                                    <div class="videos">Videos</div>
                                    <div class="ellipse-group">
                                        <div class="frame-child4"></div>
                                        <div class="frame-child5"></div>
                                        <img class="bxsup-arrow-icon2" alt=""
                                            src="assets/arrows/bxs_up-arrow-3.png" />
                                    </div>
                                </div>

                            </div>
                            <div class="showcase-your-skills-and-land-wrapper">
                                <h2 class="showcase-your-skills">
                                    Showcase your skills and land your dream job. Join our
                                    Talent Hub today
                                </h2>
                            </div>
                        </div>
                        <div class="frame-wrapper2">
                            <button class="rectangle-parent1">
                                <div class="frame-child6"></div>
                                <div class="get-started"><a class="pricing-a" href="signup">Get Started</a></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame-child7"></div>
        </section>
        <section class="landing-page-inner">
            <div class="why-talent-parent">
                <h1 class="why-talent">
                    <span class="why">Why </span>
                    <b>Talent</b>
                    <span class="span"> </span>
                </h1>
                <h1 class="hub-connect">Hub Connect</h1>
            </div>
        </section>
        <section class="frame-section">
            <div class="frame-parent2">
                <div class="talent-hubs-connect-you-with-a-wrapper">
                    <h2 class="talent-hubs-connect">
                        Talent hubs connect you with a wider audience seeking specific
                        skills and talents. Showcasing your abilities on a talent hub puts
                        you in front of the right people, opening doors to exciting
                        opportunities that might not exist elsewhere. This comprehensive
                        platform provides a launchpad to showcase your skills and
                        expertise to potential collaborators, employers, or even a
                        dedicated following. It's the professional springboard to propel
                        your talent forward.
                    </h2>
                </div>


                <div class="frame-parent3">

                    <img class="rectangle-icon" alt="" src="assets/images/all-groups.png" height="650px" />


                </div>




            </div>
        </section>
        <section class="landing-page-inner1">
            <div class="share-parent">
                <h1 class="share">Share</h1>
                <div class="profile-wrapper">
                    <h1 class="profile">Profile</h1>
                </div>
            </div>
        </section>
        <section class="landing-page-inner2">
            <div class="frame-parent4">
                <div class="frame-parent5">
                    <div class="frame-wrapper4">
                        <div class="rectangle-parent5">
                            <div class="frame-child10"></div>
                            <div class="frame-parent6">
                                <div class="image-5-wrapper">
                                    <img class="image-5-icon" loading="lazy" alt=""
                                        src="assets/images/image_5.png" />
                                </div>
                                <h3 class="talenthubdcusername">Talenthubdc/username/</h3>
                            </div>
                            <div class="frame-wrapper5">
                                <button class="rectangle-parent6">
                                    <div class="frame-child11"></div>
                                    <img class="vector-icon" alt="" src="assets/images/copy-vector.png" />
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="line-wrapper">
                        <div class="line-div"></div>
                    </div>
                    <div class="talenthubdcalexjonas-parent">
                        <h1 class="talenthubdcalexjonas">Talenthubdc/alexjonas/</h1>
                        <div class="share-link-to-your-profile-wit-wrapper">
                            <h1 class="share-link-to">
                                Share link to your profile with anyone.
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="frame-parent7">
                    <div class="frame-wrapper6">
                        <div class="frame-parent8">
                            <div class="line-container">
                                <div class="frame-child12"></div>
                            </div>
                            <div class="qr-code-parent">
                                <h1 class="qr-code">QR Code</h1>
                                <div class="download-the-qr-code-and-share-wrapper">
                                    <h1 class="download-the-qr">
                                        Download the QR Code and share it with anyone.
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rectangle-parent7">
                        <div class="frame-child13"></div>
                        <img class="image-1-icon" loading="lazy" alt="" src="assets/images/qr-code.png" />
                    </div>
                </div>
            </div>
        </section>
        <div class="landing-page-inner3">
            <div class="how-it-parent">
                <h1 class="how-it">How it</h1>
                <div class="works-wrapper">
                    <h1 class="works">Works</h1>
                </div>
            </div>
        </div>
        <section class="frame-parent9">
            <div class="frame-parent10">
                <div class="frame-parent11">
                    <div class="frame-wrapper7">
                        <div class="rectangle-parent8">
                            <div class="frame-child14"></div>
                            <div class="profile-3-parent">
                                <img class="profile-3-icon" loading="lazy" alt=""
                                    src="assets/images/Profile-3.png" />

                                <img class="upload-video-icon" alt="" src="assets/images/Upload-Video.png" />

                                <img class="upload-audio-icon" alt="" src="assets/images/Upload-Audio.png" />
                            </div>
                        </div>
                    </div>
                    <div class="frame-wrapper8">
                        <div class="rectangle-parent9">
                            <div class="frame-child15"></div>
                            <div class="profile-parent">
                                <img class="profile-icon" loading="lazy" alt=""
                                    src="assets/images/Profile.png" />

                                <div class="rectangle-parent10">
                                    <div class="frame-child16"></div>
                                    <button class="rectangle-parent11">
                                        <div class="frame-child17"></div>
                                        <img class="material-symbolsshare-outline-icon" alt=""
                                            src="assets/images/material-symbols_share-outline.png" />

                                        <div class="share-profile">Share Profile</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ellipse-container">
                        <div class="frame-child18"></div>
                        <div class="rectangle-parent12">
                            <div class="frame-child19"></div>
                            <div class="profile-3-group">
                                <img class="profile-3-icon1" alt="" src="assets/images/Profile-4.png" />

                                <div class="rectangle-parent13">
                                    <div class="frame-child20"></div>
                                    <button class="rectangle-parent14">
                                        <div class="frame-child21"></div>
                                        <div class="connect">Connect</div>
                                        <img class="icround-plus-icon" alt=""
                                            src="assets/images/ic_round-plus.png" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame-wrapper9">
                    <div class="frame-parent12">
                        <div class="frame-wrapper10">
                            <div class="frame-parent13">
                                <div class="wrapper">
                                    <div class="div">1</div>
                                </div>
                                <div class="div1">2</div>
                                <div class="div2">3</div>
                            </div>
                        </div>
                        <div class="frame-parent14">
                            <div class="setup-your-profile-on-talent-h-parent">
                                <h2 class="setup-your-profile">
                                    Setup your profile on Talent Hub Connect
                                </h2>
                                <div class="ellipse-wrapper">
                                    <div class="frame-child22"></div>
                                </div>
                            </div>
                            <div class="frame-parent15">
                                <div class="frame-wrapper11">
                                    <div class="share-your-profile-in-your-cir-parent">
                                        <h2 class="share-your-profile">
                                            Share your Profile in your circle, show them your Talent
                                        </h2>
                                        <h2 class="get-connected-by">
                                            Get Connected by people looking for finest talent
                                        </h2>
                                    </div>
                                </div>
                                <div class="manage-parent">
                                    <h1 class="manage">Manage</h1>
                                    <h1 class="contacts">Contacts</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame-wrapper12">
                <div class="frame-parent16">
                    <div class="contact-manager-unread-parent">
                        <img class="contact-manager-unread-icon" alt=""
                            src="assets/images/Contact-Manager-unread.png" />

                        <div class="ellipse-parent1">
                            <div class="frame-child23"></div>
                            <img class="contact-manager-icon" loading="lazy" alt=""
                                src="assets/images/Contact-Manager-unread.png" />
                        </div>
                    </div>
                    <div class="frame-wrapper13">
                        <div class="talent-hub-connect-is-a-platfo-parent">
                            <h2 class="talent-hub-connect">
                                Talent Hub Connect is a platform that also provides smart
                                contact management where people hiring can reach you out and
                                hire you for your finest talent. It instantly saves and
                                organize your contacts.
                            </h2>
                            <button class="rectangle-parent15">
                                <div class="frame-child24"></div>
                                <div class="create-profile"><a class="pricing-a" href="login">Create Profile</a></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="landing-page-inner4">
            <div class="show-your-parent">
                <h1 class="show-your">Show Your</h1>
                <div class="talent-wrapper">
                    <h1 class="talent">Talent</h1>
                </div>
            </div>
        </section>
        <section class="frame-parent17">
            <div class="frame-parent18">
                <div class="frame-wrapper14">
                    <div class="vector-parent">
                        <img class="line-icon" loading="lazy" alt="" src="assets/images/line-293.png" />

                        <div class="frame-wrapper15">
                            <div class="rectangle-parent16">
                                <img class="frame-child25" alt="" src="assets/images/Rectangle-294.png" />

                                <img class="frame-child26" loading="lazy" alt=""
                                    src="assets/images/line-293.png" />
                            </div>
                        </div>
                    </div>
                </div>
                <img class="frame-child27" loading="lazy" alt="" src="assets/images/Rectangle-288.png" />
            </div>
            <div class="ellipse-parent2">
                <div class="frame-child28"></div>
                <div class="frame-child29"></div>
                <img class="frame-child30" alt="" src="assets/images/Rectangle-290.png" />

                <div class="frame-child31"></div>
                <img class="frame-child32" loading="lazy" alt="" src="assets/images/Rectangle-291.png" />

                <img class="frame-child33" loading="lazy" alt="" src="assets/images/Rectangle-292.png" />

                <img class="frame-child34" loading="lazy" alt="" src="assets/images/line-293.png" />

                <img class="frame-child35" loading="lazy" alt="" src="assets/images/line-293.png" />

                <img class="frame-child36" loading="lazy" alt="" src="assets/images/line-293.png" />
            </div>
            <div class="frame-parent19">
                <div class="vector-wrapper">
                    <img class="frame-child37" alt="" src="assets/images/line-293.png" />
                </div>
                <img class="frame-child38" loading="lazy" alt="" src="assets/images/Rectangle-293.png" />
            </div>
        </section>
        <div class="landing-page-item"></div>
        <div class="ellipse-parent3">
            <div class="frame-child39"></div>
            <img class="profile-3-icon2" alt="" src="./public/profile-3-2@2x.png" />
        </div>
        <div class="landing-page-inner5" id="pricing">
            <div class="subscriptions-parent">
                <h1 class="subscriptions">Subscriptions</h1>
                <h1 class="pricings">Pricings</h1>
            </div>
        </div>


        <section class="landing-page-inner6">
            <div class="frame-parent20">
                <div class="frame-wrapper16">
                    <div class="frame-parent21">
                        <button class="monthly-wrapper" data-plan="monthly">
                            <div class="monthly">Monthly</div>
                        </button>
                        <button class="annually-wrapper" data-plan="annually">
                            <div class="annually">Annually</div>
                        </button>
                    </div>
                </div>
                <div class="frame-parent22">
                    <div class="frame-wrapper17">
                        <div class="rectangle-parent17" data-plan-type="basic">
                            <div class="frame-child40"></div>
                            <div class="frame-parent23">
                                <div class="frame-wrapper18">
                                    <div class="frame-parent24">
                                        <div class="basic-plan-wrapper">
                                            <div class="basic-plan">Basic Plan</div>
                                        </div>
                                        <div class="month">$45/Month</div>
                                    </div>
                                </div>
                                <div class="frame-child41"></div>
                            </div>
                            <div class="frame-wrapper19">
                                <div class="features-parent">
                                    <div class="features">Features</div>
                                    <div class="features-1-features-container">
                                        <ul class="features-1-features-1-features">
                                            <li class="features-1">Features 1</li>
                                            <li class="features-11">Features 1</li>
                                            <li class="features-12">Features 1</li>
                                            <li>Features 1</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="frame-wrapper20">
                                <button class="rectangle-parent18">
                                    <div class="frame-child42"></div>
                                    <div class="purchase">Purchase</div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="rectangle-parent19" data-plan-type="business">
                        <div class="frame-child43"></div>
                        <div class="frame-parent25">
                            <div class="business-plan-wrapper">
                                <h3 class="business-plan">Business Plan</h3>
                            </div>
                            <div class="month-wrapper">
                                <div class="month1">$45/Month</div>
                            </div>
                            <div class="frame-child44"></div>
                        </div>
                        <div class="frame-wrapper21">
                            <div class="features-group">
                                <div class="features1">Features</div>
                                <div class="features-1-features-1-features-parent">
                                    <div class="features-1-features-container1">
                                        <ul class="features-1-features-1-features1">
                                            <li class="features-13">Features 1</li>
                                            <li class="features-14">Features 1</li>
                                            <li class="features-15">Features 1</li>
                                            <li class="features-16">Features 1</li>
                                            <li>Features 1</li>
                                        </ul>
                                    </div>
                                    <div class="frame-wrapper22">
                                        <button class="rectangle-parent20">
                                            <div class="frame-child45"></div>
                                            <div class="purchase1">Purchase</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="frame-wrapper23">
                        <div class="frame-parent26">
                            <div class="rectangle-parent21" data-plan-type="enterprise">
                                <div class="frame-child46"></div>
                                <div class="frame-wrapper24">
                                    <div class="frame-parent27">
                                        <div class="enterprise-plan-wrapper">
                                            <div class="enterprise-plan">Enterprise Plan</div>
                                        </div>
                                        <div class="month2">$45/Month</div>
                                    </div>
                                </div>
                                <div class="features-container">
                                    <div class="features2">Features</div>
                                    <div class="features-1-features-container2">
                                        <ul class="features-1-features-1-features2">
                                            <li class="features-17">Features 1</li>
                                            <li class="features-18">Features 1</li>
                                            <li class="features-19">Features 1</li>
                                            <li>Features 1</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="frame-wrapper25">
                                    <button class="rectangle-parent22">
                                        <div class="frame-child47"></div>
                                        <div class="purchase2">Purchase</div>
                                    </button>
                                </div>
                            </div>
                            <div class="line-frame">
                                <div class="frame-child48"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="line-parent">
            <div class="frame-child49"></div>
            <div class="frame-parent28">
                <div class="frame-parent29">
                    <div class="frame-wrapper26">
                        <div class="frame-parent30">
                            <div class="frame-parent31">
                                <div class="frame-parent32">
                                    <div class="logo-wrapper">
                                        <div class="logo">Logo</div>
                                    </div>
                                    <div class="ready-to-take">
                                        Ready to take your career to the next level? Join the
                                        Talent Hub now!
                                    </div>
                                </div>
                                <div class="explore-parent">
                                    <div class="explore">Explore</div>
                                    <div class="home-group">
                                        <div class="home1">Home</div>
                                        <div class="pricing1">Pricing</div>
                                    </div>
                                </div>
                                <div class="social-media-parent">
                                    <div class="social-media">Social Media</div>
                                    <div class="frame-parent33">
                                        <div class="frame-parent34">
                                            <div class="mdiinstagram-wrapper">
                                                <img class="mdiinstagram-icon" loading="lazy" alt=""
                                                    src="assets/images/mdi_instagram.png" />
                                            </div>
                                            <div class="instagram">Instagram</div>
                                        </div>
                                        <div class="frame-parent35">
                                            <div class="icbaseline-facebook-wrapper">
                                                <img class="icbaseline-facebook-icon" loading="lazy" alt=""
                                                    src="assets/images/ic_baseline-facebook.png" />
                                            </div>
                                            <div class="facebook">Facebook</div>
                                        </div>
                                        <div class="bilinkedin-parent">
                                            <img class="bilinkedin-icon" loading="lazy" alt=""
                                                src="assets/images/bi_linkedin.png" />

                                            <div class="linkedin-wrapper">
                                                <div class="linkedin">LinkedIn</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="links-parent">
                                    <div class="links">Links</div>
                                    <div class="privacy-policy-parent">
                                        <div class="privacy-policy">Privacy Policy</div>
                                        <div class="terms-and-conditions">
                                            Terms and Conditions
                                        </div>
                                        <div class="faqs">FAQs</div>
                                    </div>
                                </div>
                            </div>
                            <div class="frame-wrapper27">
                                <div class="payments-parent">
                                    <div class="payments">Payments</div>



                                    <img class="image-4-icon" loading="lazy" alt=""
                                        src="assets/images/stripe-image.png" />

                                    <div class="frame-child50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="frame-child51"></div>
                </div>
                <div class="copyright-2024-talent-hub-conn-wrapper">
                    <div class="copyright-2024-talent">
                        Copyright 2024 Talent Hub Connect, Rights Reserved
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
