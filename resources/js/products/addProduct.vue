<template>
  <div>
        <div class="row justify-content-md-center">
            <form class="col-md-4">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input
                    type="text"
                    class="form-control"
                    name="name"
                    v-model="product.name"
                    :class="[{'is-invalid': errorFor('product.name')}]"
                    />
                    <v-errors :errors="errorFor('product.name')"></v-errors>
            </div>
            <div class="form-group">
                <label for="description" class="text-muted">Product Description</label>
                <textarea
                    name="description"
                    cols="30"
                    rows="10"
                    class="form-control"
                    v-model="product.description"
                    :class="[{'is-invalid': errorFor('description')}]"
                ></textarea>
                <v-errors :errors="errorFor('description')"></v-errors>
                </div>
            <div class="form-group">
                    <label for="status">Status</label>
                    <select
                    type="select"
                    class="form-control"
                    name="status"
                    v-model="selected"
                    :class="[{'is-invalid': errorFor('product.status')}]"
                    >
                    <option>Not Available</option>
                    <option>Available</option>
                    </select>
                    <v-errors :errors="errorFor('product.status')"></v-errors>
            </div>
            <div class="row">
                <router-link to="/" class="btn btn-primary col-md-4">Back to Home</router-link>
                <button
                class="btn btn-lg btn-primary btn-block col-md-4 offset-md-4"
                @click.prevent="submit"
                :disabled="sending"
                >Submit</button>
            </div>
        </form>
      </div>
  </div>
</template>

<script>
import { is404, is422 } from "./../shared/utils/response";
import validationErrors from "./../shared/mixins/validationErrors";

export default {
  mixins: [validationErrors],
  data() {
    return {
      loading: false,
      product: {
        name : null,
        description: null,
        status: 0
      },
      selected: 'Available',
      options: [
      { text: 'Not Available', value: 0 },
      { text: 'Available', value: 1}
    ],
      error: false,
      sending: false,
      success: false
    };
  },

  methods: {
    submit() {
      // 3. Store the review
      this.errors = null;
      this.sending = true;
      this.success = false;

      axios
        .post(`/api/products`, this.product)
        .then(response => {
          this.success = 201 === response.status;
          alert("Product added successfully!!")
        })
        .catch(err => {
          if (is422(err)) {
            const errors = err.response.data.errors;

            if (errors["content"] && 1 === _.size(errors)) {
              this.errors = errors;
              return;
            }
          }

          this.error = true;
        })
        .then(() => (this.sending = false));
    }
  }
};
</script>

