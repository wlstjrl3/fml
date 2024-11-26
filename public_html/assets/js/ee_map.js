var mapContainer = document.getElementById('kakaoMap');
var mapOptions = {
    center: new daum.maps.LatLng(37.362, 126.973),
    level: 3
};

var map = new daum.maps.Map(mapContainer, mapOptions);
iwPosition = new daum.maps.LatLng(37.3621707, 126.9736979), //인포윈도우 표시 위치입니다
//iwPosition2 = new daum.maps.LatLng(37.361, 126.9698), //인포윈도우 표시 위치입니다
iwRemoveable = true; // removeable 속성을 ture 로 설정하면 인포윈도우를 닫을 수 있는 x버튼이 표시됩니다

// 인포윈도우를 생성하고 지도에 표시합니다
var infowindow = new daum.maps.InfoWindow({
    map: map, // 인포윈도우가 표시될 지도
    position : iwPosition, 
    content : '<div class="customoverlay"><b>아론의 집</b><p>경기도 의왕시 원골로 66</p></div>',
    removable : iwRemoveable
});
/*var infowindow2 = new daum.maps.InfoWindow({
    map: map, // 인포윈도우가 표시될 지도
    position : iwPosition2, 
    content : '<div class="customoverlay"><b>가톨릭교육문화회관</b><p>경기도 의왕시 원골로 48</p></div>',
    removable : iwRemoveable
});*/