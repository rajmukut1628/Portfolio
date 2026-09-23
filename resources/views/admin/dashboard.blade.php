```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Dashboard | Portfolio
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #08090d;
            --sidebar: #0c0d12;
            --purple: #7c5cff;
            --purple-light: #b6aaff;
            --text: #f5f7ff;
            --muted: #747b8d;
            --border: rgba(255, 255, 255, .08);
            --card: rgba(255, 255, 255, .025);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                Arial,
                sans-serif;

            background:
                radial-gradient(
                    circle at 90% 5%,
                    rgba(124, 92, 255, .07),
                    transparent 25%
                ),
                #08090d;

            color: #f5f7ff;

            min-height: 100vh;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        .layout {
            display: grid;

            grid-template-columns:
                260px 1fr;

            min-height: 100vh;
        }


        /* ========================================
           SIDEBAR
        ======================================== */

        .sidebar {
            position: fixed;

            width: 260px;
            height: 100vh;

            padding: 30px 20px;

            background:
                rgba(12, 13, 18, .97);

            border-right:
                1px solid
                rgba(255, 255, 255, .08);

            z-index: 100;

            backdrop-filter:
                blur(20px);
        }

        .logo {
            font-size: 20px;
            font-weight: 900;

            padding: 0 10px;

            margin-bottom: 45px;

            letter-spacing: -.5px;
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

            gap: 10px;

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
            background:
                rgba(255, 255, 255, .05);

            color: white;

            transform:
                translateX(3px);
        }

        .menu .active {
            background:
                rgba(124, 92, 255, .12);

            color: #b6aaff;

            border:
                1px solid
                rgba(124, 92, 255, .13);
        }

        .menu-icon {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background:
                currentColor;

            opacity: .7;

            flex-shrink: 0;
        }

        .sidebar-bottom {
            position: absolute;

            bottom: 25px;
            left: 20px;
            right: 20px;
        }

        .admin-info {
            padding: 13px;

            margin-bottom: 10px;

            border:
                1px solid
                rgba(255, 255, 255, .06);

            border-radius: 11px;

            background:
                rgba(255, 255, 255, .02);
        }

        .admin-name {
            display: block;

            font-size: 11px;
            font-weight: 800;

            color: #d7d9e1;

            margin-bottom: 4px;
        }

        .admin-email {
            display: block;

            color: #626979;

            font-size: 9px;

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        /* ========================================
           MAIN
        ======================================== */

        .main {
            grid-column: 2;

            padding:
                35px 45px 70px;
        }

        .topbar {
            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 40px;
        }

        .welcome h1 {
            font-size: 30px;

            letter-spacing:
                -1.5px;
        }

        .welcome p {
            color: #747b8d;

            font-size: 12px;

            margin-top: 6px;
        }

        .view-site {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding:
                11px 17px;

            border:
                1px solid
                rgba(255, 255, 255, .1);

            border-radius:
                10px;

            background:
                rgba(255, 255, 255, .035);

            color: white;

            text-decoration: none;

            font-size: 12px;

            transition: .3s;
        }

        .view-site:hover {
            background:
                rgba(255, 255, 255, .08);

            transform:
                translateY(-2px);
        }


        /* ========================================
           STATS
        ======================================== */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 15px;

            margin-bottom: 35px;
        }

        .stat {
            position: relative;

            overflow: hidden;

            padding: 24px;

            border:
                1px solid
                rgba(255, 255, 255, .08);

            border-radius:
                17px;

            background:
                rgba(255, 255, 255, .025);

            transition: .3s;
        }

        .stat::before {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            top: -60px;
            right: -50px;

            border-radius: 50%;

            background:
                rgba(124, 92, 255, .15);

            filter:
                blur(30px);

            transition: .4s;
        }

        .stat:hover {
            transform:
                translateY(-5px);

            border-color:
                rgba(124, 92, 255, .3);

            background:
                rgba(255, 255, 255, .035);
        }

        .stat:hover::before {
            transform:
                scale(1.5);
        }

        .stat-label {
            position: relative;

            color: #747b8d;

            font-size: 10px;
            font-weight: 700;

            text-transform:
                uppercase;

            letter-spacing: 1.2px;

            z-index: 1;
        }

        .stat-number {
            position: relative;

            display: block;

            font-size: 34px;
            font-weight: 900;

            margin-top: 12px;

            letter-spacing:
                -1px;

            z-index: 1;
        }

        .stat-footer {
            position: relative;

            display: block;

            margin-top: 8px;

            color: #565d6d;

            font-size: 9px;

            z-index: 1;
        }


        /* ========================================
           DASHBOARD GRID
        ======================================== */

        .dashboard-grid {
            display: grid;

            grid-template-columns:
                1.3fr .7fr;

            gap: 20px;
        }

        .panel {
            padding: 25px;

            border:
                1px solid
                rgba(255, 255, 255, .08);

            border-radius:
                18px;

            background:
                rgba(255, 255, 255, .025);
        }

        .panel-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-bottom: 22px;
        }

        .panel h2 {
            font-size: 16px;
        }

        .panel-description {
            color: #606777;

            font-size: 10px;

            margin-top: 5px;
        }


        /* ========================================
           MESSAGES
        ======================================== */

        .message {
            padding: 15px 0;

            border-bottom:
                1px solid
                rgba(255, 255, 255, .06);
        }

        .message:first-of-type {
            padding-top: 0;
        }

        .message:last-child {
            border-bottom: none;

            padding-bottom: 0;
        }

        .message-top {
            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 10px;
        }

        .message-name {
            font-size: 13px;
            font-weight: 700;
        }

        .message-date {
            color: #555c6d;

            font-size: 9px;

            flex-shrink: 0;
        }

        .message-subject {
            color: #838a9b;

            font-size: 11px;

            margin-top: 6px;
        }

        .unread-dot {
            display: inline-block;

            width: 6px;
            height: 6px;

            margin-right: 6px;

            border-radius: 50%;

            background: #7c5cff;

            box-shadow:
                0 0 10px
                rgba(124, 92, 255, .7);
        }

        .empty {
            color: #666d7e;

            font-size: 12px;

            padding: 30px 0;

            text-align: center;
        }


        /* ========================================
           QUICK ACTIONS
        ======================================== */

        .actions {
            display: flex;

            flex-direction: column;

            gap: 10px;
        }

        .action {
            position: relative;

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 15px;

            border:
                1px solid
                rgba(255, 255, 255, .07);

            border-radius:
                12px;

            background:
                rgba(255, 255, 255, .025);

            color: #a1a7b6;

            text-decoration: none;

            font-size: 12px;

            transition: .3s;
        }

        .action:hover {
            color: white;

            transform:
                translateX(5px);

            border-color:
                rgba(124, 92, 255, .3);

            background:
                rgba(124, 92, 255, .05);
        }

        .action-arrow {
            color: #676e7f;

            transition: .3s;
        }

        .action:hover .action-arrow {
            color: #b6aaff;

            transform:
                translateX(3px);
        }

        .coming-soon {
            opacity: .45;

            cursor: default;
        }

        .coming-soon:hover {
            transform: none;

            border-color:
                rgba(255, 255, 255, .07);

            background:
                rgba(255, 255, 255, .025);

            color: #a1a7b6;
        }

        .soon-badge {
            padding:
                4px 7px;

            border:
                1px solid
                rgba(255, 255, 255, .08);

            border-radius:
                100px;

            color: #666d7e;

            font-size: 8px;

            text-transform:
                uppercase;

            letter-spacing: .5px;
        }


        /* ========================================
           STATUS PANEL
        ======================================== */

        .status-panel {
            margin-top: 20px;
        }

        .status-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 12px;
        }

        .status-item {
            padding: 17px;

            border:
                1px solid
                rgba(255, 255, 255, .06);

            border-radius: 12px;

            background:
                rgba(255, 255, 255, .018);
        }

        .status-title {
            display: flex;

            align-items: center;

            gap: 7px;

            font-size: 11px;
            font-weight: 700;

            color: #a4a9b6;
        }

        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #34d399;

            box-shadow:
                0 0 10px
                rgba(52, 211, 153, .45);
        }

        .status-text {
            display: block;

            margin-top: 7px;

            color: #5f6676;

            font-size: 9px;

            line-height: 1.6;
        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (
            max-width: 1100px
        ) {

            .stats {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns:
                    1fr;
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

            .topbar {
                align-items:
                    flex-start;

                flex-direction:
                    column;
            }

            .stats {
                grid-template-columns:
                    1fr;
            }

            .status-grid {
                grid-template-columns:
                    1fr;
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
                    class="active"
                >

                    <span class="menu-icon"></span>

                    Dashboard

                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.profile.edit') }}"
                >

                    <span class="menu-icon"></span>

                    Profile

                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.skills.index') }}"
                >

                    <span class="menu-icon"></span>

                    Skills

                </a>

            </li>


            <li>

                <a
                    href="{{ route('admin.education.index') }}"
                >

                    <span class="menu-icon"></span>

                    Education

                </a>

            </li>


            <li>

                <a href="{{ route('admin.projects.index') }}">
    <span class="menu-icon"></span>
    Projects
</a>

            </li>


            <li>

                <a
                    href="{{ route('admin.socials.index') }}"
                >

                    <span class="menu-icon"></span>

                    Social Links

                </a>

            </li>


            <li>

                <a href="{{ route('admin.messages.index') }}">
    <span class="menu-icon"></span>
    Messages
</a>

            </li>

        </ul>


        <div class="sidebar-bottom">


            <div class="admin-info">

                <span class="admin-name">
                    {{ auth()->user()->name }}
                </span>

                <span class="admin-email">
                    {{ auth()->user()->email }}
                </span>

            </div>


            <ul class="menu">

                <li>

                    <form
                        method="POST"
                        action="{{ route('admin.logout') }}"
                    >

                        @csrf

                        <button type="submit">

                            <span class="menu-icon"></span>

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


        <!-- TOP BAR -->

        <div class="topbar">

            <div class="welcome">

                <h1>
                    Welcome,
                    {{ auth()->user()->name }}
                </h1>

                <p>
                    Manage your portfolio content
                    from one place.
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



        <!-- ========================================
             STATISTICS
        ========================================= -->

        <div class="stats">


            <div class="stat">

                <span class="stat-label">
                    Projects
                </span>

                <span class="stat-number">
                    {{ $stats['projects'] ?? 0 }}
                </span>

                <span class="stat-footer">
                    Portfolio projects
                </span>

            </div>


            <div class="stat">

                <span class="stat-label">
                    Skills
                </span>

                <span class="stat-number">
                    {{ $stats['skills'] ?? 0 }}
                </span>

                <span class="stat-footer">
                    Technical skills
                </span>

            </div>


            <div class="stat">

                <span class="stat-label">
                    Education
                </span>

                <span class="stat-number">
                    {{ $stats['education'] ?? 0 }}
                </span>

                <span class="stat-footer">
                    Qualifications
                </span>

            </div>


            <div class="stat">

                <span class="stat-label">
                    Messages
                </span>

                <span class="stat-number">
                    {{ $stats['messages'] ?? 0 }}
                </span>

                <span class="stat-footer">

                    {{ $stats['unread_messages'] ?? 0 }}
                    unread

                </span>

            </div>

        </div>



        <!-- ========================================
             DASHBOARD CONTENT
        ========================================= -->

        <div class="dashboard-grid">


            <!-- RECENT MESSAGES -->

            <div class="panel">


                <div class="panel-header">

                    <div>

                        <h2>
                            Recent Messages
                        </h2>

                        <div class="panel-description">
                            Latest messages received
                            from your portfolio.
                        </div>

                    </div>

                </div>


                @forelse($latestMessages as $message)

                    <div class="message">


                        <div class="message-top">

                            <span class="message-name">

                                @if(!$message->is_read)

                                    <span
                                        class="unread-dot"
                                    ></span>

                                @endif

                                {{ $message->name }}

                            </span>


                            <span class="message-date">

                                {{ $message->created_at->diffForHumans() }}

                            </span>

                        </div>


                        <div class="message-subject">

                            {{ $message->subject ?? 'No subject' }}

                        </div>

                    </div>

                @empty

                    <div class="empty">

                        No messages yet.

                        <br><br>

                        Messages from your portfolio
                        contact form will appear here.

                    </div>

                @endforelse

            </div>



            <!-- QUICK ACTIONS -->

            <div class="panel">


                <div class="panel-header">

                    <div>

                        <h2>
                            Quick Actions
                        </h2>

                        <div class="panel-description">
                            Quickly update your
                            portfolio information.
                        </div>

                    </div>

                </div>


                <div class="actions">


                    <a
                        href="{{ route('admin.profile.edit') }}"
                        class="action"
                    >

                        <span>
                            Edit Profile
                        </span>

                        <span class="action-arrow">
                            →
                        </span>

                    </a>


                    <a
                        href="{{ route('admin.skills.index') }}"
                        class="action"
                    >

                        <span>
                            Add / Manage Skills
                        </span>

                        <span class="action-arrow">
                            →
                        </span>

                    </a>


                    <a
                        href="{{ route('admin.education.index') }}"
                        class="action"
                    >

                        <span>
                            Add / Manage Education
                        </span>

                        <span class="action-arrow">
                            →
                        </span>

                    </a>


                    <a
                        href="{{ route('admin.socials.index') }}"
                        class="action"
                    >

                        <span>
                            Update Social Links
                        </span>

                        <span class="action-arrow">
                            →
                        </span>

                    </a>


                   <a
    href="{{ route('admin.projects.index') }}"
    class="action"
>

    <span>
        Add / Manage Projects
    </span>

    <span class="action-arrow">
        →
    </span>

</a>


                    <a
    href="{{ route('admin.messages.index') }}"
    class="action"
>

    <span>
        Manage Messages
    </span>

    <span class="action-arrow">
        →
    </span>

</a>

                </div>

            </div>

        </div>



        <!-- ========================================
             SYSTEM STATUS
        ========================================= -->

        <div class="panel status-panel">


            <div class="panel-header">

                <div>

                    <h2>
                        Portfolio Management
                    </h2>

                    <div class="panel-description">
                        Current backend management status.
                    </div>

                </div>

            </div>


            <div class="status-grid">


                <div class="status-item">

                    <div class="status-title">

                        <span class="status-dot"></span>

                        Profile

                    </div>

                    <span class="status-text">
                        Profile information,
                        photo and CV management ready.
                    </span>

                </div>


                <div class="status-item">

                    <div class="status-title">

                        <span class="status-dot"></span>

                        Skills & Education

                    </div>

                    <span class="status-text">
                        Add, edit and delete
                        skills and qualifications.
                    </span>

                </div>


                <div class="status-item">

                    <div class="status-title">

                        <span class="status-dot"></span>

                        Social Profiles

                    </div>

                    <span class="status-text">
                        GitHub, LinkedIn and
                        other profile links ready.
                    </span>

                </div>

            </div>

        </div>


    </main>

</div>

</body>

</html>
```
