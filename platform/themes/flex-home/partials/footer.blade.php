<!--FOOTER-->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="101095364896291"
     theme_color="#1d5f6f">
</div>

<footer>

    <div class="section bg_default small_pt small_pb">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="newsletter_text text_white">
                        <h3>Join Our Newsletter Now</h3>
                        <p> Register now to get updates on latest properties. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form2 rounded_input">
                        <form id="ajaxSubmit" >
                            @csrf
                            <input type="email" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required="" id="email" name="email" class="form-control" placeholder="Enter Email Address">
                            <button type="submit" class="btnt btn-fill-out text-uppercase btn-radius"  value="Submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container-fluid w90">
        <div class="row">
            <div class="col-sm-3">
                @if (theme_option('logo'))
                    <p>
                        <a href="{{ route('public.single') }}">
                            <img src="{{ get_image_url(theme_option('logo'))  }}" style="max-height: 70px" alt="{{ theme_option('site_name') }}">
                        </a>
                    </p>
                @endif
                <p><i class="fas fa-map-marker-alt"></i> &nbsp;{{ theme_option('address') }}</p>
                <p><i class="fas fa-phone-square"></i> {{ __('Hotline') }} &nbsp;<a href="tel:{{ theme_option('hotline') }}">{{ theme_option('hotline') }}</a></p>
                <p><i class="fas fa-envelope"></i> {{ __('Email') }} &nbsp;<a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                </p>
            </div>
            <div class="col-sm-9 padtop10">
                <div class="row">
                    {!! dynamic_sidebar('footer_sidebar') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {!! Theme::partial('language-switcher') !!}
            </div>
        </div>
        <div class="copyright">
            <div class="col-sm-12">
                <p class="text-center">
                    {!! clean(theme_option('copyright')) !!}
                </p>
            </div>
        </div>
    </div>

</footer>
<!--FOOTER-->
<div class="modal fade subscribe_popup show" id="myModal" tabindex="-1" role="dialog" style="padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i  class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <div class="background_bg h-100" style="background-image: url('https://images.unsplash.com/photo-1553773077-91673524aafa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=751&q=80');"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3 style="
	font-weight: 700;
	margin: 0;
	text-transform: capitalize;">Sign up To Islandhomes Newsletter!</h3>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new properties.</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form  id="ajaxSubmits">
                                @csrf
                                <div class="form-group">
                                    <input name="email" id="emails" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required="" type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btnt btn-fill-out btn-block text-uppercase" title="Subscribe" >Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="newslettercookie" value="">
                                    <label class="form-check-label" for="newslettercookie"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.trans = {
        "Price": "{{ __('Price') }}",
        "Number of rooms": "{{ __('Number of rooms') }}",
        "Number of rest rooms": "{{ __('Number of rest rooms') }}",
        "Square": "{{ __('Square') }}",
        "No property found": "{{ __('No property found') }}",
        "million": "{{ __('million') }}",
        "billion": "{{ __('billion') }}",
        "m2": "{{ __('m2') }}",
    }

    $('#newslettercookie').change(function () {

        if(this.checked) {
            $.cookie("IslandNewsLetter", "true", { expires: 10 });
        }else{
            $.cookie('IslandNewsLetter', null, {
                path: '/'
            });
        }

    })


    function checkCookie() {
        $(window).on('load',function(){
            setTimeout(function() {
                $("#myModal").modal('show', {}, 500);
            }, 4000);

        });

    }

    jQuery(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(document).on('click', '#ajaxSubmits button[type=submit]', function (e) {

            e.preventDefault();
            e.stopPropagation();
            $.ajax({
                url: "ajax/subscribers",
                method: 'post',
                data: {
                    email: $('#emails').val()
                },
                dataType: "json",
                success: function(result){

                    $('#emails').val('');
                    $('#myModal').modal('hide');

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'You have subscribed successfully!!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    })
                    $.cookie("IslandNewsLetter", "true", { expires: 10000 });
                }});
        });
    });

    jQuery(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(document).on('click', '#ajaxSubmit button[type=submit]', function (e) {

            e.preventDefault();
            e.stopPropagation();
            $.ajax({
                url: "ajax/subscribers",
                method: 'post',
                data: {
                    email: $('#email').val()
                },
                dataType: "json",
                success: function(result){
                    $('#email').val('');
                    $('#myModal').modal('hide');

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'You have subscribed successfully!!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    })

                    $.cookie("IslandNewsLetter", "true", { expires: 10000 });
                }});
        });
    });
</script>

<!--END FOOTER-->

<div class="action_footer">
    <a href="#" class="cd-top"><i class="fas fa-arrow-up"></i></a>
    <a href="tel:{{ theme_option('hotline') }}" style="color: white;font-size: 17px;"><i class="fas fa-phone"></i>
        <span>  &nbsp;{{ theme_option('hotline') }}</span></a>
</div>

<div id="loading">
    <div class="lds-hourglass">
    </div>
</div>

</body>
</html>
