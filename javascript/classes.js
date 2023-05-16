function updateClasses() {
  const yearSelect = document.getElementById('Year');
  const classContainer = document.getElementById('classContainer');

  // Clear the class options
  classContainer.innerHTML = '';

  // Retrieve the selected year
  const selectedYear = yearSelect.value;

  // If no year is selected, return
  if (!selectedYear) {
    return;
  }

  // Fetch the classes for the selected year
  fetchClasses(selectedYear)
    .then((classes) => {
      // Create the class select element
      const classSelect = document.createElement('select');
      classSelect.id = 'Class';
      classSelect.name = 'class';

      // Create the default option
      const defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.disabled = true;
      defaultOption.selected = true;
      defaultOption.textContent = 'Select class';

      classSelect.appendChild(defaultOption);

      // Create an option for each class
      classes.forEach((classItem) => {
        const option = document.createElement('option');
        option.value = classItem.id;
        option.textContent = classItem.name;
        classSelect.appendChild(option);
      });

      // Append the class select element to the container
      classContainer.appendChild(classSelect);
    })
    .catch((error) => {
      console.log('Error:', error);
    });
}

function fetchClasses(year) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/api/classes?year=${year}`);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        resolve(response.classes);
      } else {
        reject(xhr.statusText);
      }
    };
    xhr.onerror = function () {
      reject('Network error');
    };
    xhr.send();
  });
}
