<!DOCTYPE html>


<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- DATA TABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        @font-face {
            font-family: header;
            src: url("../fonts/Ailerons-Typeface.otf");
        }

        @font-face {
            font-family: texts;
            src: url("../fonts/Renner_ 400 Book.ttf");
        }

        @font-face {
            font-family: navBarFont;
            src: url("../fonts/Kiona-Regular.ttf");
            font-style: bold;
        }

        h1 {
            font-family: header;
            font-size: 70px;
            color: #373737;
        }

        a {
            font-family: navBarFont;
            font-size: 25px;
            color: #868B8E;
            font-style: bold;
        }


        h2 {
            font-family: navBarFont;
            font-size: 30px;
            color: white;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        h5 {
            font-family: navBarFont;
            font-size: 20px;
            color: white;
        }

        .enterbutton {
            width: 20%;
            background-color: grey;
            border: none;
            color: white;
            padding: 14px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 8px 0;
            margin-left: 75%;
            margin-top: 5%;
            cursor: pointer;
            border-radius: 4px;
            transition: 0.5s;
        }

        .button {
            width: 82.5%;
            background-color: white;
            border: 1px solid #ccc;
            color: white;
            padding: 14px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 8px 0;
            cursor: pointer;
            border-radius: 4px;
            transition: 0.5s;
        }


        .button:hover {
            background-color: grey;
            transition: 0.5s;
        }

        h5 {
            font-family: navBarFont;
            font-size: 20px;
            color: white;
        }

        table {
            width: 70%;
            color: black;
            margin-left: 10%;
            margin-top: 2.5%;
        }

        table,
        tr,
        td {
            padding: 10px;
        }

        input[type=submit] {
            width: 20%;
            background-color: grey;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            margin-top: 5%;
            margin-left: 55%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .tablecust {
            font-family: texts2;
            font-size: 15px;
            color: #373737;
        }
    </style>
</head>

<body>