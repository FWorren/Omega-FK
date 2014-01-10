$(function() {
  $('#slides').slidesjs({
    width: 800,
    height: 400,
    play: {
    	active: true,
    	auto: true,
    	interval: 4000,
    	swap: true,
    	pauseOnHover: true,
    	restartDelay: 2500
    },
  	navigation: {
      active: true,
      effect: "slide"
    }
  });
});
  