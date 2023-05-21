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

  function selectorBackgroundColor(className, hash) {
    var color;
    if(className=="unkown") color = "#000000";
    else color = getRandomColor(hash);
    var element = document.getElementById("status-selector");
    element.style.backgroundColor = color;
  }

  function updateTicketAgent(ticketId, newAgent) {
    const encodeForAjax = (data) => {
        return Object.keys(data).map(function(k){
          return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
        }).join('&')
    };

    const postData = async () => {
        const dataToSend = { ticket: ticketId, agent: newAgent};
        const response = await fetch("/../ajax/ajax_change_ticket_agent.php", {
          method: "POST",
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: encodeForAjax(dataToSend)
        });
    };

    postData();
}

function updateTicketSubject(ticketId, newSubject) {
  const encodeForAjax = (data) => {
      return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
      }).join('&')
  };

  const postData = async () => {
      const dataToSend = { ticket: ticketId, subject: newSubject};
      const response = await fetch("/../ajax/ajax_change_ticket_subject.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: encodeForAjax(dataToSend)
      });
  };

  postData();
  var element = document.getElementById("ticket-"+ ticketId);
  element.style.display = "none";
}