window.addEventListener('resize', function() {
  var containerWidth = document.querySelector('.user-container').offsetWidth;
  var userElements = document.querySelectorAll('.user');
  userElements.forEach(function(user) {
    user.style.minWidth = containerWidth + 'px';
  });
});

function updateUserRole(userId, newRole) {
    const encodeForAjax = (data) => {
        return Object.keys(data).map(function(k){
          return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
        }).join('&')
    };

    const postData = async () => {
        const dataToSend = { id: userId, role: newRole};
        const response = await fetch("/../ajax/ajax_change_role.php", {
          method: "POST",
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: encodeForAjax(dataToSend)
        });
    };

    postData();
}

function deleteStatus(statusId) {
  const encodeForAjax = (data) => {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  };

  const postData = async () => {
    const dataToSend = {id: statusId};
    const response = await fetch("/../ajax/ajax_delete_status.php", {
      method: "POST",
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: encodeForAjax(dataToSend)
    });
  };

  postData();
  var element = document.getElementById("status-"+ statusId);
  element.style.display = "none";
};

function deleteSubject(subjectId) {
  const encodeForAjax = (data) => {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  };

  const postData = async () => {
    const dataToSend = {id: subjectId};
    const response = await fetch("/../ajax/ajax_delete_subject.php", {
      method: "POST",
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: encodeForAjax(dataToSend)
    });
  };

  postData();
  var element = document.getElementById("subject-"+ subjectId);
  element.style.display = "none";
};