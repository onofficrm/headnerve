/**
 * 맥락한의원 카카오맵 (홈 #maekrak_info)
 */
(function () {
    var el = document.getElementById('maekrak_kakao_map');
    if (!el || typeof kakao === 'undefined' || !kakao.maps) {
        return;
    }

    var address = el.getAttribute('data-address') || '';
    var title = el.getAttribute('data-title') || '맥락한의원';

    kakao.maps.load(function () {
        var defaultCenter = new kakao.maps.LatLng(37.5651, 126.9784);
        var map = new kakao.maps.Map(el, {
            center: defaultCenter,
            level: 3
        });

        var geocoder = new kakao.maps.services.Geocoder();

        geocoder.addressSearch(address, function (result, status) {
            if (status !== kakao.maps.services.Status.OK || !result.length) {
                return;
            }

            var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
            map.setCenter(coords);

            var marker = new kakao.maps.Marker({
                map: map,
                position: coords
            });

            var infowindow = new kakao.maps.InfoWindow({
                content: '<div class="maekrak-kakao-map-infowin"><strong>' + title + '</strong><br>' + address + '</div>'
            });
            infowindow.open(map, marker);
            kakao.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });
        });
    });
})();
