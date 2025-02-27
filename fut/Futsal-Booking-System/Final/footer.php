    
    <link rel="stylesheet" href="">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oxygen', sans-serif;
        }

        body {
            line-height: 1.5;
        }

        .container-f {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .footer {
            background-color: black;
            padding: 70px 0;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: white;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #32a84e;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }

        /* Responsive */
        @media(max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media(max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }
    </style>

    <footer class="footer">
        <div class="container-f">
            <div class="row">
                <div class="footer-col">
                    <h4>Users Policy</h4>
                    <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Connect Us</h4>
                    <div class="social-links">
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Stay Connected</h4>
                    <ul>
                        <li><a>Kathmandu, Nepal</a></li>
                        <li><a>+977 9888888888</a></li>
                        <li><a>fut@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>