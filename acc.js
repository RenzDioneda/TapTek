document.addEventListener("DOMContentLoaded", function () {
    function toggleUserSection(isLoggedIn) {
      const loginTrigger = document.getElementById("loginTrigger");
      const userDropdown = document.getElementById("userDropdown");
  
      if (isLoggedIn) {
        loginTrigger.classList.add("d-none");
        userDropdown.classList.remove("d-none");
      } else {
        loginTrigger.classList.remove("d-none");
        userDropdown.classList.add("d-none");
      }
    }
  
    const isLoggedIn = false; // Change to `true` for a logged-in user
    toggleUserSection(isLoggedIn);
  });
  