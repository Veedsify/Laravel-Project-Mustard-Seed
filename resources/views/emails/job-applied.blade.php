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
                                        <td width="50%" align="right" class="text-green">
                                             Application Status
                                        </td>
                                   </tr>
                              </table>
                         </td>
                    </tr>
                    <tr>
                         <td class="main-content">
                              <h1>New Job Application</h1>
                              {{-- <p>Thank you for your interest in the [Position] role at [Company Name]. After
                                   careful consideration, we have decided to move forward with other candidates
                                   whose qualifications more closely match our current needs.</p> --}}
                              <p>
                                   Hi {{$job->user->name}}, a new job application has been submitted for your job post
                              </p>
                              
                              <table width="100%" style="width:100%" cellpadding="10" cellspacing="0" style="margin: 20px 0;">
                                   <tr>
                                        <td width="50%" bgcolor="#f8f8f8"><strong>Name:</strong></td>
                                        <td width="50%" bgcolor="#f8f8f8">
                                             {{$user->name}}
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><strong>Job Details:</strong></td>
                                        <td>
                                             {{$job->name}}
                                        </td>
                                   </tr>
                                   <tr>
                                        <td bgcolor="#f8f8f8"><strong>Date Applied:</strong></td>
                                        <td bgcolor="#f8f8f8">
                                             {{$application->created_at->format('d M, Y')}}
                                        </td>
                                   </tr>
                                   <tr>
                                        <td bgcolor="#f8f8f8"><strong>Cover Letter:</strong></td>
                                        <td bgcolor="#f8f8f8">
                                             {{$coverLetter}}
                                        </td>
                                   </tr>
                              </table>
                              {{-- <p>We encourage you to:</p>
                              <ul style="color: #333333; line-height: 1.6;">
                                   <li>Keep your profile updated</li>
                                   <li>Set up job alerts for similar positions</li>
                                   <li>Review other open positions</li>
                              </ul> --}}
                              <p style="text-align: center;">
                                   <a href="#" class="button">View Applications</a>
                              </p>
                         </td>
                    </tr>
                    <tr>
                         <td class="footer">
                              <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                   <tr>
                                        <td align="center" class="footer-links">
                                             <a href="#">Job Board</a>
                                             <a href="#">Career Resources</a>
                                             <a href="#">Contact</a>
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
                                 <td width="50%" align="right" class="text-green">
                                     New Job Posted
                                 </td>
                             </tr>
                         </table>
                     </td>
                 </tr>
                 <tr>
                     <td class="main-content">
                         <h1>New Job Application</h1>
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