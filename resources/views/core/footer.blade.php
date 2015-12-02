<!-- Footer -->
<section id="footer">
    <div class="container"> <header class="major">
            <h2>Vote!</h2>
        </header>
        <form method="post" action="#">
            <div class="row uniform">
               <div class="12u$(large)">
                    <input type="email" name="inputEmail" id="inputEmail" placeholder="OK Email" />
                </div>
                <div class="12u$">
                    <ul class="actions">
                        <li><input id="submitVoteBtn" type="submit" value="Submit Vote" class="special" /></li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="/js/main.js"></script>
<script>$(function() {
    $('#submitVoteBtn').on('click', function(e) {
        e.preventDefault();
        $(this).attr("disabled", true);
        var feather = $('input:radio[name=inputFeather]:checked').val();
        var heavy = $('input:radio[name=inputHeavy]:checked').val();
        var email = $('#inputEmail').val();
        var btn = $(this);
        var _token = "{{ csrf_token() }}";
        if (!feather || !heavy)
        {
            swal({   title: "Error!",   text: "Please choose your pick for both the feather weight and heavy weight categories.",
                type: "error",
                confirmButtonText: "Got it!" });
            $(this).attr("disabled", false);
        }
        else if (email == "") {
            swal({   title: "Error!",   text: "Please enter the email address you use with the OK auto-grader.",
                type: "error",
                confirmButtonText: "Got it!" });
            $(this).attr("disabled", false);
        }
        else {
            $.ajax({
                        "url": "{{ route("submitvote") }}",
                        "method": "POST",
                        "data": {"inputEmail": email, "inputFeather": feather, "inputHeavy": heavy, "_token": _token}
                    })
                    .success(function (received) {
                        btn.attr("disabled", false);
                        if (received == 1) {
                            swal({   title: "Error!",   text: "You have already cast your vote!",
                                type: "error",
                                confirmButtonText: "Ok" });
                        }
                        else if (received == 2) {
                            swal({   title: "Error!",   text: "That email doesn't appear to be in enrolled in the course. (Use your OK email)",
                                type: "error",
                                confirmButtonText: "Ok" });
                        }
                        else {
                            swal({   title: "Wahoo!",   text: "Your vote was cast and recorded successfully!",
                                type: "success",
                                confirmButtonText: "Ok" });
                        }
                    });
        }
    });
});
@yield('js')
</script>
</body>
</html>