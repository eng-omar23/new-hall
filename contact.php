<?php
include("nav.php");
?>
<style>
    body {
     
  padding-top: 25px;
  background-color: white;
  margin-left: 10px;
  margin-right: 10px;
}
.container {
  max-width: 700px;
  margin: 0 auto;

  text-align: center;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 85px;
  background-color: 	#54B4D3;
}
.head {
  margin-top: 5%;
  -webkit-border-radius: 6px 6px 6px 6px;
  -moz-border-radius: 6px 6px 0px 0px;
  border-radius: 6px 6px 0px 0px;
  background-color: 	rgb(232, 240, 254);
  color:  black;
 




}
h2 {
  text-align: center;
  padding: 18px 0 18px 0;
  font-size: 1.4em;
}
input {
  margin-bottom: 10px;
}
textarea {
  height: 100px;
  margin-bottom: 10px;
}
input:first-of-type {
  margin-top: 35px;
}
input,
textarea {
  font-size: 1em;
  padding: 15px 10px 10px;
  font-family: "Source Sans Pro", arial, sans-serif;
  border: 1px solid #cecece;
  background: #d7d7d7;
  color: #fafafa;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  width: 80%;
  max-width: 600px;
}
::-webkit-input-placeholder {
  color: #fafafa;
}
:-moz-placeholder {
  color: #fafafa;
}
::-moz-placeholder {
  color: #fafafa;
}
:-ms-input-placeholder {
  color: #fafafa;
}
button {
  margin-top: 15px;
  margin-bottom: 25px;
  background-color: #cecece;
  padding: 12px 45px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid blueviolet;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  display: inline-block;
  cursor: pointer;
  width: 30%;
  color: #fff;
}
button:hover,
.button:hover {
  background: darkgrey;
}
label.error {
  font-family: "Source Sans Pro", arial, sans-serif;
  font-size: 1em;
  display: block;
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #d89c9c;
  width: 80%;
  margin: auto;
  color: #fafafa;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}
/* media queries */
@media (max-width: 700px) {
  label.error {
    width: 90%;
  }
  input,
  textarea {
    width: 90%;
  }
  button {
    width: 90%;
  }

}
.message {
  font-family: "Source Sans Pro", arial, sans-serif;
  font-size: 1.1em;
  display: none;
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #2abca7;
  width: 80%;
  margin: auto;
  color: #fafafa;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}

</style>

<!-- 
contact form created for treehouse competition.
-->




<form id="contact" action="contact_process.php" method="Post">
  <div class="container mt-5">
    <div class="head">
      <div class="container mt-5">

      <div id="sucesss" class="alert-sucess"></div>
      <div id="error" class="alert-danger"></div>
      
      </div>

      
    </div>
  <input type="hidden" id="contact_id" name="contact_id" >
    <input type="text" name="name" placeholder="Name" require /><br />
    <input  type="email" name="email" placeholder="Email" require /><br />
    <input  type="phone" name="phone" placeholder="phone" /><br />
    <textarea type="text" name="message" placeholder="Message"></textarea><br />
    <div class="message">Message Sent</div>
    <button id="submit" type="submit">
      Send!
    </button>
  </div>
</form>

<script>



// $(function () {
//   // validate
//   $("#contact").validate({
//     // Set the validation rules
//     rules: {
//       name: "required",
//       email: {
//         required: true,
//         email: true
//       },
//       message: "required",
//       phone : "require"
//     },
//     // Specify the validation error messages
//     messages: {
//       name: "Please enter your name",
//       email: "Please enter a valid email address",
//       message: "Please enter a message",
//       phone : "Please enter your phone Number"
//     },
//     // submit handler
//     submitHandler: function (form) {
//       //form.submit();
//       $(".message").show();
//       $(".message").fadeOut(4500);
//     }
//   });
// });
</script>