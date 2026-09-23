<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Edit Profile | Portfolio Admin
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family:
                Inter,
                Arial,
                sans-serif;

            background: #08090d;
            color: #f5f7ff;

            min-height: 100vh;
        }

        .layout {
            display: grid;

            grid-template-columns:
                260px 1fr;

            min-height: 100vh;
        }

        /* ==============================
           SIDEBAR
        ============================== */

        .sidebar {
            position: fixed;

            width: 260px;
            height: 100vh;

            padding: 30px 20px;

            background: #0c0d12;

            border-right:
                1px solid
                rgba(255,255,255,.08);
        }

        .logo {
            font-size: 20px;
            font-weight: 900;

            padding: 0 10px;

            margin-bottom: 45px;
        }

        .logo span {
            color: #7c5cff;
        }

        .menu-label {
            color: #555c6d;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;

            padding: 0 10px;

            margin-bottom: 10px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 5px;
        }

        .menu a,
        .menu button {
            width: 100%;

            display: flex;
            align-items: center;

            padding: 12px 13px;

            border: none;
            border-radius: 10px;

            background: transparent;

            color: #9096a6;

            text-decoration: none;

            font-size: 13px;

            cursor: pointer;

            transition: .25s;

            text-align: left;
        }

        .menu a:hover,
        .menu button:hover {
            color: white;

            background:
                rgba(255,255,255,.05);
        }

        .menu .active {
            color: #b6aaff;

            background:
                rgba(124,92,255,.12);
        }

        .sidebar-bottom {
            position: absolute;

            left: 20px;
            right: 20px;
            bottom: 25px;
        }

        /* ==============================
           MAIN
        ============================== */

        .main {
            grid-column: 2;

            padding:
                35px 45px 70px;
        }

        .topbar {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 35px;
        }

        .heading h1 {
            font-size: 30px;
            letter-spacing: -1.5px;
        }

        .heading p {
            color: #747b8d;

            font-size: 12px;

            margin-top: 6px;
        }

        .view-site {
            padding: 11px 17px;

            border:
                1px solid
                rgba(255,255,255,.1);

            border-radius: 10px;

            color: white;

            background:
                rgba(255,255,255,.035);

            text-decoration: none;

            font-size: 12px;

            transition: .3s;
        }

        .view-site:hover {
            background:
                rgba(255,255,255,.08);
        }

        /* ==============================
           ALERT
        ============================== */

        .success {
            padding: 15px 18px;

            margin-bottom: 22px;

            border:
                1px solid
                rgba(52,211,153,.2);

            border-radius: 12px;

            background:
                rgba(52,211,153,.07);

            color: #a7f3d0;

            font-size: 12px;
        }

        .error-box {
            padding: 15px 18px;

            margin-bottom: 22px;

            border:
                1px solid
                rgba(244,63,94,.2);

            border-radius: 12px;

            background:
                rgba(244,63,94,.07);

            color: #fda4af;

            font-size: 12px;
        }

        .error-box ul {
            padding-left: 18px;
        }

        /* ==============================
           PROFILE GRID
        ============================== */

        .profile-grid {
            display: grid;

            grid-template-columns:
                310px 1fr;

            gap: 22px;

            align-items: start;
        }

        .panel {
            border:
                1px solid
                rgba(255,255,255,.08);

            border-radius: 20px;

            background:
                rgba(255,255,255,.025);
        }

        /* ==============================
           PHOTO PANEL
        ============================== */

        .photo-panel {
            padding: 25px;

            position: sticky;

            top: 30px;
        }

        .photo-title {
            font-size: 15px;

            margin-bottom: 20px;
        }

        .photo-preview {
            position: relative;

            width: 100%;
            aspect-ratio: 1 / 1;

            border-radius: 18px;

            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                radial-gradient(
                    circle at 50% 30%,
                    rgba(124,92,255,.22),
                    rgba(255,255,255,.025)
                );

            border:
                1px solid
                rgba(255,255,255,.08);
        }

        .photo-preview img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .photo-placeholder {
            font-size: 60px;
            font-weight: 900;

            color:
                rgba(255,255,255,.18);
        }

        .photo-help {
            color: #656c7c;

            font-size: 11px;

            line-height: 1.7;

            margin-top: 15px;
        }

        .upload-label {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 100%;

            min-height: 45px;

            margin-top: 18px;

            border:
                1px solid
                rgba(255,255,255,.1);

            border-radius: 11px;

            color: #b2b6c2;

            background:
                rgba(255,255,255,.035);

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            transition: .3s;
        }

        .upload-label:hover {
            color: white;

            border-color:
                rgba(124,92,255,.4);

            background:
                rgba(124,92,255,.08);
        }

        .upload-label input {
            display: none;
        }

        .file-name {
            color: #777e90;

            font-size: 10px;

            margin-top: 8px;

            word-break: break-word;
        }

        /* ==============================
           FORM
        ============================== */

        .form-panel {
            padding: 30px;
        }

        .section-title {
            margin-bottom: 22px;

            padding-bottom: 15px;

            border-bottom:
                1px solid
                rgba(255,255,255,.07);
        }

        .section-title h2 {
            font-size: 16px;
        }

        .section-title p {
            color: #656c7c;

            font-size: 11px;

            margin-top: 5px;
        }

        .form-section + .form-section {
            margin-top: 35px;
        }

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2,1fr);

            gap: 17px;
        }

        .field.full {
            grid-column:
                1 / -1;
        }

        .field label {
            display: block;

            color: #8c93a4;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: .7px;

            margin-bottom: 8px;
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;

            border:
                1px solid
                rgba(255,255,255,.09);

            outline: none;

            border-radius: 11px;

            background:
                rgba(0,0,0,.16);

            color: white;

            padding:
                13px 14px;

            transition: .3s;
        }

        .field input,
        .field select {
            height: 48px;
        }

        .field textarea {
            min-height: 120px;

            line-height: 1.7;

            resize: vertical;
        }

        .field textarea.large {
            min-height: 180px;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color:
                rgba(124,92,255,.65);

            box-shadow:
                0 0 0 4px
                rgba(124,92,255,.07);
        }

        .hint {
            color: #565d6d;

            font-size: 10px;

            margin-top: 6px;

            line-height: 1.6;
        }

        /* ==============================
           CV
        ============================== */

        .cv-box {
            padding: 17px;

            border:
                1px solid
                rgba(255,255,255,.08);

            border-radius: 13px;

            background:
                rgba(255,255,255,.025);
        }

        .current-cv {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-bottom: 13px;
        }

        .current-cv span {
            color: #8c93a4;

            font-size: 11px;
        }

        .current-cv a {
            color: #a99bff;

            font-size: 11px;

            text-decoration: none;
        }

        /* ==============================
           SAVE BAR
        ============================== */

        .save-area {
            display: flex;

            align-items: center;
            justify-content: flex-end;

            gap: 12px;

            margin-top: 30px;

            padding-top: 25px;

            border-top:
                1px solid
                rgba(255,255,255,.07);
        }

        .cancel {
            padding:
                12px 18px;

            border:
                1px solid
                rgba(255,255,255,.08);

            border-radius: 10px;

            color: #9096a6;

            background: transparent;

            text-decoration: none;

            font-size: 12px;
        }

        .save {
            min-width: 145px;

            padding:
                13px 20px;

            border: none;

            border-radius: 10px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #6046dc
                );

            font-weight: 800;

            cursor: pointer;

            transition: .3s;
        }

        .save:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 15px 35px
                rgba(124,92,255,.2);
        }

        @media (
            max-width: 1050px
        ) {

            .profile-grid {
                grid-template-columns:
                    1fr;
            }

            .photo-panel {
                position: static;
            }

            .photo-preview {
                max-width: 300px;

                margin: auto;
            }

        }

        @media (
            max-width: 750px
        ) {

            .layout {
                display: block;
            }

            .sidebar {
                position: static;

                width: 100%;
                height: auto;
            }

            .sidebar-bottom {
                position: static;

                margin-top: 25px;
            }

            .main {
                padding:
                    25px 18px 50px;
            }

            .form-grid {
                grid-template-columns:
                    1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .topbar {
                align-items:
                    flex-start;

                flex-direction:
                    column;
            }

        }

    </style>

</head>

<body>

<div class="layout">

    <!-- =============================
         SIDEBAR
    ============================== -->

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
                <a
                    href="{{ route('admin.profile.edit') }}"
                    class="active"
                >
                    Profile
                </a>
            </li>

            <li>
                <a href="#">
                    Skills
                </a>
            </li>

            <li>
                <a href="#">
                    Education
                </a>
            </li>

            <li>
                <a href="#">
                    Projects
                </a>
            </li>

            <li>
                <a href="#">
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


    <!-- =============================
         MAIN CONTENT
    ============================== -->

    <main class="main">

        <div class="topbar">

            <div class="heading">

                <h1>
                    Edit Profile
                </h1>

                <p>
                    Manage the personal information
                    displayed on your portfolio.
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

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="error-box">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('admin.profile.update') }}"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="profile-grid">


                <!-- =============================
                     LEFT PHOTO
                ============================== -->

                <div class="panel photo-panel">

                    <h2 class="photo-title">
                        Profile Photo
                    </h2>


                    <div
                        class="photo-preview"
                        id="photoPreview"
                    >

                        @if($profile && $profile->photo)

                            <img
                                src="{{ asset('storage/' . $profile->photo) }}"
                                alt="Profile Photo"
                                id="previewImage"
                            >

                        @else

                            <div
                                class="photo-placeholder"
                                id="photoPlaceholder"
                            >
                                &lt;/&gt;
                            </div>

                            <img
                                src=""
                                alt="Preview"
                                id="previewImage"
                                style="display:none;"
                            >

                        @endif

                    </div>


                    <label class="upload-label">

                        Choose Profile Photo

                        <input
                            type="file"
                            name="photo"
                            id="photoInput"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                    </label>


                    <div
                        class="file-name"
                        id="photoFileName"
                    >
                        JPG, PNG or WEBP • Max 5MB
                    </div>


                    <p class="photo-help">
                        For the best portfolio result,
                        use a clear portrait with a simple
                        background. A square or portrait
                        image works best.
                    </p>

                </div>


                <!-- =============================
                     RIGHT FORM
                ============================== -->

                <div class="panel form-panel">


                    <!-- BASIC INFO -->

                    <div class="form-section">

                        <div class="section-title">

                            <h2>
                                Basic Information
                            </h2>

                            <p>
                                Main information shown
                                in your hero and about section.
                            </p>

                        </div>


                        <div class="form-grid">


                            <div class="field">

                                <label>
                                    FULL NAME *
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $profile?->name) }}"
                                    placeholder="Raj Mukut"
                                    required
                                >

                            </div>


                            <div class="field">

                                <label>
                                    PROFESSIONAL TITLE
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $profile?->title) }}"
                                    placeholder="Full-Stack Web Developer"
                                >

                            </div>


                            <div class="field full">

                                <label>
                                    SHORT DESCRIPTION
                                </label>

                                <textarea
                                    name="short_description"
                                    placeholder="A short introduction for your hero section..."
                                >{{ old('short_description', $profile?->short_description) }}</textarea>

                                <div class="hint">
                                    Keep this short. It will appear
                                    near Raj Mukut on the homepage.
                                </div>

                            </div>


                            <div class="field full">

                                <label>
                                    ABOUT ME
                                </label>

                                <textarea
                                    class="large"
                                    name="about"
                                    placeholder="Write about yourself, your interests and development journey..."
                                >{{ old('about', $profile?->about) }}</textarea>

                            </div>

                        </div>

                    </div>


                    <!-- CONTACT -->

                    <div class="form-section">

                        <div class="section-title">

                            <h2>
                                Contact Information
                            </h2>

                            <p>
                                Information visitors can
                                use to contact you.
                            </p>

                        </div>


                        <div class="form-grid">


                            <div class="field">

                                <label>
                                    EMAIL
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $profile?->email) }}"
                                    placeholder="rajmukut791@email.com"
                                >

                            </div>


                            <div class="field">

                                <label>
                                    PHONE
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone', $profile?->phone) }}"
                                    placeholder="+880..."
                                >

                            </div>


                            <div class="field">

                                <label>
                                    LOCATION
                                </label>

                                <input
                                    type="text"
                                    name="location"
                                    value="{{ old('location', $profile?->location) }}"
                                    placeholder="Dhaka, Bangladesh"
                                >

                            </div>


                            <div class="field">

                                <label>
                                    NATIONALITY
                                </label>

                                <input
                                    type="text"
                                    name="nationality"
                                    value="{{ old('nationality', $profile?->nationality) }}"
                                    placeholder="Bangladeshi"
                                >

                            </div>


                            <div class="field">

                                <label>
                                    LANGUAGES
                                </label>

                                <input
                                    type="text"
                                    name="languages"
                                    value="{{ old('languages', $profile?->languages) }}"
                                    placeholder="Bangla, English"
                                >

                            </div>


                            <div class="field">

                                <label>
                                    AVAILABILITY
                                </label>

                                <input
                                    type="text"
                                    name="availability"
                                    value="{{ old('availability', $profile?->availability) }}"
                                    placeholder="Available for opportunities"
                                >

                            </div>

                        </div>

                    </div>


                    <!-- CV -->

                    <div class="form-section">

                        <div class="section-title">

                            <h2>
                                CV / Resume
                            </h2>

                            <p>
                                Upload your CV so visitors
                                can download it directly.
                            </p>

                        </div>


                        <div class="cv-box">

                            @if($profile && $profile->cv)

                                <div class="current-cv">

                                    <span>
                                        Current CV uploaded
                                    </span>

                                    <a
                                        href="{{ asset('storage/' . $profile->cv) }}"
                                        target="_blank"
                                    >
                                        View Current CV ↗
                                    </a>

                                </div>

                            @endif


                            <label class="upload-label">

                                Choose PDF Resume

                                <input
                                    type="file"
                                    name="cv"
                                    id="cvInput"
                                    accept=".pdf"
                                >

                            </label>


                            <div
                                class="file-name"
                                id="cvFileName"
                            >
                                PDF only • Max 10MB
                            </div>

                        </div>

                    </div>


                    <!-- SAVE -->

                    <div class="save-area">

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="cancel"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="save"
                        >
                            Save Profile
                        </button>

                    </div>


                </div>

            </div>

        </form>

    </main>

</div>


<script>

    /* PROFILE PHOTO PREVIEW */

    const photoInput =
        document.getElementById(
            'photoInput'
        );

    const previewImage =
        document.getElementById(
            'previewImage'
        );

    const placeholder =
        document.getElementById(
            'photoPlaceholder'
        );

    const photoFileName =
        document.getElementById(
            'photoFileName'
        );


    photoInput.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];

            if (!file) {
                return;
            }

            const reader =
                new FileReader();

            reader.onload =
                function (event) {

                    previewImage.src =
                        event.target.result;

                    previewImage.style.display =
                        'block';

                    if (placeholder) {
                        placeholder.style.display =
                            'none';
                    }

                };

            reader.readAsDataURL(
                file
            );

            photoFileName.textContent =
                file.name;

        }
    );


    /* CV FILE NAME */

    const cvInput =
        document.getElementById(
            'cvInput'
        );

    const cvFileName =
        document.getElementById(
            'cvFileName'
        );


    cvInput.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];

            if (file) {

                cvFileName.textContent =
                    file.name;

            }

        }
    );

</script>

</body>
</html>