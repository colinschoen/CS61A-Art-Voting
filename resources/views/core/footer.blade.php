<!-- Footer -->
<section id="footer">
    <div class="container"> <header class="major">
            <h2>Vote!</h2>
        </header>
        <form method="post" action="#">
            <div class="row uniform">
               <div class="12u$(large)">
                    <input type="email" name="email" id="email" placeholder="OK Email" />
                </div>
                <div class="12u$">
                    <ul class="actions">
                        <li><input type="submit" value="Submit Vote" class="special" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <footer>
        <ul class="icons">
            <strong><li><a href="http://github.com/colinschoen/CS61A-Art-Voting" target="_blank" class="icon alt fa-github"><span class="label">Github</span></a></li></strong>
        </ul>
        <ul class="copyright">
            <strong><li>&copy; CS61A @ UC Berkeley</li><li>Design Adapted From HTML5 UP</li></strong>
        </ul>
    </footer>
</section>

<!-- Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.scrollex.min.js"></script>
<script src="/js/jquery.scrolly.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/util.js"></script>
<!--[if lte IE 8]><script src="/js/ie/respond.min.js"></script><![endif]-->
<script src="/js/main.js"></script>
$(function() {
    @yield('js')
});
</body>
</html>