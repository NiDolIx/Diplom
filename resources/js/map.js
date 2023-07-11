ymaps.ready(init);

function init() {
    let map = new ymaps.Map('map-container', {
        center: [52.603793559328714,39.583324219482385],
        zoom: 12
    });

    map.controls.remove('trafficControl'); // удаляем контроль трафика
    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
    map.controls.remove('rulerControl'); // удаляем контрол правил
    map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
}