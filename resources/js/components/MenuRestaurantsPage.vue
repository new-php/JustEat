<template>
    <div>

        <img src="images/menuRestaurant/foto-heather-menuRest2.jpeg" class="image" alt="FotoHeather">

        <div class="base-container">

            <div class="heather-container">
                <div class="row">

                    <div class="col-sm-2 h-icon"><img src="images/menuRestaurant/pans-and-company.gif" alt="p-and-c" width="70%" height="80%"></div>
                    
                    <div class="col-md-5 h-rest">
                        <div class="row">
                            <h6>
                                <a href="mainPage" class="link mx-3">Inicio</a>
                                <span>></span>
                                <span><a href="restaurants" class="link mx-2">Carrer Congrés, 08031 Barcelona</a></span>
                                <span>></span>
                                <span><a href="#" class="link mx-2">{{ restaurant }}</a></span>   
                            </h6>                       
                        </div>

                        <div class="row">
                            <h4 class="nameRest mx-3">{{ restaurant }}</h4>
                        </div>

                        <div class="restaurant-rating">
                            <b-form-rating class="restaurant-star-rating" v-model="4.7" stars="6" size="sm" color="#FF8000" inline no-border readonly></b-form-rating>
                            <a href="#">
                                <span class="restaurant-num-ratings"><strong>(163 opiniones)</strong></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-5 h-info">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <i class="fa fa-shopping-bag icons mx-2" aria-hidden="true"></i>
                            </div>
                            <div class="col-3">
                                <span>Para <br>Recoger</span>
                            </div>
                            <div class="col-2">
                                <i class="fa fa-map-marker icons" aria-hidden="true"></i>
                            </div>
                            <div class="col-5">
                                <p>Passeig de Sant Antoni, 1, <br>Barcelona, 08014 </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="app-row">

                <div class="filters">

                    <div class="categories-filter">
                        <span><strong>Categorías</strong></span>
                    </div>

                    <div class="categories-available">
                        <div v-for="(category) in categories" :key=category.id class="category" :id="'category-' + category.id">
                            <a :href="'#cat-' + category.id" class="link">
                                <span>{{category.name}}</span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="products-section">

                    <div class="categories-filter">
                        <h3>
                            <a href="#" class="link"><span><strong>Menu</strong></span></a>
                            <a href="#" class="link"><span><strong>Opiniones</strong></span></a>
                            <a href="#" class="link"><span><strong>Info</strong></span></a>
                        </h3>
                    </div>

                    <div class="search-bar">
                        <span><i class="fa fa-search search-icon" aria-hidden="true"></i></span>
                        <input class="search-input" type="search" name="restaurants-searchbar" placeholder="Buscar un plato en el menú" v-model="search_input" debounce="500">
                    </div>

                    <div class="products-container">

                        <section class="product-card" v-for="(category) in categories_showing" :key=category.id :id="'cat-' + category.id">
                            <div class="product-text">
                                <div class="product-name">
                                    <h2>
                                        <strong>{{category.name}}</strong>
                                        <span><i class="fa fa-sort-asc product-cat-icon" aria-hidden="true"></i></span>
                                    </h2>
                                </div>
                            </div>   

                            <section class="product-card-cat" v-for="(product) in products_showing" :key=product.id>
                                <div class="product-text" >
                                    <div class="product-name">
                                        {{product.name}}
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="row">
                                        <div class="col-1 mr-3">{{ product.price }}€</div>
                                        <div class="col-1 ml-3"><span><i class="fa fa-plus product-icon" aria-hidden="true"></i></span></div>
                                    </div>
                                </div>
                            </section>

                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "Products",
    props: ['restaurant', 'address', 'products'],
    created() {

        this.categories = [
            {
                id: 1,
                name: 'Bocadillos',
                products: [
                    {
                        id: 1,
                    },
                    {
                        id: 2,
                    },
                    {
                        id: 3,
                    },
                    {
                        id: 4,
                    }
                ]
            },
            {
                id: 2,
                name: 'Menus',
                products: [
                    {
                        id: 1,
                    },
                    {
                        id: 4,
                    },
                    {
                        id: 5,
                    }
                ]
            },
            {
                id: 3,
                name: 'Top Ventas',
                products: [
                    {
                        id: 3,
                    },
                    {
                        id: 4,
                    }
                ]
            }
        ];

        this.categories_showing = this.categories;

        this.products = [
            {
                id: 1,
                name: "Producto 1",
                price: 8.95,
                categories: [
                    {
                        id: 1,
                        name: "Bocadillos"
                    },
                    {
                        id: 2,
                        name: "Menus"
                    },
                ],
            },
            {
                id: 2,
                name: "Producto 2",
                price: 6.40,
                categories: [
                    {
                        id: 1,
                        name: "Bocadillos"
                    },
                ],
            },
            {
                id: 3,
                name: "Producto 3",
                price: 12.95,
                categories: [
                    {
                        id: 1,
                        name: "Bocadillos"
                    },
                    {
                        id: 3,
                        name: "Top Ventas",
                    }
                ],
            },
            {
                id: 4,
                name: "Producto 4",
                price: 8.95,
                categories: [
                    {
                        id: 1,
                        name: "Bocadillos"
                    },
                    {
                        id: 2,
                        name: "Menus"
                    },
                    {
                        id: 3,
                        name: "Top Ventas",
                    }
                ],
            },
            {
                id: 5,
                name: "Producto 5",
                price: 3.20,
                categories: [
                    {
                        id: 2,
                        name: "Menus"
                    },
                ],
            },
  
        ];

        this.products_showing = this.products;

    },
    data() {
        return {
            products: [],
            products_showing: [],
            categories: [],
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
  };
</script>