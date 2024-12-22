<table class="body-wrap"
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;"
    bgcolor="transparent">
    <tbody>
        <tr
            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                valign="top"></td>
            <td class="container"
                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                width="600" valign="top">
                <div class="content"
                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction"
                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: transparent; margin: 0; border: 1px dashed #4d79f6;"
                        width="100%" cellspacing="0" cellpadding="0" bgcolor="#fff">
                        <tbody>
                            <tr
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-wrap"
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;"
                                    valign="top">
                                    <meta itemprop="name" content="Confirm Email"
                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <table
                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"
                                        width="100%" cellspacing="0" cellpadding="0">
                                        <p dir="ltr">Hello {{ $username }},</p>
                                        <p dir="ltr">We have received a request to reset the password for your
                                            account. To initiate the password reset
                                            process, please click on the password reset link provided below:</p>
                                        <div style="text-align: center;">
                                            <a href="{{ $reset_url }}"
                                                style=" font-size: 13px; text-decoration: none;  font-weight: bold; text-align: center; cursor: pointer;  border-radius: 5px; text-transform: capitalize; border: none; padding: 10px 20px; background-color: #0b51b7; color: white;width: 140px;">Reset
                                                Password</a>
                                        </div>
                                        <p dir="ltr" style="text-align: center;"></p>
                                        <p dir="ltr">This password reset link will expire in
                                            {{ $password_token_expire_time }} minutes. If you did
                                            not request a
                                            password
                                            reset, please ignore this email and take appropriate steps to secure your
                                            account.</p>
                                        <p dir="ltr">Thank you for using our services.</p>
                                        <p dir="ltr"></p>
                                        <p>&nbsp;</p>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--end table-->
                </div>
                <!--end content-->
            </td>
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                valign="top"></td>
        </tr>
    </tbody>
</table>
