<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Messages | Portfolio Admin
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >

    <style>

        .messages-wrapper {
            border:
                1px solid
                rgba(255,255,255,.08);

            border-radius: 18px;

            background:
                rgba(255,255,255,.025);

            overflow: hidden;
        }


        .messages-header {
            display: grid;

            grid-template-columns:
                1.1fr 1.4fr 130px 100px;

            gap: 15px;

            padding: 13px 20px;

            border-bottom:
                1px solid
                rgba(255,255,255,.07);

            color: #5e6575;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .message-row {
            position: relative;

            display: grid;

            grid-template-columns:
                1.1fr 1.4fr 130px 100px;

            align-items: center;

            gap: 15px;

            padding: 18px 20px;

            border-bottom:
                1px solid
                rgba(255,255,255,.055);

            transition: .25s;
        }


        .message-row:last-child {
            border-bottom: none;
        }


        .message-row:hover {
            background:
                rgba(255,255,255,.025);
        }


        .message-row.unread {
            background:
                rgba(124,92,255,.035);
        }


        .message-row.unread::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 2px;

            background: #7c5cff;
        }


        .sender {
            min-width: 0;
        }


        .sender-name {
            display: flex;

            align-items: center;

            gap: 7px;

            font-size: 12px;
            font-weight: 800;
        }


        .unread-dot {
            width: 6px;
            height: 6px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #7c5cff;

            box-shadow:
                0 0 10px
                rgba(124,92,255,.7);
        }


        .sender-email {
            margin-top: 5px;

            color: #626979;

            font-size: 9px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .subject {
            color: #9ba1b0;

            font-size: 11px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .date {
            color: #626979;

            font-size: 9px;
        }


        .actions-column {
            display: flex;

            gap: 6px;

            justify-content: flex-end;
        }


        .view-message {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 33px;

            padding: 0 10px;

            border:
                1px solid
                rgba(124,92,255,.22);

            border-radius: 8px;

            background:
                rgba(124,92,255,.07);

            color: #b6aaff;

            text-decoration: none;

            font-size: 9px;
            font-weight: 700;
        }


        .delete-message {
            min-height: 33px;

            padding: 0 10px;

            border:
                1px solid
                rgba(251,113,133,.18);

            border-radius: 8px;

            background:
                rgba(251,113,133,.06);

            color: #fda4af;

            font-size: 9px;
            font-weight: 700;

            cursor: pointer;
        }


        .message-summary {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 20px;
        }


        .summary-text {
            color: #777e90;

            font-size: 11px;
        }


        .summary-badge {
            padding: 7px 10px;

            border:
                1px solid
                rgba(124,92,255,.18);

            border-radius: 100px;

            background:
                rgba(124,92,255,.06);

            color: #b6aaff;

            font-size: 9px;
            font-weight: 800;
        }


        @media (max-width: 950px) {

            .messages-header {
                display: none;
            }


            .message-row {
                grid-template-columns:
                    1fr;

                gap: 12px;
            }


            .actions-column {
                justify-content: flex-start;
            }

        }

    </style>

</head>


<body>

<div class="layout">


    <!-- SIDEBAR -->

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
                <a href="{{ route('admin.projects.index') }}">
                    Projects
                </a>
            </li>

            <li>
                <a href="{{ route('admin.socials.index') }}">
                    Social Links
                </a>
            </li>

            <li>
                <a
                    href="{{ route('admin.messages.index') }}"
                    class="active"
                >
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



    <!-- MAIN -->

    <main class="main">


        <div class="topbar">

            <div class="heading">

                <h1>
                    Messages
                </h1>

                <p>
                    Messages submitted from your
                    portfolio contact form.
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



        <div class="message-summary">

            <div class="summary-text">

                Total:
                {{ $messages->count() }}
                message(s)

            </div>


            <div class="summary-badge">

                {{
                    $messages
                        ->where('is_read', false)
                        ->count()
                }}

                Unread

            </div>

        </div>



        <div class="messages-wrapper">


            <div class="messages-header">

                <div>
                    Sender
                </div>

                <div>
                    Subject
                </div>

                <div>
                    Received
                </div>

                <div style="text-align:right;">
                    Action
                </div>

            </div>



            @forelse($messages as $message)


                <div
                    class="message-row
                    {{ !$message->is_read ? 'unread' : '' }}"
                >


                    <div class="sender">

                        <div class="sender-name">

                            @if(!$message->is_read)

                                <span class="unread-dot"></span>

                            @endif

                            {{ $message->name }}

                        </div>


                        <div class="sender-email">
                            {{ $message->email }}
                        </div>

                    </div>



                    <div class="subject">

                        {{
                            $message->subject
                            ?: 'No subject'
                        }}

                    </div>



                    <div class="date">

                        {{
                            $message
                                ->created_at
                                ->diffForHumans()
                        }}

                    </div>



                    <div class="actions-column">


                        <a
                            href="{{
                                route(
                                    'admin.messages.show',
                                    $message
                                )
                            }}"
                            class="view-message"
                        >
                            View
                        </a>


                        <form
                            method="POST"
                            action="{{
                                route(
                                    'admin.messages.destroy',
                                    $message
                                )
                            }}"
                            onsubmit="
                                return confirm(
                                    'Delete this message?'
                                );
                            "
                        >

                            @csrf
                            @method('DELETE')


                            <button
                                type="submit"
                                class="delete-message"
                            >
                                Delete
                            </button>

                        </form>


                    </div>

                </div>


            @empty


                <div class="empty">

                    No messages received yet.

                    <br><br>

                    Messages submitted from
                    your contact form will
                    appear here.

                </div>


            @endforelse


        </div>


    </main>

</div>

</body>
</html>