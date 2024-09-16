<li class="sidebar-title">
    Actions
</li>
<li>
    <a href="{{ route('admin.dashboard') }}" class="active"><i class="material-icons">dashboard</i>Dashboard</a>
</li>
<li class="sidebar-title">
    Blogs
</li>
{{-- ARTICLE --}}
<li>
    <a href="#"><i class="material-icons">book</i>Articles<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="{{ route('admin.blogs') }}">
                <i class="material-icons">library_books</i>All Articles</a>
        </li>
        <li>
            <a href="{{ route('admin.blogs.create') }}">
                <i class="material-icons">add</i>New Article
            </a>
        </li>
    </ul>
</li>
{{-- BLOG CATEGORY --}}
<li>
    <a href="#"><i class="material-icons">category</i>Blog Category<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="{{ route('admin.categories') }}">
                All Categories</a>
        </li>
        <li>
            <a href="{{ route('admin.categories.create') }}">
                Add Category
            </a>
        </li>
    </ul>
</li>
{{-- COMMENTS --}}
<li>
    <a href="#"><i class="material-icons">question_answer</i>Comments<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="{{ route('admin.comments') }}">
                <i class="material-icons">chat</i>All Comments</a>
        </li>
    </ul>
</li>

<li class="sidebar-title">
    Users
</li>

<li>
    <a href="#"><i class="material-icons">people</i>Users<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="{{ route('admin.campaigns') }}">
                Users</a>
        </li>
        <li>
            <a href="{{ route('admin.campaigns.create') }}">
                Create User
            </a>
        </li>
    </ul>
</li>


{{-- LOCATION --}}
<li class="sidebar-title">
    Location
</li>
<li>
    <a href="{{ route('admin.location') }}"><i class="material-icons">location_on</i>Location</a>
</li>

<li class="sidebar-title">
    Campaigns & Donations
</li>

<li>
    <a href="#"><i class="material-icons">campaign</i>Campaigns<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="{{ route('admin.campaigns') }}">
                Campaigns</a>
        </li>
        <li>
            <a href="{{ route('admin.campaigns.create') }}">
                Create Campaign
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#"><i class="material-icons">group_work</i>Campaign Category<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="styles-typography.html">
                All Category</a>
        </li>
        <li>
            <a href="styles-code.html">
                Create Category
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#"><i class="material-icons">volunteer_activism</i>Donations<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="styles-typography.html">
                Donations
            </a>
        </li>
        <li>
            <a href="styles-code.html">
                Create Donation Category
            </a>
        </li>
    </ul>
</li>

{{-- Events --}}
<li class="sidebar-title">
    Events
</li>
<li>
    <a href="#"><i class="material-icons">event</i>Events<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="styles-typography.html">
                Events
            </a>
        </li>
        <li>
            <a href="styles-code.html">
                Create Event Category
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-title">
    Reviews
</li>
<li>
    <a href="profile.html"><i class="material-icons">reviews</i>Reviews</a>
</li>

<li class="sidebar-title">
    Settings & Configuration
</li>
<li>
    <a href="#"><i class="material-icons">build</i>Configs<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="styles-typography.html">Home Page Data</a>
        </li>
        <li>
            <a href="styles-typography.html">About Page Data</a>
        </li>
        <li>
            <a href="styles-code.html">Privacy Page</a>
        </li>
        <li>
            <a href="styles-tables.html">Terms & Condition Page</a>
        </li>
        <li>
            <a href="styles-icons.html">Faq Page</a>
        </li>
        <li>
            <a href="styles-icons.html">Contact Page</a>
        </li>
        <li>
            <a href="styles-icons.html">Social Media Links</a>
        </li>
        <li>
            <a href="styles-icons.html">Header Links</a>
        </li>
        <li>
            <a href="styles-icons.html">Footer Links</a>
        </li>
    </ul>
</li>
<li>
    <a href="#"><i class="material-icons">settings</i>Settings<i
            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
    <ul class="sub-menu">
        <li>
            <a href="styles-typography.html">Profile</a>
        </li>
        <li>
            <a href="styles-code.html">Themes</a>
        </li>
        <li>
            <a href="styles-tables.html">Permissions</a>
        </li>
        <li>
            <a href="styles-icons.html">Security</a>
        </li>
        <li>
            <a href="styles-icons.html">Email Notifications Configs</a>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="text-danger"><i class="material-icons">logout</i>
        Log Out
    </a>
</li>
