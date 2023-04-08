import { defineStore } from 'pinia';

export const useCartStore = defineStore({
  id: 'cart',
  state: () => ({
    crops: []
  }),
  actions: {
    addCrop(crop) {
      this.crops.push(crop);
    },
    removeCrop(crop) {
      this.crops.splice(this.crops.indexOf(crop), 1);
    }
  }
});