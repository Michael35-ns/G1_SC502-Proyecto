const addProductBtn = document.getElementById('add-product-btn');
const addProductModal = document.getElementById('add-product-modal');
const addProductSubmit = document.getElementById('add-product-submit');
const productNameInput = document.getElementById('product-name');
const productDescriptionInput = document.getElementById('product-description');

addProductBtn.addEventListener('click', () => {
  addProductModal.style.display = 'block';
});

addProductModal.addEventListener('click', (e) => {
  if (e.target === addProductModal) {
    addProductModal.style.display = 'none';
  }
});

addProductSubmit.addEventListener('click', (e) => {
  e.preventDefault();

  const productData = {
    name: productNameInput.value,
    description: productDescriptionInput.value
  };

  // Send the data to your controller using AJAX or fetch API
  fetch('../../Controller/productoController.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(productData)
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error(error));

  // Close the modal
  addProductModal.style.display = 'none';
});