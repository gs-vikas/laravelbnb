<template>
  <div>
    <router-link to="/addproduct" class="btn btn-primary">Add Product</router-link>
    <div v-if="loading">Data is loading...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div
          class="col d-flex align-items-stretch"
          v-for="(product, column) in productsInRow(row)"
          :key="'row' + row + column"
        >
          <product-list-item v-bind="product"></product-list-item>
        </div>
        <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
      </div>
    </div>
  </div>
</template>

<script>
import ProductListItem from "./ProductListItem";

export default {
  components: {
    ProductListItem
  },
  data() {
    return {
      products: null,
      loading: false,
      columns: 3
    };
  },
  computed: {
    rows() {
      return this.products === null
        ? 0
        : Math.ceil(this.products.length / this.columns);
    }
  },
  methods: {
    productsInRow(row) {
      return this.products.slice((row - 1) * this.columns, row * this.columns);
    },
    placeholdersInRow(row) {
      return this.columns - this.productsInRow(row).length;
    }
  },
  created() {
    this.loading = true;
    const configHeaders = {
      "content-type": "application/json",
      "Accept": "application/json"
    };
    const request = axios.get("/api/products", {headers: configHeaders}).then(response => {
      console.log(response.data)
      this.products = response.data;
      this.loading = false;
    });
  }
};
</script>