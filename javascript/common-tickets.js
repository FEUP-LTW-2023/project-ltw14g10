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

  function updateTicketAgent(ticketId, newAgent, firstAssign) {
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
        if (response.ok && firstAssign) {
          const ticket = document.getElementById("ticket-" + ticketId);
          const statusSelector = ticket.querySelector(".status-selector");
          const optionToSelect = statusSelector.querySelector('option[value="3"]');
          const optionToDeselect = statusSelector.querySelector('option[value="2"]');
          
          if (optionToSelect) {
            optionToSelect.selected = true;
            if (optionToDeselect) {
              optionToDeselect.selected = false;
            }
          }
        }
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

function updateTicketStatus(ticketId, newStatus) {
  const encodeForAjax = (data) => {
      return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
      }).join('&')
  };

  const postData = async () => {
      const dataToSend = { ticket: ticketId, status: newStatus};
      const response = await fetch("/../ajax/ajax_change_ticket_status.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: encodeForAjax(dataToSend)
      });
  };

  postData();
}

function filterByStatus(status, subjectId) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_tickets.php?subject=" + subjectId);
    const jsonResponse = await response.json();
    const agent = document.getElementById("agent-selector").value;
    for (const key in jsonResponse) {
      if (jsonResponse.hasOwnProperty(key)) {
        const map = jsonResponse[key];
        const ticket = document.getElementById("ticket-"+ map["ID"]);
        if((map["STATUS_ID"] == status || status == "all") && (map["AGENT_ID"] == agent || agent == "all")) ticket.style.display = "block";
        else ticket.style.display = "none";
      }
    }
  };
  
  getWithAsyncAwait();
}

function filterByAgent(agent, subjectId) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_tickets.php?subject=" + subjectId);
    const jsonResponse = await response.json();
    const status = document.getElementById("status-selector").value;
    for (const key in jsonResponse) {
      if (jsonResponse.hasOwnProperty(key)) {
        const map = jsonResponse[key];
        const ticket = document.getElementById("ticket-"+ map["ID"]);
        if((map["STATUS_ID"] == status || status == "all") && (map["AGENT_ID"] == agent || agent == "all")) ticket.style.display = "block";
        else ticket.style.display = "none";
      }
    }
  };
  
  getWithAsyncAwait();
}