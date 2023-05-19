function getRandomColor(string) {
    var hash = md5(string);
    var color = hash.substring(0, 6); 
  
    var red = parseInt(color.substring(0, 2), 16);
    var green = parseInt(color.substring(2, 4), 16);
    var blue = parseInt(color.substring(4, 6), 16);
  
    return "rgb(" + red + ", " + green + ", " + blue + ")";
  }
  
  function changeColor(className) {
    var color = getRandomColor(className);
    var elements = document.getElementsByClassName(className);
  
    for (var i = 0; i < elements.length; i++) {
      elements[i].style.color = color;
    }
  }