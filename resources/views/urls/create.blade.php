@extends("layouts.app")

@section("content")

<style>
    * {
      box-sizing: border-box;
    }
    
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }
    
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }
    
    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      margin-left: 50px;
    }
    
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }
    
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }
    
    /* Clear floats after the columns */
    .row::after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    </style>


<div class="container">
    <h2 style="font-size: 36px;">Url Shortner Form</h2>
   

  <form action="{{ route('urls.store') }}" method="POST">
   @csrf
  <div class="row">
    <div class="col-25">
      <label for="fname">Url Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="urlname" placeholder="Url name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Url Link</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="urllink" placeholder="Url link..">
    </div>
  </div>
  
  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>

@endsection