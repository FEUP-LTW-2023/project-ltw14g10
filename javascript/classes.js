function getSubjects(year) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_subjects.php?year=" + year);
    const jsonResponse = await response.json();
    const subjectContainer = document.querySelector('.subjectContainer');
    var subjectOptionsHTML = '<option value="" disabled selected>Select subject</option>';
    for (const key in jsonResponse) {
      if (jsonResponse.hasOwnProperty(key)) {
        const map = jsonResponse[key];
        subjectOptionsHTML += "<option value=" + map["ID"] + ">" + map["CODE"] + " - " + map["SUBJECT_NAME"] + "</option>";
      }
    }
    subjectContainer.innerHTML = subjectOptionsHTML;
  };
  
  getWithAsyncAwait();
}

function getSubjectsUser(year, userId, subjectId) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_subjects.php?year=" + year);
    const jsonResponse = await response.json();
    const subjectContainer = document.querySelector('#user-'+userId+'.subjectContainer');
    if (subjectId == null) {
      var subjectOptionsHTML = '<option value="" disabled selected>Select subject</option>';
    }
    else var subjectOptionsHTML = '<option value="" disabled selected>Select subject</option>';
    for (const key in jsonResponse) {
      if (jsonResponse.hasOwnProperty(key)) {
        const map = jsonResponse[key];
        if (subjectId != null && subjectId == map["ID"]) {
          subjectOptionsHTML += "<option value=" + map["ID"] + " selected>" + map["CODE"] + " - " + map["SUBJECT_NAME"] + "</option>";
        }
        else subjectOptionsHTML += "<option value=" + map["ID"] + ">" + map["CODE"] + " - " + map["SUBJECT_NAME"] + "</option>";
      }
    }
    subjectContainer.innerHTML = subjectOptionsHTML;
  };
  
  getWithAsyncAwait();
}

window.addEventListener("load", function() {
  var agents = document.getElementsByClassName("agent");
  var i;
  for (i = 0; i < agents.length; i++) {
    var agent = agents[i];
    var agentId = agent.querySelector("#data-agent-id");
    agentId = agentId.value;
    console.log(agentId);
    var yearSelect = agent.querySelector(".year");

    // Get the initial values for year and subject
    var initialYear = yearSelect.value;
    console.log(initialYear);
    var initialSubject = agent.querySelector("#data-subject-id");
    initialSubject = initialSubject.value;
    console.log(initialSubject);
    console.log("--------------------");

    // Call getSubjectsUser with the initial values
    getSubjectsUser(initialYear, agentId, initialSubject);
  }
}, false);