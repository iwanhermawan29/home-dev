<div class="inner-pages hd-white about">
    <section>
        <div class="text-heading text-center">
            <div class="container">
                <h1>About Us</h1>
               
            </div>
        </div>
    </section>

    <!-- START SECTION ABOUT -->
    <section class="about-us fh">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">About <span>{{ $aboutus->title }}</span></h2>
                    </div>
                    <div class="pftext">
                        <p>
                            {{ $aboutus->description }}
                        </p>
                        {{-- <div class="box bg-2">
                            <div class="contact-info">
                                <div class="contact-info-content">
                                    <h4 class="contact-info-title">Contact Us</h4>
                                    <p class="contact-info-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit.
                                        Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab.
                                        Esse
                                        itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum
                                        dolor
                                        sit amet, consectetur adipisicing elit sunt.</p>
                                    <ul class="contact-info-list" style="list-style: none">
                                        <li><i class="fa fa-map-marker"></i> 1234 North Avenue Luke Lane, South Bend, IN
                                            360001</li>
                                        <li><i class="fa fa-phone"></i> +1 246-345-0695</li>
                                        <li><i class="fa fa-envelope"></i>
                                            <a href="mailto:"> Mantab@gmail.com</a>
                                        </li>
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>
                                            8:00 a.m - 9:00 p.m
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="{{ asset('storage/' .$aboutus->image) }}"  style="width:1000px;Height:750px;">
                        <a class="icon-wrap popup-video popup-youtube" href="{{ $aboutus->video }}">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION ABOUT -->

    <!-- START SECTION CONTACT US -->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-12">
                    <h3 class="mb-4">Contact Us</h3>
                    <form id="contactform" class="contact-form" name="contactform" method="post" novalidate>
                        <div id="success" class="successform">
                            <p class="alert alert-success font-weight-bold" role="alert">Your message was sent
                                successfully!</p>
                        </div>
                        <div id="error" class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="name"
                                placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="lastname"
                                placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom input-full" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8"
                                placeholder="Message"></textarea>
                        </div>
                        <button type="submit" id="submit-contact" class="btn btn-primary btn-lg">Submit</button>
                    </form>
                </div> --}}
                <div class="col-lg-4 col-md-12 bgc">
                    <div class="call-info">
                        <h3>Contact Details</h3>
                        <p class="mb-5">{{ $contactus->description }}</p>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">{{ $contactus->address }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">{{ $contactus->phone }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">{{ $contactus->email }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info cll">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <p class="in-p ti">{{ $contactus->hours }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT US -->
</div>
