function getSubjects(year) {
  const getWithAsyncAwait = async () => {
    const response = await fetch("/../ajax/ajax_get_classes.php?year=" + year);
    const jsonResponse = await response.json();
    console.log(jsonResponse);
    const subjectContainer = document.querySelector('.subjectContainer');
    var subjectOptionsHTML = "<select class='class' name='class'>";
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
  /*
  // Get the selected year value
  var selectedYear = document.getElementsByClassName("year").value;

  // Define the class options for each year
  var classOptions = {
    "1": [
      "L.EIC001 - ALGA",
      "L.EIC002 - AM I",
      "L.EIC003 - FSC",
      "L.EIC004 - MD",
      "L.EIC005 - FP",
      "L.EIC006 - AC",
      "L.EIC007 - AM II",
      "L.EIC008 - F I",
      "L.EIC009 - P",
      "L.EIC010 - TC"
    ],
    "2": [
      "L.EIC011 - AED",
      "L.EIC012 - BD",
      "L.EIC013 - F II",
      "L.EIC014 - LDTS",
      "L.EIC015 - SO",
      "L.EIC016 - DA",
      "L.EIC017 - ES",
      "L.EIC018 - LC",
      "L.EIC019 - LTW",
      "L.EIC020 - ME"
    ],
    "3": [
      "L.EIC021 - FSI",
      "L.EIC022 - IPC",
      "L.EIC023 - LBAW",
      "L.EIC024 - PFL",
      "L.EIC025 - RC",
      "L.EIC026 - C",
      "L.EIC027 - CG",
      "L.EIC028 - CPD",
      "L.EIC029 - IA",
      "L.EIC030 - PI"
    ]
  };

  // Get the class container div
  var classContainer = document.getElementsByClassName("classContainer");

  // Generate the HTML for the class options based on the selected year
  var classOptionsHTML = "<select id='Class' name='class'>";
  var classes = classOptions[selectedYear];
  for (var i = 0; i < classes.length; i++) {
    classOptionsHTML += ("<option>" + classes[i] + "</option>");
  }
  classOptionsHTML += "<option>Other</option>";
  classOptionsHTML += "</select>";

  // Update the class container with the generated class options
  classContainer.innerHTML = classOptionsHTML;
  */
}