@extends('emails.layouts.mail')
@section('title', 'Volunteer Signup')
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
                                        Welcome Volunteer!
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1>Welcome to Our Volunteer Team!</h1>
                            <p>Thank you for registering as a volunteer. We're thrilled to have you join our community of dedicated individuals making a difference.</p>
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0" style="width: 100%; margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Name:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">{{$data['volunteerSettings']['organization']}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Founded in:</strong></td>
                                    <td>{{$data['volunteerSettings']['age']}}</td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Location:</strong></td>
                                    <td bgcolor="#f8f8f8">{{$data['volunteerSettings']['city']}}</td>
                                </tr>
                            </table>
                            <p>Next steps:</p>
                            <ol style="color: #333333; line-height: 1.6;">
                                <li>Check Out your volunteer profile</li>
                                <li>Browse available opportunities</li>
                                <li>Accept your first donation</li>
                            </ol>
                            <p style="text-align: center; margin-top: 30px;">
                                <a href="{{ route('login') }}" class="button">Login Your Profile</a>
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
