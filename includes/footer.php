<footer id="main-footer" class="text-center p-4">
    <div class="container ">
        <div class="row">
            <div class="col">
                <p>Copyright &copy; <span id="year"></span> Fermed</p>
            </div>
        </div>
    </div>    
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
<script src="node_modules/lightbox2/dist/js/lightbox.js"></script>
        <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="scripts/venobox.min.js"></script>

<script>
    $('#year').text(new Date().getFullYear());
</script>

<script>
$(document).ready(function () {
    var $container = $("#row");

    $container.imagesLoaded(function () {
        $container.masonry();
    });
});
</script>
<script>
    $(document).ready(function(){
        $('.venobox').venobox({
           overlayColor:'rgba(10,8,0,0.9)' 
        }); 
    });
</script>
