<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Education | Portfolio Admin</title>

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
                <a
                    href="{{ route('admin.education.index') }}"
                    class="active"
                >
                    Education
                </a>
            </li>

            <li>
                <a href="#">
                    Projects
                </a>
            </li>

            <li>
                <a href="{{ route('admin.socials.index') }}">
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
                    Education
                </h1>

                <p>
                    Manage your academic qualifications
                    and educational timeline.
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
                        {{ $editEducation ? 'Edit Qualification' : 'Add Qualification' }}
                    </h2>

                    <p>
                        Add your bachelor's degree,
                        HSC, SSC or other qualifications.
                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ $editEducation
                        ? route('admin.education.update', $editEducation)
                        : route('admin.education.store') }}"
                >

                    @csrf

                    @if($editEducation)
                        @method('PUT')
                    @endif


                    <div class="field">

                        <label>
                            DEGREE / QUALIFICATION *
                        </label>

                        <input
                            type="text"
                            name="degree"
                            value="{{ old('degree', $editEducation?->degree) }}"
                            placeholder="B.Sc. in Computer Science & Engineering"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            INSTITUTION *
                        </label>

                        <input
                            type="text"
                            name="institution"
                            value="{{ old('institution', $editEducation?->institution) }}"
                            placeholder="Northern University Bangladesh"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            FIELD OF STUDY
                        </label>

                        <input
                            type="text"
                            name="field_of_study"
                            value="{{ old('field_of_study', $editEducation?->field_of_study) }}"
                            placeholder="Computer Science & Engineering(CSE)"
                        >

                    </div>


                    <div class="two-fields">

                        <div class="field">

                            <label>
                                START YEAR
                            </label>

                            <input
                                type="text"
                                name="start_year"
                                value="{{ old('start_year', $editEducation?->start_year) }}"
                                placeholder="2022"
                            >

                        </div>


                        <div class="field">

                            <label>
                                END YEAR
                            </label>

                            <input
                                type="text"
                                name="end_year"
                                value="{{ old('end_year', $editEducation?->end_year) }}"
                                placeholder="2026"
                            >

                        </div>

                    </div>


                    <div class="field">

                        <label>
                            LOCATION
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location', $editEducation?->location) }}"
                            placeholder="Dhaka, Bangladesh"
                        >

                    </div>


                    <div class="field">

                        <label>
                            DESCRIPTION
                        </label>

                        <textarea
                            name="description"
                            placeholder="I completed my Bachelor's degree in Computer Science and Engineering (CSE), building a strong foundation in programming, web development, and software technologies.
"
                        >{{ old('description', $editEducation?->description) }}</textarea>

                    </div>


                    <div class="field">

                        <label>
                            DISPLAY ORDER
                        </label>

                        <input
                            type="number"
                            min="0"
                            name="sort_order"
                            value="{{ old('sort_order', $editEducation?->sort_order ?? 0) }}"
                        >

                    </div>


                    <button
                        type="submit"
                        class="submit"
                    >
                        {{ $editEducation ? 'Update Qualification' : 'Add Qualification' }}
                    </button>


                    @if($editEducation)

                        <a
                            href="{{ route('admin.education.index') }}"
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
                        Qualifications
                    </h2>

                    <p>
                        {{ $education->count() }}
                        qualification(s) currently added.
                    </p>

                </div>


                @if($education->count())

                    <div class="items">

                        @foreach($education as $item)

                            <div class="item">

                                <div class="item-content">

                                    <div class="item-title">
                                        {{ $item->degree }}
                                    </div>

                                    <div class="item-subtitle">
                                        {{ $item->institution }}

                                        @if($item->location)
                                            • {{ $item->location }}
                                        @endif
                                    </div>

                                    <div class="badges">

                                        @if($item->start_year || $item->end_year)

                                            <span class="badge">

                                                {{ $item->start_year ?: '?' }}

                                                —

                                                {{ $item->end_year ?: 'Present' }}

                                            </span>

                                        @endif

                                        @if($item->field_of_study)

                                            <span class="badge">
                                                {{ $item->field_of_study }}
                                            </span>

                                        @endif

                                    </div>

                                </div>


                                <div class="item-actions">

                                    <a
                                        href="{{ route('admin.education.index', ['edit' => $item->id]) }}"
                                        class="edit-btn"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.education.destroy', $item) }}"
                                        onsubmit="return confirm('Delete this qualification?');"
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
                        No education added yet.
                    </div>

                @endif

            </div>

        </div>

    </main>

</div>

</body>
</html>