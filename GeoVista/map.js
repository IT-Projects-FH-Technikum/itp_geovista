var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
(function (factory) {
    if (typeof module === "object" && typeof module.exports === "object") {
        var v = factory(require, exports);
        if (v !== undefined) module.exports = v;
    }
    else if (typeof define === "function" && define.amd) {
        define(["require", "exports", "leaflet", "leaflet/dist/leaflet.css"], factory);
    }
})(function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    const leaflet_1 = __importDefault(require("leaflet"));
    require("leaflet/dist/leaflet.css");
    document.addEventListener('DOMContentLoaded', () => {
        const map = leaflet_1.default.map('map').setView([50.0000, 9.0000], 4);
        leaflet_1.default.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
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
});
