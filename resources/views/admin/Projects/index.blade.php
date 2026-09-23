<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Projects | Portfolio Admin
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >

    <style>

        /* ========================================
           PROJECT PAGE EXTRA STYLES
        ======================================== */

        .project-image-box {
            position: relative;

            width: 100%;
            height: 190px;

            overflow: hidden;

            margin-bottom: 18px;

            border:
                1px solid
                rgba(255, 255, 255, .08);

            border-radius: 13px;

            background:
                radial-gradient(
                    circle at 50% 30%,
                    rgba(124, 92, 255, .15),
                    rgba(255, 255, 255, .02)
                );

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .project-image-box img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        .project-placeholder {
            color:
                rgba(255, 255, 255, .18);

            font-size: 15px;
            font-weight: 800;

            letter-spacing: 1px;
        }


        .upload-box {
            position: relative;

            width: 100%;

            padding: 14px;

            border:
                1px dashed
                rgba(255, 255, 255, .12);

            border-radius: 10px;

            background:
                rgba(255, 255, 255, .02);

            text-align: center;

            color: #888f9f;

            font-size: 11px;

            cursor: pointer;

            transition: .25s;
        }


        .upload-box:hover {
            border-color:
                rgba(124, 92, 255, .45);

            background:
                rgba(124, 92, 255, .05);

            color: white;
        }


        .upload-box input {
            display: none;
        }


        .file-info {
            margin-top: 7px;

            color: #565d6d;

            font-size: 9px;

            line-height: 1.6;
        }


        .featured-option {
            display: flex;

            align-items: center;

            gap: 10px;

            padding: 13px;

            margin-bottom: 16px;

            border:
                1px solid
                rgba(255, 255, 255, .07);

            border-radius: 10px;

            background:
                rgba(255, 255, 255, .02);

            color: #9ba1b0;

            font-size: 11px;

            cursor: pointer;
        }


        .featured-option input {
            width: 16px;
            height: 16px;

            accent-color: #7c5cff;
        }


        /* PROJECT LIST */

        .project-card {
            overflow: hidden;

            border:
                1px solid
                rgba(255, 255, 255, .07);

            border-radius: 15px;

            background:
                rgba(255, 255, 255, .018);

            transition: .3s;
        }


        .project-card:hover {
            transform:
                translateY(-3px);

            border-color:
                rgba(124, 92, 255, .28);
        }


        .project-card-image {
            position: relative;

            height: 210px;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at center,
                    rgba(124, 92, 255, .14),
                    rgba(255, 255, 255, .02)
                );

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .project-card-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition:
                transform .5s ease;
        }


        .project-card:hover
        .project-card-image img {
            transform:
                scale(1.04);
        }


        .no-image {
            color:
                rgba(255, 255, 255, .16);

            font-size: 12px;
            font-weight: 800;

            letter-spacing: 1px;
        }


        .featured-badge {
            position: absolute;

            top: 12px;
            left: 12px;

            padding:
                6px 9px;

            border:
                1px solid
                rgba(124, 92, 255, .3);

            border-radius:
                100px;

            background:
                rgba(12, 13, 18, .82);

            backdrop-filter:
                blur(10px);

            color: #b9aeff;

            font-size: 8px;
            font-weight: 800;

            text-transform:
                uppercase;

            letter-spacing: 1px;
        }


        .project-card-body {
            padding: 18px;
        }


        .project-card-title {
            font-size: 15px;
            font-weight: 800;
        }


        .project-card-description {
            margin-top: 8px;

            color: #7d8494;

            font-size: 10px;

            line-height: 1.7;
        }


        .tech-list {
            display: flex;

            flex-wrap: wrap;

            gap: 6px;

            margin-top: 13px;
        }


        .tech {
            padding:
                5px 8px;

            border:
                1px solid
                rgba(255, 255, 255, .07);

            border-radius:
                100px;

            background:
                rgba(255, 255, 255, .025);

            color: #9299a8;

            font-size: 8px;
            font-weight: 700;
        }


        .project-links {
            display: flex;

            flex-wrap: wrap;

            gap: 7px;

            margin-top: 15px;
        }


        .project-link {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 33px;

            padding:
                0 10px;

            border:
                1px solid
                rgba(255, 255, 255, .08);

            border-radius: 8px;

            background:
                rgba(255, 255, 255, .025);

            color: #a5abba;

            text-decoration: none;

            font-size: 9px;

            transition: .25s;
        }


        .project-link:hover {
            color: white;

            border-color:
                rgba(124, 92, 255, .3);
        }


        .project-bottom {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 12px;

            margin-top: 16px;

            padding-top: 15px;

            border-top:
                1px solid
                rgba(255, 255, 255, .06);
        }


        .order-text {
            color: #565d6d;

            font-size: 9px;
        }


        .project-buttons {
            display: flex;

            gap: 7px;
        }


        .projects-list {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 14px;
        }


        @media (
            max-width: 1250px
        ) {

            .projects-list {
                grid-template-columns:
                    1fr;
            }

        }


        @media (
            max-width: 750px
        ) {

            .project-card-image {
                height: 180px;
            }

        }

    </style>

