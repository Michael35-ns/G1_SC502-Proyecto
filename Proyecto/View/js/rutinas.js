// JavaScript
const addProductBtn = document.getElementById('add-product-btn');
const addProductModal = document.getElementById('add-product-modal');
const addProductSubmit = document.getElementById('add-product-submit');

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

  // Crea un objeto con los datos del producto
  const productData = {
    name: document.getElementById('product-name').value,
    description: document.getElementById('product-description').value,
    price: document.getElementById('product-price').value,
    image: document.getElementById('product-image').files[0]
  };

  // Envía los datos del producto al servidor (o realiza la lógica de negocio aquí)
  console.log(productData);

  // Cierra la ventana modal
  addProductModal.style.display = 'none';
});