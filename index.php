<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nexxo</title>

    <!-- Bootstrap Core -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/jQuery.countdownTimer.css" />
    <link href="css/style.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container globe">
    <div class="row" style="padding-top: 30px;">
        <div class="col-md-2 col-sm-3 col-xs-3">
            <img class="img-fluid logo" src="images/logo.png" alt="Nexxo Logo" />
        </div>
        <div class="offset-md-5 col-md-5 offset-sm-3 col-sm-6 col-xs-9 text-right">
            <ul class="inline-list">
                <li>
                    <a href="https://www.facebook.com/nexxoint/" target="_blank"><img src="images/icon_fb.png" alt="Facebook" /> </a>
                </li>
                <li>
                    <a href="https://twitter.com/NexxoInt" target="_blank"><img src="images/icon_twitter.png" alt="Twitter" /> </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/nexxoint/" target="_blank"><img src="images/icon_linkedin.png" alt="LinkedIn" /></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCd44NmVcZVB2InBVWgkx1hQ?view_as=subscriber" target="_blank"><img src="images/icon_youtube.png" alt="Youtube" /></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="countdown text-center">
        <div id="countdowntimer"><span id="future_date"></span></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 text-center">
            <h1>ICO Coming Soon!</h1>
            <h2>
                The future of small business banking is Distributed,<br />
                Decentralized and Global.
            </h2>
            <p>Sign up now for early token sale privileges!</p>

            <form id="signup-form" method="post" action="https://global.us18.list-manage.com/subscribe/post?u=e1cce14547abb01d594305d38&amp;id=0e2efb6ba4">
                <div class="message error"></div>
                <div class="input-group mb-3">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary submit-btn" type="submit">Sign Up</button>
<!--                        <button class="btn btn-outline-secondary loading-btn" type="submit">Sign Up</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jQuery.countdownTimer.js"></script>
<!-- Good alternative is to include minified file jQuery.countdownTimer.min.js -->
<script type="text/javascript" src="js/jQuery.countdownTimer-en.js"></script>

<script type="text/javascript">
    $(function(){
        $("#future_date").countdowntimer({
            dateAndTime : "2018/10/31 00:00:00",
            labelsFormat : true,
            displayFormat : "DHMS",
        });

        $('.submit-btn')
            .ajaxStart(function() {
                $(this).html('Loading...');
            })
            .ajaxStop(function() {
                $(this).html('Sign Up');
            })
        ;

        $('#signup-form').submit(function(e) {
            e.preventDefault();
            var email = $("input[name=email]").val();

            $.ajax({
                type: "POST",
                url: "https://global.us18.list-manage.com/subscribe/post?u=e1cce14547abb01d594305d38&amp;id=0e2efb6ba4",
                data: "EMAIL=" + email,
                dataType: "json",
                beforeSend: function() {
                    $('.submit-btn').html('Loading...');
                },
                complete : function(){
                    $("#email").val('');
                    $('.submit-btn').html('Sign Up');
                    $('.message').removeClass('success error');
                    $('.message').addClass('success');
                    $('.message').html('Thank you for signing up with us');
                    // if (data.status == 'success'){
                    //     $('.message').removeClass('success error');
                    //     $('.message').addClass('success');
                    //     $('.message').html('Thank you for signing up with us');
                    // } else {
                    //     $('.message').removeClass('success error');
                    //     $('.message').addClass('error');
                    //     $('.message').html('Error signing up. Please contact our Customer Service');
                    // }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>