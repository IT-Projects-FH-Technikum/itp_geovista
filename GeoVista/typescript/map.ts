import L from 'leaflet'; 
import 'leaflet/dist/leaflet.css';

document.addEventListener('DOMContentLoaded', () => {
    const map: L.Map = L.map('map').setView([50.0000, 9.0000], 4);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    }).addTo(map);


    /*
    const imageUrl = 'https://i.pinimg.com/736x/d0/4f/c7/d04fc7a34418953ad96bbdac77135762.jpg';
    const imageBounds = L.latLngBounds(
        L.latLng(5, -100),
        L.latLng(72, 45)
    );

    L.imageOverlay(imageUrl, imageBounds, {
        opacity: 1,
        interactive: false
    }).addTo(map);
    */
});