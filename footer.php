</main>
<footer class="text-center bg-dark text-white">
    Copyright <span>&copy;</span><a href="#">AHMAD & TAYYAB </a>For FYP only.
</footer>
</div>




<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/vendor/bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
<script src="assets/js/aos.js"></script>
<script>
    AOS.init({
        offset: 300,
        duration: 1000
    });
</script>
<script>
    $(function() {
        $(document).scroll(function() {
            var $nav = $("#main-nav");
            $nav.toggleClass("scroll", $(this).scrollTop() > $nav.height());
        });
    });
</script>
</body>

</html>