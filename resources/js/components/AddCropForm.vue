</div>
<div class="mb-3">
  <label for="crop_description" class="form-label"
    >Course</label
  >
  <input
    type="text"
    class="form-control"
    id="crop_description"
    name="crop_description"
    v-model="crop_description"
    ref="cropDescription"
  />
</div>
<div class="mb-3">
  <button class="btn btn-success" @click="addCrop">Add Crop</button>
</div>
</form>

</template>

<script>
export default {
data(){
  return {
      crop_id:'',
      crop_name:'',
      crop_description:'',

  };
},
methods:{
  addCrop(){
      this.$emit('add-crop',this.crop_id,this.crop_name,this.crop_description);
      this.crop_id='';
      this.crop_name='';
      this.crop_description='';
      console.log(this.$refs.cropId.value);
      console.log(this.$refs.cropName.value);
      console.log(this.$refs.cropDescription.value);

  }
}

};
</script>

<style></style>