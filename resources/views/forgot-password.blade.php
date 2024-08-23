@php

$id = $data['id'];

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: 'Helvetica';
        }

        .button {
            cursor: pointer;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 14px;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .primary-button {
            background-color: rgb(0, 102, 204);
            color: white;
        }

        .primary-button:hover {
            background-color: rgb(0, 102, 204, 0.85);
        }
    </style>
</head>

<body>
    <div>
        Hi,
    </div>
    <br>
    <div>
        Please click the button below to set the new password for your account.
    </div>
    <br>
    <div>
        <a href="https://metz.dotlinkertech.com/forgot_password/{{ $id }}"><button id="button-submit" type="button" class="mark button primary-button">Reset Password</button></a>
    </div>
    <br>
    <div>
        <p>
            Regards,
        </p>
        <p>
         Bali Business Club
        </p>
    </div>
</body>

</html>

