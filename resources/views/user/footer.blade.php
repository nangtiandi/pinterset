
<footer class="footer pt-5 pb-5 text-center">

    <div class="container">

        <div class="socials-media">

            <ul class="list-unstyled">
                <li class="d-inline-block ml-1 mr-1"><a href="https://facebook.com" class="text-dark" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://twitter.com" class="text-dark" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://instagram.com" class="text-dark" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://google.com" class="text-dark" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://linkedin.com" class="text-dark" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://youtube.com" class="text-dark" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul>

        </div>
        <p>©  <span class="credits font-weight-bold">
            <a target="_blank" class="text-dark" href="https://github.com/nangtiandi"><u>Development</u> by Laravel Developer.</a>
          </span>
        </p>


    </div>

</footer>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/theme.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    let photoUpload = document.getElementById('photoUpload');
    let photoInput = document.getElementById('photoInput');
    let photoForm = document.getElementById('photoForm');
    photoUpload.addEventListener('click', ()=>{
        photoInput.click();
    })
    photoInput.addEventListener('change',()=>{
        photoForm.submit();
    });
</script>
</body>

</html>
