function getRandomColor(hash) {
    var color = hash.substring(0, 6); 
  
    var red = parseInt(color.substring(0, 2), 16);
    var green = parseInt(color.substring(2, 4), 16);
    var blue = parseInt(color.substring(4, 6), 16);
  
    return "rgb(" + red + ", " + green + ", " + blue + ")";
  }
  
  function changeColor(className, hash) {
    var color;
    if(className=="unkown") color = "#000000";
    else color = getRandomColor(hash);
    var elements = document.getElementsByClassName(className);
  
    for (var i = 0; i < elements.length; i++) {
      elements[i].style.backgroundColor = color;
      elements[i].style.color = '#fff';
      elements[i].style.padding = '6px 14px';
      elements[i].style.float = 'right';
      elements[i].style.marginTop = '10px';
      elements[i].style.fontSize = '18px';
      elements[i].style.border = 'none';
      elements[i].style.cursor = 'pointer';
    }
  }