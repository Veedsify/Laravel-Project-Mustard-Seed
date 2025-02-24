<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaceVerifcation;
use App\Livewire\AboutComponent;
use App\Livewire\BlogComponent;
use App\Livewire\BlogDetailsComponent;
use App\Livewire\Comp\JobDetailComponent;
use App\Livewire\ContactComponent;
use App\Livewire\DonatedItemsComponent;
use App\Livewire\DonationComponent;
use App\Livewire\DonationDetailComponent;
use App\Livewire\DonationItemPreview;
use App\Livewire\DonationPayComponent;
use App\Livewire\EventsComponent;
use App\Livewire\FaceVerificationComponent;
use App\Livewire\FaqComponents;
use App\Livewire\ForumComponent;
use App\Livewire\GetStartedComponent;
use App\Livewire\HomeComponent;
use App\Livewire\JobComponent;
use App\Livewire\LoginComponent;
use App\Livewire\PrivacyPolicyComponent;
use App\Livewire\RegisAsVolunteer;
use App\Livewire\RegisterComponent;
use App\Livewire\TermsComponent;
use App\Livewire\VolunteersComponent;
use App\Livewire\VolunteersDetailsComponent;
use Illuminate\Support\Facades\Route;

Route::middleware('page_visits')->group(function () {

    // Home Page Routes
    Route::get('/', HomeComponent::class)->name('home');
    Route::get('/get-started', GetStartedComponent::class)->name('get-started');
    Route::get('/about', AboutComponent::class)->name('about');
    Route::get('/blog/{slug}', BlogDetailsComponent::class)->name('blog.details');
    Route::get('/blogs', BlogComponent::class)->name('blogs');
    Route::get('/login', LoginComponent::class)->name('login');
    Route::get('/register', RegisterComponent::class)->name('register');
    
    
    // Route::get('/logout', [LoginComponent::class, 'logout'])->name('logout');
    Route::get('/contact', ContactComponent::class)->name('contact');

    Route::get('/events/{slug}', EventsComponent::class)->name('events.details');

    Route::get("jobs", JobComponent::class)->name('jobs');
    Route::get("job/{slug}", JobDetailComponent::class)->name('job.details');

    Route::get("/campaigns", DonationComponent::class)->name('campaigns');
    Route::get("/campaign/{slug}", DonationDetailComponent::class)->name('donate.details');
    Route::get('/campaign/{slug}/payment', DonationPayComponent::class)->name('donate.payment');

    Route::get("/donations", DonatedItemsComponent::class)->name('donations');
    Route::get("/item/{slug}", DonationItemPreview::class)->name('item.preview');

    Route::get("/volunteers", VolunteersComponent::class)->name('volunteers');
    Route::get("/volunteer/{username}", VolunteersDetailsComponent::class)->name('volunteers.details');

    Route::get("/faq", FaqComponents::class)->name('faq');
    Route::get("/privacy-policy", PrivacyPolicyComponent::class)->name("privacy.policy");
    Route::get('/terms-and-conditions', TermsComponent::class)->name('terms');

    //Register As A Volunteer
    Route::get('/register/volunteer', RegisAsVolunteer::class)->name('register.as.volunteer');

    // Google Auth
    Route::get("/register/google", [AuthController::class, 'redirectToGoogle'])->name("redirect.google");
    Route::get("/auth/google-callback", [AuthController::class, 'authCallback'])->name("redirect.google.callback");

    // FaceVerification
    Route::get('/verify/face', FaceVerificationComponent::class)->name('face.verify');
   Route::post('/start/face-verification', [FaceVerifcation::class, 'saveFace'])->name('face.verification');
   
   Route::get('/forum', ForumComponent::class)->name('forum');
});

// Route::post('/face/upload',[FaceVerifcation::class, 'attachFace'])->name('face.upload');
