<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />        
      <!-- Styles -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.css">
      @vite('resources/scss/app.scss')
   </head>
   <body>
      
      <header>
         <div class="logo">
            <img src="{{asset('images/netwrix-logo.png')}}" alt="">
         </div>
      </header>

      <section id="search-area">
         <h1>Netwrix Partner Locator</h1>
         <p>Hundreds of Netwrix partners around the world are standing by to help you. With our Partner Locator you can easily find the list of authorized partners in your area.</p>
         <form id="search-form">
            <div class="input-wrapper">
               <input id="search-text">
               <button><i class="fa fa-magnifying-glass"></i></button>
            </div>
            <div class="select-wrapper">
               <select id="type">
                  <option>Georgia</option>
                  <option>Germany</option>
                  <option>Italy</option>
               </select>
               <select id="country">
                  <option>Georgia</option>
                  <option>Germany</option>
                  <option>Italy</option>
               </select>
               <select id="state">
                  <option>Georgia</option>
                  <option>Germany</option>
                  <option>Italy</option>
               </select>
            </div>
         </form>
      </section>

      <section id="search-results">
         <div class="search-result">
            <div class="company-logo"></div>
            <div class="company-details"></div>
            <div class="company-contact"></div>
            <div class="partner-type"></div>
         </div>
      </section>



      <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.js"></script>
      @vite('resources/js/app.js')
   </body>
</html>
