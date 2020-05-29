<template>
  <div class="card w-100">
    <div class="card-body">
      <p class="card-text">Name:{{ name }}</p>
      <p class="card-text">Description:{{ description }}</p>
      <p class="card-text">Availabilty:{{status? 'Available':'Not available'}}</p>
      <router-link :to="{ name: 'editproduct', params: { id } }">
        <h5 class="btn btn-primary">Edit</h5>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  props: { id: String, name: String, description: String, id: Number, status: Number }
};
</script>