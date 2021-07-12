// Initialize and add the map
function initMap() {
    const gtyv = { lat:19.201068598176334, lng:-96.16024504012898};
// The map
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: gtyv,
    });
    const marker = new google.maps.Marker({
        position: gtyv,
        map: map,
        title:"Gestión Tecnologica y Vinculación"
    });
}
