<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>[title_page]</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        $(document).ready(function(){

            //Check to see if the window is top if not then display button
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });

            //Click event to scroll to top
            $('.scrollToTop').click(function(){
                $('html, body').animate({scrollTop : 0},800);
                return false;
            });

        });
    </script>
</head>
<body>
<header>
    [navigation]
</header>
<div class="row">
    <section class="col-md-12">
        <div class="container">
            <article class="jumbotron">
                <h1>[title]</h1>
                [messages]
                <div>[description]</div>
            </article>
            <section>
                [additional_content]
            </section>
        </div>
    </section>
</div>
<a href="#" class="scrollToTop">Scroll To Top</a>
</body>
</html>