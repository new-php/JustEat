<template>
    <div>
        <restaurants-categories></restaurants-categories>
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
                        <section class="restaurant-card" v-for="(restaurant) in restaurants_showing" :key=restaurant.id>
                            <img class="restaurant-image" :src="restaurant.photo">
                            <img class="restaurant-logo" :src="restaurant.logo">
                            {{restaurant.name}}
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
    props: ['address'],
    created() {
        this.categories = [
            {
                id: 1,
                name: 'Americana',
                restaurants: [
                    {
                        id: 1,
                    },
                    {
                        id: 2,
                    }
                ]
            },
            {
                id: 2,
                name: 'Argentina',
                restaurants: [
                    {
                        id: 1,
                    },
                    {
                        id: 2,
                    },
                    {
                        id: 3,
                    }
                ]
            },
            {
                id: 3,
                name: 'Bao',
                restaurants: [
                    {
                        id: 1,
                    }
                ]
            }
        ];

        this.restaurants = [
            {
                id: 1,
                name: "Restaurant1",
                photo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
                logo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
            },
            {
                id: 2,
                name: "Restaurant2",
                photo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
                logo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
            },
            {
                id: 3,
                name: "Restaurant3",
                photo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
                logo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
            },
            {
                id: 4,
                name: "Restaurant4",
                photo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
                logo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
            },
            {
                id: 5,
                name: "Restaurant5",
                photo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
                logo: "storage/images/restaurants/4cdfb34bc25f6f89b7099ca73a0c6544.jpg",
            },
        ];

        this.restaurants_showing = this.restaurants;
    },
    data() {
        return {
            restaurants: [],
            restaurants_showing: [],
            categories: [],
            categories_selected: [],
            filters_selected: [],
            search_input: "",
        }
    },
    mounted() {
      console.log("Example component mounted");
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
            }
            this.categories_selected = [];
        },
        resetFilters(evt) {
            evt.preventDefault();
            for (let i = 0; i < this.filters_selected.length; i++) {
                $("#" + this.filters_selected[i]).removeClass("filter-active");
            }
            this.categories_selected = [];
        },
        selectCategory(category) {
            if (!this.categories_selected.includes(category)) {
                this.categories_selected.push(category);
                $("#category-" + category.id).addClass("category-active");
            } else {
                for (let i = this.categories_selected.length-1; i >= 0; i-- ) {
                    if (this.categories_selected[i].id == category.id) {
                        this.categories_selected.splice(i,1);
                    }
                }
                $("#category-" + category.id).removeClass("category-active");
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
    },
  };
</script>
