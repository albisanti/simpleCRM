@section('footer_section')
<!-- footer @s -->
<div class="nk-footer nk-footer-fluid bg-lighter">
    <div class="container-xl wide-lg">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2021 Dashboard. <a href="albertobisanti.tech">Software by Alberto Dev</a>
            </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="alert('On development')">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('js/bundle.js?ver=2.6.0')}}"></script>
<script src="{{asset('js/scripts.js?ver=2.6.0')}}"></script>
<!--<script src="{{asset('js/charts/chart-invest.js?ver=2.6.0')}}"></script>-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
@endsection
