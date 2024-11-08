@extends('emails.layouts.mail')
@section('title', 'Account Disabled')
@section('content')
    <table width="100%" style="width:100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
        <tr>
            <td>
                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center">
                    <tr>
                        <td class="header">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="50%">
                                        <img src="logo.png" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right" class="text-green">
                                        Verification Success
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1>Account Verification Approved! 🎉</h1>
                            <p>
                                Congratulation: Your account has been successfully verified. You can now access all the features of the platform.
                            </p>
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0"
                                   style="margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Account Status:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">
                                        <span class="tag">Verified User</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Account Name:</strong></td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Verification Method:</strong></td>
                                    <td>
                                        {{$user->idVerified->id_type}}
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Verified On:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        {{date('Y-m-d H:i:s')}}
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p>You now have access to:</p>
                            <ul style="color: #333333; line-height: 1.6;">
                                <li>Create and manage donation</li>
                                <li>Apply to other donations</li>
                                <li>Update User Settings</li>
                                <li>Donate to Campaigns</li>
                            </ul>
                            <p style="text-align: center;">
                                <a href="#" class="button">Get Started</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" class="footer-links">
                                        <a href="#">About Us</a>
                                        <a href="#">Contact</a>
                                        <a href="#">Privacy Policy</a>
                                        <a href="#">Unsubscribe</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
