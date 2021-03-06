<html>
<head>
    <title>@yield('title')</title>
    <style>
        body { font-size:12pt; color:#3d4852; margin:5px; }
        h1 { font-size:50px; text-align:right; color:#f6f6f6; margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
        ul { font-size:12pt; }
        hr { margin:25px 100px; border-top: 1px dashed #ddd; }
        .menutitle { font-size:14pt; font-weight:bold; margin:0px; }
        .content { margin:10px;}
        .footer { text-align:right; font-size:10pt; margin:10px; border-bottom:solid 1px #ccc; color:#ccc; }
        th {font-size:8pt; background-color:#5a6268; color:#fff; padding:5px 10px;}
        td {font-size:8pt; border: solid 1px #aaa; color:#4e555b; padding:5px 10px}
        A {color:#1b4b72; padding:5px 10px}
        input[type="text"],
        textarea {
            padding: 0.8em;
            outline: none;
            border: 1px solid #DDD;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            font-size: 16px;
        }
        textarea {
            width: 300px;
        }
        input[type="text"]:focus,
        texture:focus {
            box-shadow: 0 0 7px #3498db;
            border: 1px solid #3498db;
        }
        input {
            border-radius: 0;
            background: -moz-linear-gradient(top, #FFF 0%, #EEE);
            background: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#EEE));
            border: 1px solid #DDD;
            color: #111;
            padding: 10px 30px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        input:hover {
            background: -moz-linear-gradient(top, #EFEFEF 0%, #EEE);
            background: -webkit-gradient(linear, left top, left bottom, from(#EFEFEF), to(#EEE));
        }
    </style>
</head>

<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <ul>
        <p class="menutitle">※メニュー</p>
        <li>@show</li>
        <!-- showでsectionの終わりを指定する -->
    </ul>

    <hr size="1">
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>