</head>


<body>

<div class="layout">


    <!-- ========================================
         SIDEBAR
    ========================================= -->

    <aside class="sidebar">


        <div class="logo">
            PORTFOLIO<span>.</span>
        </div>


        <div class="menu-label">
            MANAGEMENT
        </div>


        <ul class="menu">


            <li>

                <a
                    href="{{ route('admin.dashboard') }}"
                >
                    Dashboard
                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.profile.edit') }}"
                >
                    Profile
                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.skills.index') }}"
                >
                    Skills
                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.education.index') }}"
                >
                    Education
                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="active"
                >
                    Projects
                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.socials.index') }}"
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



    <!-- ========================================
         MAIN
    ========================================= -->

    <main class="main">


        <div class="topbar">


            <div class="heading">

                <h1>
                    Projects
                </h1>

                <p>
                    Manage your portfolio projects,
                    screenshots and project links.
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



        <!-- SUCCESS -->

        @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

        @endif



        <!-- ERRORS -->

        @if($errors->any())

            <div class="alert-error">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <div class="management-grid">


            <!-- ========================================
                 PROJECT FORM
            ========================================= -->

            <div class="panel form-panel">


                <div class="panel-title">


                    <h2>

                        {{ $editProject
                            ? 'Edit Project'
                            : 'Add New Project'
                        }}

                    </h2>


                    <p>

                        Add project details,
                        screenshot, technologies
                        and external links.

                    </p>


                </div>



                <form
                    method="POST"
                    enctype="multipart/form-data"
                    action="{{
                        $editProject
                            ? route(
                                'admin.projects.update',
                                $editProject
                            )
                            : route(
                                'admin.projects.store'
                            )
                    }}"
                >


                    @csrf


                    @if($editProject)

                        @method('PUT')

                    @endif



                    <!-- IMAGE PREVIEW -->

                    <div
                        class="project-image-box"
                        id="imagePreviewBox"
                    >


                        @if(
                            $editProject &&
                            $editProject->image
                        )

                            <img
                                src="{{
                                    asset(
                                        'storage/' .
                                        $editProject->image
                                    )
                                }}"
                                alt="Project"
                                id="previewImage"
                            >

                        @else

                            <span
                                class="project-placeholder"
                                id="projectPlaceholder"
                            >
                                PROJECT PREVIEW
                            </span>


                            <img
                                src=""
                                alt="Preview"
                                id="previewImage"
                                style="display:none;"
                            >

                        @endif


                    </div>



                    <!-- IMAGE UPLOAD -->

                    <div class="field">

                        <label>
                            PROJECT SCREENSHOT
                        </label>


                        <label class="upload-box">

                            Choose Project Image

                            <input
                                type="file"
                                name="image"
                                id="imageInput"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                        </label>


                        <div
                            class="file-info"
                            id="fileInfo"
                        >
                            JPG, PNG or WEBP • Max 5MB
                        </div>

                    </div>



                    <!-- TITLE -->

                    <div class="field">

                        <label>
                            PROJECT TITLE *
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{
                                old(
                                    'title',
                                    $editProject?->title
                                )
                            }}"
                            placeholder="University Connect"
                            required
                        >

                    </div>



                    <!-- DESCRIPTION -->

                    <div class="field">

                        <label>
                            DESCRIPTION
                        </label>

                        <textarea
                            name="description"
                            placeholder="Describe the project, its purpose and main features..."
                        >{{ old(
                            'description',
                            $editProject?->description
                        ) }}</textarea>

                    </div>



                    <!-- TECHNOLOGIES -->

                    <div class="field">

                        <label>
                            TECHNOLOGIES
                        </label>

                        <input
                            type="text"
                            name="technologies"
                            value="{{
                                old(
                                    'technologies',
                                    $editProject?->technologies
                                )
                            }}"
                            placeholder="Laravel, PHP, MySQL, JavaScript"
                        >

                        <div class="file-info">
                            Separate technologies
                            using commas.
                        </div>

                    </div>



                    <!-- GITHUB -->

                    <div class="field">

                        <label>
                            GITHUB URL
                        </label>

                        <input
                            type="url"
                            name="github_url"
                            value="{{
                                old(
                                    'github_url',
                                    $editProject?->github_url
                                )
                            }}"
                            placeholder="https://github.com/username/project"
                        >

                    </div>



                    <!-- LIVE URL -->

                    <div class="field">

                        <label>
                            LIVE DEMO URL
                        </label>

                        <input
                            type="url"
                            name="live_url"
                            value="{{
                                old(
                                    'live_url',
                                    $editProject?->live_url
                                )
                            }}"
                            placeholder="https://yourproject.com"
                        >

                    </div>



                    <!-- ORDER -->

                    <div class="field">

                        <label>
                            DISPLAY ORDER
                        </label>

                        <input
                            type="number"
                            name="sort_order"
                            min="0"
                            value="{{
                                old(
                                    'sort_order',
                                    $editProject?->sort_order
                                    ?? 0
                                )
                            }}"
                        >

                    </div>



                    <!-- FEATURED -->

                    <label class="featured-option">

                        <input
                            type="checkbox"
                            name="featured"
                            value="1"

                            @checked(
                                old(
                                    'featured',
                                    $editProject?->featured
                                    ?? false
                                )
                            )
                        >

                        <span>
                            Show this project as
                            a Featured Project
                        </span>

                    </label>



                    <!-- SUBMIT -->

                    <button
                        type="submit"
                        class="submit"
                    >

                        {{
                            $editProject
                                ? 'Update Project'
                                : 'Add Project'
                        }}

                    </button>



                    @if($editProject)

                        <a
                            href="{{
                                route(
                                    'admin.projects.index'
                                )
                            }}"
                            class="cancel-edit"
                        >
                            Cancel Editing
                        </a>

                    @endif


                </form>


            </div>



            <!-- ========================================
                 PROJECT LIST
            ========================================= -->

            <div class="panel list-panel">


                <div class="panel-title">

                    <h2>
                        Your Projects
                    </h2>

                    <p>

                        {{ $projects->count() }}

                        project(s) currently
                        added to your portfolio.

                    </p>

                </div>



                @if($projects->count())


                    <div class="projects-list">


                        @foreach($projects as $project)


                            <div class="project-card">


                                <!-- IMAGE -->

                                <div class="project-card-image">


                                    @if($project->image)

                                        <img
                                            src="{{
                                                asset(
                                                    'storage/' .
                                                    $project->image
                                                )
                                            }}"
                                            alt="{{ $project->title }}"
                                        >

                                    @else

                                        <span class="no-image">
                                            NO SCREENSHOT
                                        </span>

                                    @endif



                                    @if($project->featured)

                                        <span
                                            class="featured-badge"
                                        >
                                            Featured
                                        </span>

                                    @endif


                                </div>



                                <!-- BODY -->

                                <div class="project-card-body">


                                    <div class="project-card-title">

                                        {{ $project->title }}

                                    </div>



                                    <div class="project-card-description">

                                        {{
                                            \Illuminate\Support\Str::limit(
                                                $project->description
                                                ?: 'No description added.',
                                                150
                                            )
                                        }}

                                    </div>



                                    <!-- TECHNOLOGIES -->

                                    @if($project->technologies)


                                        <div class="tech-list">


                                            @foreach(explode(',', $project->technologies) as $technology)

                                                @if(trim($technology))

                                                    <span class="tech">

                                                        {{
                                                            trim(
                                                                $technology
                                                            )
                                                        }}

                                                    </span>

                                                @endif

                                            @endforeach


                                        </div>


                                    @endif



                                    <!-- LINKS -->

                                    @if(
                                        $project->github_url ||
                                        $project->live_url
                                    )


                                        <div class="project-links">


                                            @if(
                                                $project->github_url
                                            )

                                                <a
                                                    href="{{
                                                        $project->github_url
                                                    }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="project-link"
                                                >
                                                    GitHub ↗
                                                </a>

                                            @endif



                                            @if(
                                                $project->live_url
                                            )

                                                <a
                                                    href="{{
                                                        $project->live_url
                                                    }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="project-link"
                                                >
                                                    Live Demo ↗
                                                </a>

                                            @endif


                                        </div>


                                    @endif



                                    <!-- BOTTOM -->

                                    <div class="project-bottom">


                                        <span class="order-text">

                                            Order:
                                            {{ $project->sort_order }}

                                        </span>



                                        <div class="project-buttons">


                                            <a
                                                href="{{
                                                    route(
                                                        'admin.projects.index',
                                                        [
                                                            'edit' =>
                                                            $project->id
                                                        ]
                                                    )
                                                }}"
                                                class="edit-btn"
                                            >
                                                Edit
                                            </a>



                                            <form
                                                method="POST"
                                                action="{{
                                                    route(
                                                        'admin.projects.destroy',
                                                        $project
                                                    )
                                                }}"
                                                onsubmit="
                                                    return confirm(
                                                        'Delete this project?'
                                                    );
                                                "
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


                                </div>


                            </div>


                        @endforeach


                    </div>


                @else


                    <div class="empty">

                        No projects added yet.

                        <br><br>

                        Use the form to add
                        your first portfolio project.

                    </div>


                @endif


            </div>


        </div>


    </main>


</div>



<!-- ========================================
     IMAGE PREVIEW SCRIPT
========================================= -->

<script>

    const imageInput =
        document.getElementById(
            'imageInput'
        );


    const previewImage =
        document.getElementById(
            'previewImage'
        );


    const placeholder =
        document.getElementById(
            'projectPlaceholder'
        );


    const fileInfo =
        document.getElementById(
            'fileInfo'
        );


    imageInput.addEventListener(
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


            fileInfo.textContent =
                file.name;

        }
    );

</script>


</body>

</html>