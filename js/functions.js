    
    var toggleMenu = document.querySelectorAll('.menuAside');
    var asideMobile = document.querySelector('.aside');

    for(var i = 0; i < toggleMenu.length; i++){
    toggleMenu[i].addEventListener('click', menuAction);
    }

    function menuAction(){
        if(asideMobile.classList.contains('hide')){
            asideMobile.classList.remove('hide');
        }else{
            asideMobile.classList.add('hide');
        }
    }

    let swiper = new Swiper ('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: true,
        },
      pagination: {
         el: 'swiper-pagination'
      }
    });

    $(function(){

        var myLat = $('.lat-user').html();
        var myLong = $('.long-user').html();

        $('li').each(function(){
            var coord_lat = $(this).find('.lat-user').html();
            var coord_long = $(this).find('.long-user').html();

            var distance = Math.round(getDistanceFromLatLonInKm(myLat,myLong,coord_lat,coord_long) * 100) / 100;
            $(this).find('.user-distancia').append(distance+'KM');
        });

    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2){
        var R = 6371;
        var dLat = deg2rad(lat2-lat1);
        var dLon = deg2rad(lon2,lon1);
        var a =
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) +
            Math.sin(dLon/2) * Math.sin(dLon/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        var d = R * c;
        return d;
    }
    function deg2rad(deg){
        return deg * (Math.PI/180)
    }

    });