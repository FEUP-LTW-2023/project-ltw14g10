$(window).on('resize', function() {
    var containerWidth = $('.user-container').width();
    $('.user').css('min-width', containerWidth);
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