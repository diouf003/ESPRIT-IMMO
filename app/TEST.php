<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <title>Page d'accueil</title>
</head>

<body>


    <div class="container" style="  position: relative; 
    height: 200vh;
    width: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url('images/bg4.jpg');
    background-size: cover;
    background-position: center;
    
    padding: 0 8%;">
        <nav style="display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                padding: 5px 0; width: 40px;
                cursor: pointer; width: 38%;">
            <img src="img/wanen_white.png" alt="" class="logo" style=" width: 120px; height: 100px; cursor: pointer;padding: 20px; background-position-y: 5px; flex-grow: 1;" />
            <ul style="display: flex;
                    justify-content: flex-end;
                    flex: 1;
                    padding-right: 40px;
                    text-align: right;
                    list-style-type: none;">
                <li style="margin-right: 10px;"><a style="position: relative;
                    padding: 10px 20px;
                    text-decoration: none;
                    color: #fff;
                    font-size: 16px;" href="#">Accueil</a></li>
                <li style="margin-right: 10px;"><a style="position: relative;
                padding: 10px 20px;
                text-decoration: none;
                color: #fff;
                font-size: 16px;" href="{{route('home')}}">Se connecter</a></li>
                <li style="margin-right: 10px;"><a style="position: relative;
                    padding: 10px 20px;
                    text-decoration: none;
                    color: #fff;
                    font-size: 16px;" href="#">S'inscrire</a></li>
                <li style="margin-right: 10px;"><a style="position: relative;
                    padding: 10px 20px;
                    text-decoration: none;
                    color: #fff;
                    font-size: 16px;" href="">Contact</a></li>
            </ul>
            <img src="img/bg4.jpg" alt="" class="cart" />
        </nav>

        <section class="site-container" style="position: absolute;
                    bottom: 10%;
                    color: #fff;">
            <p style="font-size: 50px;
    font-weight: bold;">Bienvenu à</p>
            <h1 style=" font-size: 120px;
    line-height: 120px;
    margin-left: -10px;
    color: transparent;
    -webkit-text-stroke: 1px white;
    background: url('images/pattern.png');
    -webkit-background-clip: text;
    background-clip: text;
    background-position: 0 0;
    animation: animate 20s linear 2s infinite alternate;">NDIKINIMEKI</h1>
            <h4 style="font-size: 40px;
    font-weight: 500;">EN APESANTEUR, VENEZ PROFITER DU CALME DE CHEZ NOUS...</h4>

            <div class="row" style=" display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 40px;">
                <a style="display: flex;
    align-items: center;
    padding: 5px 20px;
    text-decoration: none;
    color: #fff;
    border: 1px solid #fff;
    margin-right: 40px;
    font-size: 18px;
    transition: 0.3s;background-color: #fff;
    color: #000;" href="#">Prendre un rendez-vous</a>
                <a style="display: flex;
    align-items: center;
    padding: 5px 20px;
    text-decoration: none;
    color: #fff;
    border: 1px solid #fff;
    margin-right: 40px;
    font-size: 18px;
    transition: 0.3s;background-color: #fff;
    color: #000;" href="#">Voir les sites <span style="font-size: 15px;
    font-weight: bold;
    line-height: 2;
    margin-left: 10px;">&#x27f6</span></a>
                <span style="font-size: 18px;">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.<br />
                    Nemo impedit eaque odit quaerat ullam quidem?
                </span>
            </div>
        </section>

        <section class="social-icons" style=" position:absolute;
    right: 30%;
    bottom: 5%; ">
            <a href="#"><img style="height: 60px; width: 60px;" src="img/github-fill.png" alt=""></a>
            <a href="#"><img style="height: 60px; width: 60px;" src="img/instagram-fill.png" alt=""></a>
            <a href="#"><img style="height: 60px; width: 60px;" src="img/telegram-fill.png" alt=""></a>
            <a href="https://drive.google.com/file/d/1u2ZQxyamKsgJ4JxO-kYbytfxaaEkOT_a/view?usp=sharing" target="_blank"><img style="height: 60px; width: 60px;" src="img/drive-fill.png" alt=""></a>
        </section>
    </div>
</body>

</html>