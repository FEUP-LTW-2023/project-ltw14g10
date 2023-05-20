function getSubjects(year) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_classes.php?year=" + year);
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

function getSubjectsUser(year, userId) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_classes.php?year=" + year);
    const jsonResponse = await response.json();
    const subjectContainer = document.querySelector('#user-'+userId+'.subjectContainer');
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