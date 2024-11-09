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
                            @if($user->role === 'user')
                                <p>Your job listing has been successfully added, and is pending approval you will get notified once its accepted</p>
                            @else
                                <p>
                                    A new job has been posted on the platform. Please review the details below and take
                                    the necessary action.
                                </p>
                            @endif
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0"
                                   style="margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Title:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">
                                        {{ $myJob->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Location:</strong></td>
                                    <td>
                                        {{ $myJob->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Status:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        <span class="tag">
                                            {{ $myJob->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Type:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        <span class="tag">
                                            {{ $myJob->type }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Posted On:</strong></td>
                                    <td>
                                        {{ $myJob->created_at->format('d M, Y') }}
                                    </td>
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
