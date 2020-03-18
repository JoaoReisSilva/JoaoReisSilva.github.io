<div id="contacts-page-map" class="contacts-page-map">
    <div class="contacts-page-dots">
      <div class="contacts-page-dots__item contacts-page-dots__item_left"></div>
      <div
        class="contacts-page-dots__item contacts-page-dots__item_right"
      ></div>
      <div class="contacts-page-dots__item contacts-page-dots__item_top"></div>
      <div
        class="contacts-page-dots__item contacts-page-dots__item_bottom"
      ></div>
    </div>
</div>

<script
  async
  type="text/javascript"
  charset="utf-8"
  src="https://api-maps.yandex.ru/2.1/?lang=ru-RU&apikey=31058a4a-6fc1-4379-b4f3-8a7eac106223&mode=release"
  onload="ymapsHandler()"
></script>

<script>
    function ymapsHandler() {
      "use strict";
      ymaps.ready(function() {
        var myMap = new ymaps.Map("contacts-page-map", {
            center: [59.985462, 30.342458],
            zoom: 15,
            controls: []
          }),
          myPlacemark = new ymaps.Placemark(
            [59.985462, 30.342458],
            {
              hintContent:
                "Санкт-Петербург, пр. Лесной 63, Бизнес-центр «Лесной 63», оф. 321",
              balloonContent:
                "Санкт-Петербург, пр. Лесной 63, Бизнес-центр «Лесной 63», оф. 321"
            },
            {
              iconLayout: "default#image",
              iconImageHref: "<?php echo get_template_directory_uri(); ?>/assets/img/placemark.png",
              iconImageSize: [78, 110],
              iconImageOffset: [-39, -110]
            }
          );

        myMap.geoObjects.add(myPlacemark);
      });
    }
</script>