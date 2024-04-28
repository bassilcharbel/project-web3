let allProducts = [
    {
      id: 1,
      title: "Aminu",
      category: "AMINO RECOVERY",
      price: 32.99,
      image: "https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/06/ROC936-B-copy-1.png?resize=247%2C247&ssl=1"
    },
    {
      id: 2,
      title: "Whey Fuzion",
      category: "PROTEIN POWDER",
      price: 65.99,
      image: "https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/06/48-2.png?resize=247%2C247&ssl=1"
    },
    {
      id: 3,
      title: "Isoblend",
      category: "CREATINE",
      price: 84.99,
      image: "https://i0.wp.com/superiorsupps.com/wp-content/uploads/2016/07/52-1.png?fit=1299%2C1299&ssl=1"
      ,    specialties: "High Quality, Great Taste"
  
    },
    {
      id: 4,
      title: "Postkem Strawberry Kiwi",
      category: "GAINERS",
      price: 49.99,
      image: "https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/06/Postkem_StrawberryKiwi_Front.png?resize=247%2C247&ssl=1"
      ,specialties: "High Quality, Great Taste"
  
    },
    {
      id: 5,
      title: "Energy Drink",
      category: "PRE WORKOUT",
      price: 39.99,
      image: "https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/02/58.png?resize=247%2C247&ssl=1"
    },
    {
      id: 6,
      title: "Protein Bar",
      category: "PRE WORKOUT",
      price: 74.99,
      image: "https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/03/2.png?resize=247%2C247&ssl=1"
    }
  ,
    {
      id: 7,
      title: "Awesome Power",
      category: "CREATINE",
      price: 89.99,
      image: "https://awesomesupplements.co.uk/cdn/shop/files/Power-Web-1_660x660_crop_center.png?v=1704879979"
    }
    ,
    {
      id: 8,
      title: "Pure Power",
      category: "PROTEIN POWDER",
      price: 65.99,
      image: "https://i0.wp.com/purepowernutrition.com/wp-content/uploads/2022/08/Lean-SD_1024x1024@2x.webp?fit=1500%2C1500&ssl=1"
    }
  ];
  
  let cart = []; // Assuming this is declared in a global scope
  
  function displayItems(Item) {
    const list = document.querySelector("#list");
    list.innerHTML = allProducts
      .map((product) => {
        const { image, category, price, title, id } = product;
        return `
        <div class="card" style="display: inline-block;">
            <div class="img-content">
              <img src=${product.image} alt=${product.category} style="width: 200px ;height : 200px" />
        </div>          
            <div class="card-content">
              <p class="card-price">$${price.toFixed(2)}</p>
              <h4 class="card-title">${title.substring(0, 45)}</h4>
              <p class="card-desc hide">${category.toUpperCase()}</p> 
              <div class="btn-container">
                <button class="card-btn" onclick="addToCart(${id})">Add to Cart</button>
              </div>
            </div>
          </div>`;
      })
      .join("");
  }
  function displayCart() {
    const cartList = document.querySelector("#cart-list");
    cartList.innerHTML = cart
      .map((item) => {
        return `
          <li class="item-container">
            <p class="cart-title">${item.title}</p>
            <div class="cart-quantity-container">
              <span>Quantity:</span>
              <button class="minus" onclick="decrement(${item.id})">-</button>
              <span>${item.quantity}</span>
              <button class="plus" onclick="increment(${item.id})">+</button>
            </div>
            <div class="button-quantity-container">
              <span>$${(item.price * item.quantity).toFixed(2)}</span>
              <div class="remove-cart-item"><button onclick="removeFromCart(${item.id})">Remove</button></div>
            </div>
          </li>`;
      })
      .join("");
    updateTotal();
  }
  
  function displayCategories(categories) {
    const categoriesDiv = document.querySelector("#categories");
    categoriesDiv.innerHTML = categories
      .map((category) => {
        return `
          <div class="category" data-category="${category.name}">
            <img src="${category.image}" alt="${category.name}" />
            <span>${category.name}</span>
          </div>`;
      })
      .join("");
  
    const categoryDivs = document.querySelectorAll(".category");
    categoryDivs.forEach((div) => {
      div.addEventListener("click", () => {
        const category = div.dataset.category;
        const filteredProducts = allProducts.filter((product) => product.category === category);
        displayProducts(filteredProducts);
      });
    });
  }
  
  function openCart() {
      const cartBtn = document.querySelector("#show-cart-btn"); // Select the "Show Cart" button
      cartBtn.addEventListener("click", seeModal); // Add click event listener to show the modal
      shoppingCart(); // Update the cart count
      displayCart(); // Display cart items
    }
    function displayItems(items) {
    const list = document.querySelector("#list");
    list.innerHTML = ''; // Clear previous items
  
    items.forEach((product) => {
      const card = document.createElement('div');
      card.classList.add('card');
      card.dataset.specialties = product.specialties;
  
      const imgContent = document.createElement('div');
      imgContent.classList.add('img-content');
      const img = document.createElement('img');
      img.src = product.image;
      img.alt = product.category;
      img.style.width = '200px';
      img.style.height = '200px';
      imgContent.appendChild(img);
      card.appendChild(imgContent);
  
      const cardContent = document.createElement('div');
      cardContent.classList.add('card-content');
      const price = document.createElement('p');
      price.classList.add('card-price');
      price.textContent = `$${product.price.toFixed(2)}`;
      const title = document.createElement('h4');
      title.classList.add('card-title');
      title.textContent = product.title.substring(0, 45);
      const category = document.createElement('p');
      category.classList.add('card-desc', 'hide');
      category.textContent = product.category.toUpperCase();
      const specialties = document.createElement('div');
      specialties.classList.add('specialties', 'hide');
      specialties.textContent = `Specialties: ${product.specialties}`;
      const btnContainer = document.createElement('div');
      btnContainer.classList.add('btn-container');
      const btn = document.createElement('button');
      btn.classList.add('card-btn');
      btn.textContent = 'Add to Cart';
      btn.onclick = () => addToCart(product.id);
      btnContainer.appendChild(btn);
      cardContent.appendChild(price);
      cardContent.appendChild(title);
      cardContent.appendChild(category);
      cardContent.appendChild(specialties);
      cardContent.appendChild(btnContainer);
      card.appendChild(cardContent);
  
      card.addEventListener('mouseover', () => {
        specialties.classList.remove('hide');
      });
  
      card.addEventListener('mouseout', () => {
        specialties.classList.add('hide');
      });
  
      list.appendChild(card);
    });
  }
  
  
  displayItems(allProducts);
  
  let categories = [
    {
      name: "PROTEIN POWDER",
      image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkGyIRexXNjRMYl01HUh8bp4FzwyZ5GxAldn-0nlbIQg&s"
    },
    {
      name: "CREATINE",
      image: "https://static.independent.co.uk/2023/12/27/15/Creatine-hero.png?width=1200&"
    },
    {
      name: "GAINERS",
      image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjiyiK06XunBQjbzUH-rIWARD6xelNvw7bLXCwuIbbiCUNXeKxHd25Udc6bSWP3vw5Cu8&usqp=CAU"
    },
    {
      name: "PRE WORKOUT",
      image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZeLimx3sQXAwEc-Ti_fC_9V9ESpVduFBySloMDJYPaw&s"
    },
    {
      name: "AMINO RECOVERY",
      image: "https://www.geneticnutrition.in/cdn/shop/products/ultra-eaa-essential-amino-acids-121697_1200x.jpg?v=1693325006"
    }
  ];
  
  function filterCategories() {
    const select = document.querySelector("#filter-btn");
    select.addEventListener("change", filterProducts);
  
    function filterProducts(e) {
      let list = document.querySelector("#list");
      let content;
      let option = e.target.value;
      let selectedCategory = document.querySelector("#selected-category");
  
      if (option === "All") {
        content = displayItems(Item);
        list.innerHTML = content;
        selectedCategory.innerHTML = `All Categories`;
      } else {
        let filteredProducts = Item.filter((product) => product.category === option);
        content = displayItems(filteredProducts);
        list.innerHTML = content;
        selectedCategory.innerHTML = `${option}`;
      }
    }
  }
  
  function addToCart(id) {
    const item = allProducts.find((product) => product.id === id);
    const existingItem = cart.find((cartItem) => cartItem.id === id);
  
    if (existingItem) {
      existingItem.quantity++;
    } else {
      cart.push({ ...item, quantity: 1 });
    }
  
    displayCart();
    shoppingCart();
  }
  
  function removeFromCart(id) {
    cart = cart.filter((item) => item.id !== id);
    displayCart();
    shoppingCart();
  }
  
  function increment(id) {
    const item = cart.find((item) => item.id === id);
    item.quantity++;
    displayCart();
    shoppingCart();
  }
  
  function decrement(id) {
    const item = cart.find((item) => item.id === id);
    if (item.quantity === 1) {
      removeFromCart(id);
    } else {
      item.quantity--;
      displayCart();
      shoppingCart();
    }
  }
  
  function updateTotal() {
    const total = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);
    const totalElement = document.querySelector("#cart-total");
    totalElement.textContent = `Total: $${total.toFixed(2)}`;
  }
  
  function shoppingCart() {
    const cartCount = cart.reduce((acc, item) => acc + item.quantity, 0);
    const cartBtn = document.querySelector("#show-cart-btn");
    if (cartCount === 0) {
      cartBtn.textContent = "Show Cart";
      cartBtn.classList.remove("cart-has-items");
    } else {
      cartBtn.textContent = `Show Cart (${cartCount})`;
      cartBtn.classList.add("cart-has-items");
    }
  }
  
  
  function seeModal() {
    const modal = document.querySelector(".modal");
    const closeModal = document.querySelector(".fa.fa-xmark");
    const closeBtn = document.querySelector("#close-cart-btn");
    modal.classList.remove("hide");
    closeModal.addEventListener("click", hideModal);
    closeBtn.addEventListener("click", hideModal);
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        hideModal();
      }
    });
  }
  
  function hideModal() {
    const modal = document.querySelector(".modal");
    modal.classList.add("hide");
  }
  // Function to handle the checkout/buy button click
  function checkout() {
    const cartList = document.querySelector("#cart-list");
    cartList.innerHTML = `<p>Your order will be delivered to you soon!</p>`;
    updateTotal(); // Update the total (optional, if needed)
    shoppingCart(); // Update the cart count
    cart = [];
  }
  function displayCategoryCounts() {
    const categories = document.querySelectorAll('.category');
    categories.forEach(category => {
      const categoryName = category.dataset.category;
      const productCount = allProducts.filter(product => product.category === categoryName).length;
      category.dataset.count = productCount + " products";  });
  }
  
  // Call the function when the page is loaded
  document.addEventListener('DOMContentLoaded', () => {
    displayCategoryCounts();
  
    // Update counts when hovering over categories
    document.querySelectorAll('.category').forEach(category => {
      category.addEventListener('mouseover', displayCategoryCounts);
    });
  });
  // Event listener for the close button
  document.querySelector("#close-cart-btn").addEventListener("click", hideModal);
  displayItems(allProducts);
  displayCategories(categories);
  openCart();