<template>
    <div class="card">
        <router-link :to="{ name: 'PizzaCard', params: { id: pizza.id } }">
            <img :src="pizza.image" class="card-img-top pl-3 pt-3" :alt="pizza.name">
        </router-link>
        <div class="card-body">
            <h5 v-if="!isAuth" class="card-title">{{pizza.name}}</h5>
            <div v-if="isAuth" class="row">
                <div class="col-9">
                    <h5 class="card-title">{{pizza.name}}</h5>
                </div>
                <div class="col-3">
                    <like-component
                        v-if="$route.name !== 'home'"
                        :pizzaId="pizza.id"
                        :pizzaLike="pizza.like"
                    >
                    </like-component>
                </div>
            </div>
            <p class="card-text" style="height: 130px">
                <strong>Ingredients:</strong> {{ ingredientsList.join(', ') }}<br>
                <strong>Size:</strong> {{pizza.size}} cm<br>
                <strong>Weight:</strong> {{pizza.weight}} g
            </p>
            <div class="container">
                <div class="row justify-content-md-right">
                    <div class="col-4 f-18px">
                        <strong style="white-space: nowrap;">{{pizza.price}} &euro;</strong>
                    </div>
                    <div class="col-8 text-right">
                        <a v-on:click="addToCart(pizza)" href="javascript:void(0)" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import global from "../../global";

    export default {
        name: "PizzaItem",
        mixins: [global],
        props: {
            pizza: {
                type: Object,
                default: function () {
                    return { name: 'Noname' }
                }
            }
        },
        computed: {
            ingredientsList: function () {
                const result = [];
                for (let key in this.pizza.ingredients) {
                    result.push(this.pizza.ingredients[key].name);
                }
                return result;
            }
        }
    }
</script>

<style scoped>

</style>
