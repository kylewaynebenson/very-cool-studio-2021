function ShopifyInit(t){function n(){var t=document.createElement("script");t.async=!0,t.src=o,(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(t),t.onload=e}function e(){var n=ShopifyBuy.buildClient({domain:"very-cool-studio.myshopify.com",storefrontAccessToken:"2d6aeb57e65ac0c8cb1a5396784da177"});ShopifyBuy.UI.onReady(n).then((function(n){n.createComponent("product",{id:""+t,node:document.getElementById("product-component-"+t),moneyFormat:"%24%7B%7Bamount%7D%7D",contents:{img:!1,title:!1,variantTitle:!1,price:!1,options:!1,quantity:!1,quantityIncrement:!1,quantityDecrement:!1,quantityInput:!1,button:!1,description:!1},options:{product:{iframe:!1,contents:{description:!1,quantity:!1,quantityDecrement:!1,quantityIncrement:!1},toggle:{sticky:!1},order:["button","options"],text:{button:"Buy license"},templates:{button:'<button class="margin-s {{data.classes.product.button}} {{data.buttonClass}}"><h6 class="no-mb inline {{data.classes.product.prices}}"><span class="{{data.classes.product.compareAt}}">{{data.formattedCompareAtPrice}}</span><span class="{{data.classes.product.price}}">{{data.formattedPrice}}</span></h6> <h5 class="no-mb inline">{{data.buttonText}}</h6></button>'}},cart:{iframe:!1,contents:{description:!1,quantity:!1,quantityDecrement:!1,quantityIncrement:!1}}}})}))}var o="https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js";window.ShopifyBuy&&window.ShopifyBuy.UI?e():n()}