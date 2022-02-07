
<footer class="footer pt-5 pb-5 text-center">

    <div class="container">

        <div class="socials-media">

            <ul class="list-unstyled">
                <li class="d-inline-block ml-1 mr-1"><a href="https://www.facebook.com/profile.php?id=100062814686150" class="text-dark" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://twitter.com/NangTian1" class="text-dark" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://instagram.com" class="text-dark" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://www.linkedin.com/in/nangtiandi/" class="text-dark" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li class="d-inline-block ml-1 mr-1"><a href="https://youtube.com" class="text-dark" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul>

        </div>
        <p>©  <span class="credits font-weight-bold">
            <a target="_blank" class="text-dark" href="https://github.com/nangtiandi/pinterset"><u>Development</u> by Laravel Developer.</a>
          </span>
        </p>
        <p class="credits font-weight-bold"><a href="{{route('policy')}}">Read terms & policy</a></p>
    </div>

</footer>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/theme.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    let cardPin =  document.querySelectorAll('.card-pin');
    let aaa = document.querySelectorAll('.aaa');
    aaa.forEach((el)=>{
        el.addEventListener('click',()=>{
            let current_id = el.getAttribute('category_id');
            cardPin.forEach((cp)=>{
                cp.classList.add('d-none');
            })
            document.querySelectorAll(`[cat="${current_id}"]`).forEach((c)=>{
                c.classList.remove('d-none');
            })
        })
    })

    let photoUpload = document.getElementById('photoUpload');
    let photoInput = document.getElementById('photoInput');
    let photoForm = document.getElementById('photoForm');
    photoUpload.addEventListener('click', ()=>{
        photoInput.click();
    })
    photoInput.addEventListener('change',()=>{
        photoForm.submit();
    });
    @if(session('toast'))
    let sessionInfo = @json(session('toast'));
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: sessionInfo.icon,
        title: sessionInfo.title
    })
    @endif

</script>
</body>

</html>
