function getSubjects(year) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_classes.php?year=" + year);
    const jsonResponse = await response.json();
    const subjectContainer = document.querySelector('.subjectContainer');
    var subjectOptionsHTML = "<select class='subject-fetched' name='subject'>";
    for (const key in jsonResponse) {
      if (jsonResponse.hasOwnProperty(key)) {
        const map = jsonResponse[key];
        subjectOptionsHTML += "<option value=" + map["ID"] + ">" + map["CODE"] + " - " + map["SUBJECT_NAME"] + "</option>";
      }
    }
    subjectOptionsHTML += "<option>Other</option>";
    subjectOptionsHTML += "</select>";
    subjectContainer.innerHTML = subjectOptionsHTML;
  };
  
  getWithAsyncAwait();
}