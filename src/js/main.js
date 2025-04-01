document.addEventListener("DOMContentLoaded", ()=>{
    var splide = new Splide( '.splide', {
        type: "loop",
        perPage: 1,
        start: 2,
        autoplay: true,
        drag: true
    } );
var bar = splide.root.querySelector( '.my-carousel-progress-bar' );

// Updates the bar width whenever the carousel moves:
splide.on( 'mounted move', function () {
  var end  = splide.Components.Controller.getEnd() + 1;
  var rate = Math.min( ( splide.index + 1 ) / end, 1 );
  bar.style.width = String( 100 * rate ) + '%';
} );

splide.mount();
});

