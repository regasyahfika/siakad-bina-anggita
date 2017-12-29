<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <span class="copyright text-muted">&copy; 2017 SKABA - Sekolah Khusus Autis Bina Anggita</span><br>

     </div>
    </div>
  </div>
</footer>

@yield('footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('user/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Contact form JavaScript -->
<script src="{{ asset('user/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('user/js/contact_me.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('user/js/agency.min.js') }}"></script>

<script>
    function initMap() {
      var myLatLng = {lat: -7.7970235, lng: 110.4079065};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: myLatLng
      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        animation: google.maps.Animation.DROP,
        title: 'Sekolah Khusus Autis Bina Anggita'
      });

      var ket = new google.maps.InfoWindow({
      content: '<h6>Sekolah Khusus Autis Bina Anggita</h6>' +
          '<p>Kanoman, Tegalpasar, BanguntapanBantul, Yogyakarta 55198</p>'
      });
      marker.addListener('click', function(){
        ket.open(map, marker);

      });

      marker.addListener('mouseout', function(){
        ket.close();
      });
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrvLKVLGqrXs1kyWg1-sBwFBBe59bnl_Y&callback=initMap">
</script>