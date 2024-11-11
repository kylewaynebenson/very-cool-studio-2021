function featureOn(checkbox, feature) {
	var fontFeatureOn = "font-feature-settings: '"+feature+"' 1;"
	var fontFeatureOff = "font-feature-settings: '"+feature+"' 0;"
	var featurePreview = feature+"-sample";
	if(checkbox.checked == true){
		document.getElementById(featurePreview).setAttribute("style", fontFeatureOn);
	}else {
	  document.getElementById(featurePreview).setAttribute("style", fontFeatureOff);
	}
  }

  document.addEventListener('DOMContentLoaded', () => {
    const nav = document.querySelector('.nav');
    
    window.addEventListener('scroll', () => {
      if (window.scrollY > 60) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
    });
  });