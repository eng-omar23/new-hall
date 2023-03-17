

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    * {
        margin: 0;
        padding: 0;
        overflow: hidden;
        box-sizing: border-box;
    }

    body {
        height: 100%;
        width: 100%;


    }

    label {
        top: 45%;
        left: 60%;
        position: relative;
        font-size: 25px;
        color: #7d2ae8;
        cursor: pointer;
    }

    label input {

        position: absolute;
        opacity: 0;
    }

    .input-check {
        position: relative;
        display: inline-block;
        top: 5px;
        width: 30px;
        height: 30px;
        border: 2px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
        transition: .5s;

    }

    label input:checked~.input-check {
        background: #7d2ae8;
        border-color: #7d2ae8;
        animation: animate .7s ease;
    }

    @keyframes animate {
        0% {
            transform: scale(1)
        }

        40% {
            transform: scale(1.3, .7)
        }

        55% {
            transform: scale(1)
        }

        70% {
            transform: scale(1.2, .8)
        }

        80% {
            transform: scale(1)
        }

        90% {
            transform: scale(1)
        }

        100% {
            transform: scale(1.2, .9)
        }

    }

    .input-check::before {
        content: "";
        position: absolute;
        width: 15px;
        height: 6px;
        top: 6px;
        left: 4px;
        border-bottom: 4px solid #fff;
        border-left: 4px solid #fff;
        transform: scale(0) rotate(-45deg);
        transition: .5s;

    }

    label input:checked~.input-check::before {
        transform: scale(1) rotate(-45deg);
    }



    .container {
        display: flex;
        align-item: center;
        justify-content: center;
        position: absolute;
        top: 45%;
        left: 23%;
        transform: translate(-50%, -50%);
    }

    .imag {
        border-radius: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="imag">
                <img src="image/h6.jpg" height=450%; width=450; alt="">
            </div>

        </div>

    </div>

    <div>
        <label>
            <input type="checkbox">
            <span class="input-check"></span>
            Aircondition
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
            <input type="checkbox">
            <span class="input-check"></span>
            Aircondition
        </label>
    </div>
<!-- hnh -->


</body>

</html>