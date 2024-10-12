<!DOCTYPE html>
<html>

<head>
 @include('home.css')
 <style type="text/css">
.div_deg {
  display: flex;
  justify-content: center;
  align-items: center;  
  margin: 60px;
}
table {
  border: 2px solid black;
  text-align: center;
  width: 800px;
}
th {
  border: 2px solid black;
  text-align: center; 
  color: white; 
  font: 20px;
  font-weight: bold;
  background-color: black;
}
td {
  border: 1px solid skyblue;  
}
.cart_value {
  text-align: center;
  margin-bottom: 70px;
  padding: 18px;
}
.order_deg {
  padding-right: 100px;
  margin-top: -200px;
}
label {
  display: inline-block;
  width: 50px;
}
.div_gap {
  padding: 20px;
}
.empty-cart-box {
  padding: 20px;
  text-align: center;
  background-color: #f0f0f0;
}
 </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
  </div>
  
  <div style="display: flex; justify-content: center; margin: 100px;">
    <div style="padding: 20px;" class="">
      <div style="padding: 10px; border: 1px solid black"> 
        <form action="{{url('confirm_order')}}" method="post">
          @csrf
          <div style="margin-bottom: 20px;">
            <label for="receiver-name">Receiver Name:</label>
            <input type="text" id="receiver-name" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
          </div>
          <div style="margin-bottom: 20px;">
            <label for="receiver-address">Receiver Address:</label>
            <textarea id="receiver-address" name="address" class="form-control">{{ Auth::user()->address }}</textarea>
          </div>
          <div style="margin-bottom: 20px;">
            <label for="receiver-phone">Receiver Phone:</label>
            <input type="text" id="receiver-phone" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
          </div>
          <div>
            <input class="btn btn-primary" type="submit" value="Cash On Delivery">
            <a class="btn btn-success" href="">Pay Using Card</a>
          </div>
        </form>
      </div>
    </div>
    
    <div style="width: 100%;">
      <table>
        <tr>
          <th>Product Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Remove</th>
        </tr>
        <?php
        $total_value = 0; // Initialize total price
        $product_count = count($cart); // Count the number of products in the cart
        ?>
        
        @forelse($cart as $item)
        <tr>
          <td>{{$item->product->title}}</td>
          <td>{{$item->product->price}}</td>
          <td>
            <img width="150" src="/products/{{$item->product->image}}">
          </td>
          <td>
            <a class="btn btn-danger" href="{{url('delete_cart', $item->id)}}">Remove</a>
          </td>
        </tr>
        <?php 
        $total_value += is_numeric($item->product->price) ? $item->product->price : 0; // Add product price to total
        ?>
        @empty
        <tr>
          <td colspan="4">
            <div class="empty-cart-box">
              <h3>Your cart is empty</h3>
            </div>
          </td>
        </tr>
        @endforelse
      </table>
    </div>
  </div>

  <div class="cart_value">
    <h3>Total Value of cart is: ${{$total_value}}</h3>
    <h3>Total Number of Products: {{$product_count}}</h3>
  </div>

  <!-- info section -->
  @include('home.footer')
</body>

</html>
