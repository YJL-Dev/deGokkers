<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../images/logojustincase.ico">
        <title>Brostrisch</title>
    </head>
    <body>

    <!--|=========================================================================|
        |   Header                                                                |
        |=========================================================================|-->

        <header>
            <ul class="row-spaced">
                <li>
                    <a href="#register">Register</a>
                </li>
                <li>
                    <a href="#download">Download</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
            </ul>
            <img src="../images/websiteheaderbar.png" alt="websiteheaderbar">
        </header>

    <!-- End of the Header! -->

    <!--|=========================================================================|
        |   Video                                                                 |
        |=========================================================================|-->

        <div class="video">
            <h1>BROSTRISCH</h1>
            <iframe src="https://www.youtube.com/embed/SP-lrqa5cd8" allowfullscreen></iframe>
            <h4>Download Now!</h4>
        </div>

    <!-- End of the Video! -->

    <!--|=========================================================================|
        |   Main                                                                  |
        |=========================================================================|-->

        <div class="main" id="download">
            <div class="download-section row-spaced">
                <div class="image-left-download">
                    <img src="../images/imgOstrichDownload.png" alt="imgOstrichDownload">
                </div>
                <div class="right-content-download">
                    <p>You must be logged in to download the program</p>
                    <a href="../app/Application/Application.zip">DOWNLOAD</a>
                    <p>By downloading you agree to our terms of service</p>
                    <h2>Website &#38; Program</h2>
                    <h2>Made by Youssef, Jarno &#38; Lennard.</h2>
                </div>
            </div>
            <div class="about-section" id="about">
                <h3>ABOUT</h3>
                <div class="bottom-content-about row-spaced">
                    <div class="left-content-about">
                        <img src="../images/imgOstrichAbout.png" alt="imgOstrichAbout">
                    </div>
                    <div class="right-content-about">
                        <p>Brostritch is een schoolproject</p>
                        <p>gemaakt door Youssef, Jarno &#38; Lennard.</p>
                        <p>We moesten binnen 7 weken</p>
                        <p>het programma af hebben</p>
                        <p>en een promotie pagina hebben.</p>
                        <p>Bekijk onze video voor het programma uitleg.</p>
                    </div>
                </div>
            </div>
        </div>

    <!-- End of the Main! -->

    <!--|=========================================================================|
        |   Register and login                                                    |
        |=========================================================================|-->

        <div class="registerAndLogin" id="register">
            <h3>REGISTER</h3>
            <form action="#">
                <div class="wrapper">
                    <label>Voornaam:</label>
                    <input type="text">
                    <label>Achternaam:</label>
                    <input type="text">
                    <label>Gebruikersnaam:</label>
                    <input type="text">
                    <label>E-mailadres:</label>
                    <input type="email">
                    <label>Wachtwoord:</label>
                    <input type="password" autocomplete="off">
                </div>
                <div class="button">
                    <button type="submit">Registreren</button>
                </div>
            </form>
        </div>
        <div class="registerAndLogin">
            <h3>LOGIN</h3>
            <form action="#">
                <div class="wrapper">
                    <label>Gebruikersnaam:</label>
                    <input type="text">
                    <label>Wachtwoord:</label>
                    <input type="password">
                </div>
                <div class="button">
                    <button type="submit">Inloggen</button>
                </div>
            </form>
        </div>

    <!-- End of the Register and Login! -->

    <!--|=========================================================================|
        |   Footer                                                                |
        |=========================================================================|-->

        <footer>
            <a href="404.php">TOS</a>
            <p>Contact: YJLDEV@gmail.com</p>
            <h6>&#169; YJL Development 2017</h6>
        </footer>

    <!-- End of the whole website! -->

    </body>
</html>