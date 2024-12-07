
  let subtotal = 0;
  const shipmentCost = 22.50;

  // Update order summary (subtotal and grand total)
  function updateOrderSummary() {
    const grandTotal = subtotal + shipmentCost;
    document.getElementById('subtotal-price').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('grand-total-price').textContent = `$${grandTotal.toFixed(2)}`;
  }

  // Add a product to the order summary
  function addToOrderSummary(product, quantity, price) {
    const orderDetails = document.getElementById('order-details');
    const totalPrice = price * quantity;

    const productDetail = document.createElement('div');
    productDetail.classList.add('d-flex', 'justify-content-between', 'mb-2');
    productDetail.setAttribute('id', `order-${product.id}`);
    productDetail.innerHTML = `
      <p>${product.name} (${quantity})</p>
      <p>$${totalPrice.toFixed(2)}</p>
    `;
    orderDetails.appendChild(productDetail);

    subtotal += totalPrice;
    updateOrderSummary();
  }

  // Remove product from the order summary
  function removeFromOrderSummary(product) {
    const orderDetails = document.getElementById('order-details');
    const productDetail = document.getElementById(`order-${product.id}`);
    if (productDetail) {
      orderDetails.removeChild(productDetail);
      subtotal -= product.price * product.quantity;
      updateOrderSummary();
    }
  }

  // Update the quantity and price in the order summary
  function updateQuantityInOrderSummary(product) {
    const orderDetails = document.getElementById('order-details');
    const productDetail = document.getElementById(`order-${product.id}`);
    if (productDetail) {
      const totalPrice = product.price * product.quantity;
      productDetail.querySelectorAll('p')[1].textContent = `$${totalPrice.toFixed(2)}`;
      subtotal += product.price * product.quantity;
      updateOrderSummary();
    }
  }

  // Handle checkbox change to add/remove product from order summary
  function handleCheckboxChange(e, product) {
    const productPrice = product.querySelector('.product-price').getAttribute('data-price');
    const quantity = parseInt(product.querySelector('.quantity').textContent);

    if (e.target.checked) {
      addToOrderSummary(product, quantity, parseFloat(productPrice));
    } else {
      removeFromOrderSummary(product);
    }
  }

  // Handle increase button click
  function handleIncreaseClick(product) {
    const quantityElement = product.querySelector('.quantity');
    const quantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = quantity + 1;
    product.quantity = quantity + 1;
    updateQuantityInOrderSummary(product);
  }

  // Handle decrease button click
  function handleDecreaseClick(product) {
    const quantityElement = product.querySelector('.quantity');
    const quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) {
      quantityElement.textContent = quantity - 1;
      product.quantity = quantity - 1;
      updateQuantityInOrderSummary(product);
    }
  }

  // Handle the remove button click to remove a product
  function handleRemoveClick(product) {
    const checkbox = product.querySelector('.product-checkbox');
    if (checkbox.checked) {
      checkbox.checked = false; // Uncheck the product
      removeFromOrderSummary(product);
    }
  }

  // Initialize cart functionality
  function init() {
    const productItems = document.querySelectorAll('.product-item');
    productItems.forEach((product, index) => {
      product.id = `product-${index + 1}`;
      product.quantity = 1;
      const productId = `product-${index + 1}`;
      const removeBtn = product.querySelector('.remove-btn');

      // Add event listener to the "Remove" button
      removeBtn.addEventListener('click', () => handleRemoveClick(product));

      const checkbox = product.querySelector('.product-checkbox');
      checkbox.addEventListener('change', (e) => handleCheckboxChange(e, product));

      const increaseBtn = product.querySelector('.increase-btn');
      increaseBtn.addEventListener('click', () => handleIncreaseClick(product));

      const decreaseBtn = product.querySelector('.decrease-btn');
      decreaseBtn.addEventListener('click', () => handleDecreaseClick(product));
    });
  }

  init();  // Initialize the cart functionality

