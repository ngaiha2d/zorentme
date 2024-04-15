<script>
import { ref, onMounted } from "vue";
import { useStore } from "../../stores/store";
import { useAuthStore } from "../../stores/auth";

export default {
  props: {
    item_id: {
      type: Number,
      required: true,
    },
  },
  setup(props) {
    const store = useStore();
    const item = ref(null);
    const authStore = useAuthStore();
    onMounted(async () => {
      
      if(!authStore.initialized) {
        await authStore.initialize();
      };
      await store.itemList();
      item.value = store.item.find((item) => item.id == props.item_id);
    });

    return { item };
  },
};


</script>

<template lang="">
    <div>
      
        <div class="model">
          
          <div class="room">
            <img class="imageproduct" :src="'http://localhost:8000/storage/' + (item && item.file_path.replace('public/', ''))" alt="image">
      <div class="text-cover">
         <h1>{{ item && item.name }}</h1>  <!--//&& is used if the item is null when first landing to the page so && make sure that if the item is not null then print the data -->
        <p class="price"> Rs. <span>{{ item && item.price }}</span> / day</p>
        <hr>
        <p>{{ item && item.description }}</p>
        <p>Tues, Oct 2, 2017 to Friday, Oct 5, 2017</p>
      </div>
    </div><div class="payment">
      <div class="receipt-box">
        <h3>{{ item && item.categories}} </h3>
        <table class="table">
          <tr>
            <td>{{item && item.categories}}</td>
            <td>{{ item && item.price }}</td>
          </tr>
          <tr>
            <td>Discount</td>
            <td>0 USD</td>
          </tr>
          <tr>
            <td>Subtotal</td>
            <td>240 USD</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>10 USD</td>
          </tr>
          <tfoot>
            <tr>
              <td>Sum</td>
              <td>Rs.{{ item && item.price }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="payment-info">
        <h3> Info</h3>
        <form>
        <label>Address</label>
        <input type="text" name="firstname" value="">
        <label>Identity</label>
        <input type="text" name="lastname" value="Voter Id">
        <br><br>
        <input class="btn" type="submit" value="Book Securly">
        </form>
      </div>
    </div>
  </div>
    </div>
</template>

<style>
* {
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
    font-size: 18px;
    margin: 0;
    padding: 0;
  }
  
  body {
    margin: 0;
    padding: 5% 0;
    position: relative;
    min-height: 100vh;
    background: #ffffff;
    display: flex;
    justify-content: center;
      animation: fadein 5s;
    animation-fill-mode: forwards;
  }
  
  
  label {
    display: block;
  }
  /* Model Container */
  
  .model {
    width: 900px;
    height: 700px;
    background: white;
  /*   font-size: 0; */
    color: white;
    position: relative;
  /*   animation: slideInFromLeft 1s cubic-bezier(0.68, -0.55, 0.265, 1.55); */
    animation-fill-mode: forwards;
  }
  

  
  @keyframes slideInFromLeft {
    0% {
      transform: translateY(-100%);
    }
    100% {
      transform: translateX(0);
    }
  }
  
  .imageproduct{
    margin-top: 10%;
    height: 400px;
    width: 500px;
    object-fit: contain;
  }

  .room {
  width: 50%;
  height: 100%;
  display: inline-block;
  vertical-align: top;
  position: relative;
}
  
  .text-cover {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.7);
    padding: 20px
  }
  
  .text-cover > * {
    margin: 10px 0;
  }
  
  .text-cover h1 {
    font-size: 1.8rem;
  }
  
  .text-cover .price {
    color: #e67e22;
  }
  
  .text-cover .price span {
    font-size: 1.4rem;
    font-weight: 700;
  }
  
  .payment {
    width: 50%;
    height: 100%;
    color: #34495e;
    display: inline-block;
  }
  
  .receipt-box {
    padding: 20px 20px;
    border-bottom: 1px solid #34495e;
  }
  
  .receipt-box h3,
  .payment-info h3 {
    margin-bottom: 2rem;
  }
  
  .payment-info {
    padding: 20px;
  }
  
  
  input[type=text]{
      width: 100%;
      padding: 8px 10px 10px;
      margin: 15px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  }
  
  .btn {
    padding: 15px 25px;
    border: none;
    color: white;
    width: 100%;
    display: block;
    background: #9b59b6;
    text-transform: uppercase;
  }
  
  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
  }
   
  .table td {
    font-size: 0.8rem;
    font-style: italic;
    padding: .25rem;
    vertical-align: top;
      
  }
  
  
  .table td:nth-child(2) {
    text-align: right;
  }
  </style>

