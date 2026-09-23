<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Skills | Portfolio Admin</title>

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
                <a
                    href="{{ route('admin.skills.index') }}"
                    class="active"
                >
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
                    Skills
                </h1>

                <p>
                    Manage the technologies and skills
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


            <!-- FORM -->

            <div class="panel form-panel">

                <div class="panel-title">

                    <h2>
                        {{ $editSkill ? 'Edit Skill' : 'Add New Skill' }}
                    </h2>

                    <p>
                        Add technical skills such as
                        Laravel, PHP, MySQL or JavaScript.
                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ $editSkill
                        ? route('admin.skills.update', $editSkill)
                        : route('admin.skills.store') }}"
                >

                    @csrf

                    @if($editSkill)
                        @method('PUT')
                    @endif


                    <div class="field">

                        <label>
                            SKILL NAME *
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $editSkill?->name) }}"
                            placeholder="Laravel"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            CATEGORY
                        </label>

                        <select name="category">

                            <option value="">
                                Select Category
                            </option>

                            <option
                                value="Backend"
                                @selected(old('category', $editSkill?->category) === 'Backend')
                            >
                                Backend
                            </option>

                            <option
                                value="Frontend"
                                @selected(old('category', $editSkill?->category) === 'Frontend')
                            >
                                Frontend
                            </option>

                            <option
                                value="Database"
                                @selected(old('category', $editSkill?->category) === 'Database')
                            >
                                Database
                            </option>

                            <option
                                value="Tools"
                                @selected(old('category', $editSkill?->category) === 'Tools')
                            >
                                Tools
                            </option>

                            <option
                                value="Other"
                                @selected(old('category', $editSkill?->category) === 'Other')
                            >
                                Other
                            </option>

                        </select>

                    </div>


                    <div class="two-fields">

                        <div class="field">

                            <label>
                                PROFICIENCY %
                            </label>

                            <input
                                type="number"
                                name="percentage"
                                min="0"
                                max="100"
                                value="{{ old('percentage', $editSkill?->percentage) }}"
                                placeholder="90"
                            >

                        </div>


                        <div class="field">

                            <label>
                                DISPLAY ORDER
                            </label>

                            <input
                                type="number"
                                name="sort_order"
                                min="0"
                                value="{{ old('sort_order', $editSkill?->sort_order ?? 0) }}"
                            >

                        </div>

                    </div>


                    <div class="field">

                        <label>
                            DESCRIPTION
                        </label>

                        <textarea
                            name="description"
                            placeholder="Short description about this skill..."
                        >{{ old('description', $editSkill?->description) }}</textarea>

                    </div>


                    <button
                        type="submit"
                        class="submit"
                    >
                        {{ $editSkill ? 'Update Skill' : 'Add Skill' }}
                    </button>


                    @if($editSkill)

                        <a
                            href="{{ route('admin.skills.index') }}"
                            class="cancel-edit"
                        >
                            Cancel Editing
                        </a>

                    @endif

                </form>

            </div>


            <!-- LIST -->

            <div class="panel list-panel">

                <div class="panel-title">

                    <h2>
                        Your Skills
                    </h2>

                    <p>
                        {{ $skills->count() }}
                        skill(s) currently added.
                    </p>

                </div>


                @if($skills->count())

                    <div class="items">

                        @foreach($skills as $skill)

                            <div class="item">

                                <div class="item-content">

                                    <div class="item-title">
                                        {{ $skill->name }}
                                    </div>

                                    <div class="item-subtitle">
                                        {{ $skill->description ?: 'No description added.' }}
                                    </div>

                                    <div class="badges">

                                        @if($skill->category)

                                            <span class="badge">
                                                {{ $skill->category }}
                                            </span>

                                        @endif

                                        @if(!is_null($skill->percentage))

                                            <span class="badge">
                                                {{ $skill->percentage }}%
                                            </span>

                                        @endif

                                        <span class="badge">
                                            Order {{ $skill->sort_order }}
                                        </span>

                                    </div>

                                </div>


                                <div class="item-actions">

                                    <a
                                        href="{{ route('admin.skills.index', ['edit' => $skill->id]) }}"
                                        class="edit-btn"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.skills.destroy', $skill) }}"
                                        onsubmit="return confirm('Delete this skill?');"
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
                        No skills added yet.
                    </div>

                @endif

            </div>

        </div>

    </main>

</div>

</body>
</html>