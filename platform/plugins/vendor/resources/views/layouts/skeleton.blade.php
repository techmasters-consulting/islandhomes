<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (theme_option('favicon'))
        <link rel="shortcut icon" href="{{ get_image_url(theme_option('favicon')) }}">
    @endif

  {!! SeoHelper::render() !!}

  <!-- Datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

  {!! Assets::renderHeader(['core']) !!}

  {!! Html::style('vendor/core/css/themes/default.css') !!}

  <!-- Styles -->
  <link href="{{ asset('vendor/core/plugins/vendor/css/app.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.17.0/css/mdb.min.css" rel="stylesheet">
    <style>
        .btn-secondary {
        color: #333;
        background-color: #fff !important;;
        border-color: #ccc;
        }
        .blue{
            background: rgb(29, 95, 111) !important;
        }
        .btn-group-sm > .btn, .btn-sm {
            padding: .25rem .5rem;
            font-size: .765625rem;
            line-height: 1.5;
            border-radius: .2rem;
        }
        .widget-body {
        /*padding: 0px;*/
        border-radius: 0 0 3px 3px;
        min-height: 200px;
        }
        .btn-group-sm > .btn, .btn-sm {

        padding: .25rem .5rem !important;
            font-size: 15px !important;
        line-height: 1.5;
        border-radius: .2rem;
        }
        .modal-header {

            background: #fff !important;

        }
        .custom-file-input:focus ~ .custom-file-label {
            color: #000;
            box-shadow: none;
            height: 50px;
        }
        .custome-checkbox .form-check-label {
            position: relative;
            cursor: pointer;
            color: #687188;
            padding: 0;
            vertical-align: middle;
        }
        .custome-checkbox .form-check-input {
            display: none;
        }
        .custome-checkbox .form-check-label span {
            vertical-align: middle;
        }
        .custome-checkbox .form-check-label::before {
            content: "";
            border: 2px solid #ced4da;
            height: 17px;
            width: 17px;
            margin: 0px 8px 0 0;
            display: inline-block;
            vertical-align: middle;
        }
        .custome-checkbox input[type="checkbox"]:checked + .form-check-label::after {
            opacity: 1;
        }
        .custome-checkbox input[type="checkbox"] + .form-check-label::after {
            content: "";
            width: 11px;
            position: absolute;
            top: 50%;
            left: 3px;
            opacity: 0;
            height: 6px;
            border-left: 2px solid #fff;
            border-bottom: 2px solid #fff;
            -moz-transform: translateY(-65%) rotate(-45deg);
            -webkit-transform: translateY(-65%) rotate(-45deg);
            transform: translateY(-65%) rotate(-45deg);
        }
        .custome-checkbox input[type="checkbox"]:checked + .form-check-label::before {
            background-color: rgb(29, 95, 111);
            border-color: rgb(29, 95, 111);
        }

    </style>

  <!-- Put translation key to translate in VueJS -->
  <script type="text/javascript">
      window.trans = JSON.parse('{!! addslashes(json_encode(trans('plugins/vendor::dashboard'))) !!}');
      var BotbleVariables = BotbleVariables || {};
      BotbleVariables.languages = {
        tables: {!! json_encode(trans('core/base::tables'), JSON_HEX_APOS) !!},
        notices_msg: {!! json_encode(trans('core/base::notices'), JSON_HEX_APOS) !!},
        pagination: {!! json_encode(trans('pagination'), JSON_HEX_APOS) !!},
        system: {
          'character_remain': '{{ trans('core/base::forms.character_remain') }}'
        }
      };
  </script>
</head>
<body>
  @include('core/base::layouts.partials.svg-icon')
  <div id="app">
    @include('plugins/vendor::components.header')
    <main class="pv3 pv4-ns">
        @if (auth('vendor')->check() && !auth('vendor')->user()->canPost())
            <div class="container">
                <div class="alert alert-warning">{{ trans('plugins/vendor::package.add_credit_warning') }}
                    <a href="{{ route('public.vendor.packages') }}">{{ trans('plugins/vendor::package.add_credit') }}</a></div>
            </div>
            <br>
        @endif

        @if(auth('vendor')->check() && auth('vendor')->user()->canPost())


            <!-- Central Modal Medium Info -->
                <div class="modal fade right modal-scrolling" id="sideModalTLInfo" aria-labelledby="exampleModalLabel" data-backdrop="false" role="dialog" style="padding-right: 12px; display: block;" aria-modal="true" >
                    <div class="modal-dialog modal-side modal-notify modal-bottom-right" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: white !important;">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <h2><span style=" font-weight: bold; color: #FFFFFF; background-color: #3EC084; padding: 3px 10px; margin-left: 5px; border-radius: 10px; vertical-align: bottom; text-transform: uppercase;">easily</span>&nbsp;&nbsp;Add a property</h2>

                                <div class="text-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt vero illo error eveniet cum.</p>
                                </div>
                                <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg" alt=""
                                     class="img-fluid">


                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="newslettercookie" value="">
                                        <label class="form-check-label" for="newslettercookie"><span>Don't show this popup again!</span></label>
                                    </div>
                                </div>
                                <br>
                                <a href="#" class="btn btn-danger">Previous
                                    <i class="far fa-gem ml-1 white-text"></i>
                                </a>
                                <a type="button" class="btn blue waves-effect" data-toggle="modal" data-target="#sideModalTLInfo2" data-dismiss="modal">NEXT</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Central Modal Medium Info-->

            @endif
      @yield('content')


    </main>
      @if (count(Assets::getAdminLocales()) > 1)
          <footer>
              <p> {{ trans('core/acl::auth.languages') }}:
                  @foreach (Assets::getAdminLocales() as $key => $value)
                      <span @if (app()->getLocale() == $key) class="active" @endif>
                <a href="{{ route('settings.language', $key) }}">
                    {!! language_flag($value['flag'], $value['name']) !!} <span>{{ $value['name'] }}</span>
                </a>
            </span>
                  @endforeach
              </p>
          </footer>
      @endif
  </div>

  @if (session()->has('status') || session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
    <script type="text/javascript">
      window.noticeMessages = [];
      @if (session()->has('success_msg'))
        noticeMessages.push({'type': 'success', 'message': "{!! addslashes(session('success_msg')) !!}"});
      @endif
      @if (session()->has('status'))
      noticeMessages.push({'type': 'success', 'message': "{!! addslashes(session('status')) !!}"});
      @endif
      @if (session()->has('error_msg'))
        noticeMessages.push({'type': 'error', 'message': "{!! addslashes(session('error_msg')) !!}"});
      @endif
      @if (isset($error_msg))
        noticeMessages.push({'type': 'error', 'message': "{!! addslashes($error_msg) !!}"});
      @endif
      @if (isset($errors))
        @foreach ($errors->all() as $error)
          noticeMessages.push({'type': 'error', 'message': "{!! addslashes($error) !!}"});
        @endforeach
      @endif
    </script>
  @endif

  <!-- Scripts -->
  <script src="{{ asset('vendor/core/plugins/vendor/js/app.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>


  {!! Assets::renderFooter() !!}
  @stack('scripts')
  @stack('footer')
  @include('core/media::partials.media')

  <script>
      $('#sideModalTLInfo').modal('show');
  </script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
</body>
</html>
