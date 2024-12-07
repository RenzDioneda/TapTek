function changeMainImage(thumbnail) {
    var mainImage = document.getElementById('mainImage');
    mainImage.src = thumbnail.src;
}

function selectColor(button) {
    if (button.classList.contains('active')) {
      button.classList.remove('active');
    } else {
      const colorButtons = document.querySelectorAll('.color-option .btn');
      colorButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
    }
  }
  
  
  function updateQuantity(action) {
    const quantityElement = document.getElementById('quantityValue');
    let currentQuantity = parseInt(quantityElement.textContent);
  
    if (action === 'increase') {
      currentQuantity++;
    } else if (action === 'decrease' && currentQuantity > 1) {
      currentQuantity--;
    }
  
    quantityElement.textContent = currentQuantity;
  }
  