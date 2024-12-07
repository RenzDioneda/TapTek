let selectedRating = 0; 

  function rateProduct(rating) {
    selectedRating = rating; // Set the rating value
    document.getElementById("selected-rating").innerText = `Rating: ${rating}`;
    updateStarRating(rating);
  }


  function updateStarRating(rating) {
    let stars = document.querySelectorAll('.star-rating i');
    stars.forEach((star, index) => {
      if (index < rating) {
        star.classList.add('text-warning'); 
      } else {
        star.classList.remove('text-warning');
      }
    });
  }


  function submitComment() {
    const commentText = document.getElementById("userComment").value.trim();
    if (selectedRating === 0 || commentText === "") {
      alert("Please select a rating and enter a comment.");
      return;
    }

    const newComment = document.createElement("div");
    newComment.classList.add("comment");

    const ratingStars = "★".repeat(selectedRating) + "☆".repeat(5 - selectedRating);
    newComment.innerHTML = `
      <p><strong>Your Name</strong> - <span class="text-warning">${ratingStars}</span></p>
      <p>${commentText}</p>
    `;


    document.getElementById("commentList").appendChild(newComment);

    document.getElementById("userComment").value = "";
    selectedRating = 0;
    document.getElementById("selected-rating").innerText = "Rating: 0";
    updateStarRating(0);
  }