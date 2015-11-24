</div><!-- site-content end div-->
<footer class="site-footer">

    <hr>
    <a href="http://validator.w3.org/check/referer">Validate HTML</a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">Validate CSS</a>
    <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
    <br>
    <a href="http://www.w3.org/2009/cheatsheet/">Cheatsheet</a>
    <a href="http://www.w3.org/TR/html5/">HTML5</a>
    <a href="http://www.w3.org/TR/html4/">HTML4</a>
    <a href="http://www.w3.org/Style/CSS/current-work">CSS3</a>
    <?php
        $numFiles   = count(get_included_files());
        $memoryUsed = memory_get_peak_usage(true);
        $loadTime   = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
    ?>
    <p>Time to load page: <?=round($loadTime, 4)?>. Files included: <?=$numFiles?>. Memory used: <?=round($memoryUsed)?>.</p>

</footer>
</body>
</html>
