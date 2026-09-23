<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Social Links | Portfolio Admin</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >

</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="logo">
            PORTFOLIO<span>.</span>
        </div>

        <div class="menu-label">
            MANAGEMENT
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.profile.edit') }}">
                    Profile
                </a>
            </li>

            <li>
                <a href="{{ route('admin.skills.index') }}">
                    Skills
                </a>
            </li>

            <li>
                <a href="{{ route('admin.education.index') }}">
                    Education
                </a>
            </li>

            <li>
                <a href="#">
                    Projects
                </a>
            </li>

            <li>
                <a
                    href="{{ route('admin.socials.index') }}"
                    class="active"
                >
                    Social Links
                </a>
            </li>

            <li>
                <a href="#">
                    Messages
                </a>
            </li>

        </ul>


        <div class="sidebar-bottom">

            <ul class="menu">

                <li>

                    <form
                        method="POST"
                        action="{{ route('admin.logout') }}"
                    >
                        @csrf

                        <button type="submit">
                            Logout
                        </button>
                    </form>

                </li>

            </ul>

        </div>

    </aside>


    <main class="main">

        <div class="topbar">

            <div class="heading">

                <h1>
                    Social Links
                </h1>

                <p>
                    Connect your GitHub, LinkedIn,
                    Facebook and other profiles.
                </p>

            </div>

            <a
                href="{{ route('home') }}"
                target="_blank"
                class="view-site"
            >
                View Portfolio ↗
            </a>

        </div>


        @if(session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert-error">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="management-grid">


            <div class="panel form-panel">

                <div class="panel-title">

                    <h2>
                        {{ $editSocial ? 'Edit Social Link' : 'Add Social Link' }}
                    </h2>

                    <p>
                        Add links visitors can use
                        to find you online.
                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ $editSocial
                        ? route('admin.socials.update', $editSocial)
                        : route('admin.socials.store') }}"
                >

                    @csrf

                    @if($editSocial)
                        @method('PUT')
                    @endif


                    <div class="field">

                        <label>
                            PLATFORM *
                        </label>

                        <select
                            name="platform"
                            required
                        >

                            <option value="">
                                Select Platform
                            </option>

                            @foreach([
                                'GitHub',
                                'LinkedIn',
                                'Facebook',
                                'Instagram',
                                'YouTube',
                                'X / Twitter',
                                'Other'
                            ] as $platform)

                                <option
                                    value="{{ $platform }}"
                                    @selected(old('platform', $editSocial?->platform) === $platform)
                                >
                                    {{ $platform }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="field">

                        <label>
                            PROFILE URL *
                        </label>

                        <input
                            type="url"
                            name="url"
                            value="{{ old('url', $editSocial?->url) }}"
                            placeholder="https://github.com/username"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            DISPLAY ORDER
                        </label>

                        <input
                            type="number"
                            min="0"
                            name="sort_order"
                            value="{{ old('sort_order', $editSocial?->sort_order ?? 0) }}"
                        >

                    </div>


                    <button
                        type="submit"
                        class="submit"
                    >
                        {{ $editSocial ? 'Update Link' : 'Add Social Link' }}
                    </button>


                    @if($editSocial)

                        <a
                            href="{{ route('admin.socials.index') }}"
                            class="cancel-edit"
                        >
                            Cancel Editing
                        </a>

                    @endif

                </form>

            </div>


            <div class="panel list-panel">

                <div class="panel-title">

                    <h2>
                        Connected Profiles
                    </h2>

                    <p>
                        {{ $socialLinks->count() }}
                        social profile(s) connected.
                    </p>

                </div>


                @if($socialLinks->count())

                    <div class="items">

                        @foreach($socialLinks as $social)

                            <div class="item">

                                <div class="item-content">

                                    <div class="item-title">
                                        {{ $social->platform }}
                                    </div>

                                    <div class="item-subtitle">
                                        {{ $social->url }}
                                    </div>

                                    <div class="badges">

                                        <span class="badge">
                                            Order {{ $social->sort_order }}
                                        </span>

                                    </div>

                                </div>


                                <div class="item-actions">

                                    <a
                                        href="{{ $social->url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="open-btn"
                                    >
                                        Open ↗
                                    </a>


                                    <a
                                        href="{{ route('admin.socials.index', ['edit' => $social->id]) }}"
                                        class="edit-btn"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.socials.destroy', $social) }}"
                                        onsubmit="return confirm('Delete this social link?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty">
                        No social links added yet.
                    </div>

                @endif

            </div>

        </div>

    </main>

</div>

</body>
</html>