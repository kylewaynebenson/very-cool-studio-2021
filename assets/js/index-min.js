function switchTheme(t){t.target.checked?(document.documentElement.setAttribute("data-theme","dark"),localStorage.setItem("theme","dark")):(document.documentElement.setAttribute("data-theme","light"),localStorage.setItem("theme","light"))}function ShopifyInit(t){function e(){var t=document.createElement("script");t.async=!0,t.src=o,(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(t),t.onload=n}function n(){var e=ShopifyBuy.buildClient({domain:"very-cool-studio.myshopify.com",storefrontAccessToken:"2d6aeb57e65ac0c8cb1a5396784da177"});ShopifyBuy.UI.onReady(e).then((function(e){void 0!==t?e.createComponent("product",{id:""+t,node:document.getElementById("product-component-"+t),moneyFormat:"%24%7B%7Bamount%7D%7D",toggles:[{node:document.getElementById("shopify-cart-toggle")}],options:a}):e.createCart({moneyFormat:"%24%7B%7Bamount%7D%7D",toggles:[{node:document.getElementById("shopify-cart-toggle")}],contents:{img:!1,title:!1,variantTitle:!1,price:!1,options:!1,quantity:!1,quantityIncrement:!1,quantityDecrement:!1,quantityInput:!1,button:!1,description:!1},options:a})}))}var o="https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js",a={toggle:{sticky:!1,iframe:!1,contents:{icon:!1}},lineItem:{contents:{image:!0,variantTitle:!0,title:!0,price:!1,priceWithDiscounts:!0,quantity:!1,quantityIncrement:!1,quantityDecrement:!0,quantityInput:!1}},product:{iframe:!1,contents:{description:!1,quantity:!1,quantityDecrement:!1,quantityIncrement:!1},order:["button","options"],text:{button:"Buy license"},templates:{button:'<button class="margin-s {{data.classes.product.button}} {{data.buttonClass}}"><h6 class="no-mb inline {{data.classes.product.prices}}"><span class="{{data.classes.product.compareAt}}">{{data.formattedCompareAtPrice}}</span><span class="{{data.classes.product.price}}">{{data.formattedPrice}}</span></h6> <h5 class="no-mb inline">{{data.buttonText}}</h6></button>'}},cart:{iframe:!1,popup:!1,contents:{description:!1,quantity:!1,quantityDecrement:!1,quantityIncrement:!1},text:{total:"SUBTOTAL",button:"Checkout",notice:""},events:{openCheckout:function(t){},updateItemQuantity:function(t){}}}};window.ShopifyBuy&&window.ShopifyBuy.UI?n():e()}const toggleSwitch=document.querySelector('.theme-switch input[type="checkbox"]');toggleSwitch.addEventListener("change",switchTheme,!1);const currentTheme=localStorage.getItem("theme")?localStorage.getItem("theme"):null;currentTheme&&(document.documentElement.setAttribute("data-theme",currentTheme),"dark"===currentTheme&&(toggleSwitch.checked=!0));