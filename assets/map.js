var layer = new L.StamenTileLayer("toner");
var map = new L.Map("map", {
    center: new L.LatLng(51.6520, 5.3668),
    zoom: 7,
    maxZoom: 17
});
map.addLayer(layer);

var locations = [
    ["BikeVision HQ", 51.2068347, 4.3959301],
    ["Coolblue", 50.9351329, 5.3360644],
    ["Coolblue", 50.8628121, 4.4310732],
    ["Coolblue Brussel", 50.8339166, 4.3567363],
    ["Coolblue", 50.8472017, 3.2689447],
    ["Coolblue Gent", 51.0712749, 3.7716837],
    ["Coolblue Wilrijk", 51.1596011, 4.3829435],
    ["Coolblue", 51.5543059, 5.0903479],
    ["Coolblue", 51.6904237, 5.3033499],
    ["Coolblue Rotterdam", 51.9236369, 4.4954596],
    ["Coolblue Eindhoven", 51.4253421, 5.4862812],
    ["Decathlon Antwerpen", 51.246997, 4.4171843],
    ["Decathlon", 51.073933, 3.7395966],
    ["Decathlon Kortrijk", 50.7998992, 3.2822667],
    ["Decathlon Sint-Truiden", 50.8139956, 5.1641858],
    ["Decathlon Maasmechelen", 50.9978988, 5.7065868],
    ["Decathlon", 52.0773703, 4.3138269],
    ["Decathlon Eindhoven", 51.4420536, 5.4766799],
    ["Decathlon Kerkrade", 50.854903, 6.0070534],
    ["Decathlon", 52.2185928, 6.8938614],
    ["Decathlon Apeldoorn", 52.2091939, 5.99552],
    ["Mantel Superstore Arnhem", 51.952465, 5.8849293],
    ["Mantel Superstore Arnhem", 51.952465, 5.8849293],
    ["Mantel Superstore Den Bosch", 51.7097013, 5.3336321],
    ["Mantel Superstore Utrecht", 52.1044985, 5.0594324],
    ["Mantel Superstore Rotterdam", 51.8966623, 4.5338],
    ["Bike Republic", 50.942186, 5.3285775],
    ["Bike Republic", 51.1026989, 5.537517],
    ["Bike Republic Boechout", 51.159499, 4.5105551],
    ["Bike Republic Antwerpen", 51.2109752, 4.3924469],
    ["Bike Republic Boortmeerbeek", 50.9669215, 4.5749245],
    ["Bike Republic Retie", 51.2749927, 5.080464],
    ["Bike Republic Leuven", 50.8916892, 4.6910661],
    ["Bike Republic Herentals", 51.1735381, 4.8194861],
    ["Bike Republic Laakdal", 51.0796922, 5.023333],
    ["Fietsenwinkel Bike Republic Diest - testcenter", 50.9989248, 5.0831394],
    ["A.S.Adventure", 51.2158012, 4.4043088],
    ["A.S.Adventure", 50.9635588, 5.4716764],
    ["A.S.Adventure", 50.8788324, 4.7051833],
    ["A.S. Adventure", 50.8730912, 3.6121323],
    ["A.S.Adventure Mechelen", 51.0391323, 4.459862],
    ["A.S.Adventure", 50.870346, 4.504125],
    ["A.S.Adventure", 50.9386022, 4.0365729],
    ["A.S.Adventure Schoten", 51.2655981, 4.4636857],
    ["A.S. Adventure", 51.2032292, 2.90291],
    ["A.S.Adventure", 51.1600446, 4.3829618],
    ["MyCityBike.be - Woluwe", 50.8639656, 4.4347328],
    ["MyCityBike - Drogenbos", 50.7953945, 4.31505],
    ["MyCityBike.be BXL", 50.8399585, 4.38267],
    ["MyCityBike.be - Zemst", 50.9939689, 4.4750776],
    ["Fietsen Mintjens", 51.3040818, 4.5683512],
    ["Re.Si. Bike", 51.1954307, 4.1800288],
    ["Lievens Velo's", 51.1249321, 4.9414656],
    ["Fietsenwinkel De Geus Edegem", 51.1545296, 4.4463125]
]

var blackIcon = L.icon({
    iconUrl: 'assets/images/marker.png',
    iconSize: [30, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
});

for (var i = 0; i < locations.length; i++) {
    marker = new L.marker([locations[i][1], locations[i][2]], { icon: blackIcon })
        .bindPopup(locations[i][0])
        .addTo(map);
}
