document.getElementById("myForm").addEventListener("submit", function(event){
  event.preventDefault(); // Stop page from refreshing

  // Clear previous error messages
  document.getElementById("nameError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("ageError").innerHTML = "";

  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var age = document.getElementById("age").value;

  var valid = true;

  // Validate name
  if(name === "" || name.length < 3){
    document.getElementById("nameError").innerHTML = "Please enter a valid name (min 3 letters)";
    valid = false;
  }

  // Validate email
  if(email === "" || !email.includes("@")){
    document.getElementById("emailError").innerHTML = "Please enter a valid email";
    valid = false;
  }

  // Validate age
  if(age === "" || age < 10 || age > 100){
    document.getElementById("ageError").innerHTML = "Age must be between 10 and 100";
    valid = false;
  }

  if(valid){
    alert("Form submitted successfully!");
    document.getElementById("myForm").reset();
  }
});
