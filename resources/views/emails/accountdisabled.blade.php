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
                                        <img src="{{ asset('storage/' . optional($homePage)->logo) }}" width="30" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right">
                                        <span class="status-badge status-disabled">Account Disabled</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1 class="text-red">Account Access Suspended</h1>
                            <div class="alert-box">
                                <p style="margin: 0;"><strong>Important:</strong> Your account has been
                                    temporarily disabled. This action was taken on {{date('Y-M-d')}} at
                                    {{date('H:i:s:A')}}.</p>
                            </div>
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0" style="width:100%; margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Account:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">
                                        {{$user->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Disabled On:</strong></td>
                                    <td>
                                        {{date('Y-m-d H:i:s A')}}
                                    </td>
                                </tr>
                            </table>
                            <p>To restore your account access:</p>
                            <ol style="color: #333333; line-height: 1.6;">
                                <li>Review our community guidelines</li>
                                <li>Submit an appeal with any relevant documentation</li>
                                <li>Await our support team's review (typically 1-2 business days)</li>
                            </ol>
                            <p style="text-align: center;">
                                <a href="{{route('contact')}}" class="button button-red">Submit Appeal</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" class="footer-links">
                                        <a href="#">Help Center</a>
                                        <a href="#">Contact Support</a>
                                        <a href="#">Terms of Service</a>
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
