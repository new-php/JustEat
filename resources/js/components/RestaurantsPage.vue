<template>
    <div style="background-color: #f9fafb;">
        <div class="bg-white">
            <div class="base-container-categories">
                <div class="categories">
                    <div class="categories-label">
                        <svg class="categories-label-icon" alt="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 15"><path d="M5.1 4h3.6a.4.4 0 0 1 0 .8h-.4l-1.2 9.3a.4.4 0 0 1-.4.3h-4a.4.4 0 0 1-.4-.3L1.3 4.8H.7a.4.4 0 1 1 0-.8h3.6V2.2L2.8.7a.4.4 0 1 1 .6-.6L5 1.7a.4.4 0 0 1 .1.3v2zm2.4.8H2L3 13.6h3.3l1-8.8zm7.2 4v-.4c0-.7-.5-1.2-1.2-1.2h-2.4c-.6 0-1.2.5-1.2 1.2v.4h4.8zm.8 3.2v.4a2 2 0 0 1-2 2h-2.4a2 2 0 0 1-2-2V12a1.7 1.7 0 0 1-.4 0 .4.4 0 1 1 0-.8c.3 0 .4 0 .7-.3.4-.4.6-.5 1.1-.5.5 0 .8.1 1.2.5l.6.3c.3 0 .4 0 .7-.3.4-.4.6-.5 1.1-.5.5 0 .8.1 1.2.5l.6.3a.4.4 0 1 1 0 .8 1.7 1.7 0 0 1-.4 0zm-5.6-.5v.9c0 .7.6 1.2 1.2 1.2h2.4c.7 0 1.2-.5 1.2-1.2v-1l-.6-.2c-.3 0-.3 0-.6.3-.4.4-.7.5-1.2.5s-.7-.1-1.1-.5c-.3-.2-.4-.3-.7-.3-.2 0-.3 0-.6.3zm-.8-3.1c0-1.1 1-2 2-2h2.4a2 2 0 0 1 2 2v.8a.4.4 0 0 1-.4.4H9.5a.4.4 0 0 1-.4-.4v-.8z"></path></svg>
                        <span class="categories-label-text">Cocinas Populares</span>
                    </div>
                    <div class="header-filters">
                        <span class="categories-container" v-for="(category) in categories.slice(0,8)" v-on:click="selectCategory(category)"  :key=category.id :id="'mainCategory-' + category.id">
                            <div class="categories-image-container">
                                <img class="category-image" :src="'storage/' + category.image">
                            </div>
                            <i class="fa fa-check categories-check" aria-hidden="true"></i>
                            <span>{{category.name}}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 base-container">
            <div class="row">

                <div class="filters">
                    <div class="address-filter">
                        <div class="address-box">
                            <div class="address-icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span><strong>{{ address }}</strong></span>
                            </div>
                        </div>
                        <div class="change-address">
                            <a href="/"><strong>cambiar dirección</strong></a>
                        </div>
                    </div>
                    <div class="categories-filter">
                        <span><i class="fa fa-cutlery mr-2" aria-hidden="true"></i>Todas las cocinas A-Z</span>
                        <a v-on:click="resetCategoryFilters" href="#" class="categories-reset"><strong>Reiniciar</strong></a>
                    </div>
                    <div class="categories-available">
                        <div v-for="(category) in categories" :key=category.id class="category" v-on:click="selectCategory(category)" :id="'category-' + category.id">
                            <i class="fa fa-check category-check" aria-hidden="true"></i>
                            <span>{{category.name}}</span>
                            <span class="category-restaurants-number">{{category.restaurants.length}}</span>
                        </div>
                    </div>
                    <div class="other-filter">
                        <span><i class="fa fa-filter mr-2" aria-hidden="true"></i>Filtros</span>
                        <a v-on:click="resetFilters" href="#" class="filter-reset"><strong>Reiniciar</strong></a>
                    </div>
                    <div class="filters-available">
                        <div class="filter" id="filter-1" v-on:click="selectFilter('filter-1')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Ofertas especiales</span>
                        </div>
                        <div class="filter" id="filter-2" v-on:click="selectFilter('filter-2')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Gastos de entrega gratis</span>
                        </div>
                        <div class="filter" id="filter-3" v-on:click="selectFilter('filter-3')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Más de 5 estrellas</span>
                        </div>
                        <div class="filter" id="filter-4" v-on:click="selectFilter('filter-4')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Abiertos ahora</span>
                        </div>
                        <div class="filter" id="filter-5" v-on:click="selectFilter('filter-5')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Recogida</span>
                        </div>
                        <div class="filter" id="filter-6" v-on:click="selectFilter('filter-6')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Nuevo</span>
                        </div>
                        <div class="filter" id="filter-7" v-on:click="selectFilter('filter-7')">
                            <i class="fa fa-check filter-check" aria-hidden="true"></i>
                            <span>Halal</span>
                        </div>
                    </div>
                </div>
                <div class="restaurants-section">
                    <div class="search-bar">
                        <span><i class="fa fa-search search-icon" aria-hidden="true"></i></span>
                        <input class="search-input" type="search" name="restaurants-searchbar" placeholder="Buscar restaurante o cocina" v-model="search_input" debounce="500">
                    </div>
                    <div class="restaurants-open">
                        <svg class="restaurants-open-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                            <path d="M11.667 19.204v5.88a.583.583 0 0 1-1.167 0v-5.88c-1.312-.212-2.333-1.124-2.333-2.287v-4.084h1.166v4.084c0 .478.476.933 1.17 1.1a.583.583 0 0 1 1.16 0c.695-.167 1.17-.622 1.17-1.1v-4.084H14v4.084c0 1.163-1.02 2.075-2.333 2.287zm-7 5.88a.583.583 0 1 1-1.167 0V9.846a.583.583 0 1 1 1.167 0v15.236zm19.833 0a.583.583 0 1 1-1.167 0V9.846a.583.583 0 0 1 1.167 0v15.236zm-7.184-4.346c.88-.293 1.35-.764 1.35-1.488v-3.5c0-.724-.47-1.195-1.35-1.488a5.214 5.214 0 0 0-.983-.217v6.91c.338-.043.673-.114.983-.217zm-.983 4.345a.583.583 0 1 1-1.166 0V13.417c0-.322.26-.584.583-.584.13 0 .342.01.611.04.448.05.898.14 1.323.282 1.307.435 2.15 1.278 2.15 2.595v3.5c0 1.317-.843 2.16-2.15 2.595a6.455 6.455 0 0 1-1.35.285v2.953zM10.5 12.833h1.167v5.834H10.5v-5.834zm-4.74-1.33a4.655 4.655 0 0 1-3.427-4.505c0-.138.05-.272.14-.378l3.5-4.083a.583.583 0 0 1 .444-.204h15.166c.17 0 .332.075.443.204l3.5 4.083c.09.106.14.24.14.378a4.655 4.655 0 0 1-8.165 3.072 4.636 4.636 0 0 1-7.002 0 4.656 4.656 0 0 1-4.738 1.433zM6.686 3.5l-3.18 3.71a3.488 3.488 0 0 0 6.492 1.568.583.583 0 0 1 1.007.001 3.469 3.469 0 0 0 5.992 0 .583.583 0 0 1 1.007-.001 3.488 3.488 0 0 0 6.492-1.569L21.315 3.5H6.685z"></path>
                        </svg>
                        <span class="restaurants-open-label" v-if="restaurants_showing.length > 0"><strong>{{restaurants_showing.length}} restaurantes abiertos</strong></span>
                        <span class="restaurants-open-label" v-if="restaurants_showing.length == 0"><strong>No hay restaurantes abiertos</strong></span>
                        <span class="restaurants-open-ordering">Ordenar por relevantes</span>
                    </div>
                    <div class="restaurants-container">
                        <section class="restaurant-card" v-for="(restaurant) in restaurants_showing" :key=restaurant.id v-on:click="goToRestaurant(restaurant)">
                            <div class="restaurant-image-container">
                                <img draggable="false" class="restaurant-image" :src="'storage/' + restaurant.photo">
                            </div>
                            <div class="restaurant-logo-container">
                                <img draggable="false" class="restaurant-logo" :src="'storage/' + restaurant.logo">
                            </div>
                            <div class="restaurant-text">
                                <div class="restaurant-name">
                                    <strong>{{restaurant.name}}</strong>
                                </div>
                                <div class="restaurant-categories">
                                    <div class="restaurant-category-name" v-for="(category) in restaurant.categories.slice(0,2)">
                                    {{ category.name }}
                                    </div>
                                </div>
                                <div class="restaurant-rating">
                                    <b-form-rating class="restaurant-star-rating" v-model="restaurant.average_rating" stars="6" size="sm" color="#FF8000" inline no-border readonly></b-form-rating>
                                    <span class="restaurant-num-ratings"><strong>{{ restaurant.number_of_ratings }}</strong></span>
                                </div>
                            </div>
                            <div class="restaurant-info">
                                <div class="restaurant-prices">
                                    <div class="restaurant-price-delivery">
                                        <svg class="restaurant-price-delivery-icon" fill="#5E6B77;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M11.25 16.667a2.083 2.083 0 1 1 0-4.167 2.083 2.083 0 0 1 0 4.167zm0-.834a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5zm-6.258-4.166V17.5H17.5v-5.833H4.992zm-.417-.834h13.342c.23 0 .416.187.416.417v6.667c0 .23-.186.416-.416.416H4.575a.417.417 0 0 1-.417-.416V11.25c0-.23.187-.417.417-.417zm-1.872-1.45l.824 1.41a.417.417 0 0 1-.72.42l-1.033-1.77a.417.417 0 0 1 .15-.57l11.524-6.725a.417.417 0 0 1 .57.15l3.367 5.758a.417.417 0 0 1-.15.57l-2.258 1.317a.417.417 0 1 1-.42-.72l1.898-1.106-2.946-5.039L2.703 9.383zm8.682.41a.417.417 0 0 1-.72-.419 1.25 1.25 0 1 0-2.163 0 .417.417 0 0 1-.72.418 2.083 2.083 0 1 1 3.603 0z">
                                            </path>
                                        </svg>
                                        <span class="restaurant-price-delivery-label">Entrega {{ restaurant.price_delivery }}€</span>
                                    </div>
                                    <div class="restaurant-min-order-price">
                                        <span>Pedido Mínimo {{ restaurant.min_order_price }}€</span>
                                    </div>
                                </div>
                                <div class="restaurant-delivery-time">
                                    <svg class="restaurant-delivery-time-icon" fill="#006631" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10.711 11.545l-.589-.59 2.5-2.5.59.59-2.5 2.5zm5.244-6.423l.59.59-1.634 1.633-.589-.59 1.633-1.633zm-5.538 13.211a6.667 6.667 0 1 1 0-13.333 6.667 6.667 0 0 1 0 13.333zm0-.833a5.833 5.833 0 1 0 0-11.667 5.833 5.833 0 0 0 0 11.667zm0-11.667a2.083 2.083 0 1 1 0-4.166 2.083 2.083 0 0 1 0 4.166zm0-.833a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5z">
                                        </path>
                                    </svg>
                                    <span class="restaurant-delivery-time-label"><strong>{{ restaurant.min_delivery_time }} - {{ restaurant.max_delivery_time }} min.</strong></span>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "Restaurants",
    props: [
        'address',
        'restaurants',
        'categories'
    ],
    created() {
        this.restaurants_showing = this.restaurants.slice(0, this.restaurants.length);
    },
    data() {
        return {
            restaurants_showing: [],
            categories_selected: [],
            filters_selected: [],
            search_input: "",
        }
    },
    mounted() {
    },
    watch: {
        search_input: function(val, oldVal) {
            console.log(val, oldVal);
        }
    },
    methods: {
        resetCategoryFilters(evt) {
            evt.preventDefault();
            for (let i = 0; i < this.categories_selected.length; i++) {
                $("#category-" + this.categories_selected[i].id).removeClass("category-active");
                $("#mainCategory-" + this.categories_selected[i].id).removeClass("categories-active");
            }
            this.categories_selected = [];
            this.restaurants_showing = this.restaurants.slice(0, this.restaurants.length);
        },
        resetFilters(evt) {
            evt.preventDefault();
            for (let i = 0; i < this.filters_selected.length; i++) {
                $("#" + this.filters_selected[i]).removeClass("filter-active");
            }
            this.categories_selected = [];
            this.restaurants_showing = this.restaurants.slice(0, this.restaurants.length);
        },
        selectCategory(category) {
            if (!this.categories_selected.includes(category)) {
                this.categories_selected.push(category);
                $("#category-" + category.id).addClass("category-active");
                $("#mainCategory-" + category.id).addClass("categories-active");
                this.showForCategoryRestaurants(category);
            } else {
                for (let i = this.categories_selected.length-1; i >= 0; i-- ) {
                    if (this.categories_selected[i].id == category.id) {
                        this.categories_selected.splice(i,1);
                    }
                }
                $("#category-" + category.id).removeClass("category-active");
                $("#mainCategory-" + category.id).removeClass("categories-active");
                this.restaurants_showing = this.restaurants.slice(0, this.restaurants.length);
                for (let i = 0; i < this.categories_selected.length; i++) {
                    this.showForCategoryRestaurants(this.categories_selected[i]);
                }
            }
        },
        selectFilter(filter) {
            if (!this.filters_selected.includes(filter)) {
                this.filters_selected.push(filter);
                $("#" + filter).addClass("filter-active");
            } else {
                for (let i = this.filters_selected.length-1; i >= 0; i-- ) {
                    if (this.filters_selected[i] == filter) {
                        this.filters_selected.splice(i,1);
                    }
                }
                $("#" + filter).removeClass("filter-active");
            }
        },
        showForCategoryRestaurants(category) {
            var has_category = false;

            for (let i = this.restaurants_showing.length-1; i >= 0; i--) {
                has_category = false;
                for (let j = 0; j < this.restaurants_showing[i].categories.length; j++) {
                    if (this.restaurants_showing[i].categories[j].id == category.id) {
                        has_category = true;
                    }
                }
                if (!has_category) {
                    this.restaurants_showing.splice(i,1);
                }
            }
        },
        goToRestaurant(restaurant) {
            window.location.href = "restaurants/" + restaurant.id;
        }
    },
  };
</script>
