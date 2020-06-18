$(document).ready(function () {
    var  progressList=$('.progress-list .progress-item-v2');
    var index = 0;

    function addClassNextChild() {
        if (index == progressList.length) return;
        progressList.eq(index++).show().addClass('animated fadeIn');
        window.setTimeout(addClassNextChild, 400);
    }
    addClassNextChild();



    $(".progress-item-v2 a").each(function(){
        var $this= $(this);
        $(this).animatedModal({
            modalTarget:'animatedModal',
            animatedIn:'slideInDown',
            animatedOut:'bounceOut',
            color:'#39BEB9',
            beforeOpen: function() {
                var bg=$this.find('img').attr('src');
                $(".modal-content").css({'background-image':'url('+bg+')'});
            },
            afterClose: function() {
                $(".thumb").hide();

            }
        });
    })

    setTimeout(function(){
        $('.progress-detail').addClass('active');

        setTimeout(function(){
            $('.buidling-progress-slider').addClass('active');
        },1000)
    },2000)

    $('.tl1').each(function(){
        $(this).timeline({
            openTriggerClass : '.read_more',
            startItem : '15/08/2012',
            closeText : 'x'
        });
    })


    $(window).scroll(function(){
        var top=$(window).scrollTop();

        //Header Fix
        //if(top>=$(window).height()-$('#navigation').height()){
        //    $('body').addClass('top-fixed-navigation');
        //}else{
        //    $('body').removeClass('top-fixed-navigation');
        //}

        //Map Parallax
        $("#google-map").css({'margin-top':top/2 + 'px'})
        //$('#contact-map-cavas').css({'margin-top':top/2 + 'px'})
    })

    //Search-Input
    $('#search-input').focus(function(){
        $('body').addClass('search-focus');
    })

    $('#search-input').blur(function(){
        $('body').removeClass('search-focus');
    })



    $('.site-submenu a').click(function(e){
        e.preventDefault();

        $('.site-submenu li').removeClass('active');
        $('.content-wrapper.active').removeClass('active');

        var $this=$(this);
        $this.parent().addClass('active');
        setTimeout(function(){
            $($this.attr('href')).addClass('active');


            $.backstretch([
                $($this.attr('href')).attr('data-image')
            ], {duration: 10000, fade: 750});
        },500);
    })


    $(".owl-carousel").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items:10, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0;
        itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
    });

    $(".owl-carousel .progress-item").click(function(e){
        e.preventDefault();
        $(".owl-carousel .progress-item.active").removeClass('active');
        $(this).addClass('active');

        //$.backstretch([
        //    $(this).data('image')
        //], {duration: 10000, fade: 750});
        $(".modal-content").css({'background-image':'url('+$(this).data('image')+')'})
        $('.progress-detail').removeClass('active');

        var html=$(this).find('.description').html();
        setTimeout(function(){
            $('.progress-detail').html(html);
            $('.progress-detail').addClass('active');
        },1000)
    })

    var owl = $(".owl-carousel").data('owlCarousel');

    $(this).find('.progress-next').click(function (e) {
        e.preventDefault();
        owl.next();
    })

    $(this).find('.progress-prev').click(function (e) {
        e.preventDefault();
        owl.prev();
    })


    //contactMap
    var mapStyles = [{featureType:'water',elementType:'all',stylers:[{hue:'#d7ebef'},{saturation:-5},{lightness:54},{visibility:'on'}]},{featureType:'landscape',elementType:'all',stylers:[{hue:'#eceae6'},{saturation:-49},{lightness:22},{visibility:'on'}]},{featureType:'poi.park',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-81},{lightness:34},{visibility:'on'}]},{featureType:'poi.medical',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-80},{lightness:-2},{visibility:'on'}]},{featureType:'poi.school',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-91},{lightness:-7},{visibility:'on'}]},{featureType:'landscape.natural',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-71},{lightness:-18},{visibility:'on'}]},{featureType:'road.highway',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:60},{visibility:'on'}]},{featureType:'poi',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-81},{lightness:34},{visibility:'on'}]},{featureType:'road.arterial',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:37},{visibility:'on'}]},{featureType:'transit',elementType:'geometry',stylers:[{hue:'#c8c6c3'},{saturation:4},{lightness:10},{visibility:'on'}]}];
    $('.contact-map').each(function () {
        var $this = $(this);
        var address = $this.data('address');

        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var myOptions = {
                    zoom: 14,
                    center: results[0].geometry.location,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    styles: mapStyles,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE,
                        position: google.maps.ControlPosition.LEFT_CENTER
                    },
                    scaleControl: false,
                    mapTypeControl: false
                }
                map = new google.maps.Map(document.getElementById("contact-map-cavas"), myOptions);

                setTimeout(function(){
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP,
                        icon: 'images/contact-marker.png'
                    });
                },2000)

            }
        });
    })
})