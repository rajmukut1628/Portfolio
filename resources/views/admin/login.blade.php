<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login | Portfolio</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;

            font-family:
                Inter,
                Arial,
                sans-serif;

            background:
                #06070b;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .grid {
            position: fixed;
            inset: 0;

            background-image:
                linear-gradient(
                    rgba(255,255,255,.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.025) 1px,
                    transparent 1px
                );

            background-size:
                55px 55px;

            z-index: -3;
        }

        .orb {
            position: fixed;

            width: 450px;
            height: 450px;

            border-radius: 50%;

            background:
                #7657ff;

            filter:
                blur(120px);

            opacity: .17;

            top: -180px;
            left: -150px;

            z-index: -2;

            animation:
                move 8s ease-in-out infinite alternate;
        }

        .orb2 {
            position: fixed;

            width: 400px;
            height: 400px;

            border-radius: 50%;

            background:
                #2563eb;

            filter:
                blur(130px);

            opacity: .12;

            bottom: -170px;
            right: -130px;

            z-index: -2;

            animation:
                move2 10s ease-in-out infinite alternate;
        }

        @keyframes move {

            to {
                transform:
                    translate(
                        160px,
                        130px
                    );
            }

        }

        @keyframes move2 {

            to {
                transform:
                    translate(
                        -130px,
                        -100px
                    );
            }

        }

        .login-wrapper {
            width: 92%;
            max-width: 430px;
        }

        .back {
            display: inline-block;

            color: #818797;

            text-decoration: none;

            font-size: 13px;

            margin-bottom: 20px;

            transition: .3s;
        }

        .back:hover {
            color: white;
        }

        .login-card {
            padding: 38px;

            border:
                1px solid rgba(
                    255,
                    255,
                    255,
                    .1
                );

            border-radius:
                25px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .045
                );

            backdrop-filter:
                blur(20px);

            box-shadow:
                0 30px 100px
                rgba(
                    0,
                    0,
                    0,
                    .4
                );
        }

        .logo {
            font-size: 21px;
            font-weight: 900;

            margin-bottom: 35px;
        }

        .logo span {
            color: #7c5cff;
        }

        .login-card h1 {
            font-size: 31px;

            letter-spacing:
                -1.5px;
        }

        .subtitle {
            color: #8d93a3;

            font-size: 13px;

            line-height: 1.7;

            margin-top: 9px;
            margin-bottom: 30px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;

            color: #9ca2b1;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: .5px;

            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            height: 52px;

            border:
                1px solid rgba(
                    255,
                    255,
                    255,
                    .1
                );

            border-radius:
                12px;

            outline: none;

            padding:
                0 15px;

            background:
                rgba(
                    0,
                    0,
                    0,
                    .18
                );

            color: white;

            transition: .3s;
        }

        .field input:focus {
            border-color:
                rgba(
                    124,
                    92,
                    255,
                    .7
                );

            box-shadow:
                0 0 0 4px
                rgba(
                    124,
                    92,
                    255,
                    .08
                );
        }

        .options {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 22px;
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            color: #8d93a3;

            font-size: 12px;
        }

        .remember input {
            accent-color:
                #7c5cff;
        }

        .login-button {
            width: 100%;
            height: 52px;

            border: none;
            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #6046dc
                );

            color: white;

            font-weight: 800;

            cursor: pointer;

            transition: .3s;

            box-shadow:
                0 15px 35px
                rgba(
                    124,
                    92,
                    255,
                    .18
                );
        }

        .login-button:hover {
            transform:
                translateY(-3px);

            box-shadow:
                0 20px 45px
                rgba(
                    124,
                    92,
                    255,
                    .28
                );
        }

        .error-box {
            padding: 13px;

            border:
                1px solid rgba(
                    244,
                    63,
                    94,
                    .2
                );

            border-radius:
                10px;

            background:
                rgba(
                    244,
                    63,
                    94,
                    .07
                );

            color: #fda4af;

            font-size: 12px;

            margin-bottom: 20px;
        }

        .security {
            text-align: center;

            color: #5f6573;

            font-size: 11px;

            margin-top: 25px;
        }

        @media (
            max-width: 500px
        ) {

            .login-card {
                padding:
                    30px 22px;
            }

        }

    </style>

</head>

<body>

    <div class="grid"></div>

    <div class="orb"></div>
    <div class="orb2"></div>

    <div class="login-wrapper">

        <a
            href="{{ route('home') }}"
            class="back"
        >
            ← Back to Portfolio
        </a>

        <div class="login-card">

            <div class="logo">
                PORTFOLIO<span>.</span>
            </div>

            <h1>
                Welcome back.
            </h1>

            <p class="subtitle">
                Sign in to manage your
                portfolio content.
            </p>

            @if ($errors->any())

                <div class="error-box">

                    {{ $errors->first() }}

                </div>

            @endif

            <form
                method="POST"
                action="{{ route('admin.login.submit') }}"
            >

                @csrf

                <div class="field">

                    <label>
                        EMAIL ADDRESS
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@example.com"
                        required
                        autofocus
                    >

                </div>

                <div class="field">

                    <label>
                        PASSWORD
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>

                <div class="options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        Remember me

                    </label>

                </div>

                <button
                    type="submit"
                    class="login-button"
                >
                    Sign In →
                </button>

            </form>

            <div class="security">
                Private Portfolio Administration
            </div>

        </div>

    </div>

</body>
</html>