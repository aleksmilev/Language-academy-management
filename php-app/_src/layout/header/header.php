<style> <?php include __DIR__ . '/style.css' ?> </style>

<header>
    <div>
        <a href="/">
            <?php Modules::ImageModule()->Load_Image(__DIR__ . '/logo.jpeg') ?>
        </a>
    </div>

    <nav>
        <a href="/courses/list">Нашите курсове</a>
        <a href="/about_us">За нас</a>
        <?php
        
            if(Modules::AuthModule()->Login_Chack()){
                echo '<a href="/profile/info">Профил</a>';
                echo '<a href="/profile/logout">Изход</a>';
            }else{
                echo '<a href="/profile/login">Вход</a>';
                echo '<a href="/profile/register">Регистрация</a>';
            }

        ?>
    </nav>
</header>