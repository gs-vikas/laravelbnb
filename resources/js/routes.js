import VueRouter from 'vue-router';
import Products from "./products/Products";
import addProduct from "./products/addProduct";
import ProductUpdateItem from "./products/ProductUpdateItem";

const routes = [
    {
        path: '/',
        component: Products,
        name: 'home'
    },
    {
        path: '/addproduct',
        component: addProduct,
        name: 'addproduct'
    },
    {
        path: '/editproduct',
        component: ProductUpdateItem,
        name: 'editproduct'
    }
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;