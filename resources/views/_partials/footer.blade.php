<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <img width="150px" height="auto" src="{{ asset('images/logo/white.png') }}"
                        alt="">
                        <h2 class="ftco-heading-2">KATANA WORLD</h2>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{__('Quick Links')}}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('events.index') }}" class="py-2 d-block">{{ __('Events') }}</a></li>
                        <li><a href="{{ route('sermons.index') }}" class="py-2 d-block">{{ __('Sermons') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('Testify') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="py-2 d-block">{{ __('Contact') }}</a></li>
                        <li><a href="{{ route('free_bible') }}" class="py-2 d-block">{{ __('Free Bible') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{__('Social Media')}}</h2>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/profile.php?id=100009285082198" class="py-2 d-block" target="_blanc">Facebook</a></li>
                        {{-- <li><a href="#" class="py-2 d-block" target="_blanc">Twitter</a></li> --}}
                        <li><a href="https://instagram.com/amrambassime?igshid=MWxzMzFqdjNzM3R0NQ==" class="py-2 d-block" target="_blanc">Instagram</a></li>
                        <li><a href="https://www.youtube.com/channel/UCZ2Eqgg64Yv3zvMM0-2BJ0w" class="py-2 d-block" target="_blanc">YouTube</a></li>
                        <li><a href="https://wa.me/32470927870" class="py-2 d-block" target="_blanc">Whatsapp</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{__('Contact Us')}}</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <a href="tel:+237696896758">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">+237 696 89 67 58</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:+32470927870">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">+32 470 92 78 70</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:gouliben@gmail.com">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">
                                            gouliben@gmail.com
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100009285082198"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;
                    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> KATANA WORLD &#x2022; All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>
