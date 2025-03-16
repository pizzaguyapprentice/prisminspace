<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="icon" href="../img/logo.png">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <link rel ="stylesheet" href=" ../index/index.css"> -->
        <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">

        <style> 
            #grained{
                pointer-events: none;
            }
        </style>

    </head>
    <script src="../grained-master/grained.js"></script>
    <body>
        <?php
            include("../navbar/navbar.php");
        ?>
        

        <!-- Contains main body of content-->
        <div class="main">
            <div class="main-background" id="grained">
            
                <!-- Is the background of where cards are situated-->
                <div class="cardholder">
                    <div class="paragraph">
                        <div class="videoholder">
                            <h2 class="p-title">Welcome to: <span id="small-logo">PRISMINSPACE</span></h2>
                            <video class="banner" type="video/mp4" autoplay muted loop>
                                <source src="../img/backgroundbanner.mp4" type="video/mp4">
                            </video>
                            
                        </div>
                    
                        <p class="p-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur metus et massa congue, ut viverra magna venenatis. Nunc congue, tellus vulputate porta eleifend, turpis enim bibendum eros, at molestie nisi felis non lectus. Vestibulum semper sed neque eget mattis. Nulla a auctor quam, vel congue magna. Sed ac nunc et mi placerat vestibulum. Mauris nec malesuada libero. Ut consequat bibendum ante id ultricies. Maecenas consequat lorem sed elit luctus, sit amet vulputate sapien faucibus. Quisque ante velit, efficitur in ante vel, vulputate egestas turpis. Maecenas ut varius lectus. 
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <?php
            include("../footer/footer.php");
        ?>
       
    </body>

    <script>
        var options = {
        "animate": true,
        "patternWidth": 100,
        "patternHeight": 100,
        "grainOpacity": 0.3,
        "grainDensity": 2,
        "grainWidth": 1.5,
        "grainHeight": 1.5
        };
        grained('#grained',options);
    </script>
</html>

<?php
    //echo "It just works - Todd Howard does it";
?>
