document.addEventListener("DOMContentLoaded", () => {
    const letters = "abcdefghijklmnopqrstuvwxyz";
  
    let interval = null;
  
    const startAnimation = () => {  
      let iteration = 0;
  
      clearInterval(interval);
  
      interval = setInterval(() => {
        const hackerElement = document.querySelector(".hacker");
        if (!hackerElement) return; // Stop animation if element is not found
  
        hackerElement.innerText = hackerElement.innerText
          .split("")
          .map((letter, index) => {
            if(index < iteration) {
              return hackerElement.dataset.value[index];
            }
  
            return letters[Math.floor(Math.random() * 26)]
          })
          .join("");
  
        if(iteration >= hackerElement.dataset.value.length){ 
          clearInterval(interval);
        }
  
        iteration += 1 / 8;
      }, 30);
    };
  
    startAnimation(); // Start animation on page load
  });
  