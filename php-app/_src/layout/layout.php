<style>
    #app > *{
        padding: 0px 10vw;
    }

    #app > main{
        min-height: calc(100vh - 176.5px);
    }

</style>

<div id="app">
    <?php include __DIR__ . '/header/header.php' ?>

    <main>
        <?php include __DIR__ . '/main/main.php' ?>
    </main>
    
    <?php include __DIR__ . '/footer/footer.php' ?>
</div>