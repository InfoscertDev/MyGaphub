<script>
window.onload = function(){
    var stage ='/mygaphub/releaseb';
    var stage ='/app'; 
    var canvas = document.getElementById('world-map'),
        context = canvas.getContext('2d');
    mapSprite = new Image();
    mapSprite.src = window.location.origin+stage+'/assets/images/worldmap.jpeg';

    generateMap(); 
    function generateMap(){ 
        mapSprite.onload = function(){
            context.drawImage(mapSprite, 0,0, 300, 150);
        }
    } 
    // Create a basic class which will be used to create a marker
    var Marker = function (XPos = 0, YPos = 0, percentage  = 0, text = '') {
        this.Sprite = new Image(); 
        this.Sprite.src = window.location.origin+stage+'/assets/icon/marker.png';
        this.Width = 12;
        this.Height = 20;
        this.XPos = XPos;
        this.YPos = YPos;
        this.text = text,
        this.percentage = percentage 
    }

    // Array of markers
    var Markers = new Array();
    Markers.push(north_america, south_america, europe, asia, africa, australia);
    // Check Global variable
    if (typeof global == 'undefined') return;

    var north_america = new Marker(30, 20, global.north_america,'N/America');
    var south_america = new Marker(60, 85, global.south_america,'S/America');
    var europe = new Marker(150, 20, global.europe,'Europe');
    var asia = new Marker(190, 36, global.asia,'Asia');
    var africa = new Marker(140, 60, global.africa,'Africa');
    var australia = new Marker(250, 90, global.australia,'Australia'); 
   
   function drawMarker(tempMarker){
       tempMarker.Sprite.onload = function(){ 
            setTimeout(()=> {
                context.drawImage(tempMarker.Sprite, tempMarker.XPos, tempMarker.YPos, tempMarker.Width, tempMarker.Height);
                // Calculate position text
                var markerText = `${tempMarker.percentage}% ${tempMarker.text}`;
                // Draw a simple box so you can see the position
                var textMeasurements = context.measureText(markerText);
                context.fillStyle = "#fefefe"; 
                context.globalAlpha = .9;
                context.fillRect(tempMarker.XPos - 12 ,tempMarker.YPos - 12,textMeasurements.width + 8, 16);
                // context.fillRect(tempMarker.XPos - (textMeasurements.width / 2), tempMarker.YPos - 20, textMeasurements.width, 20);
                context.globalAlpha = 1;  
                context.fillStyle = "#ED3237";
                context.fillText(markerText, tempMarker.XPos - 8 , tempMarker.YPos);
            }, 1000);
        } 
   }
   drawMarker(north_america); drawMarker(south_america);
   drawMarker(europe); drawMarker(asia);
   drawMarker(africa); drawMarker(australia);
}

// $('#map').vectorMap({map: 'continents_merc'});
// $('#world-map').vectorMap({
//         // map: 'world_mill',
//         map: 'continents_merc',
//         markerStyle: {
//             initial: {
//                 fill: '#F8E23B',
//                 stroke: '#383f47'
//             },
//             hover: {
//                 stroke: "#fff",
//                 "fill-opacity": 1,
//                 "stroke-width": 1.5
//             }
//         },
//         // backgroundColor: '#494949',
//         // color: '#f00',
//         markers: [5, 6, 7],
//         series: {
//             markers: [{
//                 attribute: 'image',
//                 scale: {
//                     'mrk': 'marker.png'
//                 },
//                 values: [20, 9, 0],
//             }]
//         }, 
//         markers: braid.map(function(h){ return {name: h.name, latLng: h.coords} }),
//         labels: {
//             markers: {
//                 render: function(index){
//                     return braid[index].name;
//                 },
//                 offsets: function(index){
//                     var offset = braid[index]['offsets'] || [0, 0];

//                     return [offset[0] - 7, offset[1] + 3];
//                 }
//             }
//         },
//         series: {
//             markers: [{
//                 attribute: 'image',
//                 scale: {
//                     'closed': '/img/icon-np-3.png',
//                     'activeUntil2018': '/img/icon-np-2.png',
//                     'activeUntil2022': '/img/icon-np-1.png'
//                 },
//                 values: braid.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
//                 // legend: {
//                 //     horizontal: true,
//                 //     title: 'Nuclear power station status',
//                 //     labelRender: function(v){
//                 //         return {
//                 //             closed: 'Closed',
//                 //             activeUntil2018: 'Scheduled for shut down<br> before 2018',
//                 //             activeUntil2022: 'Scheduled for shut down<br> before 2022'
//                 //             }[v];
//                 //     }
//                 // }
//             }]
//         }
//     }); 
//     var mapMarkers = [];
//     var mapMarkersValues = [];

    // addPlantsMarkers();
</script>