<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title> {{ empty($add_user) ? 'Forgot' : 'Create'  }} Password | GWT2Energy</title>
    <style type="text/css" rel="stylesheet" media="all">
        :root {
            color-scheme: light dark;
            supported-color-schemes: light dark;
        }

        @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&amp;display=swap");

        body {
            width: 100% !important;
            height: 100%;
            margin: 0;
            background-color: #F2F4F6;
            color: #51545E;
            -webkit-text-size-adjust: none;
            font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
        }
        .x_bg-color{
             background-color: yellow !important;
        }


        a {
            color: #3869D4;
        }

        a img {
            border: none;
        }

        td {
            word-break: break-word;
        }

        .preheader {
            visibility: hidden;
            mso-hide: all;
            font-size: 1px;
            line-height: 1px;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
        }

        body,
        td,
        th {
            font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
        }

        h1 {
            margin-top: 0;
            color: #333333;
            font-size: 28px;
            font-weight: bold;
            text-align: left;
        }

        h2 {
            margin-top: 0;
            color: #333333;
            font-size: 25px;
            font-weight: bold;
            text-align: left;
        }

        h3 {
            margin-top: 0;
            color: #333333;
            font-size: 22px;
            font-weight: bold;
            text-align: left;
        }

        td,
        th {
            font-size: 16px;
        }

        p,
        ul,
        ol,
        blockquote {
            margin: .4em 0 1.1875em;
            font-size: 16px;
            line-height: 1.625;
            color: #51545E;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .align-center {
            text-align: center;
        }

        .p-top-30 {
            padding-top: 30px;
        }

        .p-top-20 {
            padding-top: 20px;
        }

        .p-top-15 {
            padding-top: 15px;
        }

        .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: #F2F4F6;
        }

        .email-content {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .email-header {
            padding: 15px 0;
            text-align: center;
        }

        .email-header_logo {
            width: 100px;
        }

        .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .email-body_inner {
            width: 600px;
            margin: 0 auto;
            padding: 0;
            background-color: #FFFFFF;
        }

        .email-footer {
            width: 600px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
        }

        .email-footer p {
            color: #A8AAAF;
        }
        .bg-color{
             background-color: linear-gradient(90deg, rgb(109, 169, 147) 23%, rgb(76, 120, 120) 61%) !important;
        }

        .body-action {
            width: 100%;
            padding-top: 30px;
            text-align: center;
        }

        .body-artwork {
            width: 100%;
            padding-top: 20px;
            text-align: center;
        }

        .body-content {
            width: 100%;
            padding-top: 10px;
            text-align: left;
        }

        .body-closing {
            width: 100%;
            padding-top: 30px;
            text-align: left;
        }

        .content-cell {
            padding: 35px 45px;
        }

        .x_image--dark {
            display: block !important;
            width: auto !important;
            overflow: visible !important;
            float: none !important;
            max-height: inherit !important;
            max-width: inherit !important;
            line-height: auto !important;
            margin-top: 0px !important;
            visibility: visible !important;
        }

        .x_image--light {
            display: none !important;
        }

        @media only screen and (max-width: 600px) {

            .email-body_inner,
            .email-footer {
                width: 100% !important;
            }

            .fs-23 {
                font-size: 23px !important;
            }

            .fs-15 {
                font-size: 15px !important;
            }

            .fs-13 {
                font-size: 13px !important;
            }

            .pad-0 {
                padding: 0 !important;
            }

            .pad-x-10 {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

        }

        @media (prefers-color-scheme: dark) {

            body,
            .email-body,
            .email-body_inner,
            .email-content,
            .email-wrapper,
            .email-header,
            .email-footer {
                background-color: #ffffff !important;
                color: black !important;
            }

            p,
            ul,
            ol,
            blockquote,
            h1,
            h2,
            h3 {
                color: black !important;
            }

            .image--dark {
                display: block !important;
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                max-width: inherit !important;
                line-height: auto !important;
                margin-top: 0px !important;
                visibility: inherit !important;
            }

            .image--light {
                display: none !important;
            }

            .link--dark {
                color: #91ADD4 !important;
            }
        }

    </style>
</head>
<body
    style="width: 100% !important; height: 100%; -webkit-text-size-adjust: none; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; background-color: #F2F4F6; color: #51545E; margin: 0;"
    bgcolor="#F2F4F6">

    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #F2F4F6; margin: 0; padding: 0;"
        bgcolor="#F2F4F6">
        <tr>
            <td align="center"
                style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
                    style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 0;">

                    <tr>
                        <td class="email-body"
                            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                            <table class="email-body_inner" align="center" width="600" cellpadding="0" cellspacing="0"
                                role="presentation"
                                style="width: 600px; -premailer-width: 6000px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center; margin: 0 auto; padding: 0;">
                                <tr>
                                    <td align="center" bgcolor="#197987" class='bg-color'
                                        style="background: linear-gradient(90deg, rgb(109, 169, 147) 23%, rgb(76, 120, 120) 61%) !important; word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; padding: 10px 0; ">
                                        <div class="image--dark"
                                            style="overflow:hidden; float:left;line-height:0px;"
                                            align="center">
                                            <a href="{{ env('APP_URL') }}/"><img
                                                    src="{{ env('APP_URL') }}/images/elogo.png" width="150"
                                                    alt="gwt2"
                                                    style="color: #ffffff; font-family:&quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; text-align:center; font-weight:bold; font-size:20px; line-height: 40px; text-decoration: none; margin: 0 auto; padding: 0; width: 35% !important;"
                                            border="0"/></a>
                                        </div>
                                    </td>
								</tr>
							</table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td class="email-body" width="600" cellpadding="0" cellspacing="0"
                style="word-break: break-word; margin: 0; padding: 0; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0;">
                <table class="email-body_inner" align="center" width="600" cellpadding="0" cellspacing="0"
                    role="presentation"
                    style="width: 600px; -premailer-width: 600px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #FFFFFF; margin: 0 auto; padding: 0;"
                    bgcolor="#FFFFFF">
                    <tr>
                        <td class="content-cell"
                            style="word-break: break-word; border: 1px solid #4c7878; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; padding: 20px 35px;">
                            <div class="f-fallback">
                                <table class="body-content" align="center" width="100%" cellpadding="0" cellspacing="0"
                                    role="presentation"
                                    style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center;">
                                    <tr>
                                        <td align="center"
                                            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 29px; padding: 0 30px;"
                                            class="fs-23 pad-0">
                                            <h3 style="margin-bottom: 0; color: #333333; font-size: 15px; font-weight: bold; text-align: center;"
                                                align="center" class="fs-23">{{ !empty($add_user) ? "CREATE YOUR" : (!empty($change_password) ? "CHANGE" : "FORGOT YOUR") }}  PASSWORD?</h3>




                                        </td>
                                    </tr>
                                </table>

                                <table class="body-content" align="center" width="100%" cellpadding="0" cellspacing="0"
                                    role="presentation"
                                    style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center;">
                                    <tr>
                                        <td align="center"
                                            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 25px; padding: 20px 40px;"
                                            class="fs-15 pad-0">

                                            <p style="font-size: 16px; line-height: 1.3; color: #51545E; padding: 0; margin: 0; " class="fs-15"><p style="text-align: left !important; font-weight: bold !important;">Hi {{$full_name}},</p></p>
                                            <p style="font-size: 16px; line-height: 1.3; color: #51545E;" class="fs-15">
                                                There was a request to {{ !empty($add_user) ? "create a" : (!empty($change_password) ? "change your" : "reset your") }}  password! Click the below button to {{ !empty($add_user) ? "create " : (!empty($change_password) ? "change your" : "reset your") }} password.</p>
                                        </td>
                                    </tr>
                                </table>

                                <table class="body-content" align="center" width="100%" cellpadding="0" cellspacing="0"
                                    role="presentation"
                                    style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center; padding-top: 20px; padding-bottom: 20px">
                                    <tr>
                                        <td align="center"
                                            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 15px;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                role="presentation">
                                                <tr>
                                                    <td align="center"
                                                        style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 15px;text-transform: uppercase">
                                                        <div>

                                                                <a href ='{{ route('verify-email') }}?type={{ !empty($add_user) ? 'a' : (!empty($change_password) ? 'c' : 'r') }}&t={{ $verify_token }}' id="reset-link" target="_blank"
                                                                style="background-color:#599360;border:1px solid #599360; border-radius: 4px; color:#ffffff;display:inline-block;font-size:15px;line-height:35px;text-align:center;text-decoration:none;width:250px !important;-webkit-text-size-adjust:none;mso-hide:all;">{{ !empty($add_user) ? "Create a" : (!empty($change_password) ? "Change your" : "Reset your") }}  password</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td
                style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                <table bgcolor="#092451" class="email-footer" align="center" width="600" cellpadding="0" cellspacing="0"
                    role="presentation"
                    style="width: 600px; -premailer-width: 600px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center; margin: 0 auto; padding: 0;">

                    <tr>
                        <td align="center"
                            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">

                                <tr>
                                    <td align="center" v-align="middle"
                                        style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-top: 20px; background-color: #197987;">
                                        <p style="margin:0; font-size: 12px; color: #fff !important;
                                        padding: 18px;">Copyright &copy; 2015-2016 GWT2ENERGY
                                            Designed And Developed By GoWebEz </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>


