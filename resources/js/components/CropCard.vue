<template>
    <div class="crop-card">
      <div class="card-img">
        <img :src="crop.image" alt="Crop Image">
      </div>
      <div class="card-info">
        <h3>{{ crop.name }}</h3>
        <p>{{ crop.description }}</p>
        <span>{{ crop.price }}</span>
      </div>
      <div class="card-buttons">
        <button @click="addCrop">Add</button>
        <button @click="removeCrop">Remove</button>
      </div>
    </div>
  </template>
  
  <script>
  import { useCartStore } from '../store';
  
  export default {
    props: ['crop'],
    methods: {
      addCrop() {
        useCartStore().addCrop(this.crop);
      },
      removeCrop() {
        useCartStore().removeCrop(this.crop);
      }
    }
  }
  </script>
  
  <style scoped>
  .crop-card {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .card-img img {
    max-width: 100px;
  }
  
  .card-info {
    flex: 1;
    margin: 0 10px;
  }
  
  .card-buttons button {
    padding: 5px 10px;
    margin-left: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
  }
  </style>
  