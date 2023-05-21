function setAnimationFAQ() {
    var faq = document.getElementsByClassName("faq-page");
    var i;
    for (i = 0; i < faq.length; i++) {
      faq[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
          body.style.display = "none";
        } else {
          body.style.display = "block";
        }
      });
    }
  }
  
  function getFAQsSubject(subjectId) {
    const getWithAsyncAwait = async () => {
      const response = await fetch("/../ajax/ajax_get_faq.php?subject=" + subjectId);
      const jsonResponse = await response.json();
      const subjectContainer = document.querySelector('.faq-container');
      var subjectOptionsHTML = '';
      for (const key in jsonResponse) {
        if (jsonResponse.hasOwnProperty(key)) {
          const map = jsonResponse[key];
          subjectOptionsHTML += "<div class='faq'><h1 class='faq-page'>" + map["QUESTION"] + "</h1><div class='faq-body'><p>" + map["ANSWER"] + "</p></div></div>";
          subjectOptionsHTML += '<hr class="hr-line"></hr>';
        }
      }
      subjectContainer.innerHTML = subjectOptionsHTML;
  
      // Attach event listeners to the newly added elements
      setAnimationFAQ();
    };
  
    getWithAsyncAwait();
    setAnimationFAQ(); // Attach event listeners to the initial elements
  }
  