
// get geojson
async function getCountryData(countryCode) {
    const response = await fetch('https://raw.githubusercontent.com/johan/world.geo.json/master/countries/' + countryCode + '.geo.json');
    return await response.json();
}

// load geoJSON data to map
export async function loadCountryData(map, countryCode, oldLayer) {
    if (oldLayer != undefined) {
        map.removeLayer(oldLayer);
    }
    
    const data = await getCountryData(countryCode);
    
    const geoJsonLayer = await L.geoJSON(data, {
        style: {
            color: 'blue',
            weight: 1.5,
            opacity: 1
        }
    }).addTo(map);

    map.fitBounds(L.geoJSON(data).getBounds());

    return geoJsonLayer;
}

export function getLeafletModule(container, mapUrl, withWorld) {
    const map = L.map(container).setView([51.5050, 10.09], 4);

    if (withWorld) {
        L.tileLayer(mapUrl, {
            minZoom: 3,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    } else {
        L.rectangle([
            [-90, -180],
            [90, 180]
        ], {
            fillColor: '#f0f0f0',
            fillOpacity: 1
        }).addTo(map);
    }

    return map;
}