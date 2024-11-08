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
                                        New Job Posted
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1>New Job Posted</h1>
                            <p>Your job listing has been successfully published and is now visible to potential
                                candidates.</p>
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0"
                                   style="margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Position:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">[Job Title]</td>
                                </tr>
                                <tr>
                                    <td><strong>Location:</strong></td>
                                    <td>[Location]</td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Type:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        <span class="tag">[Job Type]</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Posted On:</strong></td>
                                    <td>[Date]</td>
                                </tr>
                            </table>
                            <p style="text-align: center;">
                                <a href="#" class="button">View Job Listing</a>
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
