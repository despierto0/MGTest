<template>
    <li>
        <i @click="toggle" class="glyphicon" v-if="category.children.length" :class="iconClasses"></i>
        <span @click="choose">{{category.name}}</span>
        <ul v-show="open">
            <tree-menu v-for="(category, id) in category.children" :key="id" :category="category"
                       :choose-category="chooseCategory"></tree-menu>
        </ul>
    </li>
</template>
<script>
    export default {
        props: {
            category: Object,
            chooseCategory: Function
        },
        data: function () {
            return {
                open: true
            }
        },
        computed: {
            iconClasses: function () {
                return {
                    'glyphicon-plus': !this.open,
                    'glyphicon-minus': this.open
                }
            },
        },
        methods: {
            toggle: function () {
                this.open = !this.open
            },
            choose: function () {
                this.chooseCategory(this.category.id);
            }
        }
    }
</script>