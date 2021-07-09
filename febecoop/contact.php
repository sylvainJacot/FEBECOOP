<?php

/**
 * Template Name: Contact
 * 
 * 
 */
get_header();
$place = get_sub_field('lieu');
?>
<style>

</style>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-b" id="contact-hero-section">
    <picture class="hero-section-type-waves-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/illu-wave-mobile.svg" alt="example" />
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
                <h1><span>
                        <?php if (get_field('titre_hero')) :
                            $maintitle = get_field('titre_hero');
                            $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                            echo $openmainttitle;
                        else : the_title();
                        endif; ?>
                    </span> </h1>
            </div>
            <div class="hero-section-pic-wrapper">
                <?php
                $image = get_field('illustration_hero');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            </a>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero'); ?></p>
    </div>
</div>



<!-- CONTACT FORM ==============
=========================== -->
<section class="formation-form-section form-section-type-a" id="contact-form-section">
    <div class="form-section-type-a-wrapper grid">

        <div class="form-type-a-header">
            <p class="form-type-a-title"><?php the_field('titre_formulaire'); ?></p>
        </div>
        <div class="form-wrapper-item form-wrapper-item-active">
            <?php echo FrmFormsController::get_form_shortcode(array('id' => 1, 'title' => false, 'description' => false)); ?>
        </div>


    </div>
</section>


<!-- MAP SECTION ==============
=========================== -->
<section class="contact-map-section">

    <aside class="map-aside">
        <div class="map-aside-wrapper grid">

            <?php if (have_rows('coordonees', 'option')) : ?>

                <?php while (have_rows('coordonees', 'option')) : the_row(); ?>

                    <div class="map-aside-coordonees-item">

                        <p class="map-aside-coordonees-item-province">
                            <?php the_sub_field('province'); ?>
                        </p>


                        <div class="map-aside-coordonees-item-coordonees">
                            <p><?php the_sub_field('addresse'); ?></p>
                            <p><?php the_sub_field('localite'); ?></p>
                            <p><span>T. </span><?php the_sub_field('telephone'); ?></p>
                            <a href="mailto:<?php the_sub_field('email'); ?>"><span>E. </span><?php the_sub_field('email'); ?></a>
                        </div>

                        <div class="map-aside-coordonees-item-routes-container">

                        <?php

                        $adress = get_sub_field('addresse');
                        $state = get_sub_field('localite');

                        $fulladress = $adress  . ' ' . $state;
                        $new_fulladress = str_replace(' ', '+', $fulladress);

                        ?>

                            <a class="item-route" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $new_fulladress; ?>&travelmode=driving" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/ic-drive.svg"></a>
                            <a class="item-route" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $new_fulladress; ?>&travelmode=transit" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/ic-transit.svg"></a>
                            <a class="item-route" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $new_fulladress; ?>&travelmode=bicycling" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/ic-bicycle.svg"></a>
                            <a class="item-route" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $new_fulladress; ?>&travelmode=walking" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/ic-walking.svg"></a>
                        

                            
                        </div>


                    </div>

                <?php endwhile; ?>

            <?php endif; ?>


        </div>
    </aside>

    <main class="map-wrapper">
    <?php            
    $_markers = get_field('emplacements');
    if(is_array($_markers)){
        echo '<div class="acf-map">';
        foreach($_markers as $value){
            
            $marker_location = $value['lieu']; // map marker data
            // $marker_description = $value['description']; // map marker description
        ?>

            <div class="marker" data-lat="<?php echo $marker_location['lat']; ?>" data-lng="<?php echo $marker_location['lng']; ?>">

            </div>
        <?php
        }
        echo '</div>'; // .acf-map
    } ?>

    </main>

</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

var icMarker = "<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/CONTACT/VECTOR/ic-marker.svg";

    (function($) {
    // generate map
    function new_map($el) {
        // var
        var $markers = $el.find('.marker');
        // vars
        var args = {
            zoom: 16,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles : [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#6195a0"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "hue": "#1800ff"
                        },
                        {
                            "lightness": "-9"
                        }
                    ]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "lightness": "10"
                        },
                        {
                            "saturation": "0"
                        },
                        {
                            "color": "#ffede9"
                        },
                        {
                            "gamma": "2.53"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "-3"
                        },
                        {
                            "gamma": "1.00"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural.terrain",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffbc77"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fcd5ce"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "color": "#4e4e4e"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#787878"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#cc614f"
                        },
                        {
                            "gamma": "2.57"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.airport",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#fce7cf"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.airport",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#0a00ff"
                        },
                        {
                            "saturation": "-77"
                        },
                        {
                            "gamma": "0.57"
                        },
                        {
                            "lightness": "0"
                        },
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.rail",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#f99f36"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.rail",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#ff6c00"
                        },
                        {
                            "lightness": "4"
                        },
                        {
                            "gamma": "0.75"
                        },
                        {
                            "saturation": "-68"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#eaf6f8"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#938cd7"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "lightness": "-49"
                        },
                        {
                            "saturation": "-53"
                        },
                        {
                            "gamma": "0.79"
                        }
                    ]
                }
            ]
        };
        // create map	        	
        var map = new google.maps.Map($el[0], args);
        // add a markers reference
        map.markers = [];
        // add markers
        $markers.each(function() {
            add_marker($(this), map);
        });
        // center map
        center_map(map);
        return map;
    }
    // add the marker
    function add_marker($marker, map) {
        // var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            icon: icMarker,
            map: map,
        });
        // add to array
        map.markers.push(marker);
        // if marker contains HTML, add it to an infoWindow
        if ($marker.html()) {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });
            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
        }
    }
    // center the map
    function center_map(map) {
        // vars
        var bounds = new google.maps.LatLngBounds();
        // loop through all markers and create bounds
        $.each(map.markers, function(i, marker) {
            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
            bounds.extend(latlng);
        });
        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else {
            // fit to bounds
            map.fitBounds(bounds);
        }
    }
    // embed it
    var map = null;
    $(document).ready(function() {
        $('.acf-map').each(function() {
            // create map
            map = new_map($(this));
        });
    });
})(jQuery);
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDo77UBqCntbsSfn1gkYyRwuqgjToez-5A"></script>

<?php
get_footer();
?>

