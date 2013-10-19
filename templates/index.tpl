<!DOCTYPE HTML>
<html>
    <head>
        <base href="{$base_href}"/>
        <title>Giftify | Gift Exchanges Made Easy</title>
        <link rel="stylesheet" type="text/css" href="/css/css.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/css/picker.css" media="screen" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="/js/parsley.js"></script>
        <script src="/js/picker.js"></script>
        <script src="/js/picker.date.js"></script>
        <script src="/js/picker.time.js"></script>
        <script src="/js/misc.js"></script>
    </head>
    <body>
        <header>
            {$navigation}
            <section id="headline">
                <h1>{$title}</h1>
            </section>
        </header>

        <article id="wrapper">
           {$content}
        </article>
        {$footer}
    </body>
</html>