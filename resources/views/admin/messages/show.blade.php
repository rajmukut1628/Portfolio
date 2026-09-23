<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        View Message | Portfolio Admin
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >

    <style>

        .message-container {
            max-width: 850px;
        }


        .back-link {
            display: inline-flex;

            margin-bottom: 20px;

            color: #7e8595;

            text-decoration: none;

            font-size: 11px;

            transition: .25s;
        }


        .back-link:hover {
            color: white;
        }


        .message-card {
            padding: 30px;

            border:
                1px solid
                rgba(255,255,255,.08);

            border-radius: 20px;

            background:
                rgba(255,255,255,.025);
        }


        .message-header {
            padding-bottom: 25px;

            border-bottom:
                1px solid
                rgba(255,255,255,.07);
        }


        .message-header h2 {
            font-size: 21px;

            letter-spacing: -.5px;
        }


        .sender-info {
            display: flex;

            flex-wrap: wrap;

            gap: 8px 20px;

            margin-top: 15px;

            color: #777e90;

            font-size: 10px;
        }


        .sender-info strong {
            color: #a5abba;
        }


        .message-content {
            padding: 28px 0;

            color: #b3b8c5;

            font-size: 13px;

            line-height: 1.9;

            white-space: pre-wrap;
        }


        .message-actions {
            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            padding-top: 20px;

            border-top:
                1px solid
                rgba(255,255,255,.07);
        }


        .reply-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 42px;

            padding: 0 16px;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #6046dc
                );

            color: white;

            text-decoration: none;

            font-size: 11px;
            font-weight: 800;
        }


        .delete-btn-large {
            min-height: 42px;

            padding: 0 16px;

            border:
                1px solid
                rgba(251,113,133,.2);

            border-radius: 9px;

            background:
                rgba(251,113,133,.06);

            color: #fda4af;

            font-size: 11px;
            font-weight: 700;

            cursor: pointer;
        }

    </style>

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



    <main class="main">


        <div class="message-container">


            <a
                href="{{ route('admin.messages.index') }}"
                class="back-link"
            >
                ← Back to Messages
            </a>



            <div class="message-card">


                <div class="message-header">


                    <h2>

                        {{
                            $message->subject
                            ?: 'No Subject'
                        }}

                    </h2>


                    <div class="sender-info">

                        <span>
                            <strong>From:</strong>
                            {{ $message->name }}
                        </span>

                        <span>
                            <strong>Email:</strong>
                            {{ $message->email }}
                        </span>

                        <span>
                            <strong>Received:</strong>

                            {{
                                $message
                                    ->created_at
                                    ->format(
                                        'd M Y, h:i A'
                                    )
                            }}

                        </span>

                    </div>


                </div>



                <div class="message-content">{{ $message->message }}</div>



                <div class="message-actions">


                    <a
                        href="mailto:{{ $message->email }}"
                        class="reply-btn"
                    >
                        Reply by Email
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
                            class="delete-btn-large"
                        >
                            Delete Message
                        </button>


                    </form>


                </div>


            </div>


        </div>


    </main>

</div>

</body>
</html>