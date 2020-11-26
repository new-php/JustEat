<template>
    <div>
        <div class="header mainpage-header">
            <div class="app-container">
                <div class="app-row">
                    <div class="logo-container">
                        <a id="app-logo" href="/"><svg class="app-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98 24">
                            <path fill-rule="nonzero" d="M10.97.5c.45-.3 1.04-.3 1.5 0 1.15.72 2.26 1.52 3.31 2.38 0 0 .29.2.3-.14-.03-.43 0-.87.07-1.3a.6.6 0 01.55-.37s1.3.06 2.13.17a.8.8 0 01.7.71s.53 3.53.65 4.8c0 0 .1.65 1.04 1.75 0 0 1.92 2.67 2.14 3.18 0 0 .44.92-.51 1.04 0 0-1.75.18-1.92.22a.43.43 0 00-.38.47s-.1 6.14-.54 9.08c0 0-.12 1.17-.77 1.15 0 0-1.8-.06-2.21-.05 0 0-.18 0-.16-.24 0 0 .92-9.57.3-14.4 0 0-.03-.63-.5-.77 0 0-.44-.17-.86.38a15.14 15.14 0 00-2.84 8.64s-.05 1.52.18 1.9c0 0 .15.27.9.33l.93.13s.18 0 .16.23c0 0-.21 2.8-.28 3.3 0 .12-.02.23-.06.34 0 0-.04.09-.33.08 0 0-4.15-.03-4.62 0 0 0-.2 0-.24-.1-.04-.1-.29-3.63-.28-4.13 0-.1.05-.2.15-.24a2.48 2.48 0 001.15-1.82c.05-.54.05-1.07.02-1.6 0 0 .15-5.4.2-6.26 0 0 .02-.29-.36-.34a.36.36 0 00-.27.04.36.36 0 00-.16.22v.03c0 .03-.27 3.55-.22 4.95 0 0 .1.92-.55.94 0 0-.62.1-.65-.67 0 0 .05-3.46.2-5.16 0-.2-.14-.36-.34-.38-.2-.03-.39.1-.43.3v.04s-.27 3.3-.22 5.04c0 0 .08.85-.6.82 0 0-.56.06-.6-.69 0 0 .16-4.72.2-5.09a.38.38 0 00-.34-.36h-.04a.38.38 0 00-.41.32v.03s-.25 5.66-.22 7.32c0 0-.02 1.7 1.25 2.4 0 0 .18.1.19.27 0 0 .14 3 .27 3.96 0 0 .05.24-.16.24l-3.19.08a.65.65 0 01-.65-.61 70.71 70.71 0 01-.6-9.58.49.49 0 00-.37-.53S.94 12.8.55 12.71a.68.68 0 01-.41-1A32.72 32.72 0 0110.97.51zm22.46 8.88h-3.15c-1.02 0-1.02 0-1.23 1.19-.22 1.18-.21 1.22.72 1.22h1.87l-1.06 6.06c-.26 1.35-.85 2.28-2.68 2.83-.47.13-.6.3-.6.5.04.35.14.68.3.98.3.72.47.85.72.85.3-.03.6-.09.9-.17 2.6-.85 3.66-2.84 4.08-5.2l1.2-6.82c.2-1.44.2-1.44-1.07-1.44m10.67 0c-1.27 0-1.27 0-1.44 1.06l-.92 5.5c-.26 1.61-.68 2.54-2.26 2.54-1.57 0-2.08-.93-1.83-2.37l.9-5.25c.25-1.48.2-1.48-1.1-1.48-1.33 0-1.33 0-1.5 1.02l-.93 5.5c-.56 3.13 1.4 5.07 4.17 5.07 3.1 0 4.67-1.39 5.18-4.69l.94-5.46c.2-1.44.13-1.44-1.2-1.44m5.82 9.02c1.02-.05 1.57-.51 1.57-.97 0-.6-.72-.8-1.7-1.1-1.91-.6-3.66-1.27-3.66-3.3 0-2.42 2-3.73 4.51-3.73 1 0 2.02.04 3.02.13.68.08.85.3.64 1.35-.22 1.06-.47 1.14-1.06 1.1-.73-.04-1.67-.13-2.77-.13-1.27 0-1.66.47-1.66.9 0 .54.51.84 1.7 1.18 2.21.63 3.66 1.52 3.66 3.43 0 2.24-1.66 3.55-4.34 3.63-1.28.05-2.56-.02-3.83-.2-.85-.13-.9-.13-.68-1.36.21-1.1.21-1.18 1.02-1.1 1.18.15 2.38.2 3.57.17m13.91-9.02h-7.18c-1.02 0-1.02 0-1.24 1.23-.21 1.23-.16 1.23.73 1.23h2.34l-1.32 7.59c-.26 1.48-.21 1.48 1.1 1.48 1.24 0 1.28 0 1.45-1.06l1.36-8h2.26c1.01 0 1.01 0 1.23-1.22.21-1.23.2-1.23-.73-1.23m12.68 2.41c1.02 0 1.02 0 1.23-1.23.22-1.22.21-1.22-.72-1.22h-5.15c-1.83 0-1.78 0-2.08 1.82l-1.32 7.65c-.34 2-.3 2 1.53 2h5.02c1.07 0 1.02 0 1.24-1.2.2-1.18.2-1.22-.73-1.22H71.2l.34-2.2h3.62c.97 0 .97 0 1.14-1.14.17-1.15.17-1.19-1.15-1.19h-3.19l.35-2.07h4.2zm5.43 4.05l1.66-3.64c.13-.3.13-.3.34-.3.21 0 .21 0 .26.34l.5 3.6h-2.76zm4.5-5.08c-.24-1.44-.24-1.44-2.29-1.44-1.91 0-1.87 0-2.47 1.19l-4.3 8.93c-.63 1.26-.5 1.39 1.07 1.39 1.24 0 1.24 0 1.75-1.14l.67-1.53h4.17l.21 1.53c.18 1.14.22 1.14 1.45 1.14 1.4 0 1.53-.08 1.28-1.48l-1.53-8.59zm10.18-1.4H89.4c-1.02 0-1.02 0-1.23 1.23-.21 1.23-.17 1.23.72 1.23h2.34l-1.32 7.59c-.25 1.48-.21 1.48 1.1 1.48 1.24 0 1.28 0 1.45-1.06l1.37-8h2.25c1.02 0 1.02 0 1.23-1.22.21-1.23.26-1.23-.68-1.23" fill="#FFF">
                            </path>
                        </svg></a>
                    </div>
                    <div class="header-links">
                        <a id="help-link" class="help-link" href="/help"><strong style="color: #FFF;">Ayuda</strong></a>
                        <a id="for-you-link" class="login-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g id="icon-/-gift" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="bounding-box" opacity="0" points="0 24 24 24 24 0 0 0"/>
                                    <path d="M11,15.5 L11,21 L6.667,21 C5.95966762,21 5.28130574,20.7190133 4.78114621,20.2188538 C4.28098669,19.7186943 4,19.0403324 4,18.333 L4,15.5 L11,15.5 Z M20,15.5 L20,18.333 C20,19.0403324 19.7190133,19.7186943 19.2188538,20.2188538 C18.7186943,20.7190133 18.0403324,21 17.333,21 L13,21 L13,15.5 L20,15.5 Z M12.634,4.175 C14.59,1.816 16.267,2.899 16.734,3.287 C17.703,4.091 18.281,5.28 16.722,7.156 C16.422225,7.50757631 16.0787805,7.81943195 15.7,8.084 L15.7,8.084 L18.5,8.084 C19.6045695,8.084 20.5,8.9794305 20.5,10.084 L20.5,10.084 L20.5,13.5 L13,13.5 L13,9.324 L11,9.324 L11,13.5 L3.5,13.5 L3.5,10.084 C3.5,8.9794305 4.3954305,8.084 5.5,8.084 L5.5,8.084 L8.3,8.084 C7.9199786,7.81986768 7.57548868,7.50797827 7.275,7.156 L7.275,7.156 L7.12615863,6.97066593 C5.75496667,5.20090333 6.32626667,4.06033333 7.262,3.287 C7.73,2.9 9.406,1.816 11.366,4.175 C11.6094245,4.47725413 11.821827,4.80322843 12,5.148 C12.1778121,4.80301846 12.3902377,4.47700883 12.634,4.175 Z M9.981,5.325 C9.02,4.172 8.588,4.526 8.412,4.672 C8.236,4.818 7.7,5.265 8.659,6.423 L8.659,6.423 L8.86878596,6.5889356 C9.51103625,7.06779606 10.266664,7.37497384 11.064,7.479 C10.9049173,6.67610728 10.5305703,5.93156123 9.981,5.325 Z M15.19,4.501 C14.936,4.501 14.565,4.674 14.024,5.325 C13.4744297,5.93156123 13.1000827,6.67610728 12.941,7.479 C13.8251729,7.36249751 14.6577567,6.99616062 15.341,6.423 L15.341,6.423 C16.304,5.265 15.766,4.818 15.59,4.672 C15.4822659,4.56769879 15.3398386,4.50681109 15.19,4.501 Z" id="Color" fill="#FFF"/>
                                </g>
                            </svg>
                            <strong style="color: #FFF;">Para ti</strong>
                        </a>
                        <a id="login-link" v-if="!username" class="login-link" href="/login">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g id="icon-/-user-circle-filled" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="bounding-box" opacity="0" points="0 24 24 24 24 0 0 0"/>
                                    <path d="M12,1.958 C17.5228475,1.958 22,6.4351525 22,11.958 C22,17.4808475 17.5228475,21.958 12,21.958 C6.4771525,21.958 2,17.4808475 2,11.958 C2,6.4351525 6.4771525,1.958 12,1.958 Z M12.2859798,12.9259823 L11.93,12.939 C10.3308035,12.8833531 8.74314496,13.2292137 7.312,13.945 C6.81651353,14.2627735 6.43454411,14.7294694 6.221,15.278 C7.40667306,17.3473456 9.60836173,18.6247277 11.993316,18.6270019 C14.3782702,18.6292701 16.5823878,17.3560837 17.772,15.287 L17.772,15.287 L17.6857572,15.0918487 C17.4678336,14.6454501 17.1346413,14.2636612 16.719,13.987 C15.2478644,13.2081405 13.5919781,12.8457749 11.93,12.939 Z M12,5.7 C10.3431458,5.7 9,7.04314575 9,8.7 C9,10.3568542 10.3431458,11.7 12,11.7 C13.6568542,11.7 15,10.3568542 15,8.7 C15,7.04314575 13.6568542,5.7 12,5.7 Z" id="Color" fill="#FFF"/>
                                </g>
                            </svg>
                            <strong style="color: #FFF;">Inicia sesión</strong>
                        </a>
                        <a id="account-link" v-if="username" class="my-account-link" href="/account/info">
                            <svg width="20" height="22" viewBox="0 0 12 13" xmlns="http://www.w3.org/2000/svg" class="c-nav-icon">
                                <path d="M2.67 11.33V9a.33.33 0 0 1 .66 0v2.67c0 .18-.15.33-.33.33H1.67a1 1 0 0 1-1-1V9.67c0-2.6 1.8-4.34 5.33-4.34 3.53 0 5.33 1.74 5.33 4.34V11a1 1 0 0 1-1 1H9a.33.33 0 0 1-.33-.33V9a.33.33 0 1 1 .66 0v2.33h1c.19 0 .34-.15.34-.33V9.67C10.67 7.44 9.17 6 6 6S1.33 7.44 1.33 9.67V11c0 .18.15.33.34.33h1zm3.33-6c1.09 0 2-1.02 2-2.33C8 1.7 7.09.67 6 .67 4.91.67 4 1.69 4 3c0 1.3.91 2.33 2 2.33zM6 6C4.53 6 3.33 4.66 3.33 3S4.53 0 6 0s2.67 1.34 2.67 3S7.47 6 6 6zm2.67 3.67a.33.33 0 1 1 .66 0v2c0 .09-.03.17-.1.23-.12.12-.37.28-.8.42-.65.22-1.56.35-2.76.35-.92 0-1.65-.14-2.21-.36-.36-.14-.58-.3-.7-.4a.33.33 0 0 1-.1-.24v-2a.33.33 0 1 1 .67 0v1.84a5.33 5.33 0 0 0 2.33.5c1.14-.01 1.98-.13 2.57-.33.2-.07.35-.13.44-.18V9.67z" fill="#266ABD">
                                </path>
                            </svg>
                            <strong>{{username}}</strong>
                        </a>
                    </div>
                </div>
                <div class="restaurant-breadcrumb mt-4">
                    <a href="/"><strong>Inicio</strong></a>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <a href="/restaurants"><strong>Restaurants</strong></a>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span>{{ restaurant.name }}</span>
                </div>
            </div>
        </div>
        <div class="restaurant-image-section">
            <div class="restaurant-image-photo">
                <img class="image-background" :src="'/storage/' + restaurant.photo">
            </div>
        </div>
        <div class="restaurant-full-info">
            <div class="restaurant-product-categories">
                <div id="sidebar-categories">
                    <div class="category-item" v-for="category in restaurant.product_categories" :key="category.id">
                        <a class="category-item-link" :id="'category-sidebar-' + category.id" :href="'#category-' + category.id">{{ category.name }}</a>
                    </div>
                </div>
            </div>
            <div class="restaurant-menu mx-3">
                <div class="restaurant-info-container">
                    <div class="restaurant-basic-info">
                        <img :src="'/storage/' + restaurant.logo">
                        <div class="restaurant-info">
                            <div class="restaurant-info-name">
                                <span><strong>{{ restaurant.name }}</strong></span>
                            </div>
                            <div class="restaurant-info-categories">
                                <span v-for="(category) in restaurant.categories.slice(0,2)">{{ category.name }}</span>
                            </div>
                            <div class="restaurant-info-rating">
                                <b-form-rating class="restaurant-star-rating" v-model="restaurant.average_rating" stars="6" size="sm" color="#FF8000" inline no-border readonly></b-form-rating>
                                <a href="#"><strong>{{ restaurant.number_of_ratings }} opiniones</strong></a>
                            </div>
                            <div class="restaurant-info-address">
                                <span>{{ restaurant.address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="restaurant-delivery-info">
                        <div class="restaurant-delivery-row">
                            <strong>Tiempo entrega</strong>
                            <strong>{{ restaurant.min_delivery_time }} - {{ restaurant.max_delivery_time }} min.</strong>
                        </div>
                        <div class="restaurant-delivery-row">
                            <strong>{{ restaurant.price_delivery }} € gastos de envío</strong>
                            <strong>Pedido mínimo {{ restaurant.min_order_price }} €</strong>
                        </div>
                    </div>
                </div>
                <div class="restaurant-tabs">
                    <div id="menu-tab" class="restaurant-tab restaurant-tab-selected" v-on:click="change_tab('menu')">
                        Menú
                    </div>
                    <div id="info-tab" class="restaurant-tab" v-on:click="change_tab('info')">
                        Info
                    </div>
                </div>
                <main class="restaurant-products-container" v-if="tab_selected === 'menu'">
                    <section class="restaurant-products-category" v-for="category in restaurant.product_categories" :key="category.id" :id="'category-' + category.id">
                        <span class="restaurant-category-name"><strong>{{ category.name }}</strong></span>
                        <div v-on:click="addProduct(product)" class="restaurant-product-item" v-for="product in category.products" :key="product.id">
                            <div class="restaurant-product-info">
                                <div class="product-name my-1">
                                    <span><strong>{{ product.name }}</strong></span>
                                </div>
                                <div class="product-description my-1">
                                    <span>{{ product.description }}</span>
                                </div>
                                <div class="product-price my-1">
                                    <span>{{ product.price }} €</span>
                                </div>
                            </div>
                            <div class="restaurant-product-image-container">
                                <img :src="'/storage/' + product.photo">
                            </div>
                        </div>
                    </section>
                </main>
                <div class="restaurant-more-info-container" v-if="tab_selected === 'info'">
                </div>
            </div>
            <div class="restaurant-cart">
                <div id="cart" class="restaurant-cart-container">
                    <div class="restaurant-cart-header">
                        <span><strong>Tu pedido</strong></span>
                    </div>
                    <div class="restaurant-cart-allergy">
                        <svg width="60px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                            <path fill="#125fca" d="M7.7 5a.3.3 0 1 1 .6 0v3.3a.3.3 0 1 1-.6 0V5zm.3 5.7a.7.7 0 1 1 0-1.4.7.7 0 0 1 0 1.4zm-5-8a.3.3 0 0 0-.3.3v10c0 .2.1.3.3.3h10a.3.3 0 0 0 .3-.3V3a.3.3 0 0 0-.3-.3H3zM3 2h10a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z">
                            </path>
                        </svg>
                        <span>Si tú o alguien para el que estás pidiendo tiene una alergia o intolerancia a algún alimento, haz clic aquí.</span>

                    </div>
                    <div class="restaurant-cart-delivery-mode">
                        <div id="home_delivery" v-on:click="setDelivery('home_delivery')" class="delivery-option delivery-option-selected">
                            <svg width="25px" fill="#125fca" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path d="M1.7 6.7a.3.3 0 1 1 0-.7h3.7a1 1 0 0 1 .9.6l1.1 2.3a.3.3 0 1 1-.6.2L5.7 7a.3.3 0 0 0-.3-.2H1.7zm4.2 4a2 2 0 1 1-3.8 0h-.4a.3.3 0 0 1-.4-.4v-.6A3.7 3.7 0 0 1 5 6a.3.3 0 1 1 0 .7 3 3 0 0 0-3 3v.3h6.9l2.4-2.4-2.5-4.3H7.7a.3.3 0 1 1 0-.6H9l.3.1L12 7.5a.3.3 0 0 1-.1.4l-2.7 2.7a.3.3 0 0 1-.2 0H5.9zm-.7 0H2.8a1.3 1.3 0 1 0 2.4 0zm7.5 2.6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-.6a1.3 1.3 0 1 0 0-2.7 1.3 1.3 0 0 0 0 2.7z">
                                </path>
                            </svg>
                            <span>A domicilio</span>
                        </div>
                        <div id="pick_up" v-on:click="setDelivery('pick_up')" class="delivery-option">
                            <svg width="20px" fill="#125fca" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M8.305 6.667L8.15 8.81a.417.417 0 1 1-.83-.059L7.5 6.22a.417.417 0 0 1 .416-.387h9.166c.219 0 .4.17.416.387l.77 10.775a1.25 1.25 0 0 1-1.25 1.338H8.75a.417.417 0 1 1 0-.833h8.27a.417.417 0 0 0 .417-.446l-.742-10.387h-8.39zm5.862-.834V4.167a1.667 1.667 0 0 0-3.334 0v1.666h3.334zM5.833 10H8.75a.417.417 0 1 1 0 .833h-.466l-.902 7.136a.417.417 0 0 1-.414.364H3.865a.417.417 0 0 1-.413-.364l-.903-7.136h-.466a.417.417 0 1 1 0-.833H5V8.09L3.455 6.544a.417.417 0 0 1 .59-.59L5.71 7.622a.417.417 0 0 1 .122.295V10zm1.611.833H3.389l.843 6.667h2.369l.843-6.667zM12.5 1.667a2.5 2.5 0 0 1 2.5 2.5V6.25c0 .23-.187.417-.417.417h-4.166A.417.417 0 0 1 10 6.25V4.167a2.5 2.5 0 0 1 2.5-2.5z">
                                </path>
                            </svg>
                            <span>Para recoger</span>
                        </div>
                    </div>
                    <div v-if="shopping_cart.products.length > 0" class="restaurant-cart-products">
                        <div class="cart-item" v-for="product in shopping_cart.products">
                            <div class="item-product">
                                <div class="cart-item-quantity"><strong>{{ product.quantity }}</strong></div>
                                <div class="cart-item-name">{{ product.name }}</div>
                            </div>
                            <div class="item-price">
                                <svg v-on:click="removeProduct(product)" class="item-bin" width="20px" fill="#ff0f0f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                                    <path d="M7 7v15.75c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0021 22.75V7H7zm2.958-1.167a4.084 4.084 0 018.084 0h5.875a.583.583 0 010 1.167h-1.75v15.75a2.917 2.917 0 01-2.917 2.917H8.75a2.917 2.917 0 01-2.917-2.917V7h-1.75a.583.583 0 010-1.167h5.875zm1.184 0h5.716a2.918 2.918 0 00-5.716 0zm-.642 5.25v9.334a.583.583 0 101.167 0v-9.334a.583.583 0 00-1.167 0zm5.833 0v9.334a.583.583 0 001.167 0v-9.334a.583.583 0 10-1.167 0z">
                                    </path>
                                </svg>
                                <div class="cart-item-price">{{ product.price }} €</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-prices">
                        <div v-if="shopping_cart.products.length > 0" class="restaurant-cart-price">
                            <span><strong>Subtotal</strong></span>
                            <span><strong>{{ this.shopping_cart.subtotal }} €</strong></span>
                        </div>
                        <div v-if="shopping_cart.products.length > 0" class="restaurant-cart-price">
                            <span>Gastos de envío</span>
                            <span>{{ this.shopping_cart.shipping }} €</span>
                        </div>
                        <div v-if="shopping_cart.products.length > 0" class="restaurant-cart-price">
                            <span><strong>Total</strong></span>
                            <span><strong>{{ this.shopping_cart.subtotal + this.shopping_cart.shipping }} €</strong></span>
                        </div>
                    </div>
                    <button :disabled="shopping_cart.subtotal < restaurant.min_order_price" v-if="shopping_cart.products.length > 0" v-on:click="checkoutOrder()" class="btn pay-button"><strong>Pagar</strong></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "Restaurants",
    props: ['restaurant'],

    created() {

    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    data() {
        return {
            search_input: "",
            tab_selected: 'menu',
            sidebar_categories_offset: 0,
            cart_offset: 0,
            cart_width: 0,
            shopping_cart: {
                products: [],
                restaurant_id: null,
                delivery_mode: 'home_delivery', //pick_up
                subtotal: 0,
                shipping: this.restaurant.price_delivery,
            },
        }
    },
    mounted() {
        this.setCurrentSection();
        this.sidebar_categories_offset = $('#sidebar-categories').offset().top;
        this.cart_offset = $('#cart').offset().top;
        this.cart_width = $('#cart').outerWidth();
        window.addEventListener('scroll', this.handleScroll);
    },
    watch: {
        search_input: function(val, oldVal) {
            console.log(val, oldVal);
        }
    },
    methods: {
        change_tab: function(tab) {
            if (tab === 'menu') {
                $('#menu-tab').addClass('restaurant-tab-selected');
                $('#info-tab').removeClass('restaurant-tab-selected');
                this.tab_selected = 'menu';
            } else {
                $('#info-tab').addClass('restaurant-tab-selected');
                $('#menu-tab').removeClass('restaurant-tab-selected');
                this.tab_selected = 'info';
            }
        },
        handleScroll: function(event) {

            let scrollTop = $(window).scrollTop();

            if ((this.sidebar_categories_offset - scrollTop) <= 45) {
                $('#sidebar-categories').addClass('sidebar_categories_fixed');
            } else {
                $('#sidebar-categories').removeClass('sidebar_categories_fixed');
            }

            if ((this.cart_offset - scrollTop) <= 24) {
                $('#cart').addClass('cart_fixed');
                $('#cart').css({'width': this.cart_width});
            } else {
                $('#cart').removeClass('cart_fixed');
            }

            this.setCurrentSection();
        },
        setCurrentSection: function() {
            let scrollTop = $(window).scrollTop();

            var product_categories = $('.restaurant-products-category');
            let current = false;

            product_categories.each(function() {
                let category_id = this.id.substring(9);
                var sidebar_link = $('#category-sidebar-' + category_id);
                sidebar_link.removeClass('category-item-link-active');
                if($(this).position().top <= scrollTop && ($(this).position().top + $(this).outerHeight()) > scrollTop) {
                    sidebar_link.addClass('category-item-link-active');
                    current = true;
                }
            });

            if (!current) {
                let body_height = document.body.offsetHeight;
                if (scrollTop < (body_height / 2)) {
                    $('.category-item-link').first().addClass('category-item-link-active');
                } else {
                    $('.category-item-link').last().addClass('category-item-link-active');
                }
            }
        },
        setDelivery: function(type) {
            this.shopping_cart.delivery_mode = type;
            if (type === 'home_delivery') {
                $('#home_delivery').addClass('delivery-option-selected');
                $('#pick_up').removeClass('delivery-option-selected');
            } else {
                $('#pick_up').addClass('delivery-option-selected');
                $('#home_delivery').removeClass('delivery-option-selected');
            }
        },
        addProduct: function(product) {
            if (this.shopping_cart.products.length <= 0) {
                this.shopping_cart.restaurant_id = this.restaurant.id;
            }

            if (this.shopping_cart.products.includes(product)) {
                for (let i = 0; i < this.shopping_cart.products.length; i++) {
                    if (product.id == this.shopping_cart.products[i].id) {
                        this.shopping_cart.products[i].quantity += 1;
                    }
                }
            } else {
                product.quantity = 1;
                this.shopping_cart.products.push(product);
            }

            this.shopping_cart.subtotal += parseFloat(product.price);
        },
        removeProduct: function(product) {
            for (let i = 0; i < this.shopping_cart.products.length; i++) {
                if (product.id == this.shopping_cart.products[i].id) {
                    this.shopping_cart.subtotal -= parseFloat(this.shopping_cart.products[i].price) * parseInt(this.shopping_cart.products[i].quantity)
                    this.shopping_cart.products.splice(i, 1);
                }
            }

            if (this.shopping_cart.products.length <= 0) {
                this.shopping_cart.restaurant_id = null;
            }
        },
        checkoutOrder: function() {
            // Fem alguna comprovació, crida a l'endpoint
            window.axios.post('/order',
                {
                    restaurant_id: this.shopping_cart.restaurant_id,
                    products: this.shopping_cart.products,
                    delivery_mode: this.shopping_cart.delivery_mode,
                },
                {
                    'Accept': 'application/json',
                })
                .then(response => {
                    let order_id = response.data.id;
                    window.location.href = '/order/' + order_id + '/delivery-address';
                })
                .catch((error) => {
                    $('#form-errors').addClass("form-errors-active");
                });
        }
    },
    computed: {
        username: function() {
            var username = window.localStorage.getItem('username');
            if (username && username !== undefined && username !== "undefined") {
                if (username != "null") {
                    return username
                } else {
                    return "Mi Cuenta";
                }
            }
        }
    }
  };
</script>

<style type="text/css">

</style>
